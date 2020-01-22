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
                    <form action="/profile/update" method="post">
                    @csrf()
                        <table class="table table-striped account__info">
                            <tbody>

                                <tr>
                                    <th>نام و نام خانوادگی:</th>
                                    <td><input type="text" name="name" value="{{$currentUser->name}}" class="form-control"></td>
                                    

                                </tr>
                                <tr>
                                    <th>ایمیل:</th>
                                    <td><input type="text"  name="email" value="{{$currentUser->email}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>شماره همراه:</th>
                                    <td><input type="text" name="phone"  value="{{$currentUser->phone}}" class="form-control"></td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>شماره تلفن:</th>
                                    <td><input type="text" name="tel"  value="{{$currentUser->tel}}" class="form-control"></td>

                                </tr>
                                <tr>
                                    <th>جنسیت:</th>
                                    <td>
                                        <select name="gender" class="form-control">
                                            <option value="1"{{$currentUser->gender ? 'selected' :''}}>آقا</option>
                                            <option value="0" {{$currentUser->gender ? '' :'selected'}}>خانم</option>
                                        </select>
                                    </td>
                                    
                                    <!-- <td>{{$currentUser->gender ? 'مرد' :'زن'}}</td> -->
                                </tr>
                                <tr>
                                    <th>کد ملی:</th>
                                    <td><input type="text"  name="code_meli" value="{{$currentUser->code_meli}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>تاریخ تولد:</th>
                                    <td><input type="text"  name="birthDate" value="{{$currentUser->birthDate}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>شماره کارت:</th>
                                    <td><input type="text"  name="bank_card" value="{{$currentUser->bank_card}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>شماره حساب:</th>
                                    <td><input type="text"  name="bank_account" value="{{$currentUser->bank_account}}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>شماره شبا:</th>
                                    <td><input type="text"  name="bank_shaba" value="{{$currentUser->bank_shaba}}" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <div class="row ltr" style="display:flex">
                            <div class="col-xs-12 col-sm-3 col-md-4">
                                <button type="submit" class="btn btn-green">
                                    ذخیره تغییرات
                                </button>
                            </div>
                           
                        </div>
                    </div>
                    </form>
                    @include('users.rewardsInfo')
                </div>
            </div>
        </div>
    </main>

</body>

@endsection
