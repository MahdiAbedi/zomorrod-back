@extends('master')

@section('body')
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
        <div id="InternalTicketResults"></div>
    </main>

@endsection