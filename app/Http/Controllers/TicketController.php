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
    
    //############################### چک کردن بلیط پروازهای خارجی ######################################
    public function checkTicket(Request $request){
        
        // dd($request->all());
        $this->makeSession();
        $client = new Client();
        $OrginDestinationArray=[];
        $AirTripType=1;

        array_push($OrginDestinationArray,
        array (
          'DepartureDateTime'         => $request->input('DepartureDateTime'),
          // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
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
                'DepartureDateTime'         => '2019-10-13T14:10:00',
                // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
                // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
                'DestinationLocationCode'   => $request->input('OriginLocationCode'),
                'DestinationType'           => 0,
                'OriginLocationCode'        => $request->input('DestinationLocationCode'),
                'OriginType'                => 0,
                ));
        }

        // dd($OrginDestinationArray);

        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirLowFareSearch', [
            RequestOptions::JSON => array (
                'PricingSourceType'     => 0,
                'RequestOption'         => 2,
                'SessionId'             => $this->SessionId,
                'AdultCount'            => $request->input('AdultCount'),
                'ChildCount'            => $request->input('ChildCount'),
                'InfantCount'           => $request->input('InfantCount'),
                'TravelPreference'      => 
                array (
                  'CabinType'           => 1,
                  'MaxStopsQuantity'    => 0,
                //   چند مسیره بودن مسیرها
                  'AirTripType'         => $AirTripType,
                  'VendorExcludeCodes'  => [],
                  'VendorPreferenceCodes' => []
                  
                ),
                'OriginDestinationInformations' => $OrginDestinationArray
                
              )
        ]);

        // dd($response->getBody()->getContents());
        return $response->getBody()->getContents();

    }//international

    //############################### نمایش فاکتور ######################################################
    public function factor(Request $request){
        dd($request->all());
    }


    //############################### چک کردن بلیط پروازهای خارجی ######################################
    public function checkInlineTickets(Request $request){
        
        // dd($request->all());
        $this->makeSession();
        $client = new Client();
        $OrginDestinationArray=[];
        $AirTripType=1;

        array_push($OrginDestinationArray,
        array (
          'DepartureDateTime'         => $request->input('DepartureDateTime'),
          // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
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
                'DepartureDateTime'         => '2019-10-23T14:10:00',
                // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
                // 'DepartureDateTime'         => $request->input('DepartureDateTime'),
                'DestinationLocationCode'   => $request->input('OriginLocationCode'),
                'DestinationType'           => 0,
                'OriginLocationCode'        => $request->input('DestinationLocationCode'),
                'OriginType'                => 0,
                ));
        }

        // dd($OrginDestinationArray);

        $response = $client->post('https://apidemo.partocrs.com/Rest/Air/AirLowFareSearch', [
            RequestOptions::JSON => array (
                'PricingSourceType'     => 0,
                'RequestOption'         => 2,
                'SessionId'             => $this->SessionId,
                'AdultCount'            => $request->input('AdultCount'),
                'ChildCount'            => $request->input('ChildCount'),
                'InfantCount'           => $request->input('InfantCount'),
                'TravelPreference'      => 
                array (
                  'CabinType'           => 1,
                  'MaxStopsQuantity'    => 0,
                //   چند مسیره بودن مسیرها
                  'AirTripType'         => $AirTripType,
                  'VendorExcludeCodes'  => [],
                  'VendorPreferenceCodes' => []
                  
                ),
                'OriginDestinationInformations' => $OrginDestinationArray
                
              )
        ]);

        // dd($response->getBody()->getContents());
        return $response->getBody()->getContents();

    }//پرواز داخلی





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
