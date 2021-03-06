<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportController extends Controller
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
        $tags = Airport::where('iata',$term)->orWhere('city','like',$term .'%')->limit(5)->get();

        return $tags;
        // $formatted_tags = [];

        // foreach ($tags as $tag) {
        //     $formatted_tags[] = ['id' => $tag->iata, 'text' => $tag->city .'-' .$tag->name];
        // }

        // return \Response::json($formatted_tags);
    }


    public function find2(Request $request)
    {

        $term = trim($request->q);
        // $term = trim($request->term);

        if (empty($term)) {
            return \Response::json([]);
        }

        // $tags = Airport::whereRaw('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        // $tags = Airport::where('iata = ? OR name like "%?%"',[$term,$term])->limit(5)->get();
        $tags = Airport::where('iata',$term)->orWhere('city','like',$term .'%')->limit(5)->get();

        // return $tags;
        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->iata, 'text' => $tag->city .'-' .$tag->name];
        }

        return \Response::json($formatted_tags);
    }


    //کد یاتا را میدیم و اسم فرودگاه رو میگیریم
    public function findAirportName($iataCode){
        return Airport::select('name')->where('iata',$iataCode)->get();
    }
    //کد یاتا را میدیم و اسم فرودگاه رو میگیریم
    public function findAirlineName($iataCode){
        return DB::table('airlines')->select('name')->where('code',$iataCode)->get();
    }



}
