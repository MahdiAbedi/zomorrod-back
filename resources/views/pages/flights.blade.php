@include('includes/head')

<body>
    <!-- منوی بالا -->
    @include('includes/topMenu')
    <!-- مسیر هوایی -->
    <div class="top-search">
        <div class="flex container">
            <div class="flex path-name">
                <img src="img/icons/airplane-icon.png" alt="" height="25px">
                <p> بلیط هواپیما تهران به ونکوور </p>
            </div>
            <!-- فیلدهای جستجو -->
            <form action="/" method="post" class="search">
                <div class="group margin-right">
                    <input type="text" class="right-border" placeholder="مبدا">
                    <button class="round-btn"><i class="icon-transfer"><img src="img/change-way.png"
                                alt=""></i></button>
                </div>
                <div class="group">
                    <input type="text" class="left-border" placeholder="مقصد">
                </div>
                <div class="group margin-right">
                    <input type="text" class="right-border" placeholder="تاریخ رفت">
                </div>
                <div class="group">
                    <input type="text" placeholder="تاریخ برگشت">
                </div>
                <div class="group">
                    <select name="mosafer" class="left-border" id="mosafer">
                        <option value="1">1 نفر</option>
                    </select>
                </div>
                <div class="group">
                    <input type="button" class="btn btn-zgreen" value="جستجو">
                    <i class="icon-search"></i>
                </div>

            </form>

        </div>
    </div>

    <main>
        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="order-steps container">
            <ul class="flex-between">
                <li>
                    <span>جستجو</span>
                    <!-- <i class="fa fa-check circle"></i> -->
                    <i class="far fa-check-circle circle"></i>
                </li>
                <li>
                    <span>انتخاب پرواز</span>
                    <i class="fa fa-plane choose-plane"></i>
                </li>
                <li>
                    <span>اطلاعات مسافران</span>
                    <i class="circle"></i>
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

        <!-- بخش نمایش بلیط رفت انتخاب شده و انتظار برای انتخاب بلیط برگشت -->
        <div class="ticket-preview container">
            <div class="went-ticket">
                <div class="inner-ticket ticket-container">
                    <section class="single-ticket flex-between">
                        <div class="ticket_type">چارتری</div>
                        <div class="legs">
                            <!-- لگ رفت و برگشت -->
                            <!-- لگ رفت -->
                            <div class="first-leg leg flex-between">
                                <div class="logoes ">
                                    <img src="img/airlines-logo/aseman.png" alt="">
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
                                    <tr>
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
                                </table>

                            </section>

                        </div>
                    </section>

                   

                </div>
            </div>

            <div class="back-ticket empty">
                <strong>لطفا بلیط برگشت خود را انتخاب نمایید.</strong>
            </div>
        </div>
        <!-- بخش نمایش نتایج جستجو -->
        <section class="result-panel container">
            <!-- فیلترها -->
            <aside class="filters">
                <section class="flex">
                    <button class="reset">لغو فیلترها</button>
                    <p>نتایج جستجو <span>16</span></p>
                </section>

                <!-- نوع فروش -->
                <section class="panel">
                    <header class="panel-title flex-between">
                        <span>نوع فروش</span>
                        <a href="#"><i class="fas fa-chevron-down"></i></a>
                    </header>
                    <div class="panel-body">
                        <div>
                            <input type="checkbox" name="check1" id="systemi">
                            <label for="systemi">سیستمی</label>
                            <span class="checkbox-spanner selected"></span>
                        </div>
                        <div>
                            <input type="checkbox" name="check1" id="charter">
                            <label for="charter">چارتر</label>
                            <span class="checkbox-spanner"></span>
                        </div>

                    </div>

                </section>
                <!-- کلاس پروازی -->
                <section class="panel">
                    <header class="panel-title flex-between">
                        <span>کلاس پروازی</span>
                        <a href="#"><i class="fas fa-chevron-down"></i></a>
                    </header>
                    <div class="panel-body">
                        <div>
                            <input type="checkbox" name="check1" id="Economy" checked>
                            <label for="Economy">Economy</label>
                            <span class="checkbox-spanner selected"></span>
                        </div>
                        <div>
                            <input type="checkbox" name="check1" id="Bussiness">
                            <label for="Bussiness">Bussiness</label>
                            <span class="checkbox-spanner"></span>
                        </div>

                    </div>

                </section>
                <!-- شرکتهای هواپیمایی -->
                <section class="panel">
                    <header class="panel-title flex-between">
                        <span>شرکتهای هواپیمایی</span>
                        <a href="#"><i class="fas fa-chevron-down"></i></a>
                    </header>
                    <div class="panel-body">
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/pooya.png" alt="">
                                <p>pooya</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/meraj.png" alt="">
                                <p>معراج</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/mahan.png" alt="">
                                <p>ماهان</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/kish.png" alt="">
                                <p>کیش</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/kaspian.png" alt="">
                                <p>کاسپین</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/iran-air.png" alt="">
                                <p>ایران ایر</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/iran-air-tour.png" alt="">
                                <p>ایران ایرتور</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/ata.png" alt="">
                                <p>آتا</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>
                        <!-- شرکت هواپیما -->
                        <div class="airline-filter flex-between">
                            <input type="checkbox" name="check1" id="pooya">
                            <label for="pooya" class="flex">
                                <img src="img/airlines-logo/aseman.png" alt="">
                                <p>آسمان</p>
                                <p class="price"><span>200,000,000</span>تومان</p>
                            </label>
                        </div>

                    </div>

                </section>
            </aside>

            <!-- نتایج -->
            <section class="results ">
                <!-- قسمت مرتبط سازی نتایج بر اساس قیمت و.. و نمایش تاریخ -->
                <section class="sorting flex">
                    <section class="sort">
                        <ul class="flex">
                            <li><a href="#"><i class="fas fa-sort-amount-up-alt"></i>ساعت پرواز</a></li>
                            <li><a href="#"><i class="fas fa-sort-amount-up-alt"></i>ظرفیت</a></li>
                            <li><a href="#"><i class="fas fa-sort-amount-down-alt"></i>قیمت</a></li>
                            <li><a href="#"><i class="fas fa-sort-amount-down-alt"></i>ارزانترین نرخ های بلیط در بازه 7
                                    روزه</a></li>
                        </ul>
                    </section>
                    <section class="date">
                        <ul class="flex">
                            <li><a href="#"><i class="fas fa-angle-right"></i>روز قبل</a></li>
                            <li class="current-date"><a href="#">98/05/08</a></li>
                            <li><a href="#">روز بعد<i class="fas fa-angle-left"></i></a></li>
                        </ul>
                    </section>
                </section>
                <!-- بخش نمایش تیکت ها -->
                <section class="tickets">

                    <!-- یک تیکت تک -->
                    <div class="inner-ticket ticket-container best-price">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/kaspian.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>5 صندلی باقی مانده</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zorange">انتخاب بلیط</button>
                                    </div>
                                </div>

                            </div>



                        </section>

                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> نمایش جزئیات </span>
                            <span></span>
                        </div>

                    </div>
                    <!-- اطلاعیه در صفحه خرید بلیط داخلی -->
                    <p class="green bmargin">&#8592; ابتدا بلیط رفت خود را انتخاب کنید.</p>
                    <!-- تیکت با جزییات -->
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/aseman.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>5 صندلی باقی مانده</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                    </div>
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
                                    <!-- شرایط کنسلی -->
                                    <div class="cancelation-rules">
                                        <h3>شرایط کنسلی</h3>

                                        <table>
                                            <tr>
                                                <td>3 روز مانده به پرواز</td>
                                                <td>1 روز مانده به پرواز</td>
                                                <td>تا 3 ساعت مانده به پرواز</td>
                                                <td>از 3 ساعت مانده به پرواز تا زمان پرواز</td>
                                            </tr>
                                            <tr>
                                                <td>15%</td>
                                                <td>20%</td>
                                                <td>30%</td>
                                                <td>40%</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- قیمت هر بلیط -->
                                    <table class="ticket-price">
                                        <tr>
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
                                    </table>

                                </section>

                            </div>



                        </section>

                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> نمایش جزئیات </span>
                            <span></span>
                        </div>

                    </div>

                    <!-- یک تیکت تک -->
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/iran-air-tour.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>5 صندلی باقی مانده</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zgreen">انتخاب بلیط</button>
                                    </div>
                                </div>

                            </div>



                        </section>

                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> نمایش جزئیات </span>
                            <span></span>
                        </div>

                    </div>
                    <!-- یک تیکت تک -->
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/atrak.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>5 صندلی باقی مانده</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zgreen">انتخاب بلیط</button>
                                    </div>
                                </div>

                            </div>



                        </section>

                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> نمایش جزئیات </span>
                            <span></span>
                        </div>

                    </div>
                    <!-- یک تیکت تک -->
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتری</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/ata.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>5 صندلی باقی مانده</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>
                                    <div class="ticket-choose">
                                        <p class="price">4,880,000 <span>ریال</span></p>
                                        <button class="btn btn-zgreen">انتخاب بلیط</button>
                                    </div>
                                </div>

                            </div>



                        </section>

                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> نمایش جزئیات </span>
                            <span></span>
                        </div>

                    </div>



                </section>
            </section>


        </section>
    </main>




    <!-- منوی پایین -->
   @include('includes/footer')


</body>

</html>