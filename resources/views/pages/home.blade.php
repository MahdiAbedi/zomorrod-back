@extends('master')
@section('meta')
    <meta name="description" content="آژانس هواپیمایی ستاره زمرد مجری مستقیم تورهای اروپا،آسیا">
    <meta name="keywords" content="آژانس هواپیمایی">
    <link rel="canonical" href="{{config('app.url')}}" />

@endsection
@section('pageTitle', 'آژانس هواپیمایی ستاره زمرد')
@section('body')
    @section('flyAirplane')
        <!-- تصویر هواپیمای بزرگ که روی اسلایدر و منو -->
        <div class="airplane" id="slider-img">
            <img src="img/bgs/airplane.png" alt="هواپیمای متحرک">
        </div>

    @endsection
    <!-- slider -->
    @include('layouts/slider')
   
    <!-- main part -->
    <main id="root">
        <div class="main-container">
            <div class="home_icons flex">
                <div class="home_icon">
                    <img class="lazy" data-src="img/icons/waranti.jpg" alt="گارانتی قیمت">
                    <p>گارانتی قیمت بازگشت وجه در صورت ارائه قیمت ارزان تر از زمرد</p>
                </div>
                <div class="home_icon">
                    <img class="lazy" data-src="img/icons/travel.jpg" alt="رزو هتل">
                    <p>دسترسی به بیش از 300 هتل و ایرلاین در سراسر دنیا</p>
                </div>
                <div class="home_icon">
                    <img class="lazy" data-src="img/icons/support.jpg" alt="پشتیبانی 24 ساعته">
                    <p>ارائه پشتیبانی و خدمات پس از فروش به صورت 24 ساعته</p>
                </div>
            </div>
            <h2 class="special_offers">پیشنهادهای ویژه</h2>
            <h3 class="title">آژانس مسافرت هوایی و گردگشری ستاره زمرد</h3>
            <p>مجری مستقیم تورهای:سوئیس ، بالی، کوالالامپور،سنگاپور،چین،گرجستان،مالدیو،روسیه و مالزی</p>
            <!-- tours -->
            <div class="tours flex owl-carousel owl-theme">
                <!-- tour -->
               
                <!-- tour -->
                @foreach($lastTours as $tour)
                    <a class="tour" href="/tour/{{$tour->alias}}">
                    @if($tour->discount)
                        <div class="discount">
                            <p>{{$tour->discount}}% تخفیف</p>
                        </div>
                    @endif
                        <img class="lazy" data-src="{{$tour->thumbnail}}" alt="{{$tour->title}}">
                        <h2>{{$tour->title}}</h2>
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
                            <p class="orange price"><span name="money">{{$tour->price}}</span> {{$tour->price_currency}}</p>
                        </div>
                    </a>                      
                @endforeach

            </div>

        </div>
    </main>

<script>
    window.onload =function(){
        showSearchPanel('OutLineTicket')
    }
</script>
@endsection