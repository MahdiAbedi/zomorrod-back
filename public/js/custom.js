$(document).ready(function () {
    $('.select2').select2();

    // showSearchPanel("OutLineTicket");



    console.log('%c Designed By MahdiAbedi220@yahoo.com tel:09395187902 ', 'background: #222; color: #bada55');
});

//برای نمایش یا مخفی کردن پنل جستجو
function Toggle(tagId) {
    var x = document.getElementById(tagId);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

//برای نمایش پنل جستجو هنگامی که روی یکی از دکمه ها کلیک میکنیم
    function showSearchPanel(tagId){

        // مشخص کردن بخش انتخاب شده
        $( ".icon_container.active" ).removeClass( "active" );
        // tagIcon="#"+tagId+"-Icon";
        tagIcon=`#${tagId}-Icon`;
        // alert(tagIcon);
        $(tagIcon).addClass("active");




        //غیر فعال کردن تصویر هواپیمای در حال پرواز
        document.getElementById('slider-img').style.display="none";
        switch (tagId) {
            case 'InlineTicket':
                // alert('hello');
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/inline-flight-bg.jpg')";
                document.getElementById('slider-img').style.display="block";

                break;
            case 'OutLineTicket':
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/outline-flight.jpg')"
                document.getElementById('slider-img').style.display="block";
                break;

            case 'TrainTicket':
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/train-bg.jpg')";
                break;

            case 'TourTicket':
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/tour-bg.jpg')";
                break;

            case 'HotelTicket':
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/hotel-bg.jpg')";
                break;

            case 'InsuranceTicket':
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/Insurance-bg.jpg')";
                break;

        
            default:
                alert('بک گراند مورد نظر یافت نشد.');
                break;
        }

        // alert(tagId);

        document.getElementById('InlineTicket').style.display="none";
        document.getElementById('OutLineTicket').style.display="none";
        document.getElementById('HotelTicket').style.display="none";
        document.getElementById('TourTicket').style.display="none";
        document.getElementById('TrainTicket').style.display="none";
        document.getElementById('InsuranceTicket').style.display="none";

        document.getElementById(tagId).style.display="block";
    }

    // اسلایدشو تورها در صفحه اول سایت
    $('.tours').owlCarousel({
        rtl:true,
        // center:true,
        loop:true,
        margin:10,
        nav:false,
        items:4,
        // autoWidth:true,
        // stagePadding: 30,
    
        // animateOut: 'slideOutDown',
        // animateIn: 'flipInX',
        smartSpeed:450,
        autoplay:true,
    
        responsive:{
            0:{
                items:1,
                dots:true
                
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    })



    // کلیک کردن روی دکمه ورود به سایت login
    $("#login").click(function() {  
        // alert('hello');
        $(".login-container").toggle("slow");
        
      });

    // $('#mosafer').click(function(){
    //     $(".passengers_count_container").toggle("slow");
    // });


    //   when click on site close the login panel 
    // $('.slider').click(function(e){
    //     e.stopPropagation();
    //     $(".login-container").hide();
    //     $(".passengers_count_container").hide();
     
    //     alert('hello');
    // })

    function hamburgerMenu(x){
        x.classList.toggle("change");

        var element =document.getElementById('hamburger-menu');
        element.classList.toggle("hide");
        
    }