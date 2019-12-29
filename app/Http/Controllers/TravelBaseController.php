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
    public function GoToBank($price){
        try {
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
       
            $gateway        =        \Gateway::verify();
            
            $trackingCode   =        $gateway->trackingCode();
            $refId          =        $gateway->refId();
            $cardNumber     =        $gateway->cardNumber();
        
            // عملیات خرید با موفقیت انجام شده است
            // در اینجا کالا درخواستی را به کاربر ارائه میکنم
            \DB::table('booking')->where('UniqueId',session('UniqueId'))->update(
                [
                    'is_payed' => 'پرداخت شده',
                    'trackingCode'=>$trackingCode
                ]);
        
                // //ارسال پیامک تایید ثبت سفارش به مالک بیمه نامه
                $message="سفارش شما با موفقت ثبت شد،برای شما سفر خوشی آرزومندیم";
                $this->sendSms($phone, $msg);
        
                return redirect('factor/'.$invoice_id);
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

}
