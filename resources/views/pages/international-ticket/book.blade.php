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
          
                <div id="PassengerInfo">
                
                
                </div>
                
            


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
