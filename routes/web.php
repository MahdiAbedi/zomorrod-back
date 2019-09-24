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
    return view('pages/international');
});
Route::post('/checkTicket','TicketController@checkTicket' );
Route::post('/checkTicket1',function(){
    return ;
} );



//################################## بلیط سفر داخلی ########################################
Route::get('/flights', function () {
    return view('pages/flights');
});
Route::post('/flights', function () {
    
    return view('pages/flights');
});



//################################## فرودگاه های بین اللملی ########################################

Route::get('/airports','AirportController@find');