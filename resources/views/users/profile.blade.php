@extends('master')

@section('style')
<link rel="stylesheet" href="/css/profile/account-style.css">
@endsection
@section('body')

<body>
    <main id="profile-app" class="bg-gray main-wrapper">
        <div class="container">
            <nav class="profile-navigation">
                <ul class="clearfix">
                    <li class="profile-navigation__item"><a href="/profile"
                            class="nuxt-link-exact-active nuxt-link-active"><i class="icon icon-user-account"></i>
                            <h2>حساب کاربری</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/points" class=""><i class="icon icon-star"></i>
                            <h2>امتیازها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/orders" class=""><i class="icon icon-orders"></i>
                            <h2>سفارشات و استردادها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/transactions" class=""><i
                                class="icon icon-transactions"></i>
                            <h2>تراکنش‌ها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/passengers" class=""><i
                                class="icon icon-passenger-list"></i>
                            <h2>لیست مسافران</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/credit" class=""><i class="icon icon-charge"></i>
                            <h2>افزایش اعتبار</h2>
                        </a></li>
                </ul>
                <h2 class="profile-navigation__title">
                    اطلاعات حساب کاربری
                </h2>
            </nav>
            <div class="account">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="box m-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-10">
                                    <dl class="account__balance clearfix">
                                        <dt class="account__balance-title">
                                            موجودی حساب:
                                        </dt>
                                        <dd class="account__balance-amount"><strong>0</strong> ریال
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2"><a href="/profile/balance"
                                        class="btn btn-block btn-primary btn-outline">
                                        افزایش اعتبار
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row t-p">
                    <div class="box info account-adjust-box">
                        <table class="table table-striped account__info">
                            <tbody>

                                <tr>
                                    <th>نام و نام خانوادگی:</th>
                                    <td>{{$currentUser->name}}</td>

                                </tr>
                                <tr>
                                    <th>ایمیل:</th>
                                    <td>{{$currentUser->email}}</td>
                                </tr>
                                <tr>
                                    <th>شماره همراه:</th>

                                    <td>{{$currentUser->phone}}</td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>شماره تلفن:</th>
                                    <td>{{$currentUser->tel}}</td>

                                </tr>
                                <tr>
                                    <th>جنسیت:</th>
                                    <td>{{$currentUser->gender ? 'مرد' :'زن'}}</td>
                                </tr>
                                <tr>
                                    <th>کد ملی:</th>
                                    <td>{{$currentUser->code_meli}}</td>
                                </tr>
                                <tr>
                                    <th>تاریخ تولد:</th>
                                    <td name="date">{{$currentUser->birthDate}}</td>
                                </tr>
                                <tr>
                                    <th>شماره کارت:</th>
                                    <td>{{$currentUser->bank_card}}</td>
                                </tr>
                                <tr>
                                    <th>شماره حساب:</th>
                                    <td>{{$currentUser->bank_account}}</td>
                                </tr>
                                <tr>
                                    <th>شماره شبا:</th>
                                    <td>{{$currentUser->bank_shaba}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row ltr" style="display:flex">
                            <div class="col-xs-12 col-sm-3 col-md-4"><a href="/profile/edit" id="edit-profile-action"
                                    class="btn btn-green">
                                    ویرایش پروفایل
                                </a></div>
                            <div class="col-xs-12 col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-0"><button
                                    id="edit-password-action" class="btn btn-block btn-primary btn-outline">
                                    تغییر کلمه عبور
                                </button></div>
                            <div class="col-xs-12 col-sm-3 col-md-4"><button id="signout-profile-action"
                                    class="btn btn-block btn-danger btn-outline">
                                    خروج از حساب کاربری
                                </button></div>
                        </div>
                    </div>
                    @include('users.rewardsInfo')
                </div>
            </div>
        </div>
    </main>

</body>

@endsection
