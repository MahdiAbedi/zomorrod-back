<?php

namespace App\Http\Controllers;

use App\Airport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
// use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Exception\GuzzleException;
// use Larabookir\Gateway\Pasargad\Pasargad;

class TravelBaseController extends Controller
{
    public $SessionId;
    //########################### ایجاد سشن به مدت 20 دقیقه قبل از هر درخواست ############################
    public function makeSession(){
        
        
        #==== اگر این سشن قبلا ساخته نشده بود یکی بساز چون هر سشن 20 دقیقه معتبر هست از نظر پرتو ====
        $minutes = 1200 ; //20min * 60 sec;
        Cache::remember('SessionId', $minutes, function() {
            $client = new Client();
            $response = $client->post('https://apidemo.partocrs.com/Rest/Authenticate/CreateSession', [
                RequestOptions::JSON => [
                'OfficeId' => 'CRS001319',
                'UserName' => 'api',
                'Password' => 'AEE88646F849BD6224295F5ACD01A4AFFA50E5596E171473838F7B49681645ACABE12E71486EDD0D8DF969D1FF8A883300ACA419C69D4B616C6EE642C68A605A',
                ]
            ]);
        

            // $this->SessionId =  json_decode($response->getBody()->getContents())->SessionId;
            return json_decode($response->getBody()->getContents())->SessionId;
            // return $this->SessionId;
            //برای استفاده های آتی سشن را ذخیره میکنیم
            // session(['SessionId' => $this->SessionId]);
            #================= we store sesionId in Cache for 20 mins =========================
            // $minutes = 20 ;//cache time
            // Cache::put('SessionId', $this->SessionId, $minutes);
         });


        // if (!Cache::has('SessionId')) {
        //         $response = $client->post('https://apidemo.partocrs.com/Rest/Authenticate/CreateSession', [
        //             RequestOptions::JSON => [
        //             'OfficeId' => 'CRS001319',
        //             'UserName' => 'api',
        //             'Password' => 'AEE88646F849BD6224295F5ACD01A4AFFA50E5596E171473838F7B49681645ACABE12E71486EDD0D8DF969D1FF8A883300ACA419C69D4B616C6EE642C68A605A',
        //             ]
        //         ]);
            
    
        //     $this->SessionId =  json_decode($response->getBody()->getContents())->SessionId;
    
        //     //برای استفاده های آتی سشن را ذخیره میکنیم
        //     // session(['SessionId' => $this->SessionId]);
        //     #================= we store sesionId in Cache for 20 mins =========================
        //     $minutes = 20 ;//cache time
        //     Cache::put('SessionId', $this->SessionId, $minutes);
        //     // cache(['SessionId' => $this->SessionId], $minutes);
        // }#if
    }#makeSession

    //########################## هر سشن بعد از 20 دقیقه از اعتبار ساقط است #############################################
    public function DestroySession(){
        unset($_SESSION['SessionId']);
    }
    //############################### اتصال به درگاه بانکی #######################################
    public function GoToBank(){
        return Redirect::to('/Bank_CallBack');
        // try {
        //     // $gateway = \Gateway::make('mellat');
        //     // $gateway = \Gateway::make(new \Pasargad());
            
        //     // $gateway->setCallback(url('/Bank_CallBack')); // You can also change the callback
        //     // $gateway->price(1000)
        //     //         // setShipmentPrice(10) // optional - just for paypal
        //     //         // setProductName("My Product") // optional - just for paypal
        //     //         ->ready();
         
        //     // $refId =  $gateway->refId(); // شماره ارجاع بانک
        //     // $transID = $gateway->transactionId(); // شماره تراکنش
         
        //     // در اینجا
        //     //  شماره تراکنش  بانک را با توجه به نوع ساختار دیتابیس تان 
        //     //  در جداول مورد نیاز و بسته به نیاز سیستم تان
        //     // ذخیره کنید .
         
        //     // return $gateway->redirect();
         
        //  } catch (\Exception $e) {
         
        //     echo $e->getMessage();
        //  }
            
    }//go to bank
    //############################## بازگشت از درگاه بانکی #############################################
    public function bankCallBack(){
        try {
       
            // $gateway        =        \Gateway::verify();
            
            $trackingCode   =       10000;
            // $trackingCode   =        $gateway->trackingCode();
            // $refId          =        $gateway->refId();
            // $cardNumber     =        $gateway->cardNumber();
        
            // عملیات خرید با موفقیت انجام شده است
            // در اینجا کالا درخواستی را به کاربر ارائه میکنم
            \DB::table('booking')->where('UniqueId',session('UniqueId'))->update(
                [
                    'is_payed' => 1,
                    'trackingCode'=>$trackingCode
                ]);
        
                // //ارسال پیامک تایید ثبت سفارش به مالک بیمه نامه
                $message="سفارش شما با موفقت ثبت شد،برای شما سفر خوشی آرزومندیم";
                // $this->sendSms($phone, $message);
        
                return redirect('factor/');
            }
             catch (RetryException $e)
            {
                echo $e->getMessage();
            }
             catch (PortNotFoundException $e) 
            {
                echo $e->getMessage();
            }
             catch (InvalidRequestException $e)
            {
                echo $e->getMessage();
            }
             catch (NotFoundTransactionException $e)
            {
                echo $e->getMessage();
            }
             catch (Exception $e) 
            {
                echo $e->getMessage();
            }
    }
    //############################### setFareSourceCode ##################################################
    public function setFareSourceCode(Request $request){
        //FareSourceCode IS NECCESSARY 
        session(['FareSourceCode'   => $request->FareSourceCode]);
        session(['FareType'         => $request->FareType]);
        //  IF FARETYPE == 4 (WEBFARE) YOU HAVE TO NOTICE THAT 
        //  Instant Purchase, doesn't allow to reserve and will issue by calling Airbook
        //  SO WE SAVE FARETYPE TO FINDOUT WHEN TO ISSUE TICKET
    }


    //############################### نمایش فاکتور ######################################################
        public function factor(){
        
        print "از اینکه ستاره زمرد را انتخاب کرده اید سپاسگذاریم.";

        
    }

}
