<?php

namespace App\Http\Controllers;

use App\CityHotel;
use Illuminate\Http\Request;

class HotelController extends Controller
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
        $tags = CityHotel::Where('Name','like',$term .'%')->limit(5)->get();

        // return $tags;
        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->PropertyDestinationId, 'text' => $tag->Name];
        }

        return \Response::json($formatted_tags);
    }
}
