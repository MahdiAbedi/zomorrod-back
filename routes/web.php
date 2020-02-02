<?php

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

########################## REDIRECTS ########################################
#=========================تور سوئیس ========================================
Route::permanentRedirect('/tours/tour/سال-نو-میلادی-در-مونترو'      , '/tours/تور-سوئیس');
Route::permanentRedirect('/tours/tour/لوزان-پاریس'                  , '/tours/تور-سوئیس');
Route::permanentRedirect('/tours/tour/تور-لوگانوی-سوئیس-پاییز-98'   , '/tours/تور-سوئیس');
Route::permanentRedirect('/تور-سوئیس/tour/تور-زوریخ-تابستان-98'     , '/tours/تور-سوئیس');
Route::permanentRedirect('/تور-سوئیس'                                 , '/tours/تور-سوئیس');


#========================= تور برزیل =================================================
Route::permanentRedirect('/tours/tour/تور-برزیل'               , '/tour/تور-بزرگ-برزیل-1-فروردین');
Route::permanentRedirect('/tours/tour/تور-برزیل-آرژانتین'     , '/tour/تور-ترکیبی-آرژانتین-+-برزیل-28-اسفند');

#========================= تور سریلانکا  ======================================================
Route::permanentRedirect('/tours/tour/تور-کلمبو-کندی-ساحل'     , '/tours/تور-سریلانکا');
Route::permanentRedirect('/tours/tour/تور-کلمبو-بنتوتا-آهونگالا'     , '/tours/تور-سریلانکا');
Route::permanentRedirect('/tours/tour/تور-6-شب-ساحل-بنتوتا-آهونگالا'     , '/tours/تور-سریلانکا');

#======================== تور اندونزی =========================================================
Route::permanentRedirect('/تور-اندونزی/tour/تور-بالی-تابستان-98'     , '/tour/تور-بالی');
Route::permanentRedirect('/تور-اندونزی/tour/تور-4شب-بالی-3شب-سنگاپور'     , '/tour/تور-ترکیبی-بالی-+سنگاپور');
Route::permanentRedirect('/تور-اندونزی/tour/تور-4شب-بالی-3شب-کوالالامپور'     , '/tour/تور-ترکیبی-بالی---کوالالامپور');


