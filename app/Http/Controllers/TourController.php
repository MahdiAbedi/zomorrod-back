<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //لیست تمام دسته بندی های تور رو میگریم و تو قیمت تورت رو با چشم بسته انتخاب کن نمایش میدیم
        $tourCategories = DB::table('tour_categories')->get();
        //جدیدترین تورها
        $newTours = Tour::where('is_active',1)->take(8)->latest('updated_at')->get();
        // dd($newTours);
        return view('pages/tours/landing',compact(['tourCategories','newTours']));
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
    public function show($slug)
    {
        $tour = Tour::where('alias',$slug)->first();
        $tourCategory = DB::table('tour_categories')->select('name','alias')->where('id',$tour->category_id)->first();
        // dd($tour->schedule);
        // dd(json_decode($tour->schedule));
        // dd($tour->title);
        // echo('show tour detail');
        return view('pages/tours/detail',compact(['tour','tourCategory']));
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

    //############### SPECIAL LANDING PAGE FOR EVERY TOUR CATEGORY ######################
    public function tourCategory($alias){
        $tourCategory = DB::table('tour_categories')->where('alias',$alias)->first();   //گرفتن اطلاعات دسته بندی تور
        // dd($tourCategory);
        $tours = DB::table('tours')->where(['category_id'=>$tourCategory->id,'is_active'=>1])->get();     //گرفتن تورهای این دسته بندی
        $randomTours = DB::table('tours')->select(['title','alias','id','duration','thumbnail'])->where('is_active',1)->get()->random(3);
        // dd($randomTours);
        return view('pages/tours/tourCategoryLanding',compact(['tourCategory','tours','randomTours']));
    }


    //######### گرفتن نام تورها برای نمایش در پنل جستجو تور ###############
    public function getToursName(){
        return DB::table('tour_categories')->select(['name','alias'])->get();
    }
}
