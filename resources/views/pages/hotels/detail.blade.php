@extends('master')

@section('body')


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
                    <span>انتخاب هتل</span>
                    <i class="fa fa-hotel choose-plane"></i>
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
                    <span>صدور واچر</span>
                    <i class="circle"></i>
                </li>
            </ul>
        </div>
        <!-- بخش نمایش نتایج جستجو -->
        <section class="container ">
            <div class="hotel_container">
                <!-- گالری تصاویر -->
                <div class="gallery">
                    <div class="gallery_first_row">
                        <img src="{{$hotel->Images[0]->Link}}" alt="" width="60%">
                        <div class="column">
                            <img src="{{$hotel->Images[1]->Link}}" alt="" srcset="" width="100%">
                            <img src="{{$hotel->Images[2]->Link}}" alt="" srcset="" width="100%">
                        </div>
                    </div>

                    <div class="gallery_second_row flex">
                        <!-- @foreach($hotel->Images as $image)
                            <img src="{{$image->ThumbnailLink}}" alt="">
                        @endforeach -->

                        @for($index=3;$index< 8;$index++)
                        <img src="{{$hotel->Images[$index]->Link}}" alt="">


                        @endfor
                    </div>

                </div><!-- گالری تصاویر -->

                <div class="hotel_summery">
                    <h2>{{$hotel->Name}}</h2>
                    <span class="stars">
                        @for ($i = 0; $i < $hotel->Rating; $i++)
                            <i class="fa fa-star green"></i>
                        @endfor
                        @for ($i = 0; $i < 5- $hotel->Rating; $i++)
                            <i class="far fa-star green"></i>
                        @endfor
                        
                    </span>
                    <p>امتیاز کاربران : {{$hotel->ReviewScore}}</p>
                    <a href="#" class="green">1 X DELUXE GUEST ROOM/1 KING CITY VIEW</a>
                    <P>صبحانه از بوفه رایگان هر روز از 8 تا 11 صبح</P>
                    <table class="rounded_table">
                        <thead>
                            <tr>
                                <th>تاریخ و ساعت ورود</th>
                                <th>تاریخ و ساعت خروج</th>
                                <th>تعداد</th>
                            </tr>
                        </thead>
                        <tr>
                            <td id="hotel_checkIn">12:30 - 1398/07/09</td>
                            <td id="hotel_checkOut">12:30 - 1398/07/10</td>
                            <td id="passenger_count">2 بزرگسال + 1 کودک</td>
                        </tr>

                    </table>


                    <P><i class="fas fa-map-marker-alt"></i> نمایش هتل روی نقشه</P>
                    <small class="green">باکو Nsimi</small>
                    <br>
                    <div class="map_container">
                        <img src="/img/googlemap.png" alt="">
                    </div>
                    <a href="#" class="hotels_detail green">
                        مشاهده و انتخاب اتاق
                    </a>


                </div><!-- انتهای بخش نمایش نتایج جستجو-->
            </div>
            <!-- قسمت تب ها  -->
            <div class="tab_continer">
                <div class="tab">
                    <button class="tablinks active" onclick="openTab(event, 'about')">درباره هتل</button>
                    <button class="tablinks" onclick="openTab(event, 'facilities')">امکانات هتل</button>
                    <button class="tablinks" onclick="openTab(event, 'reviews')">نظر مسافران</button>
                </div>

                <div id="about" class="tabcontent" style="display: block; text-align:justify;direction:ltr">
                    <!-- توضیحات هتل  -->
                    <p>
                     {!! $hotel->Description !!}
                    </p>
                </div>

                <div id="facilities" class="tabcontent">
                    <h3>امکانات هتل</h3>
                    <p>امکانان هتل در دست طارحی</p>
                </div>

                <div id="reviews" class="tabcontent">
                    <h3>نظر مسافران</h3>
                    <p>در دست طراحی</p>
                </div>
            </div>
            <!-- انتهای قسمت تبها -->

            <!-- جستجوی مجدد بر اسات تاریخ ورود و خروج و نفرات  -->
            <div class="hotel_detail_filters">
                <input type="text" value="تاریخ ورود ">
                <input type="text" value="تاریخ خروج ">
                <input type="text" value="1 مسافر ، 1 اتاق ">
                <button href="#" class="btn btn-zgray">مشاهده</button>
            </div>

            <!-- مشخصات اتاقها و فاکتور -->
            <div class="rooms">
                <table class="rounded_table">
                    <thead>
                        <tr>
                            <th>نام و مشخصات اتاق</th>
                            <!-- <th>تعداد تخت</th>
                            <th>انتخاب تعداد اتاق</th> -->
                            <th>قیمت برای 3 شب</th>
                        </tr>
                    </thead>
                    @foreach($hotel->Rooms as $room)
                    <tr>
                        <td>
                            <p>{{$room->Name}}</p>
                            <p class="green">{{$room->MealType}}</p>
                            <p>{{$room->BedGroups}}</p>
                        </td>
                        <!-- <td>
                            <input type="number" name="roomCount" id="" min="1" max="10" value="1">
                        </td>
                        <td>
                            <input type="number" name="roomCount" id="" min="1" max="10" value="1">
                        </td> -->
                        <td name=money>74,880,00 ریال</td>
                    </tr>
                   
                  @endforeach

                </table>

                <div class="factor column">
                    <p class="title">فاکتور</p>
                    <div class="factor_detail flex">
                        <span>
                            <p class="green">مقصد:</p>
                            <p>دبی امارات متحده عربی</p>
                        </span>
                        <span>
                            <p>{{$hotel->Name}}</p>
                            <span class="stars">
                                @for ($i = 0; $i < $hotel->Rating; $i++)
                                    <i class="fa fa-star green"></i>
                                @endfor
                                @for ($i = 0; $i < 5- $hotel->Rating; $i++)
                                    <i class="far fa-star green"></i>
                                @endfor
                                
                            </span>
                        </span>
                        <span>
                            <p class="green">74,880,000 تومان</p>
                            <a href="#" class="btn btn-zgreen">پرداخت</a>
                        </span>
                    </div>

                    <table class="rounded_table">
                        
                        <tr>
                            <td>
                                Standard Twin Room
                            </td>
                            <td>
                                2 بزرگسال
                            </td>
                            <td>
                                1 اتاق
                            </td>
                            <td name=money>74,880,00 ریال</td>
                        </tr>
                        <tr>
                            <td>
                                Standard Twin Room
                            </td>
                            <td>
                                2 بزرگسال
                            </td>
                            <td>
                                1 اتاق
                            </td>
                            <td name=money>74,880,00 ریال</td>
                        </tr>
                        <tr class="green">
                            <td>
                                جمع مبلغ
                            </td>
                            <td>
                               
                            </td>
                            <td>
                                
                            </td>
                            <td name=money>74,880,00 ریال</td>
                        </tr>
                       
                        
                    </table>


                    <table class="rounded_table">
                            <thead>
                                <tr>
                                    <th>تاریخ و ساعت ورود</th>
                                    <th>تاریخ و ساعت خروج</th>
                                    
                                </tr>
                            </thead>
                            <tr class="green">
                                <td>
                                    دوشنبه 13/September/2019 ساعت 12:30
                                </td>
                                <td>
                                    دوشنبه 13/September/2019 ساعت 12:30
                                </td>
                               
                            </tr>
                            
                            
                        </table>


                </div>


            </div>
             <!-- مشخصات اتاقها و فاکتور -->

        </section>
    </main>

    <script src="/js/custom.js"></script>

<script>
    window.onload=function(){
        document.getElementById('hotel_checkIn').innerText="test"
    }

</script>
    @endsection