Route::permanentRedirect('/tours/tour/تور-آفریقای-جنوبی-15-آذر'              , '/tours/تور-آفریقای-جنوبی');
Route::permanentRedirect('/tours/tour/تور-آفریقای-جنوبی-26-دی'               , '/tours/تور-آفریقای-جنوبی');
Route::permanentRedirect('/tours/tour/تور-آفریقای-جنوبی-16بهمن'              , '/tours/تور-آفریقای-جنوبی');
Route::permanentRedirect('/tours/tour/تور-سنگاپور-تابستان-98'                , '/tour/تور-سنگاپور-زمستان-و-نوروز-99#TourInfo');
Route::permanentRedirect('/تور-سنگاپور/tour/تور-3شب-سنگاپور-4شب-پنانگ'      , '/tour/تور-ترکیبی-سنگاپور+-پنانگ');
Route::permanentRedirect('/تور-سنگاپور/tour/تور-3شب-سنگاپور-4شب-پوکت'       , '/tour/تور-ترکیبی-سنگاپور+پوکت');
Route::permanentRedirect('/تور-سنگاپور/tour/تور-3شب-سنگاپور-4شب-ساموئی'     , '/tour/تور-ترکیبی-سنگاپور-+-ساموئی');
Route::permanentRedirect('/تور-سنگاپور/tour/تور-3شب-سنگاپور-4شب-لنکاوی'     , '/tour/تور-ترکیبی-سنگاپور+لنکاوی');
Route::permanentRedirect('/تور-چین', '/tours/تور-چین');
Route::permanentRedirect('/تور-چین/tour/تور-پکن-و-شانگهای', '/tours/تور-چین');
Route::permanentRedirect('/تور-چین/tour/نمایشگاه-پاییزه-گوانگجو-2019', '/tours/تور-چین');
Route::permanentRedirect('/تور-روسیه', '/tours/تور_روسیه');
Route::permanentRedirect('/tours/tour/تور-تفلیس-تابستان-98', '/tours/تور-تفلیس');
Route::permanentRedirect('/تور-گرجستان', '/tours/تور-گرجستان');
Route::permanentRedirect('/tours/tour/تور-قبرس-اروپایی-لارناکا', '/tours/تور-قبرس-اروپایی');
Route::permanentRedirect('/tours/tour/تور-قبرس-شمالی', '/tours/تور-قبرس-شمالی');
Route::permanentRedirect('/تور-قبرس', '/tours/تور-قبرس');
Route::permanentRedirect('/tours/tour/تور-مالزی-تابستان-98', '/tour/تور-مالزی-زمستان-و-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-مالدیو-تابستان-98', '/tour/تور_مالدیو_زمستان_و_نوروز_99');
Route::permanentRedirect('/تور-مالدیو', '/tours/تور-مالدیو');
Route::permanentRedirect('/tours/tour/3شب-هوشی-مین-4شب-موئینه', '/tour/تور-ترکیبی-هوشی-مین---موئینه');
Route::permanentRedirect('/tours/tour/3شب-هوشی-مین-4شب-ناترنگ', '/tour/تور-ترکیبی-هوشی-مین-+-ناترنگ');
Route::permanentRedirect('/tours/tour/تور-هوشی-مین-ناترنگ', '/tour/تور-ترکیبی-هوشی-مین-+-ناترنگ');
Route::permanentRedirect('/تور-ویتنام', '/tours/تور-ویتنام');
Route::permanentRedirect('/tours/tour/تور-دهلی-آگرا-جیپور-7شب', '/tour/تور-ترکیبی-دهلی+آگرا+جیپور-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-دهلی-گوا', '/tours/تور-هند');
Route::permanentRedirect('/tours/tour/تور-دهلی-آگرا-جیپور-7شب', '/tours/تور-هند');
Route::permanentRedirect('/tours/تور-هندوستان', '/tours/تور-هند');
Route::permanentRedirect('/tours/tour/تور-فیلیپین-7شب-8روز', '/tour/تور-فیلیپین-زمستان-و-نوروز-99');
Route::permanentRedirect('/تور-سریلانکا', '/tours/تور-سریلانکا');
Route::permanentRedirect('/تور-اندونزی', '/tours/تور-اندونزی');
Route::permanentRedirect('/تور-آفریقا', '/tours/تور-آفریقای-جنوبی');
Route::permanentRedirect('/تور-بلغارستان', '/tours/تور_بلغارستان');
Route::permanentRedirect('/تور-سنگاپور', '/tours/تور-سنگاپور');
Route::permanentRedirect('/تور-روسیه', '/tours/تور_روسیه');
Route::permanentRedirect('/تور-گرجستان', '/tours/تور-گرجستان');
Route::permanentRedirect('/tours/tour/تور-آفریقای-جنوبی-زیبابوه', '/tour/تور-ترکیبی-آفریقای-جنوبی+زیمبابوه-28-اسفند');
Route::permanentRedirect('/tours/tour/تور آفریقای جنوبی', '/tour/تور-بزرگ-آفریقای-جنوبی-یکم-فروردین');
Route::permanentRedirect('/tours/tour/تور-آفریقای-جنوبی', '/tour/تور-بزرگ-آفریقای-جنوبی-2-فروردین');
Route::permanentRedirect('/tours/tour/تور-آفریقای_جنوبی', '/tour/تور-لوکس-آفریقای-جنوبی-28-اسفند');
Route::permanentRedirect('/tours/تورهای-نوروز-99', '/tours/تور نوروزی99');
Route::permanentRedirect('/tours/tour/تور-6شب-و-7روز-پاریس', '/tour/تور-پاریس-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-6شب-و-7روز-لوزان-رم-ونیز', '/tour/تور-ترکیبی-لوزان+رم+ونیز-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-لوگانو-4شب-و-5روز', '/tour/تور-لوگانو-سوئیس-نوروز-99');
Route::permanentRedirect('/tours/tour/3شب-زوریخ-2شب-مونیخ–2شب-وین', '/tour/تور-ترکیبی-زوریخ+مونیخ+وین-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-3شب-لوزان-3شب-لیبسون', '/tour/تور-ترکیبی-لوزان+لیسبون-نوروز-99');
Route::permanentRedirect('/tours/tour/تور-4شب-لوگانو-2شب-میلان', '/tour/تور-ترکیبی-لوگانو+میلان-نوروز-99');
Route::permanentRedirect('/tours/tour/تورهای-اروپا-پاییز-زمستان-98', '/tours/تور_اروپا');
Route::permanentRedirect('/tours/تور-اروپا', '/tours/تور_اروپا');
Route::permanentRedirect('/tours/tour/3شب-لوزان-3شب-پاریس-2شب-وین', '/tour/تور-ترکیبی-لوزان+پاریس+وین-نوروز-99');
Route::permanentRedirect('/tours/tour/3شب-پاریس-3شب-نیس', '/tour/تور-پاریس-نیس-نوروز-99');
// Route::permanentRedirect('/ویزا/ویزای-شینگن', 'url');
// Route::permanentRedirect('/ویزا/ویزای-کانادا', 'url');
// Route::permanentRedirect('/بلیط-کانادا', 'url');
// Route::permanentRedirect('/درباره-ستاره-زمرد', 'url');
// Route::permanentRedirect('/تماس-با-ما', 'url');

################################################################################
Route::get('/', function () {
        $lastTours = DB::table('tours')->where('is_active',1)->get()->random(5);
        return view('pages/home',compact('lastTours'));
});
//###################################################################################################
//#################################### بلیط سفر خارجی ######################################
//###################################################################################################
Route::get('/international', function () {
    return view('pages/international-ticket/results');
});

