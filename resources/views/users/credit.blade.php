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
                           class=""><i class="icon icon-user-account"></i>
                            <h2>حساب کاربری</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/points"
                            class=""><i class="icon icon-star"></i>
                            <h2>امتیازها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/orders"
                            class=""><i class="icon icon-orders"></i>
                            <h2>سفارشات و استردادها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/transactions"
                            class=""><i class="icon icon-transactions"></i>
                            <h2>تراکنش‌ها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/passengers"
                            class=""><i class="icon icon-passenger-list"></i>
                            <h2>لیست مسافران</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/credit" 
                            class="nuxt-link-exact-active nuxt-link-active"><i class="icon icon-charge"></i>
                            <h2>افزایش اعتبار</h2>
                        </a></li>
                </ul>
                <h2 class="profile-navigation__title">
                    اطلاعات حساب کاربری
                </h2>
            </nav>
            <div class="balance">
                <div class="box">
                    <div class="row">
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <h3 class="box__title"><i class="icon icon-charge"></i>
                                اعتبار خود را در ستاره زمرد شارژ کنید
                            </h3>
                            <p class="text-justify text-muted">
                                با شارژ موجودی حساب خود می‌توانید با سرعت و سهولت بیشتری خرید کنید.
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-7 col-lg-6">
                            <dl class="clearfix">
                                <dt>مبلغ شارژ فعلی:</dt>
                                <dd><strong>0</strong> ریال
                                </dd>
                            </dl>
                            <form class="validated-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group has-error"><label for="charge-amount">مبلغ افزایش شارژ را
                                                وارد کنید(ریال)</label> <input type="text" id="charge-amount" value=""
                                                class="form-control"> <span class="help-block">مبلغ شارژ الزامی
                                                است.</span></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6"><button class="btn btn-block btn-primary">
                                            پرداخت
                                            <span class="dots" style="display:none;">...</span></button></div>
                                </div>
                            </form>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

@endsection
