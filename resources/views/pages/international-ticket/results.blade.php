@extends('master')

@section('body')
    <!-- مسیر هوایی -->
    <div class="top-search">
       <div class="container"  id="international_search"></div>
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
        <div id="InternationalTicketResults"></div>
    </main>


<style>

#OutLineTicket {
    /* margin-top: 5px; */
    display: block !important;
    justify-content: center;
    width:100%;
}

.top-search form {
    width: 100%;
}
.filters {
    padding-bottom: 20px;
}

</style>
@endsection