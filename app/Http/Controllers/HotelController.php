<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\TravelBaseController;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;

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
        return $hotels;
    }


    // ########################################## گرفتن تصویر ابتدایی هر هتل در لیست هتلها #################################
}
