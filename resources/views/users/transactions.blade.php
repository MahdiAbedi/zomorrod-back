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
                    <li class="profile-navigation__item"><a href="/profile" class=""><i
                                class="icon icon-user-account"></i>
                            <h2>حساب کاربری</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/points" class=""><i class="icon icon-star"></i>
                            <h2>امتیازها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/orders" class=""><i class="icon icon-orders"></i>
                            <h2>سفارشات و استردادها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/transactions"
                            class="nuxt-link-exact-active nuxt-link-active"><i class="icon icon-transactions"></i>
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
            <div class="transactions">
                <div class="search-box" style="">
                    <h3 class="search-box__title"><i class="icon icon-search"></i>
                        جستجو سفارش
                    </h3>
                    <p class="notice hidden-xs hidden-sm"><i class="icon icon-info"></i>
                        برای جستجو در لیست تراکنش‌های حساب خود پر کردن حداقل یک فیلد کافیست.
                    </p>
                    <form action="#" novalidate="novalidate" class="search-box__form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="form-group"><label for="transactions-order-type">نوع تراکنش</label>
                                    <div class="form-group-wrapper"><select id="transactions-order-type"
                                            class="form-control">
                                            <option value="">
                                                همه
                                            </option>
                                            <option value="IncreaseChargeByPaymentGateway">
                                                افزایش شارژ بابت واریز
                                            </option>
                                            <option value="DecreaseChargeOrCreditBySale">
                                                کاهش شارژ / اعتبار بابت خرید خدمات
                                            </option>
                                            <option value="IncreaseChargeOrCreditByRefund">
                                                افزایش شارژ / اعتبار بابت استرداد
                                            </option>
                                            <option value="IncreaseChargeOrCreditByReverse">
                                                افزایش شارژ / اعتبار بابت خرید ناموفق
                                            </option>
                                            <option value="DecreaseChargeByWithdraw">
                                                کاهش شارژ بابت پرداخت
                                            </option>
                                            <option value="IncreaseCredit">
                                                افزایش اعتبار
                                            </option>
                                            <option value="DecreaseCredit">
                                                کاهش اعتبار
                                            </option>
                                            <option value="ManualIncreaseCharge">
                                                افزایش شارژ
                                            </option>
                                            <option value="ManualDecreaseCharge">
                                                کاهش شارژ
                                            </option>
                                        </select>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3"><label for="transactions-date-from">تاریخ</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group form-group-wrapper"><input type="text"
                                                id="transactions-date-from" placeholder="از" value=""
                                                class="form-control date persian" autocomplete="off">
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group form-group-wrapper"><input type="text"
                                                id="transactions-date-to" placeholder="تا" value=""
                                                class="form-control date persian" autocomplete="off">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3"><label for="transactions-price-from">مبلغ</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group form-group-wrapper"><input type="text"
                                                id="transactions-price-from" placeholder="از" value=""
                                                class="form-control price">
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group form-group-wrapper"><input type="text"
                                                id="transactions-price-to" placeholder="تا" value=""
                                                class="form-control price">
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 btn-of-search-box"><button
                                    class="btn btn-primary btn-block">
                                    جستجو
                                    <span class="dots" style="display: none;">...</span></button></div>
                        </div>
                    </form>
                </div>
                <div data-v-8aa69a52="">
                    <div data-v-8aa69a52="" role="alert" class="alert-style-box alert alert-info">
                        متاسفانه تراکنشی برای شما تا به حال ثبت نگردیده است
                    </div>
                    <div class="grid-info desktop-and-tablet hidden-xs" data-v-8aa69a52="">
                        <div class="grid-info__item list-grid-5" data-v-8aa69a52="">
                            <!---->
                            <!---->
                        </div>
                    </div>
                </div>
                <nav class="text-center" style="display:none;">
                    <ul class="pagination">
                        <li class="prev disabled"><span aria-label="Previous" aria-hidden="true">« صفحه قبلی</span></li>
                        <li class="next disabled"><span aria-label="Next" aria-hidden="true">صفحه بعد »</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

</body>

@endsection
