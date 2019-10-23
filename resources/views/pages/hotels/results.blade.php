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
        <section class="result-panel container" id="HotelResutls">
            


        </section>
    </main>

@endsection