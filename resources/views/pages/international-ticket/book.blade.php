@extends('master')

@section('body')

<main>
        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="order-steps container">
            <ul class="flex-between travelers-info">
                <li>
                    <span>جستجو</span>
                    <!-- <i class="fa fa-check circle"></i> -->
                    <i class="far fa-check-circle circle"></i>
                </li>
                <li>
                    <span>انتخاب پرواز</span>
                    <i class="far fa-check-circle circle green"></i>
                </li>
                <li>
                    <span>اطلاعات مسافران</span>
                    <i class="fa fa-plane choose-plane green"></i>

                </li>
                <li>
                    <span>تائید اطلاعات</span>
                    <i class="circle"></i>
                </li>
                <li>
                    <span>پرداخت</span>
                    <i class="circle"></i>
                </li>
                <li>
                    <span>صدور بلیط</span>
                    <i class="circle"></i>
                </li>
            </ul>
        </div>

        <div class="container">
            <!-- بخش نمایش بلیط رفت انتخاب شده و انتظار برای انتخاب بلیط برگشت -->
            <div class="ticket-preview">
                <div class="went-ticket">
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="/img/airlines-logo/aseman.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <i class="fa fa-plane rotate-right green"></i>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zgreen">انتخاب بلیط</button>
                                    </div>
                                </div>

                                <section class="inner-flight-detail ticket-detail">
                                    <!-- جزییات پرواز داخلی -->
                                    <div class="flight-detail">
                                        <div class="row">
                                            <span>پرواز از ترمینال شماره:</span>
                                            <span>4</span>
                                        </div>
                                        <div class="row">
                                            <span>شماره پرواز:</span>
                                            <span>EP3796</span>
                                        </div>
                                        <div class="row">
                                            <span>مقدار بار مجاز:</span>
                                            <span>20 کیلوگرم</span>
                                        </div>
                                        <div class="row">
                                            <span>طول پرواز:</span>
                                            <span>1:23</span>
                                        </div>
                                    </div>

                                    <!-- قیمت هر بلیط -->
                                    <table class="ticket-price">
                                        <tbody><tr>
                                            <td>1 نفر بزرگسال</td>
                                            <td>7/200/000 ریال</td>
                                        </tr>
                                        <tr>
                                            <td>1 نفر کودک</td>
                                            <td>5/200/000 ریال</td>
                                        </tr>
                                        <tr>
                                            <td>1 نفر نوزاد</td>
                                            <td>785/000 ریال</td>
                                        </tr>
                                        <tr class="green">
                                            <td>جمع مبلغ</td>
                                            <td>13/200/000 ریال</td>
                                        </tr>
                                    </tbody></table>

                                </section>

                            </div>
                        </section>



                    </div>
                </div>

                <div class="back-ticket">
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="/img/airlines-logo/kaspian.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <i class="fa fa-plane rotate-right green"></i>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zgreen">انتخاب بلیط</button>
                                    </div>
                                </div>

                                <section class="inner-flight-detail ticket-detail">
                                    <!-- جزییات پرواز داخلی -->
                                    <div class="flight-detail">
                                        <div class="row">
                                            <span>پرواز از ترمینال شماره:</span>
                                            <span>4</span>
                                        </div>
                                        <div class="row">
                                            <span>شماره پرواز:</span>
                                            <span>EP3796</span>
                                        </div>
                                        <div class="row">
                                            <span>مقدار بار مجاز:</span>
                                            <span>20 کیلوگرم</span>
                                        </div>
                                        <div class="row">
                                            <span>طول پرواز:</span>
                                            <span>1:23</span>
                                        </div>
                                    </div>

                                    <!-- قیمت هر بلیط -->
                                    <table class="ticket-price">
                                        <tbody><tr>
                                            <td>1 نفر بزرگسال</td>
                                            <td>7/200/000 ریال</td>
                                        </tr>
                                        <tr>
                                            <td>1 نفر کودک</td>
                                            <td>5/200/000 ریال</td>
                                        </tr>
                                        <tr>
                                            <td>1 نفر نوزاد</td>
                                            <td>785/000 ریال</td>
                                        </tr>
                                        <tr class="green">
                                            <td>جمع مبلغ</td>
                                            <td>13/200/000 ریال</td>
                                        </tr>
                                    </tbody></table>

                                </section>

                            </div>
                        </section>



                    </div>
                </div>
            </div>
            <!-- قسمتی که دکمه های اضافه کردن اطلاعات مسافران هست -->
            <section class="btn-container">
                <a href="#" class="info btn btn-green"><i class="fas fa-chevron-circle-left"></i> لطفا اطلاعات مسافران
                    را وارد نمایید.</a>

                <div class="add-btn">
                    <a href="#" class="title"><span>1</span>بزرگسال</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
                <div class="add-btn">
                    <a href="#" class="title"><span>0</span>کودک</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
                <div class="add-btn">
                    <a href="#" class="title"><span>0</span>نوزاد</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
            </section>

            <!-- تب اطلاعات مسافران -->

            <!-- خرید با کد ملی -->
            <section class="tabs">
                <div class="tabs-title">
                    <div class="tab-title">
                        <i class="green fas fa-times-circle"></i>
                        <label for="check1">بزرگسال</label>
                    </div>
                    <div class="tab-title">
                        <input type="checkbox" name="check1" id="check1" checked="">
                        <label for="check1">خرید با کد ملی</label>
                    </div>
                    <div class="tab-title">
                        <input type="checkbox" name="check1" id="check2">
                        <label for="check2">خرید با پاسپورت</label>
                    </div>

                </div>

                <div class="tab-desctiption">
                    <div class="fields">
                        <div class="field">
                            <label for="">نام(فارسی)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">نام خانوادگی(فارسی)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">نام(لاتین)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">نام خانوادگی(لاتین)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">کد ملی</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">جنسیت</label>
                            <select name="gender" id="gender1">
                                <option value="man">آقا</option>
                                <option value="woman">خانم</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="">تاریخ تولد(شمسی)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>

                    </div>
                    <div class="detail1">
                        <!-- secontd detail -->
                    </div>
                </div>
            </section>

            <!-- خرید با پاسپورت -->
            <section class="tabs">
                <div class="tabs-title">
                    <div class="tab-title">
                        <i class="green fas fa-times-circle"></i>
                        <label for="check1">کودک</label>
                    </div>
                    <div class="tab-title">
                        <input type="checkbox" name="check3" id="check3">
                        <label for="check3">خرید با کد ملی</label>
                    </div>
                    <div class="tab-title">
                        <input type="checkbox" name="check1" id="check4" checked="">
                        <label for="check4">خرید با پاسپورت</label>
                    </div>

                </div>

                <div class="tab-desctiption">
                    <div class="fields">

                        <div class="field">
                            <label for="">نام(لاتین)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">نام خانوادگی(لاتین)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">جنسیت</label>
                            <select name="gender" id="gender1">
                                <option value="man">آقا</option>
                                <option value="woman">خانم</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="">تاریخ تولد(میلادی)</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">کشور محل تولد</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">کشور صادر کننده پاسپورت</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>
                        <div class="field">
                            <label for="">تاریخ انقضای پاسپورت</label>
                            <input type="text" name="fa-name" id="fa-name">
                        </div>

                    </div>
                    <div class="detail1">
                        <!-- secontd detail -->
                    </div>
                </div>
            </section>

            <!-- اطلاعات تماس -->
            <div class="contact-info">

                <a href="#" class="info btn btn-green"><i class="fas fa-chevron-circle-left"></i>اطلاعات تماس</a>
                <input type="text" placeholder="ایمیل" name="fa-name" id="fa-name">
                <input type="text" name="fa-name" placeholder="تلفن همراه" id="fa-name">
                <div class="info">
                    <input type="checkbox" name="confirm" id="confirm">
                    <label for="confirm">
                        <a href="#">قوانین سایت</a> و <a href="#">قوانین پرواز</a> را مطالعه کرده ام و آنرا تایید میکنم.
                    </label>
                </div>
            </div>

            <div class="btn btn-zgreen continue-btn">ادامه فرآیند خرید</div>

        </div>



    </main>

@endsection
