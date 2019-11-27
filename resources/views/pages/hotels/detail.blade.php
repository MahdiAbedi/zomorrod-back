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
                            @if(count($hotel->Images))
                                <img src="{{$hotel->Images[0]->Link}}" alt="" width="60%">
                                <div class="column">
                                @if(array_key_exists(1,$hotel->Images))
                                        <img src="{{$hotel->Images[1]->Link}}" alt="" srcset="" width="100%">
                                    @endif

                                    @if(array_key_exists(2,$hotel->Images))
                                        <img src="{{$hotel->Images[2]->Link}}" alt="" srcset="" width="100%">
                                    @endif
                                </div>
                            @else
                                تصویری برای هتل موجود نمیباشد.

                            @endif
                        </div>

                        <div class="gallery_second_row flex">
                            <!-- @foreach($hotel->Images as $image)
                                <img src="{{$image->ThumbnailLink}}" alt="">
                            @endforeach -->

                            @for($index=3;$index< 8;$index++)
                                @if(array_key_exists($index,$hotel->Images))
                                    <img src="{{$hotel->Images[$index]->Link}}" alt="">
                                @endif

                            @endfor
                        </div>

                    </div>
                <!-- گالری تصاویر -->
                <input type="hidden" value={{$hotel->Id}} id="HotelId">
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
                        <tbody>
                            <tr>
                                <td id="hotel_checkIn_Time">12:30 - 1398/07/09</td>
                                <td id="hotel_checkOut_Time">12:30 - 1398/07/10</td>
                                <td id="passenger_count">2 بزرگسال + 1 کودک</td>
                            </tr>
                        </tbody>

                    </table>


                    <P><i class="fas fa-map-marker-alt"></i> نمایش هتل روی نقشه</P>
                    <small class="green">باکو Nsimi</small>
                    <br>
                    <div class="map_container">
                        <img src="/img/googlemap.png" alt="">
                    </div>
                    <a href="#" class="hotels_detail green">
                       مشاهده هتل بر روی نقشه
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

                <div id="facilities" class="tabcontent">x
                    <h3>امکانات هتل</h3>
                    <p>امکانان هتل در دست طارحی</p>
                </div>

                <div id="reviews" class="tabcontent">
                    <h3>نظر مسافران</h3>
                    <p>در دست طراحی</p>
                </div>
            </div>
            <!-- انتهای قسمت تبها -->
            <!-- ##################################################### -->
            <!-- نمایش لیست اتاقهای موجود برای این هتل  -->
            <!-- ##################################################### -->
           <div id="RoomsList"></div>

        </section>
    </main>

    

<script>
    window.onload=function(){
        document.getElementById('hotel_checkIn_Time').innerText= localStorage.getItem('hotel_checkIn');
        document.getElementById('hotel_checkOut_Time').innerText=localStorage.getItem('hotel_checkOut');
        // document.getElementById('hotel_checkIn_Time').innerText="test";
    }


</script>
    @endsection