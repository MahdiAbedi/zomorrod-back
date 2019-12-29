@include('includes/head')

<body>
        <!-- منوی بالا -->
        @include('includes/topMenu')

<!-- نمایش پیامهای خطا و ... در بالای صفحات  -->
@include('layouts/flash-message')
    <!-- main part -->
<main>
        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="container">
            <ul class="breadCrums">
                <li>
                    <a href="/">خانه</a>
                </li>
                <li>
                    <a href="/tours">تورهای خارجی</a>
                </li>
                <li>
                    <a href="/tours/{{$tourCategory->alias}}">{{$tourCategory->name}}</a>
                </li>
                
            </ul>
        </div>
        <!-- بخش نمایش نتایج جستجو -->
        <section class="result-panel container">
            <!-- فیلترها -->
            <aside class="filters">
                <section class="flex bg-zgreen">
                    <p>تورهای محبوب</p>
                </section>
                <!-- جستجوی هتل -->
                <!-- blog -->
                @foreach($randomTours as $random)
                    <a class="blog-slider style2" href="/tour/{{$random->alias}}">
                        <img src="/img/tours/{{$random->id}}.jpg" alt="">
                        <h2>{{$random->title}}<p>{{$random->duration}}</p></h2>
                    </a>
                @endforeach
                
                <!-- <section class="flex bg-zgreen">
                    <p>مقالات مرتبط</p>
                </section> -->
                <!-- جستجوی هتل -->
               
                <!-- blog -->
                <!-- <a class="blog-slider" href="#">
                    <img src="img/tours/img-8.jpg" alt="">
                    <h2>تور بلغارستان "وارنا"</h2>
                </a> -->
                
            </aside>

            <!-- نتایج -->
            <section class="results ">
                <!-- قسمت مرتبط سازی نتایج بر اساس قیمت و.. و نمایش تاریخ -->
                @php
                    $tags = explode(',',$tourCategory->tags)
                @endphp

                @if($tourCategory->tags)
                <section>
                        <ul class="tags">
                            
                            @foreach($tags as $tag)
                                <li><a href="/tour-tags/{{$tag}}" class="tag">{{$tag}}</a></li>

                            @endforeach
                              </ul>
                </section>
                @endif
                <!-- بخش نمایش تیکت ها -->
                <section class="hotels">
                    <div class="hotel-container bg-zgreen tourCatTitle">
                        <h1>{{$tourCategory->name}}</h1>
                    </div>
                    <!-- یک تیکت تک -->
                    @foreach($tours as $tour)
                        <div class="hotels-container tour-result">
                            <img src="/img/tours/{{$tour->id}}.jpg" alt="">
                            <div class="hotels_preview flex-column">
                                <div class="hotels_preview_top">
                                <div class="parts">
                                    <div class="right">
                                        <h2 class="green">{{$tour->title}}</h2>
                                        <span class="stars">
                                            <i class="fa fa-star green"></i>
                                            <i class="fa fa-star green"></i>
                                            <i class="fa fa-star green"></i>
                                            <i class="far fa-star green"></i>
                                            <i class="far fa-star green"></i>
                                        </span>
                                        <p>رتبه : 7.3 | خوب |</p>
                                    
                                    </div>
                                    <div class="">
                                        <P><span class="green">مدت اقامت:</span>{{$tour->duration}}</P>
                                        <P><span class="green">رفت:</span>Atlas Air</P>
                                        <P><span class="green">برگشت:</span>Iran Air</P>
                                    </div>
                                </div>
                                    <div class="price">
                                        <span>شروع قیمت از:<p class="green money" name="money">{{$tour->price}} {{$tour->price_currency}}</p></span>
                                        
                                    </div>
                                </div>
                                <div class="tour_facilities">
                                    <p>هتل</p>
                                    <p>صبحانه</p>
                                    <p>ترانسفر </p>
                                    <p>بیمه</p>
                                    <p>سیم کارت</p>
                                    <p></p>
                                </div>
                                <a href="/tour/{{$tour->alias}}" class="hotels_detail green">
                                    مشاهده تور
                                </a>
                            </div>
                        </div> 
                    @endforeach
                </section>
            </section>


        </section>
        <section class="panel container">
                <header class="panel-title flex-between">
                    <span>{{$tourCategory->name}}</span>
                    <a href="#"><i class="fas fa-chevron-down"></i></a>
                </header>
                <div class="panel-body">
                {!! $tourCategory->description!!}
                </div>

            </section>
    </main>


   @include('includes/footer')