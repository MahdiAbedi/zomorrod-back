<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{

    //################################# صفحه لندیگ تور ###########################################################
    public function index()
    {
        //لیست تمام دسته بندی های تور رو میگریم و تو قیمت تورت رو با چشم بسته انتخاب کن نمایش میدیم
        $tourCategories = DB::table('tour_categories')->get();
       
        //جدیدترین تورها
        $newTours       = Tour::where('is_active',1)->take(8)->latest('updated_at')->get();
        
        // dd($newTours);
        return view('pages/tours/landing',compact(['tourCategories','newTours']));
    }//index
    //##################### صفحه نمایش هر تور ####################################################################
    public function show($slug)
    {
        $tour                   =    Tour::where('alias',$slug)->first();
        $tourCategories_list    =    DB::table('tour_category_relationships')->select('category_id')->where('tour_id',$tour->id)->pluck('category_id');
        $tourCategories         =    DB::table('tour_categories')->whereIn('id',$tourCategories_list)->get();
        // $tourCategory = DB::table('tour_categories')->select('name','alias')->where('id',$tour->category_id)->first();

        return view('pages/tours/detail',compact(['tour','tourCategories']));
    }//show

    //########################## SPECIAL LANDING PAGE FOR EVERY TOUR CATEGORY #####################################
    public function tourCategory($alias){
        $tourCategory   =    DB::table('tour_categories')->where('alias',$alias)->first();   //گرفتن اطلاعات دسته بندی تور

        #اول از همه لیست آی دی همه تورهای این مجموعه رو از جدول میگیریم
        $tour_ids_list  =    DB::table('tour_category_relationships')->select('tour_id')->where('category_id',$tourCategory->id)->pluck('tour_id');
        
        #حالا میایم و تمام تورها یی که آی دیشون رو داریم رو برمیگردونیم
        $tours          =    DB::table('tours')->whereIn('id', $tour_ids_list)->where('is_active',1)->get();
        
        // $tours = DB::table('tours')->where(['category_id'=>$tourCategory->id,'is_active'=>1])->get();     //گرفتن تورهای این دسته بندی
        $randomTours    =    DB::table('tours')->select(['title','alias','id','duration','thumbnail'])->where('is_active',1)->get()->random(3);
        
        // dd($randomTours);
        return view('pages/tours/tourCategoryLanding',compact(['tourCategory','tours','randomTours']));
    }//tourCategory


    //######### گرفتن نام تورها برای نمایش در پنل جستجو تور ###############
    public function getToursName(){
        return DB::table('tour_categories')->select(['name','alias'])->get();
    }//getToursName
}
