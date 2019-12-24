@include('includes/head')
<style>
    .mySlides{display: none;height: 100%;}
    img {vertical-align: middle;height: 100%;object-fit: cover;border-radius: 4px;}
    
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
      height: 100%;
    }
    
    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }
    
    /* Position the "next button" to the right */
    .next {
      left: 0;
      border-radius: 3px 0 0 3px;
    }
    
    /* On hover, add a grey background color */
    .prev:hover, .next:hover {
      background-color: #f1f1f1;
      color: black;
    }
</style>

<body>
    <!-- منوی بالا -->
    @include('includes/topMenu')

<!-- نمایش پیامهای خطا و ... در بالای صفحات  -->
@include('layouts/flash-message')
    <!-- main part -->
    <main class="tourDetail">
        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="container">
            <!-- مسیر سایت  -->
            <ul class="breadCrums">
                <li>
                    <a href="#">خانه</a>
                </li>
                <li>
                    <a href="#">تورهای خارجی</a>
                </li>
                <li>
                    <a href="#">تور تایلند</a>
                </li>
                <li>
                    <a href="#">تور بانکوک</a>
                </li>
                
            </ul>

            <div class="tour_detail_top">
                <div class="tourSummary column">
                    <h1> {{$tour->title}} </h1>
                    <h3>{{$tour->duration}}</h3>
                    <span class="stars">
                        <i class="fa fa-star green"></i>
                        <i class="fa fa-star green"></i>
                        <i class="fa fa-star green"></i>
                        <i class="fa fa-star green"></i>
                        <i class="fa fa-star green"></i>
                    </span>
                    <p>{{$tour->after_title}}</p>
                    <small>ایرلاین:{{$tour->airline}}</small>
                    <table class="rounded_table">
                        <thead>
                            <tr>
                                <th>تاریخ رفت</th>
                                <th>تاریخ برگشت</th>
                            </tr>
                        </thead>
                        <tr>
                            <td name="date">{{$tour->departure_time}}</td>
                            <td name="date">{{$tour->return_time}}</td>
                        </tr>

                    </table>
                    <table class="rounded_table">
                        <thead>
                            <tr>
                                <th>تعداد</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>2 بزرگسال + 1 کودک</td>
                        </tr>

                    </table>

                    <div class="tourPrice">
                        <p>شروع قیمت برای {{$tour->duration}} از :</p>
                        <p class="money">{{$tour->price}} <small>تومان</small></p>
                    </div>
                </div>
                <div class="slideShow">
                    <div class="slideshow-container">
                        <div class="mySlides">
                          <img src="/img/tours/tour1/img_nature_wide.jpg" style="width:100%">
                        </div>
                      
                        <div class="mySlides">
                          <img src="/img/tours/tour1/img_snow_wide.jpg" style="width:100%">
                        </div>
                      
                        <div class="mySlides">
                          <img src="/img/tours/tour1/img_mountains_wide.jpg" style="width:100%">
                        </div>
                      
                        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                      </div>
                </div>
                
            </div>

        </div>

        <div class="container anchor">
            <div class="anchors">
                <a href="#">اطلاعات تور</a>
                <a href="#">برنامه سفر</a>
                <a href="#">دیدگاه مسافران</a>
            </div>

            <a class="btn btn-zgreen">
                رزرو تور
            </a>
        </div>

        <div class="container panel tourOptions">
            <h3 class="green">. خدمات</h3>
            @php
                $facilities = explode(',',$tour->facilities)
            @endphp
            @foreach($facilities as $facility)
                <img src="/img/icons/tour/{{$facility}}.jpg" alt="{{$facility}}">
            @endforeach

        </div>
        <div class="container panel tourOptions">
            <h3 class="green">. مدارک مورد نیاز</h3>
            @php
                $madarek = explode(',',$tour->madarek)
            @endphp
            <ul class="links">
                @foreach($madarek as $madrak)
                    <li>{{$madrak}}</li>
                @endforeach
            </ul>
        </div>
        <div class="container panel">
            <h3 class="green">. راهنمای سفر</h3>
            <p></p>
            {!!$tour->description !!}
        
        </div>
        <div class="container panel">
            <h3 class="green">. برنامه سفر</h3>

            @php
            $schedules = json_decode($tour->schedule)
            
            @endphp

            @foreach($schedules as $schedule)
            <button class="accordion"><span class="title">{{$schedule->title}} : </span>{{$schedule->plan}}</button>
            <div class="accordionbody">
                {!! $schedule->description !!}
            </div>

            @endforeach
            
            

            
        
        </div>
       
    </main>

    <script>
    var slideIndex = [1,1];
    var slideId = ["mySlides"]
    showSlides(1, 0);
    showSlides(1, 1);
    
    function plusSlides(n, no) {
      showSlides(slideIndex[no] += n, no);
    }
    
    function showSlides(n, no) {
      var i;
      var x = document.getElementsByClassName(slideId[no]);
      if (n > x.length) {slideIndex[no] = 1}    
      if (n < 1) {slideIndex[no] = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex[no]-1].style.display = "block";  
    }
</script>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
    </script>


   @include('includes/footer')