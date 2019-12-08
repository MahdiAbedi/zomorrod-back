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
                                <img class="lozad" data-src="{{$hotel->Images[0]->Link}}" alt="" width="60%" onclick="openModal();currentSlide(0)">
                                <div class="column">
                                @if(array_key_exists(1,$hotel->Images))
                                        <img class="lozad" data-src="{{$hotel->Images[1]->Link}}" alt="" srcset="" width="100%" onclick="openModal();currentSlide(1)">
                                    @endif

                                    @if(array_key_exists(2,$hotel->Images))
                                        <img class="lozad" data-src="{{$hotel->Images[2]->Link}}" alt="" srcset="" width="100%" onclick="openModal();currentSlide(2)">
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
                                    <img class="lozad" data-src="{{$hotel->Images[$index]->Link}}" alt="" onclick="openModal();currentSlide($index)">
                                @endif

                            @endfor
                        </div>

                    </div>

                     <!-- The Modal/Lightbox -->
                     <div id="myModal" class="modal">
                        <span class="close cursor" onclick="closeModal()">&times;</span>
                        <div class="modal-content">
                        @php $imagesCount = count($hotel->Images) @endphp

                            @for($imageIndex = 0 ;$imageIndex < $imagesCount;$imageIndex++)
                            
                                <div class="mySlides">
                                    <div class="numbertext">{{$imageIndex}} / {{$imagesCount}}</div>
                                    <img class="lozad" data-src="{{$hotel->Images[$imageIndex]->Link}}" style="width:100%">
                                </div>
                            @endfor

                           
                            <!-- Next/previous controls -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            <!-- Caption text -->
                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>

                            <!-- Thumbnail image controls -->
                            @for($imageIndex = 0 ;$imageIndex < $imagesCount ;$imageIndex++)

                                <div class="gallerycolumn">
                                    <img class="demo lozad" data-src="{{$hotel->Images[$imageIndex]->Link}}" onclick="currentSlide({{$imageIndex+1}})" alt="تصاویر هتل">
                                </div>
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

                    <!-- <div class="map_container" id="googleMap" style="width:100%;height:400px;"></div> -->



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
<!-- ###################### Google Map ######################################################  -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZrseVD9WNnbN7GuNoxwALfvH_060urtI&callback=initMap"
  type="text/javascript"></script>

<style>
.row > .gallerycolumn {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.gallerycolumn {
  float: right;
  width: 10%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
  max-height: 500px;
}
.mySlides img{
    height: 500px;
    object-fit: cover;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}


img.demo {
    opacity: 0.6;
    width:100%;
    object-fit: cover;
    height: 100px;
    cursor: pointer;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="/js/custom.js"></script>
<script>
    // Open the Modal
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }
    
    // Close the Modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
    
    var slideIndex = 1;
    showSlides(slideIndex);
    
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>


<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>
    @endsection