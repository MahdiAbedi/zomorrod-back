<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function find(Request $request)
    {

        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        // $tags = Airport::whereRaw('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        // $tags = Airport::where('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        $tags = Airport::where('iata',$term)->orWhere('city','like',$term .'%')->limit(5)->get();


        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->iata, 'text' => $tag->city .'-' .$tag->name];
        }

        return \Response::json($formatted_tags);
    }
}