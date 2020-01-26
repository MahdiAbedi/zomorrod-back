<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    //ذخیره ایمیل کاربر در دیتابیس
    public function save(Request $request)
    {
        \DB::table('newsletters')->insert([
            'email'         =>   $request->input('email'),
            'created_at'    =>   $request->input('date'),
        ]);
    }
}
