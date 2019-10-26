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
//#################################### بلیط سفر خارجی ######################################
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


//################################## بلیط سفر داخلی ########################################
Route::get('/flights', function () {
    return view('pages/internal-ticket/results');
});
// Route::post('/flights', function () {
    
//     return view('pages/flights');
// });

Route::post('/checkInlineTickets','TicketController@checkInlineTickets');
//روز بلیط داخلی
Route::get('/internal/book',function(){
    return view('pages/internal-ticket/book');
});


//################################## فرودگاه های بین اللملی ########################################

Route::post('/airports','AirportController@find');
Route::get('/airports','AirportController@find');



//#################################### کاربران ######################################
Route::get('/register',function(){
    return view('users/register');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//#################################### هتل ها ###########################################
Route::get('/hotels',function(){
    return view('pages/hotels/results');
});
Route::post('/hotels','HotelController@showResults');
//ارسال ایجکس برای دریافت نام شهر برای رزو هتل
Route::get('/cityHotel','HotelController@find');

