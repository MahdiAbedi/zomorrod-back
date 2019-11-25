@extends('master')

@section('body')
    <!-- مسیر هوایی -->
    <div class="top-search">
        <div class="flex container">
            
            <!-- فیلدهای جستجو -->
            <div id='internal_search'></div>
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


<style>
div#InlineTicket {
    display: block !important;
    width:100%;
}



div#internal_search {
    /* margin-top: 5px; */
    width:100%;
    display: flex;
    justify-content: center;
    
}

.top-search form {
    width: 100%;
}
.filters {
    padding-bottom: 20px;
}
</style>
@endsection