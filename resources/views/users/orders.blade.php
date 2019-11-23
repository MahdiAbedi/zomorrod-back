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
                    <li class="profile-navigation__item"><a href="/orders"
                            class="nuxt-link-exact-active nuxt-link-active"><i class="icon icon-orders"></i>
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
            <div class="orders pb-4">
                <div class="search-box orders-refunds mb-3">
                    <div class="tab-content">
                        <div role="tabpanel" id="quick-search" class="active">
                            <h3 class="search-box__title"><i class="icon icon-search"></i>
                                جستجو سفارش
                            </h3>
                            <p class="notice"><i class="icon icon-info"></i>
                                برای جستجو در لیست سفارشات و استردادهای حساب خود پر کردن حداقل یک فیلد کافیست.
                            </p>
                            <form action="#" novalidate="novalidate" class="search-box__form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="form-group"><label for="orders-quick-order-no">شماره سفارش</label>
                                            <input type="text" id="orders-quick-order-no" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3"><label
                                            for="orders-quick-date-from">تاریخ</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group"><input type="text" id="orders-quick-date-from"
                                                        placeholder="از" value=""
                                                        class="form-control date persian persian" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group"><input type="text" id="orders-quick-date-to"
                                                        placeholder="تا" value=""
                                                        class="form-control date persian persian" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3"></div>
                                    <div class="col-xs-12 col-sm-6 col-md-3 btn-of-search-box"><button
                                            class="btn btn-primary btn-block">
                                            جستجو
                                            <span class="dots" style="display: none;">...</span></button></div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" id="exact-search" class="tab-pane">
                            <p class="notice"><i class="icon icon-info"></i>
                                برای جستجو در لیست تراکنش‌های حساب خود پر کردن حداقل یک فیلد کافیست.
                            </p>
                            <form action="#" novalidate="novalidate" class="search-box__form">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="form-group"><label for="orders-exact-order-no">شماره سفارش</label>
                                            <input type="text" id="orders-exact-order-no" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3">
                                        <div class="form-group"><label for="orders-exact-reserve-no">شماره رزرو</label>
                                            <input type="text" id="orders-exact-reserve-no" value=""
                                                class="form-control"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="form-group"><label for="orders-exact-passenger-name">نام
                                                مسافر</label> <input type="text" id="orders-exact-passenger-name"
                                                value="" class="form-control"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3"><label
                                            for="orders-exact-date-from">تاریخ</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group"><input type="text" id="orders-exact-date-from"
                                                        placeholder="از" value="" class="form-control date"></div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group"><input type="text" id="orders-exact-date-to"
                                                        placeholder="تا" value="" class="form-control date"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="exact-fields col-xs-12">
                                        <div class="col-xs-12 col-sm-6 col-md-3 hidden-md hidden-lg">
                                            <div class="form-group"><label for="orders-exact-order-type">نوع
                                                    سفارش</label> <select id="orders-exact-order-type"
                                                    class="form-control">
                                                    <option value="all" selected="selected">
                                                        همه
                                                    </option>
                                                    <option value="domestic">
                                                        پرواز داخلی
                                                    </option>
                                                    <option value="international">
                                                        پرواز خارجی
                                                    </option>
                                                    <option value="train">
                                                        قطار
                                                    </option>
                                                    <option value="tour">
                                                        تور
                                                    </option>
                                                    <option value="hotel">
                                                        هتل
                                                    </option>
                                                </select></div>
                                        </div>
                                        <div class="col-xs-12 hidden-xs hidden-sm"><input type="radio" name="order-type"
                                                id="order-type-all" value="all" checked="checked" class="radifier">
                                            <label for="order-type-all" class="radifier-label">همه</label> <input
                                                type="radio" name="order-type" id="order-type-domestic" value="domestic"
                                                class="radifier"> <label for="order-type-domestic"
                                                class="radifier-label">پرواز داخلی</label> <input type="radio"
                                                name="order-type" id="order-type-international" value="international"
                                                class="radifier"> <label for="order-type-international"
                                                class="radifier-label">پرواز خارجی</label> <input type="radio"
                                                name="order-type" id="order-type-train" value="train" class="radifier">
                                            <label for="order-type-train" class="radifier-label">قطار</label> <input
                                                type="radio" name="order-type" id="order-type-tour" value="tour"
                                                class="radifier"> <label for="order-type-tour"
                                                class="radifier-label">تور</label> <input type="radio" name="order-type"
                                                id="order-type-hotel" value="hotel" class="radifier"> <label
                                                for="order-type-hotel" class="radifier-label">هتل</label></div>
                                        <!---->
                                        <div class="col-xs-12 col-sm-6 col-md-3"><button
                                                class="btn btn-primary btn-block">
                                                جستجو
                                                <span class="dots" style="display: none;">...</span></button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div role="alert" class="alert-style-box alert alert-info">
                    متاسفانه سفارشی برای شما تا به حال ثبت نگردیده است
                </div>
                <div>
                    <!---->
                    <div class="orders-container"></div>
                </div>
                <div class="text-center">
                    <!---->
                </div>
                <nav class="text-center" style="display:none;">
                    <ul class="pagination">
                        <li class="prev disabled"><span aria-label="Previous" aria-hidden="true">« صفحه قبلی</span></li>
                        <li class="next disabled"><span aria-label="Next" aria-hidden="true">صفحه بعد »</span></li>
                    </ul>
                </nav>
                <!---->
            </div>
        </div>
    </main>

</body>

@endsection
