<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Controllers\TravelBaseController;

class TicketController extends TravelBaseController
{

    //=============================================================================================================
    //=================================== SEARCH AND BOOK FLOW ====================================================
    //=============================================================================================================
      # SETP 1:   CREATE SESSION ID
      # SETP 2:   CALL AirLowFairSearch :{
        # SETP 2.1: CALL AIR RULES
        # SETP 2.1: CALL AIR BAGGAGES
      # }
      # SETP 3:   USER SELECT ITENERAY
      # SETP 4:   CALL AirRevalidate
      # SETP 5:   GET PASSENGER DETAILS
      # SETP 6:   CALL AirRevalidate
      # SETP 7:   PAYMENT PAGE (BANK)
      # SETP 8:   CALL AirRevalidate
      # SETP 9:   CALL AIRBOOK
      # SETP 10:  FARETYPE IS WEBFARE
      # SETP 11:   




    //#############################################################################################################
    //############################### چک کردن بلیط پروازهای داخلی و خارجی ######################################
    //#############################################################################################################
    public function checkTicket(Request $request){
        
        // dd($request->all());
        $this->makeSession();
        $client = new Client();
        $OrginDestinationArray=[];
        $AirTripType=1;

        array_push($OrginDestinationArray,
        array (
          'DepartureDateTime'         => $request->input('DepartureDateTime'),
          'DestinationLocationCode'   => $request->input('DestinationLocationCode'),
          'DestinationType'           => 0,
          'OriginLocationCode'        => $request->input('OriginLocationCode'),
          'OriginType'                => 0,
        ));


        
        //اگر رفت و برگشت بود اطلاعات مسیر برگشت
        if($request->input('IsRoundTrip')=='true'){
            $AirTripType=2;
            array_push($OrginDestinationArray,
                array (
                // 'DepartureDateTime'         => '2019-10-13T14:10:00',
                'DepartureDateTime'         => $request->input('ReturnTime'),
                'DestinationLocationCode'   => $request->input('OriginLocationCode'),
                'DestinationType'           => 0,
                'OriginLocationCode'        => $request->input('DestinationLocationCode'),
                'OriginType'                => 0,
                ));
        }

        //###################### تعداد نوزاد نباید بیشتر از تعداد بزرگسالان باشد ##################################
        if($request->input('InfantCount')>$request->input('AdultCount')){
          Session::flash('warning', 'تعداد نوزاد نمیتواند کمتر از تعداد بزرگسالان باشد.');
          return Redirect::back();
        }

        //#################### مجموع مسافران اعم از بزرگسال ،کودک و نوزاد نباید بیشتر از 10 نفر باشد ############
        if($request->input('InfantCount')+$request->input('AdultCount')+$request->input('ChildCount')>10){
          Session::flash('warning', 'مجموع مسافران اعم از بزرگسال ،کودک و نوزاد نباید بیشتر از 10 نفر باشد');
          return Redirect::back();
        }

        //################### حداقل یک بزرگسال باید در پرواز باشد  #################################################
        if($request->input('AdultCount')<1){
          Session::flash('warning', 'حداقل یک بزرگسال باید در پرواز باشد');
          return Redirect::back();
        }

        $sendArray=array (
          'PricingSourceType'     => 0,
          'RequestOption'         => 2,
          'SessionId'             => session('SessionId'),
          'AdultCount'            => $request->input('AdultCount'),
          'ChildCount'            => $request->input('ChildCount'),
          'InfantCount'           => $request->input('InfantCount'),
          'TravelPreference'      => 
          array (
            'CabinType'           => 1,
            'MaxStopsQuantity'    => $request->input('MaxStopsQuantity'),
          //   چند مسیره بودن مسیرها
            'AirTripType'         => $AirTripType,
            'VendorExcludeCodes'  => [],
            'VendorPreferenceCodes' => []
            
          ),
          'OriginDestinationInformations' => $OrginDestinationArray
          
        );

        // dd(json_encode($sendArray));

        //نوشتن خروجی در فایل برای ارسال به پرتو 
          // $myfile = fopen("Request.json", "w") or die("Unable to open file!");
          // fwrite($myfile, json_encode($sendArray));
          // fclose($myfile);
        // پایان تست  

        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirLowFareSearch', [
            RequestOptions::JSON => $sendArray
        ]);


        //نوشتن خروجی در فایل برای ارسال به پرتو 
          // $myfile2 = fopen("Response.json", "w") or die("Unable to open file!");
          // fwrite($myfile2, $response->getBody()->getContents());
          // fclose($myfile2);
        // پایان تست 

        // dd($response->getBody()->getContents());
        return $response->getBody()->getContents();

    }//international

 
    //#############################################################################################################
    //############################### بوک کردن پرواز داخلی و خارجی ##############################################
    //#############################################################################################################

    public function AirBooking(){
        $client = new Client();
        $AirBookingData =DB::table('booking')->select('BookingDetail')->where('FareSourceCode',session('FareSourceCode'))->first();
        // dd(($AirBookingData));
        $AirBookingData = json_decode($AirBookingData->BookingDetail);
        //################################### REVALIDATE BEFORE BOOK #############################
        // if(!$this->AirRevalidate()){
        //   return Redirect::back()->with('error', 'امکان خرید این بلیط مقدور نمیباشد لطفا دوباره جستجو بفرمایید');
        // }

        //########################################################################################

        // dd(json_encode($AirBookingData));
        //ارسال اطلاعات به سرور پرتو برای بوک کردن بلیط
        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirBook', [
            RequestOptions::JSON => $AirBookingData
        ]);


        // $response = '{"Success":false,"TktTimeLimit":null,"Category":null,"Status":null,"UniqueId":null,"Error":{"Id":"Err0102008","Message":"Invalid SessionID"},"PriceChange":false}';
        // dd($response->getBody()->getContents());
        $returnbooking = json_decode($response->getBody()->getContents());
        // dd($returntbooking);
        // dd($returnbooking->UniqueId);


        //#################################### وضعیت کل را در دیتابیس ذخیره میکنیم #############################################
        $errorId="";   
        if($returnbooking->Error){
            $errorId = $returnbooking->Error->Id;
        }
        $ErrorMessage="";   
        if($returnbooking->Error){
            $ErrorMessage = $returnbooking->Error->Message;
        }
        #===============================اطلاعات حاصل از موفقیت یا عدم موفقیت بوکینگ در دیتابس آبدیت میشود ================================
        DB::table('booking')
              ->where('FareSourceCode' ,   session('FareSourceCode')) 
              ->update(
                  [
                    'Success'        =>   $returnbooking->Success,
                    'TktTimeLimit'   =>   $returnbooking->TktTimeLimit,
                    'Category'       =>   $returnbooking->Category,
                    'Status'         =>   $returnbooking->Status,
                    'UniqueId'       =>   $returnbooking->UniqueId,
                    'ErrorId'        =>   $errorId,
                    'ErrorMessage'   =>   $ErrorMessage,
                    'PriceChange'    =>   $returnbooking->PriceChange,
                    'FareType'       =>   session('FareType')
                ]
        );

          //SAVING $returnbooking->UniqueId TO USE LATER
            session(['UniqueId'       => $returnbooking->UniqueId]);


          //IF IN AIRBOOK RESULT FARETYPE WAS WEBFARE WE GET "AIR ORDER RESULTS"
          //ELSE WE HAVE TO CALL "AIRBOOKING DATA" THEN "CHECK PRICE" AFTER THAT GET "AIR ORDER RESULTS" 

          if(session('FareType')==4){
           // $this->AirOrderTicket();
           

          }else{
            $this->AirBookingData();
          }
          
          // return $returnbooking->Success;
        // return $response->getBody()->getContents();
        // dd($response->getBody()->getContents());
    }


    //#############################################################################################################
    //################### اطلاعات مسافران و بلیط رو ذخیره کنیم تا بعد از پرداخت بتونیم بوک کنیم ###############
    //#############################################################################################################
    public function SaveBookingDate(Request $request){
        $AirBookingData = $request->input('AirBookingData');
        //قیمت بلیطی که خریده 
        $TicketPrice = $request->input('TicketPrice');
        $AirBookingData['SessionId']=session('SessionId');
        #======================== SAVE PRICE FOR GOING TO BANK ==========================================
        session(['TicketPrice'       => $TicketPrice]);

        // #============================ REVALIDATE BEFORE BOOK ==========================================
        // if(!$this->AirRevalidate()){
        //   return Redirect::back()->with('error', 'امکان خرید این بلیط مقدور نمیباشد لطفا دوباره جستجو بفرمایید');
        // }

        #============================ وضعیت کل را در دیتابیس ذخیره میکنیم ===========================
           DB::table('booking')->insert([
            'BookingDetail'  =>   json_encode($AirBookingData),
            'user_id'        =>   auth()->user()->id,
            'TicketPrice'    =>   $TicketPrice,
            'FareSourceCode' =>   session('FareSourceCode'),
            'created_at'     =>   new \DateTime()
            
          ]);
    }

    //#############################################################################################################
    //############################### AIR REVALIDATE ##############################################
    //#############################################################################################################

    public function AirRevalidate(){
      $client = new Client();

      $sendArray=array (
        'SessionId'             => session('SessionId'),
        'FareSourceCode'        => session('FareSourceCode')

      );
      $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirRevalidate', [
          RequestOptions::JSON => $sendArray
      ]);

      $returnbooking = json_decode($response->getBody()->getContents());
      // dd($returnbooking);
      return (string)$returnbooking->Success;

    }

    //#############################################################################################################
    //############################### CALL ARIBOOKING DATA ##############################################
    //#############################################################################################################

      public function AirBookingData(){
        // echo 'you are in AirBookingDate';
          $client = new Client();

          $sendArray=array (
            'SessionId'       => session('SessionId'),
            'UniqueId'        => session('UniqueId')

          );
          
          dd(json_encode($sendArray));

          
          $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirBookingData', [
              RequestOptions::JSON => $sendArray
          ]);

          // dd($response->getBody()->getContents());
          // $returnbooking = $response->getBody()->getContents();
          $returnbooking = json_decode($response->getBody()->getContents());
          // اگر خطایی هنگانم چک کردن به وجود نیاد دستور ثبت بلیط صادر میشه
          if(!$returnbooking->Error){
            $this->AirOrderTicket();
          }else{
            echo 'خطایی رخ داده است';
          }
          // return (string)$returnbooking->Success;
        
      }
    //#############################################################################################################
    //############################### CALL AIR ORDER ##############################################
    //#############################################################################################################

      public function AirOrderTicket(){
          $client = new Client();
          // dd('you are in AirorderTicket');
          $sendArray=array (
            'SessionId'       => session('SessionId'),
            'UniqueId'        => session('UniqueId')

          );
          // dd(json_encode($sendArray));
          $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirOrderTicket', [
              RequestOptions::JSON => $sendArray
          ]);

          $returnbooking = json_decode($response->getBody()->getContents());
          dd($returnbooking);
          // dd($response->getBody()->getContents());
          // return (string)$returnbooking->Success;
        
      }



    //#############################################################################################################
    //############################### ثبت نهایی بلیط خریداری شده بعد از پرداخت ##############################################
    //#############################################################################################################





    //#############################################################################################################
    //############################### نمایش فاکتور پرداخت شده ##############################################
    //#############################################################################################################
        public function factor(){
          print "از اینکه ستاره زمرد را انتخاب کرده اید سپاسگذاریم.";
          #================================ بعد از اینکه پرداخت انجام شد پرواز بوک میشه ==========================
          $this->AirBooking();
      }



}//END OF CLASS

