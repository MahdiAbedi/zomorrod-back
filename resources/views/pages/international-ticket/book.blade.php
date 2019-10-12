@extends('master')

@section('body')
    <!-- ورود اطلاعات مسافران -->
   
    <main id="passengerInfos">

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
        <form action="/international/factor" method="POST">
        @csrf
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
            
            <div id="PassengerInfo"></div>

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

            <a class="btn btn-zgreen continue-btn" onclick="showConfirmDate()">ادامه فرآیند خرید</a>
        </div>



    </main>

        <!-- تایید اطلاعات کاربر -->
        <main id="confirmData" style="display:none">
            <!-- نمایش مراحل انتخاب و خرید -->
            <div class="order-steps container">
                <ul class="flex-between confirm-info">
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
                        <i class="far fa-check-circle circle green"></i>

                    </li>
                    <li>
                        <span>تائید اطلاعات</span>
                        <i class="fa fa-plane choose-plane"></i>
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
                <!-- اطلاعیه و هشدار بالای صفحه -->
                <div class="notices">
                    <p><i class="fas fa-chevron-circle-left green"></i>لطفا اطلاعات وارد شده را کنترل کرده و پس از اطمینان
                        از درستی آنها،برای پرداخت هزینه اقدام نمایید.</p>
                    <div class="flex-between">
                        <p><i class="fas fa-chevron-circle-left green"></i>توجه فرمایید:در صورتی که اطلاعات زیر را اشتباه
                            وارد نموده اید و یا نیاز به تغییر آن دارید،میتوانید از دکمه بازگشت استفاده کنید.</p>
                        <a onclick="hideConfirmDate()" class="btn btn-zgreen">بازگشت</a>
                    </div>
                </div>

                <!-- پنل -->
                <!-- اطلاعات بلیط -->
                <div class="panel">
                    <div class="title">اطلاعات بلیط</div>
                    <div class="body  ticket-info-confirm">


                        <div class="half">
                            <h3 class="green"><span>&#11044 </span>بلیط رفت</h3>

                            <table>
                                <thead>
                                    <tr>
                                        <th>شرکت هواپیمایی</th>
                                        <th>قشم ایر</th>

                                    </tr>
                                </thead>
                                <tr>
                                    <td>مبدا</td>
                                    <td>تهران</td>

                                </tr>
                                <tr>
                                    <td>مقصد</td>
                                    <td>اصفهان</td>
                                </tr>
                                <tr>
                                    <td>تاریخ و ساعت پرواز</td>
                                    <td>سه شنبه 22 مرداد-06:10</td>
                                </tr>
                                <tr>
                                    <td>شماره پرواز</td>
                                    <td>QB 1280</td>
                                </tr>
                                <tr>
                                    <td>کلاس پروازی</td>
                                    <td>اکونومی</td>
                                </tr>
                                <tr>
                                    <td>مقدار بار مجاز</td>
                                    <td>20 کیلو گرم</td>
                                </tr>
                            </table>
                        </div>
                        <div class="half">
                            <h3 class="green"><span>&#11044 </span>بلیط برگشت</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>شرکت هواپیمایی</th>
                                        <th>قشم ایر</th>

                                    </tr>
                                </thead>
                                <tr>
                                    <td>مبدا</td>
                                    <td>تهران</td>

                                </tr>
                                <tr>
                                    <td>مقصد</td>
                                    <td>اصفهان</td>
                                </tr>
                                <tr>
                                    <td>تاریخ و ساعت پرواز</td>
                                    <td>سه شنبه 22 مرداد-06:10</td>
                                </tr>
                                <tr>
                                    <td>شماره پرواز</td>
                                    <td>QB 1280</td>
                                </tr>
                                <tr>
                                    <td>کلاس پروازی</td>
                                    <td>اکونومی</td>
                                </tr>
                                <tr>
                                    <td>مقدار بار مجاز</td>
                                    <td>20 کیلو گرم</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>

                <!-- درخواست دهنده -->
                <div class="panel">
                    <div class="title">درخواست دهنده</div>
                    <div class="body">

                        <table class="gray-title">
                            <thead>
                                <tr>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>شماره موبایل</th>
                                    <th>موجودی حساب</th>

                                </tr>
                            </thead>
                            <tr>
                                <td>-</td>
                                <td>MahdiAbedi220@Yahoo.com</td>
                                <td>09395187902</td>
                                <td>1000000 <span>ریال</span></td>

                            </tr>

                        </table>
                    </div>
                </div>

                <!-- مشخصات مسافران -->
                <div class="panel">
                    <div class="title">مشخصات مسافران </div>
                    <div class="body">
                        
                        <div class="passenger-info">
                                <h3 class="green"><span>&#11044 </span>بزرگسال</h3>
                                <table class="gray-title">
                                        <thead>
                                            <tr>
                                                <th>نام و نام خانوادگی</th>
                                                <th>نام و نام خانوادگی (لاتین)</th>
                                                <th>جنسیت</th>
                                                <th>کد ملی</th>
                                                <th>تاریخ تولد</th>
                                                <th>قیمت</th>
                                                <th>عملیات</th>
                
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>حسین قاسمی</td>
                                            <td>hossein ghassemi</td>
                                            <td>مرد</td>
                                            <td>0016183455</td>
                                            <td>1365/1/1</td>
                                            <td>12,244,000 <span>ریال</span></td>
                                            <td>ویرایش</td>

                                        </tr>
                
                                </table>
                                <h3 class="green"><span>&#11044 </span>کودک</h3>
                                <table class="gray-title">
                                        <thead>
                                            <tr>
                                                <th>نام و نام خانوادگی</th>
                                                <th>نام و نام خانوادگی (لاتین)</th>
                                                <th>جنسیت</th>
                                                <th>کد ملی</th>
                                                <th>تاریخ تولد</th>
                                                <th>قیمت</th>
                                                <th>عملیات</th>
                
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>حسین قاسمی</td>
                                            <td>hossein ghassemi</td>
                                            <td>مرد</td>
                                            <td>0016183455</td>
                                            <td>1365/1/1</td>
                                            <td>12,244,000 <span>ریال</span></td>
                                            <td>ویرایش</td>

                                        </tr>
                
                                </table>
                        </div>
                    </div>
                </div>

                <!-- کد تخفیف -->
                <div class="panel">
                    <div class="title">کد تخفیف</div>
                    <div class="body flex-between">
                        
                        <p>لطفا جهت اعمال تخفیف روی بلیط،کد تخفیف خود را وارد کنید و دکمه <<بررسی و اعمال کد>>  برای بزنید</p>
                        <div class="flex coupon">
                            <input type="text" name="" id="coupon">
                            <a href="#" class="btn btn-zgreen">بررسی و اعمال کد</a>
                        </div>
                    </div>
                </div>


                <div class="pay">
                    <a href="#" class="btn btn-transparent">مبلغ قابل پرداخت:22,488,000 <span>ریال</span></a>
                    <button href="#" class="btn btn-zgreen" type="submit">پرداخت آنلاین</button>
                </div>

            </div>



        </main>
    </form>
<script>
function showConfirmDate(){
    document.getElementById("passengerInfos").style.display = "none";    
    document.getElementById("confirmData").style.display = "block";    
}
function hideConfirmDate(){
    document.getElementById("confirmData").style.display = "none";    
    document.getElementById("passengerInfos").style.display = "block";    
}

</script>
@endsection
