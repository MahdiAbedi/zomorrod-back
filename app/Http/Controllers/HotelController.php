<?php

namespace App\Http\Controllers;

use App\City;
use stdClass;
use App\Hotel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Controllers\TravelBaseController;

class HotelController extends TravelBaseController
{
    public function find(Request $request)
    {

        $term = trim($request->q);
        // $term = trim($request->term);

        if (empty($term)) {
            return \Response::json([]);
        }

        // $tags = Airport::whereRaw('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        // $tags = Airport::where('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        $tags = City::Where('Name','like',$term .'%')->orWhere('FarsiName','like',$term .'%')->limit(5)->get();

        // return $tags;
        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['CityId' => $tag->id,'propertyDestinationId' => $tag->PropertyDestinationId, 'city' => $tag->Name , 'farsiName' => $tag->FarsiName , 'country'=>$tag->country,'count'=>mt_rand(124, 271)];
        }

        return \Response::json($formatted_tags);
    }

    // ########################################### نمایش لیست هتلها بر اساس جستجوی انجام شده ###############################
    public function showResults(Request $request){

        // dd($request->all());
        $this->makeSession();
        $client = new Client();
        $Occupancies=[];
        $AirTripType=1;

        //########################### ذخیره سازی اطلاعات نفرات و تاریخ ورود و خروج هتل ##########################################
        $request->session()->put('checkIn'      ,   $request->input('checkIn'));
        $request->session()->put('checkOut'     ,   $request->input('checkOut'));
        $request->session()->put('CityCode'     ,   $request->input('CityCode'));
        $request->session()->put('Occupancies'  ,   $request->input('Occupancies'));

        //##########################################################################################################################

        // $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelAvailability', [
        //     RequestOptions::JSON => array (
        //         'SessionId'             =>  $this->SessionId,
        //         'CheckIn'               =>  $request->input('checkIn'),
        //         'CheckOut'              =>  $request->input('checkOut'),
        //         'Latitude'              =>  "",
        //         'Longitude'             =>  "",
        //         'RadiusInKilometer'     =>  0,
        //         'SetGeoLocation'        =>  false,
        //         'NationalityId'         =>  "IR",
        //         'HotelId'               =>  '',
        //         'CityId'                =>  $request->input('CityCode'),
        //         'Occupancies'           =>  $request->input('Occupancies')
        //     )
        // ]);

        // dd($response->getBody()->getContents());
        // $hotels =  json_decode($response->getBody()->getContents())->PricedItineraries;

        $hotels = (json_decode(file_get_contents("./Hotel.json", "r"))->PricedItineraries);
        $newHotels=[];
        foreach ($hotels as $hotel) {
            if(!is_null($this->getHotel($hotel->HotelId))){
                $getHotel = $this->getHotel($hotel->HotelId);
                $hotel->Name        = $getHotel->Name;
                $hotel->ReviewScore = $getHotel->ReviewScore;
                $hotel->Rating      = $getHotel->Rating;
                $hotel->Address     = $getHotel->Address;
                $hotel->Latitude    = $getHotel->Latitude;
                $hotel->Longitude   = $getHotel->Longitude;
                // $hotel->image = 'https://hotelimage.partocrs.com/'.$hotel->HotelId.'/main.jpg';
                array_push($newHotels,$hotel);
            }

        }

        // dd($newHotels);
        return $newHotels;
    }



    // ########################################## گرفتن نام هتل ها ##########################################################
    public function getHotel($id,$total=false){
        if($total){
            $hotel=Hotel::find($id);
            // dd($hotel);
        }else{
            $hotel = Hotel::select('Name','ReviewScore','Rating','Address','Latitude','Longitude')->find($id);

        }
        return $hotel;
    }


    // #################################### NOTICE TO ME ##################################################
    // ####################################################################################################
    //آدرسی که پرتو تو داکیومنت داده برای عکس پیشفرض اشتباه است
    // من از روی دمو پرتو آدرس اصلی رو پیدا کردم:
    // <img src={`https://hotelimage.partocrs.com/${hotel.HotelId}/main.jpg`} alt=""/>


    // ########################################## دریافت تمام عکسهای یک هتل  ###################################################
    public function getHotelImages($hotelId){
            $client = new Client();
            $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelImage', [
            RequestOptions::JSON => array (
                'SessionId' =>   Session('SessionId'),
                'HotelId'   =>   $hotelId
            )
        ]);
        // dd(json_decode($response->getBody()->getContents())->Links);
        return json_decode($response->getBody()->getContents())->Links;
    }


    // ##########################################  نمایش جزییات هر هتل ######################################################
    public function show($HotelId){

        //########################### ذخیره سازی اطلاعات نفرات و تاریخ ورود و خروج هتل ##########################################
        //ذخیره کد هتل در سشن
        session(['HotelId' => $HotelId]);


        $hotel=new stdClass;
        $getHotel = $this->getHotel($HotelId,true);
            if(!is_null($getHotel)){
                $hotel->Id              = $HotelId;
                $hotel->Name            = $getHotel->Name;
                $hotel->ReviewScore     = $getHotel->ReviewScore;
                $hotel->Rating          = $getHotel->Rating;
                $hotel->Address         = $getHotel->Address;
                $hotel->Latitude        = $getHotel->Latitude;
                $hotel->Longitude       = $getHotel->Longitude;
                $hotel->Email           = $getHotel->Email;
                $hotel->Url             = $getHotel->Url;
                $hotel->Phone           = $getHotel->Phone;
                $hotel->Fax             = $getHotel->Fax;
                $hotel->Description     = $getHotel->Description;
                $hotel->Instructions    = $getHotel->Instructions;
                $hotel->SpecialInstructions = $getHotel->SpecialInstructions;
                $hotel->BeginTime       = $getHotel->BeginTime;
                $hotel->MinAge          = $getHotel->MinAge;
                $hotel->CheckOutTime    = $getHotel->CheckOutTime;
                $hotel->EndTime         = $getHotel->EndTime;
                $hotel->Images          = $this->getHotelImages($HotelId);
            }
        return view('pages/hotels/detail',compact('hotel'));
    }

    // ########################################## گرفتن تصویر ابتدایی هر هتل در لیست هتلها #################################

    // ########################################## دریافت اتاقهای یک هتل ##########################################
    public function getRooms(Request $request){
        $this->makeSession();
        $client = new Client();
        $Occupancies=[];
        $AirTripType=1;
        //اطلاعات مسافران 
        array_push($Occupancies,
        array (
        'AdultCount'   => 1,
        'ChildCount'   => 0,
        'ChildAges'    => array()
        ));

        $arr = array (
            'SessionId'         =>  $this->SessionId,
            'CheckIn'           =>  $request->input('checkIn'),
            'CheckOut'          =>  $request->input('checkOut'),
            'Latitude'          =>  "",
            'Longitude'         =>  "",
            'RadiusInKilometer' =>  0,
            'SetGeoLocation'    =>  false,
            'NationalityId'     =>  "IR",
            'HotelId'           =>  $request->input('HotelId'),
            'Occupancies'       =>  $request->input('Occupancies')
        );

        // dd(json_encode($arr));

        $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelAvailability', [
            RequestOptions::JSON => $arr
        ]);
        
        // dd($response->getBody()->getContents());
        $hotels =  json_decode($response->getBody()->getContents())->PricedItineraries;

        return $hotels;

        
    }//getRooms



}//class