//ارسال اطلاعات پرواز و گرفتن تیکتها
Route::post('/checkTicket','TicketController@checkTicket' );
//just for test
Route::post('/checkTicket1',function(){
    return ;
} );
//روز بلیط خارجی
Route::get('/international/book',function(){
    return view('pages/international-ticket/book');
})->middleware('auth');
//نمایش فاکتور قبل از رزو کامل
Route::get('/factor','TicketController@factor');

//###################################################################################################
//################################## بلیط سفر داخلی ########################################
//###################################################################################################
Route::get('/flights', function () {
    return view('pages/internal-ticket/results');
});
// Route::post('/flights', function () {
    
//     return view('pages/flights');
// });

// Route::post('/checkInlineTickets','TicketController@checkInlineTickets');
//روز بلیط داخلی
Route::get('/internal/book',function(){
    return view('pages/internal-ticket/book');
})->middleware('auth');

//###################################################################################################
//################################# بوک کردن پرواز AIR BOOKING  ######################################################
//###################################################################################################
Route::post('AirBooking','TicketController@AirBooking');
Route::post('SaveBookingDate','TicketController@SaveBookingDate');
Route::post('setFareSourceCode','TravelBaseController@setFareSourceCode');
Route::get('airRevalidate','TicketController@airRevalidate');

//###################################################################################################
//################################## فرودگاه های بین اللملی ########################################
//###################################################################################################

Route::post('/airports','AirportController@find');
Route::get('/airports','AirportController@find');
//کد یاتا رو میدیم و اسم فرودگاه رو میگریم
Route::get('/airportName/{iataCode}','AirportController@findAirportName');

// کد ایرلاین رو میدی اسمش رو به فارسی بهمون میده
Route::get('/airlineName/{iataCode}','AirportController@findAirlineName');



//###################################################################################################
//#################################### کاربران ######################################
//###################################################################################################
Route::get('/register',function(){
    return view('users/register');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//###################################################################################################
//#################################### هتل ها ###########################################
//###################################################################################################
Route::get('/hotels',function(){
    return view('pages/hotels/results');
});
Route::post('/hotels','HotelController@showResults');
Route::post('/hotels1',function(){
    return ;
});
//ارسال ایجکس برای دریافت نام شهر برای رزو هتل
Route::post('/cityHotel','HotelController@find');
// جزییات هر هتل
Route::get('/hotel/detail/{id}','HotelController@show');
// اتاق های هر هتل 
Route::post('/getRooms','HotelController@getRooms');
//ورود اطلاعات مسافران هر هتل
Route::get('/hotel/book',function(){
    return view('pages/hotels/book');
});
//HOTEL'S LANDING PAGE
Route::get('/hotel',function(){return view('pages/hotels/landing');});

//###################################################################################################
//###################################### پروفایل کاربری ######################################
//###################################################################################################
Route::get('profile'        ,   'UserController@profile');
Route::get('orders'         ,   'UserController@orders');
Route::get('transactions'   ,   'UserController@transactions');
Route::get('passengers'     ,   'UserController@passengers');
Route::get('credit'         ,   'UserController@credit');
Route::get('points'         ,   'UserController@points');
Route::get('profile/edit'   ,   'UserController@porfileEdit');
Route::post('profile/update',   'UserController@update');




//###################################################################################################
//#################################### تورها TOURS ###########################################
//###################################################################################################
Route::get('tours'    ,   'TourController@index');//لندیگ کلی کلی تور
Route::get('tours/{alias}'    ,   'TourController@tourCategory');//لندینگ هر دسته بندی تور مثلا تور برزیل
Route::get('tour/{alias}'    ,   'TourController@show');//جزییات هر تور
Route::get('getTours','TourController@getToursName');

//###################################################################################################
//#################################### درگاه بانکی ###########################################
//###################################################################################################
Route::any('/Bank_CallBack','TravelBaseController@bankCallBack');   //بازگشت باز بانک 
Route::post('/goToBank','TravelBaseController@GoToBank');          //اتصال به درگاه بانک

//###################################################################################################
//#################################### کد تخفیف ###########################################
//###################################################################################################
Route::get('/checkDiscount/{id}',function($id){
    // بررسی کد تخفیف وارد شده
     $amount= DB::table('coupons')->select('discount_amount')->where('code',$id)->first();
     
     if($amount){
         $amount=$amount->discount_amount;
     }else{$amount=0;}
     //ذخیره سازی اطلاعات میزان و کد تخفیف در سشن
     session(['discount_mount' => $amount]);
     session(['coupon_code' => $id]);

     return $amount;
});

//###################################################################################################
//#################################### عضویت در خبرنامه ###########################################
//###################################################################################################
Route::post('/newsletter','NewsLetterController@save');


