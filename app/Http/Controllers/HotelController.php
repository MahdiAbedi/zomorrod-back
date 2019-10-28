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

        // $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelAvailability', [
        //     RequestOptions::JSON => array (
        //         'SessionId'             => $this->SessionId,
        //         'CheckIn' =>'2019-11-01T00:00:00',
        //         'CheckOut'=>'2019-11-05T00:00:00',
        //         'Latitude'=>"",
        //         'Longitude'=>"",
        //         'RadiusInKilometer'=>0,
        //         'SetGeoLocation'=>false,
        //         'NationalityId'=>"IR",
        //         'HotelId'=>'',
        //         'CityId'=>302,
        //         'Occupancies'=>$Occupancies,
        //     )
        // ]);

        // dd($response->getBody()->getContents());
        // $hotels =  json_decode($response->getBody()->getContents());

        $hotels = (json_decode(file_get_contents("./Hotel.json", "r"))->PricedItineraries);
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
                $hotel->image = 'https://hotelimage.partocrs.com/'.$hotel->HotelId.'/main.jpg';
                array_push($newHotels,$hotel);
            }
            // $hotel->name="test";
            // dd($hotel->name);
        }
        // dd($newHotels);
        return $newHotels;
    }



    // ########################################## گرفتن نام هتل ها ##########################################################
    public function getHotel($id){
        // dd(Hotel::where(['id'=>$id])->first()->name);
        // return Hotel::select('Name','ReviewScore','Rating','Address','latitude','Longitude')->where('id',$id)->get();
        return Hotel::select('Name','ReviewScore','Rating','Address','Latitude','Longitude')->find($id);
    }

    // ########################################## دریافت عکس پیشفرض هتلها ###################################################
    public function getHotelImage($hotelId){
            $client = new Client();
            $response = $client->post('https://apidemo.partocrs.com/Rest/Hotel/HotelImage', [
            RequestOptions::JSON => array (
                'SessionId' =>   Session('SessionId'),
                'HotelId'   =>   $hotelId
            )
        ]);

        dd($response->getBody()->getContents());
    }
    // ########################################## گرفتن تصویر ابتدایی هر هتل در لیست هتلها #################################
}
