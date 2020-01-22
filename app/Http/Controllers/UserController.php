<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // ################ اطلاعات پروفایل کاربر ########################
    public function profile()
    {
        $currentUser = User::findOrFail(Auth()->user()->id);
        return view('users.profile',compact('currentUser'));
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
        $currentUser = User::findOrFail(Auth()->user()->id);
        $points = \DB::table('user_points')->where('user_id',Auth()->user()->id)->get();
        return view('users.points',compact(['currentUser','points']));
    }
    // ################ ویرایش پروفایل  کاربر ########################
    public function porfileEdit()
    {
        $currentUser = User::findOrFail(Auth()->user()->id);
        return view('users.editProfile',compact('currentUser'));
    }

    //############### ذخیره تغییرات پروفایل ###########################
    public function update(Request $request){

        $validatedData = $request->validate([
            'name'          => 'max:255',
            'email'         => 'required|max:255',
            'phone'         => 'required|max:255',
            'tel'           => 'max:255',
            'gender'        => 'required|max:1',
            'code_meli'     => 'required|max:12',
            'birthDate'     => 'required|max:15',
            'bank_card'     => 'max:255',
            'bank_account'  => 'max:255',
            'bank_shaba'    => 'max:255',
        ]);

        User::where('id', Auth()->user()->id)
            ->update([
                'name'          => $request->input('name'),
                'email'         => $request->input('email'),
                'phone'         => $request->input('phone'),
                'tel'           => $request->input('tel'),
                'gender'        => $request->input('gender'),
                'code_meli'     => $request->input('code_meli'),
                'birthDate'     => $request->input('birthDate'),
                'bank_card'     => $request->input('bank_card'),
                'bank_account'  => $request->input('bank_account'),
                'bank_shaba'    => $request->input('bank_shaba')
                ]

            );

        return Redirect::back()->with('success','اطلاعات با موفقیت بروز رسانی شد.');
    }//update
  
}
