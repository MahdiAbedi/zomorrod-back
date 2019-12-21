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

    //############################### نمایش فاکتور ######################################################
    public function factor(Request $request){
        dd($request->all());
    }


    //#############################################################################################################
    //############################### بوک کردن پرواز داخلی و خارجی ##############################################
    //#############################################################################################################

    public function AirBooking(Request $request){
        // dd($request->all());
        // dd(session('SessionId'));
        $client = new Client();
        $AirBookingData = $request->input('AirBookingData');
        $AirBookingData['SessionId']=session('SessionId');


        // dd(json_encode($AirBookingData));
        //ارسال اطلاعات به سرور پرتو برای بوک کردن بلیط
        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirBook', [
            RequestOptions::JSON => $AirBookingData
        ]);


        // $response = '{"Success":false,"TktTimeLimit":null,"Category":null,"Status":null,"UniqueId":null,"Error":{"Id":"Err0102008","Message":"Invalid SessionID"},"PriceChange":false}';
        dd($response->getBody()->getContents());
        $returnbooking = json_decode($response->getBody()->getContents());
        // dd($returnbooking);


        //#################################### وضعیت کل را در دیتابیس ذخیره میکنیم #############################################
           DB::table('booking')->insert([
            'BookingDetail'  =>   json_encode($AirBookingData),
            'user_id'        =>   auth()->user()->id,
            'Success'        =>   $returnbooking->Success,
            'TktTimeLimit'   =>   $returnbooking->TktTimeLimit,
            'Category'       =>   $returnbooking->Category,
            'Status'         =>   $returnbooking->Status,
            'UniqueId'       =>   $returnbooking->UniqueId,
            'ErrorId'        =>   $returnbooking->Error->Id,
            'ErrorMessage'   =>   $returnbooking->Error->Message,
            'PriceChange'    =>   $returnbooking->PriceChange
          ]);
          return $returnbooking->Success;
        // return $response->getBody()->getContents();
        // dd($response->getBody()->getContents());
    }

}
