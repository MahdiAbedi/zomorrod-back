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

Route::get('/', function () {
    return view('pages/home');
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
});
//نمایش فاکتور قبل از رزو کامل
Route::post('/international/factor','TicketController@factor');

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
});

//###################################################################################################
//################################# بوک کردن پرواز AIR BOOKING  ######################################################
//###################################################################################################
Route::post('AirBooking','TicketController@AirBooking');

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
Route::get('profile'    ,   'UserController@profile');
Route::get('orders'     ,   'UserController@orders');
Route::get('transactions',  'UserController@transactions');
Route::get('passengers' ,   'UserController@passengers');
Route::get('credit'     ,   'UserController@credit');
Route::get('points'     ,   'UserController@points');
Route::get('edit-profile',  'UserController@porfileEdit');


