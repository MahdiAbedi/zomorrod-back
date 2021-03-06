@include('includes/head')

<body>
    <!-- slider -->
    <div class="slider" id="slider" style="background-image:none">
        <!-- منوی بالا -->
        @include('includes/topMenu')

        <!-- نمایش پیامهای خطا و ... در بالای صفحات  -->
        @include('layouts/flash-message')

        <!-- تصویر هواپیمای بزرگ که روی اسلایدر و منو -->
        <div class="airplane" id="slider-img">
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
                    <div class="icon_container" id="OutLineTicket-Icon">
                        <img class="outline-flight" src="img/icons/outline-flight.png" alt="" />
                    </div>
                    <h4 class="out-flight-title"><span>پرواز خارجی</span></h4>

                </div>
                 <!-- {/* هتل */} -->
                 <div class="search_icon" onclick="showSearchPanel('HotelTicket')">
                    <div class="icon_container active" id="HotelTicket-Icon">
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
        <div class="bgwidth bg-white">
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
                </div>
        </div>
        <!-- متن درباره ستاره زمرد  -->
        <div class="bgwidth bg-gray">
            <div class="main-container">
                <h2 class="special_offers">ستاره زمرد !!</h2><br/>
                <p class="text-justify">شرکت خدمات مسافرتی ستاره زمرد از شروع فعالیت خود تاکنون هدف گذاری ویژه ای بر روی رضایت مسافران داشته پو در ارائه خدمات با کیفیت از کلیه آژانس های همکار خود پیشی گرفته است. این رضایتمندی آژانس ستاره زمرد  را بر آن داشته است تا با گسترش زمینه فعالیت های خود در حوزه سفر و گردشگری، خود را پیشتاز این رقابت ها بداند.</p>
            </div>
        </div>
        <!-- هتلت رو با چشم بسته انتخاب کن -->
        <div class="bgwidth">
            <div class="main-container">
                <h2 class="special_offers">هتلت رو با چشم بسته انتخاب کن !</h2><br/>
                <div class="text-slider owl-carousel">
                    <a href="#"> تهران</a>
                    <a href="#"> شیراز</a>
                    <a href="#"> اصفهان</a>
                    <a href="#"> کرمان </a>
                    <a href="#"> اهواز</a>
                    <a href="#"> مشهد</a>
                    <a href="#"> تبریز</a>
                    <a href="#"> قم</a>
                </div>
            </div>
        </div>
        <!-- باحالترین هتلها  -->
        <div class="bgwidth bg-gray">
                <div class="main-container">
                    <h2 class="special_offers">باحالترین هتلها</h2>
                    <!-- tours -->
                    <div class="tours flex owl-carousel owl-theme">
                        <!-- tour -->
                        <div class="tour">
                            <div class="discount">
                                <p>15% تخفیف</p>
                                
                            </div>
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <div class="flex-between">
                                <span class="stars">
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                </span>
                                <p>شروع قیمت از</p>

                            </div>
                            <div class="flex-between ">
                                <p>رتبه:7|خوب</p>
                                <p class="orange">7,730,000 تومان</p>
                            </div>
                        </div>                      
                        <!-- tour -->
                        <div class="tour">
                            <div class="discount">
                                <p>15% تخفیف</p>
                                
                            </div>
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <div class="flex-between">
                                <span class="stars">
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                </span>
                                <p>شروع قیمت از</p>

                            </div>
                            <div class="flex-between ">
                                <p>رتبه:7|خوب</p>
                                <p class="orange">7,730,000 تومان</p>
                            </div>
                        </div>                      
                        <!-- tour -->
                        <div class="tour">
                            <div class="discount">
                                <p>15% تخفیف</p>
                                
                            </div>
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <div class="flex-between">
                                <span class="stars">
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                </span>
                                <p>شروع قیمت از</p>

                            </div>
                            <div class="flex-between ">
                                <p>رتبه:7|خوب</p>
                                <p class="orange">7,730,000 تومان</p>
                            </div>
                        </div>                      
                        <!-- tour -->
                        <div class="tour">
                            <div class="discount">
                                <p>15% تخفیف</p>
                                
                            </div>
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <div class="flex-between">
                                <span class="stars">
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                </span>
                                <p>شروع قیمت از</p>

                            </div>
                            <div class="flex-between ">
                                <p>رتبه:7|خوب</p>
                                <p class="orange">7,730,000 تومان</p>
                            </div>
                        </div>                      
                        <!-- tour -->
                        <div class="tour">
                            <div class="discount">
                                <p>15% تخفیف</p>
                                
                            </div>
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <div class="flex-between">
                                <span class="stars">
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="fa fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                    <i class="far fa-star green"></i>
                                </span>
                                <p>شروع قیمت از</p>

                            </div>
                            <div class="flex-between ">
                                <p>رتبه:7|خوب</p>
                                <p class="orange">7,730,000 تومان</p>
                            </div>
                        </div>                      
                                      
                    </div>
                </div>
        </div>
        <!-- خوش قیمت ترین هتلها  -->
        <div class="bgwidth bg-white">
                <div class="main-container">
                    <h2 class="special_offers">خوش قیمت ترین هتلها</h2>
                    <!-- tours -->
                    <div class="tours flex owl-carousel owl-theme">
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-6.jpg" alt="">
                            <h2>تور سوئیس</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-3.jpg" alt="">
                            <h2>تور فرانسه</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-6.jpg" alt="">
                            <h2>تور سوئیس</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                        <!-- tour -->
                        <div class="tour bg-gray">
                            <img src="img/tours/img-3.jpg" alt="">
                            <h2>تور فرانسه</h2>
                            <p>7 شب و 8 روز -هتل 5 ستاره</p>
                            <p class="price">7,730,000 تومان</p>
                        </div>
                    </div>
                </div>
        </div>
        <!-- لینک هتلها  -->
        <div class="bgwidth bg-gray ">
                <div class="main-container links">
                        <ul>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                            <li><a href="#">رزو هتل آنتالیا</a></li>
                        </ul>
                </div>
            
        </div>

        <!-- درباره هتلها یکم بیشتر بخوانید؟ -->
        <div class="bgwidth bg-white">
                <div class="main-container">
                    <h2 class="special_offers">درباره هتلها یکم بیشتر بخوانید؟</h2>
                    <!-- tours -->
                    <div class="tours flex owl-carousel owl-theme">
                        <!-- blog -->
                        <div class="blog-slider">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                        </div>
                        <!-- blog -->
                        <div class="blog-slider">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                        </div>
                        <!-- blog -->
                        <div class="blog-slider">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                        </div>
                        <!-- blog -->
                        <div class="blog-slider">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                        </div>
                        <!-- blog -->
                        <div class="blog-slider">
                            <img src="img/tours/img-8.jpg" alt="">
                            <h2>تور بلغارستان "وارنا"</h2>
                        </div>
                    </div>
                </div>
        </div>
        

        
    </main>

<script>
    window.onload =function(){
        showSearchPanel('HotelTicket')
    }
</script>
   @include('includes/footer')