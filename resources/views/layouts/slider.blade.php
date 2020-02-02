<!-- slider -->
<div class="slider" id="slider" style="background-image:none">
        <!-- منوی بالا -->
        <!-- تصویر هواپیمای بزرگ که روی اسلایدر و منو -->
        @yield('flyAirplane')
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