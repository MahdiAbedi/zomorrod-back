<?php

namespace App\Http\Controllers;

use App\City;
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
        $tags = City::Where('Name','like',$term .'%')->limit(5)->get();

        // return $tags;
        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->PropertyDestinationId, 'text' => $tag->Name];
        }

        return \Response::json($formatted_tags);
    }

    // ########################################### نمایش لیست هتلها بر اساس جستجوی انجام شده ###############################
    public function showResults(){

        // dd($hotels);
        // dd($request->all());
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

        $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelAvailability', [
            RequestOptions::JSON => array (
                'SessionId'             => $this->SessionId,
                'CheckIn' =>'2019-12-01T00:00:00',
                'CheckOut'=>'2019-12-05T00:00:00',
                'Latitude'=>"",
                'Longitude'=>"",
                'RadiusInKilometer'=>0,
                'SetGeoLocation'=>false,
                'NationalityId'=>"IR",
                'HotelId'=>'',
                'CityId'=>302,
                'Occupancies'=>$Occupancies,
            )
        ]);

        // dd($response->getBody()->getContents());
        $hotels =  json_decode($response->getBody()->getContents())->PricedItineraries;

        // $hotels = (json_decode(file_get_contents("./Hotel.json", "r"))->PricedItineraries);
        $newHotels=[];
        foreach ($hotels as $hotel) {
            // $hotel->name='Motel';
            // $hotel=$this->getHotel($hotel->HotelId);
            if(!is_null($this->getHotel($hotel->HotelId))){
                $getHotel = $this->getHotel($hotel->HotelId);
                $hotel->Name = $getHotel->Name;
                $hotel->ReviewScore = $getHotel->ReviewScore;
                $hotel->Rating = $getHotel->Rating;
                $hotel->Address = $getHotel->Address;
                $hotel->Latitude = $getHotel->Latitude;
                $hotel->Longitude = $getHotel->Longitude;
                // $hotel->image = 'https://hotelimage.partocrs.com/'.$hotel->HotelId.'/main.jpg';
                array_push($newHotels,$hotel);
            }
            // $hotel->name="test";
            // dd($hotel->name);
        }
        // dd($newHotels);
        return $newHotels;
    }



    // ########################################## گرفتن نام هتل ها ##########################################################
    public function getHotel($id,$total=false){
        // dd(Hotel::where(['id'=>$id])->first()->name);
        // return Hotel::select('Name','ReviewScore','Rating','Address','latitude','Longitude')->where('id',$id)->get();
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
    public function show($HotelId=3){

        $hotel = (json_decode(file_get_contents("./HotelDetail.json", "r"))->PricedItineraries);
        // dd($hotel[0]->Rooms);
        $hotel=$hotel[0];

        $getHotel = $this->getHotel($hotel->HotelId,true);

            if(!is_null($getHotel)){
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
                // $hotel->Rooms           = $hotel->Rooms;
                $hotel->Images          = $this->getHotelImages($hotel->HotelId);
            }

            // dd($hotel->Rooms);
   
            // dd($this->getHotelImages($hotel->HotelId));
            // dd($hotel);
        return view('pages/hotels/detail',compact('hotel'));
    }

    // ########################################## گرفتن تصویر ابتدایی هر هتل در لیست هتلها #################################

    // ########################################## دریافت اتاقهای یک هتل ##########################################
    public function getRooms($hotelId=152){
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
        $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelAvailability', [
            RequestOptions::JSON => array (
                'SessionId'             => $this->SessionId,
                'CheckIn' =>'2019-12-01T00:00:00',
                'CheckOut'=>'2019-12-02T00:00:00',
                'Latitude'=>"",
                'Longitude'=>"",
                'RadiusInKilometer'=>0,
                'SetGeoLocation'=>false,
                'NationalityId'=>"US",
                'HotelId'=>'727',
                'Occupancies'=>$Occupancies,
            )
        ]);
        dd(json_encode(array (
            'SessionId'             =>'8ad7b35f-3605-ea11-b732-00155dbd6c0c',
            'CheckIn' =>'2019-12-01T00:00:00',
            'CheckOut'=>'2019-12-02T00:00:00',
            'NationalityId'=>"US",
            'HotelId'=>'727',
            'Occupancies'=>$Occupancies,
        )));
        dd($response->getBody()->getContents());
        $hotels =  json_decode($response->getBody()->getContents())->PricedItineraries;



        
    }//getRooms



}//class
