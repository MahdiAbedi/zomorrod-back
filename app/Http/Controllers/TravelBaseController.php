<?php

namespace App\Http\Controllers;

use App\Airport;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class TravelBaseController extends Controller
{
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
}
