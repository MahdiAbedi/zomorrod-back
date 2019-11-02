@include('includes/head')

<body>
    <!-- slider -->
    <div class="slider" id="slider">
        <!-- منوی بالا -->
        @include('includes/topMenu')

        <!-- نمایش پیامهای خطا و ... در بالای صفحات  -->
        @include('layouts/flash-message')

        <!-- تصویر هواپیمای بزرگ که روی اسلایدر و منو -->
        <div class="airplane" id="slider-img">
            <img src="img/bgs/airplane.png" alt="">
        </div>
        <!-- قسمت جستجو بلیط هواپیما،هتل و .. -->
        <div class="search-container">
            <!-- {/* آیکون های  */} -->
            <div class="search_icons">

                <!-- پرواز داخلی  -->
                <div class="search_icon" onclick="showSearchPanel('InlineTicket')">
                    <div class="icon_container" id="InlineTicket-Icon">
                        <img src="img/icons/inline-flight.png" alt="" />
                    </div>
                    <h4 class="inner-flight-title"><span>پرواز داخلی</span></h4>
                </div>

                <!-- {/* پرواز خارجی */} -->
                <div class="search_icon " onclick="showSearchPanel('OutLineTicket')">
                    <div class="icon_container active" id="OutLineTicket-Icon">
                        <img class="outline-flight" src="img/icons/outline-flight.png" alt="" />
                    </div>
                    <h4 class="out-flight-title"><span>پرواز خارجی</span></h4>

                </div>
                 <!-- {/* هتل */} -->
                 <div class="search_icon" onclick="showSearchPanel('HotelTicket')">
                    <div class="icon_container" id="HotelTicket-Icon">
                        <img src="img/icons/hotel.png" alt=""/>
                    </div>
                    <h4>هتل</h4>
                </div>
               
                <!-- {/* قطار */} -->
                <div class="search_icon" onclick="showSearchPanel('TrainTicket')">
                    <div class="icon_container" id="TrainTicket-Icon">
                        <img src="img/icons/train.png" alt="" />
                    </div>
                    <h4>قطار</h4>
                </div>
               
                <!-- {/* تور */} -->
                <div class="search_icon" onclick="showSearchPanel('TourTicket')">
                    <div class="icon_container" id="TourTicket-Icon">
                        <img src="img/icons/tour.png" alt=""/>
                    </div>
                    <h4>تور</h4>
                </div>
                <!-- {/* بیمه */} -->
                <div class="search_icon" onclick="showSearchPanel('InsuranceTicket')">
                    <div class="icon_container" id="InsuranceTicket-Icon">
                        <img src="img/icons/bime.png" alt=""/>
                    </div>
                    <h4>بیمه</h4>
                </div>
            </div>
            <div class="SearchPanel"></div>
        </div>

    </div>
    <!-- main part -->
    <main id="root">
        <div class="main-container">
            <div class="home_icons flex">
                <div class="home_icon">
                    <img src="img/icons/waranti.png" alt="">
                    <p>گارانتی قیمت بازگشت وجه در صورت ارائه قیمت ارزان تر از زمرد</p>
                </div>
                <div class="home_icon">
                    <img src="img/icons/travel.png" alt="">
                    <p>دسترسی به بیش از 300 هتل و ایرلاین در سراسر دنیا</p>
                </div>
                <div class="home_icon">
                    <img src="img/icons/support.png" alt="">
                    <p>ارائه پشتیبانی و خدمات پس از فروش به صورت 24 ساعته</p>
                </div>
            </div>
            <h2 class="special_offers">پیشنهادهای ویژه</h2>
            <h3 class="title">آژانس مسافرت هوایی و گردگشری ستاره زمرد</h3>
            <p>مجری مستقیم تورهای:سوئیس ، بالی، کوالالامپور،سنگاپور،چین،گرجستان،مالدیو،روسیه و مالزی</p>
            <!-- tours -->
            <div class="tours flex owl-carousel owl-theme">
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-8.jpg" alt="">
                    <h2>تور بلغارستان "وارنا"</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-6.jpg" alt="">
                    <h2>تور سوئیس</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-3.jpg" alt="">
                    <h2>تور فرانسه</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-8.jpg" alt="">
                    <h2>تور بلغارستان "وارنا"</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-6.jpg" alt="">
                    <h2>تور سوئیس</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
                <!-- tour -->
                <div class="tour">
                    <img src="img/tours/img-3.jpg" alt="">
                    <h2>تور فرانسه</h2>
                    <p>7 شب و 8 روز -هتل 5 ستاره</p>
                    <p class="price">7,730,000 تومان</p>
                </div>
           
               
               

            </div>
            <!-- قسمت خبرنامه و دکمه تورهای بیشتر -->
            <!-- <div class="extra">
                <form class="newsletter">
                    <input type="button" value="ارسال" id="newsletter_btn">
                    <input type="text" name="newsletter" id="newsletter" class="right-border left-border"
                        placeholder="برای دریاف آخرین اخبار تور‌ها و دریافت کد تخفیف ایمیل خورد را ارسال کنید">
                </form>
                <input type="button" value="تورهای بیشتر">
            </div> -->


            <!-- پکیجت رو بساز -->
            <!-- <div class="make_your_tour">
            </div> -->

            <!-- مطالب و بلاگ -->
            <!-- <div class="blog_slides flex">
                <div class="blog_slide">
                    <img src="img/tours/3.jpg" alt="">
                    <p>طبیعت گردی</p>
                </div>
                <div class="fcolumn">
                    <div class="blog_slide">
                        <img src="img/tours/1.jpg" alt="">
                        <p>طبیعت گردی</p>
                    </div>
                    <div class="blog_slide">
                        <img src="img/tours/61.jpg" alt="">
                        <p>طبیعت گردی</p>
                    </div>
                </div>
                <div class="blog_slide">
                    <img src="img/tours/4.jpg" alt="">
                    <p>طبیعت گردی</p>
                </div>
            </div> -->
        </div>
    </main>
   @include('includes/footer')