<?php

namespace App\Http\Controllers;

use App\r;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     private $SessionId;

    //ایجاد سشن به مدت 20 دقیقه قبل از هر درخواست
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

       

    }

    
    public function checkTicket(Request $request){
        $this->makeSession();



        $client = new Client();

        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirLowFareSearch', [
            RequestOptions::JSON => array (
                'PricingSourceType' => 0,
                'RequestOption' => 2,
                'SessionId' => $this->SessionId,
                'AdultCount' => 1,
                'ChildCount' => 0,
                'InfantCount' => 0,
                'TravelPreference' => 
                array (
                  'CabinType' => 1,
                  'MaxStopsQuantity' => 0,
                  'AirTripType' => 1,
                  'VendorExcludeCodes' => [],
                  'VendorPreferenceCodes' => []
                  
                ),
                'OriginDestinationInformations' => 
                array (
                  0 => 
                  array (
                    'DepartureDateTime' => '2019-09-25T00:00:00',
                    'DestinationLocationCode' => 'AMS',
                    'DestinationType' => 0,
                    'OriginLocationCode' => 'LON',
                    'OriginType' => 0,
                  ),
                ),
              )
        ]);

        dd($response->getBody()->getContents());

    }//international





    public function index()
    {
       // return view('pages/international');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
