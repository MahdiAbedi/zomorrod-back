<?php

namespace App\Http\Controllers;

use App\Airport;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class TravelBaseController extends Controller
{
    public $SessionId;
    //########################### ایجاد سشن به مدت 20 دقیقه قبل از هر درخواست ############################
    public function makeSession(){
        $client = new Client();

        $response = $client->post('https://apidemo.partocrs.com/Rest/Authenticate/CreateSession', [
            RequestOptions::JSON => [
            'OfficeId' => 'CRS001319',
            'UserName' => 'api',
            'Password' => 'AEE88646F849BD6224295F5ACD01A4AFFA50E5596E171473838F7B49681645ACABE12E71486EDD0D8DF969D1FF8A883300ACA419C69D4B616C6EE642C68A605A',
            ]
        ]);

        $this->SessionId =  json_decode($response->getBody()->getContents())->SessionId;

        //برای استفاده های آتی سشن را ذخیره میکنیم
        session(['SessionId' => $this->SessionId]);

    }
    //############################### اتصال به درگاه بانکی #######################################
    public function GoToBank(){
        try {

            return redirect('Bank_CallBack/');

            $price = session('TicketPrice');
            print('در حال اتصال به درگاه بانک...');
            $gateway = \Gateway::mellat();
            $gateway->setCallback(url('/Bank_CallBack'));
            $gateway->price($price);
            $gateway->ready();
    
            $refId =  $gateway->refId();                            // شماره ارجاع بانک
            $transID = $gateway->transactionId();                   // شماره تراکنش
    
                                                                    // در اینجا
                                                                    //  شماره تراکنش  بانک را با توجه به نوع ساختار دیتابیس تان 
                                                                    //  در جداول مورد نیاز و بسته به نیاز سیستم تان
                                                                    // ذخیره کنید .
           
            return $gateway->redirect();
            
         } catch (\Exception $e) {
                echo $e->getMessage();
         }
    }
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
