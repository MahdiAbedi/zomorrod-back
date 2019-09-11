@include('includes/head')

<body>
    <!-- منوی بالا -->
    @include('includes/topMenu')
    <!-- مسیر هوایی -->
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
        <!-- بخش نمایش نتایج جستجو -->
        <section class="result-panel container">
            <!-- فیلترها -->
            <aside class="filters">
                <section class="flex">
                    <button class="reset">لغو فیلترها</button>
                    <p>نتایج جستجو <span>16</span></p>
                </section>
                <!-- ساعت حرکت -->
                <section class="panel">
                    <header class="panel-title flex-between">
                        <span>زمان پرواز</span>
                        <a href="#"><i class="fas fa-chevron-down"></i></a>
                    </header>
                    <div class="panel-body">

                        <!-- <label class="checkbox" for="check1">
                            <input type="checkbox" name="check1" id="check1">
                            <span class="checkmark"></span>
                            <p for="check1">از ساعت 6:00 تا 10:00</p>
                        </label> -->

                        <div>
                            <input type="checkbox" name="check1" id="check1">
                            <label for="check1">از ساعت 6:00 تا 10:00</label>
                        </div>
                        <div>
                            <input type="checkbox" name="check1" id="check1">
                            <label for="check1">از ساعت 6:00 تا 10:00</label>
                        </div>
                        <div>
                            <input type="checkbox" name="check1" id="check1">
                            <label for="check1">از ساعت 6:00 تا 10:00</label>
                        </div>
                        <div>
                            <input type="checkbox" name="check1" id="check1">
                            <label for="check1">از ساعت 6:00 تا 10:00</label>
                        </div>
                    </div>

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
                <!-- تعداد توقف -->
                <section class="panel">
                    <header class="panel-title flex-between">
                        <span>تعداد توقف</span>
                        <a href="#"><i class="fas fa-chevron-down"></i></a>
                    </header>
                    <div class="panel-body">
                        <div>
                            <input type="radio" name="check1" id="radio1">
                            <label for="radio1">مستقیم</label>
                        </div>
                        <div>
                            <input type="radio" name="check1" id="radio2" checked>
                            <label for="radio2">یک توقف</label>
                        </div>
                        <div>
                            <input type="radio" name="check1" id="radio3">
                            <label for="radio3">دو توقف و بیشتر</label>
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
                    <div class="ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتر</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/aseman.png" alt="">
                                        <img src="img/airlines-logo/ata.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>طول سفر:25 ساعت</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                        <span>2 توقف:FRA,SEA</span>
                                    </div>


                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>

                                </div>
                                <!-- لگ برگشت -->
                                <div class="second-leg leg flex-between">
                                    <div class="logoes">
                                        <img src="img/airlines-logo/aseman.png" alt="">
                                        <img src="img/airlines-logo/ata.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>طول سفر:25 ساعت</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plane"></i>
                                            </li>
                                        </ul>
                                        <span>2 توقف:FRA,SEA</span>
                                    </div>


                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>

                                </div>


                            </div>
                            <div class="ticket-choose">
                                <p>8 صندلی باقی مانده</p>
                                <p class="price">4,880,000 <span>ریال</span></p>
                                <button class="btn btn-zgreen">انتخاب بلیط</button>
                            </div>
                        </section>

                        <section class="ticket-detail">
                            <!-- عناوین  -->
                            <div class="detail-border"></div>
                            <div class="detail-titles flex">
                                <div class="buttons">
                                    <button class="btn btn-zgray">قوانین استرداد</button>
                                    <button class="btn btn-zgray">قوانین ویزا</button>
                                </div>


                                <ul class="flex">
                                    <li>1 نفر بزرگسال :<small>5/200/000</small>ریال</li>
                                    <li>1 نفر کودک :<small>5/200/000</small>ریال</li>
                                    <li>1 نفر نوزاد :<small>5/200/000</small>ریال</li>
                                    <li>جمع مبلغ:<small>13/200/000</small>ریال</li>

                                </ul>
                            </div>

                            <!-- جزییات بلیط رفت و برگشت -->

                            <div class="legs-detail flex">
                                <!-- لگ رفت -->
                                <div class="leg-detail">
                                    <h3>پرواز رفت</h3>
                                    <p>طول سفر:<span>21h 55m</span></p>
                                    <p class="green went-time"><i class="fas fa-calendar-day"></i> تاریخ حرکت:
                                        <small>شنبه،6مهر 1398(2019/09/28)</small></p>

                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/aseman.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                    <div class="stop-detail">
                                        <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                                    </div>
                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/aseman.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                    <div class="stop-detail">
                                        <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                                    </div>
                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/kaspian.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                </div>

                                <!-- لگ برگشت -->
                                <div class="leg-detail">
                                    <h3>پرواز برگشت</h3>
                                    <p>طول سفر:<span>21h 55m</span></p>
                                    <p class="green went-time"><i class="fas fa-calendar-day"></i> تاریخ حرکت:
                                        <small>شنبه،6مهر 1398(2019/09/28)</small></p>

                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/aseman.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                    <div class="stop-detail">
                                        <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                                    </div>
                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/ata.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                    <div class="stop-detail">
                                        <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                                    </div>
                                    <!-- جزییات هر مسیر -->
                                    <div class="detail-card">
                                        <div class="row">
                                            <strong>06:30</strong>
                                            <strong>Tehran <small>(Imam Khomeini Intl)</small></strong>
                                        </div>
                                        <div class="row">
                                            <img src="img/airlines-logo/kaspian.png" alt="">
                                            <div class="description">
                                                <small>شماره پرواز:1185 / ظرفیت: 9 نفر</small>
                                                <small>کلاس:Economy-H</small>
                                                <small>طول پرواز:3h 25m</small>
                                                <small>هواپیما: Airbus Industrie A321</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <strong>08:30</strong>
                                            <strong>Istanbul <small>(Istanbul Airport)</small></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-up"></i> پنهان کردن جزئیات </span>
                            <span></span>
                        </div>

                    </div>
                    <!-- یک تیکت تک -->
                    <div class="ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">چارتر</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="img/airlines-logo/iran-air.png" alt="">
                                        <img src="img/airlines-logo/atrak.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>طول سفر:25 ساعت</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="fa fa-plane rotate-right"></i>
                                            </li>
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                        </ul>
                                        <span>2 توقف:FRA,SEA</span>
                                    </div>


                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>

                                </div>
                                <!-- لگ برگشت -->
                                <div class="second-leg leg flex-between">
                                    <div class="logoes">
                                        <img src="img/airlines-logo/meraj.png" alt="">
                                        <img src="img/airlines-logo/kaspian.png" alt="">
                                    </div>
                                    <p class="destination">05:20 Tehran <span>1398/7/25</span></p>

                                    <div class="path">
                                        <span>طول سفر:25 ساعت</span>
                                        <ul class="path flex-between">
                                            <li>
                                                <i class="circle"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-plane"></i>
                                            </li>
                                        </ul>
                                        <span>2 توقف:FRA,SEA</span>
                                    </div>


                                    <p class="destination">06:20 Vancouver <span>1398/7/25</span></p>

                                </div>


                            </div>
                            <div class="ticket-choose">
                                <p>8 صندلی باقی مانده</p>
                                <p class="price">4,880,000 <span>ریال</span></p>
                                <button class="btn btn-zgreen">انتخاب بلیط</button>
                            </div>
                        </section>

                        <section class="ticket-detail" style="display: none">
                            اطلاعات پرواز
                        </section>
                        <div class="more-info flex-between">
                            <span>Economy-H</span>
                            <span><i class="fas fa-arrow-circle-down"></i> مشاهده جزییات پرواز </span>
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