<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Controllers\TravelBaseController;

class TicketController extends TravelBaseController
{
    //############################### چک کردن بلیط پروازهای داخلی و خارجی ######################################
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

        $sendArray=array (
          'PricingSourceType'     => 0,
          'RequestOption'         => 2,
          'SessionId'             => $this->SessionId,
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

        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirLowFareSearch', [
            RequestOptions::JSON => $sendArray
        ]);

        // dd($response->getBody()->getContents());
        return $response->getBody()->getContents();

    }//international

    //############################### نمایش فاکتور ######################################################
    public function factor(Request $request){
        dd($request->all());
    }
}
