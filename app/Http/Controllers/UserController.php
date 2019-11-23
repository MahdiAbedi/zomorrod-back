<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // ################ اطلاعات پروفایل کاربر ########################
    public function profile()
    {
        return view('users.profile');
    }

    // ################لیست سفارشات کاربر ########################
    public function orders()
    {
        return view('users.orders');
    }

    // ################ تراکنشهای بانکی کاربر ########################
    public function transactions()
    {
        return view('users.transactions');
    }

    // ################ لیست مسافرانی که کاربر وارد کرده ########################
    public function passengers()
    {
        return view('users.passengers');
    }

    // ################ میزان اعتبار کاربر ########################
    public function credit()
    {
        return view('users.credit');
    }
    // ################ امتیازات کاربر ########################
    public function points()
    {
        return view('users.points');
    }
    // ################ ویرایش پروفایل  کاربر ########################
    public function porfileEdit()
    {
        return view('users.editProfile');
    }
  
}
