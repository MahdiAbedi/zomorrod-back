// import Axios from "axios";

$(document).ready(function () {

    $('.select2').select2();
    formatInsideTagMoney('money');
    formatInsideTagDate('date');
    formatInsideTagDateTime('dateTime');

    // showSearchPanel("HotelTicket");
    //درخواست لیست فرودگاه های بین المللی
        

    //#################### حرکت بین فیلدهای جستجو در صفحه اول ########################

    //########################### مخفی کردن 

        

    // console.clear();
    console.log('%c Designed By MahdiAbedi220@yahoo.com tel:09395187902 ', 'background: #222; color: #bada55 ;font-size:30px');
});



//مقدار داخل تگ مشخصی را با فرمت مناسب پول جایگزین میکند
function formatInsideTagDateTime(tagName){
    // moment.loadPersian({usePersianDigits: true});
     
         var divs = document.getElementsByName(tagName);
     for(var i = 0; i < divs.length; i++){
        // divs[i].innerText = moment(divs[i].innerText).locale('fa').calendar();
         divs[i].innerText = moment(divs[i].innerText, 'YYYY/M/D HH:mm:ss').format('jYYYY/jM/jD HH:mm:ss');
     }//for
 }//FormatInsideTagMoney


//مقدار داخل تگ مشخصی را با فرمت مناسب پول جایگزین میکند
function formatInsideTagDate(tagName){
    // moment.loadPersian({usePersianDigits: true});
     
         var divs = document.getElementsByName(tagName);
     for(var i = 0; i < divs.length; i++){
        // divs[i].innerText = moment(divs[i].innerText).locale('fa').calendar();
         divs[i].innerText = moment(divs[i].innerText, 'YYYY/M/D').format('jYYYY/jM/jD');
     }//for
 }//FormatInsideTagMoney
 
 
 function formatInsideTagTime(tagName){
     
    // moment.loadPersian({usePersianDigits: true});
     
         var divs = document.getElementsByName(tagName);
     for(var i = 0; i < divs.length; i++){
        // divs[i].innerText = moment(divs[i].innerText).locale('fa').calendar();
         divs[i].innerText = moment(divs[i].innerText, 'YYYY/M/D').format('jYYYY/jM/jD');
     }//for
 }//FormatInsideTagMoney

//#####################################################################################################
//##############################وقتی فکوس از روی چیزی برداشته میشود آن قسمت مخفی گردد #############
//#####################################################################################################
$("body").mouseup(function (e)
{   //Login & Logout panel
    hideWhenLoseFocus("#showProfilePanel","#profile-list",e);
    //outlind airlines panel
    hideWhenLoseFocus("#origin_myInput","#origin_myul",e);
    hideWhenLoseFocus("#destination_myul","#destination_myul",e);
    //تعداد مسافران پرواز خارجی
    hideWhenLoseFocus("#international_passengers_count_container_click","#international_passengers_count_container",e);
    //تعداد مسفاران پرواز داخلی
    hideWhenLoseFocus("#inline_passengers_count_container_click","#inline_passengers_count_container",e);
    //لیست هتلها
    hideWhenLoseFocus("#hotelName","#hotelNameList",e);
    //تعداد مسافران هتل
    hideWhenLoseFocus("#hotelPassengersCount","#hotelPassengersCountList",e);
    
});
function hideWhenLoseFocus(clickId,hideId,e){
    var container = $(clickId);

    if (!container.is(e.target)&& container.has(e.target).length === 0) 
    {
        $(hideId).hide();
    } 
}
//#####################################################################################################
//#####################################################################################################


//برای نمایش یا مخفی کردن پنل جستجو
function Toggle(tagId,display="block") {
    var x = document.getElementById(tagId);
    if (x.style.display === "none") {
        x.style.display = display;
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
                document.getElementById('slider').style.backgroundImage ="url('../img/bgs/insurance-bg.jpg')";
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
    $('.tours.owl-carousel').owlCarousel({
        rtl:true,
        // center:true,
        loop:true,
        margin:10,
        dots:false,
        nav:true,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],

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

    $('.text-slider').owlCarousel({
        rtl:true,
        // center:true,
        loop:true,
        margin:1,
        nav:true,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],

        items:4,
        smartSpeed:450,
        autoplay:true,
    })



    // کلیک کردن روی دکمه ورود به سایت login
    // $("#login").click(function() {  
    //     // alert('hello');
    //     $(".login-container").toggle("slow");
        
    //   });

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

    function showProfilePanel(displayType="flex"){
        Toggle('profile-list',displayType);
    }


   //########################## TOSTER FLASH MESSAGE #######################################################
   function FlashMessage(msg) {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");
    
        // Add the "show" class to DIV
        x.innerHTML = msg;
        x.className = "show";
    
        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 8000);
    }
    //######################################################################################################








    function airlineName(code){
        localStorage.setItem('A3','Aegean Airlines');
        localStorage.setItem('AF','Air France');
        localStorage.setItem('AY','Finnair');
        localStorage.setItem('AZ','Alitalia');
        localStorage.setItem('BA','British Airways');
        localStorage.setItem('BE','Flybe');
        localStorage.setItem('BT','Air Baltic');
        localStorage.setItem('CZ','China Southern Airlines');
        localStorage.setItem('DY','Norwegian Air Shuttle');
        localStorage.setItem('EK','Emirates Airline');
        localStorage.setItem('EW','Eurowings');
        localStorage.setItem('EY','Etihad Airways');
        localStorage.setItem('G9','Air Arabia');
        localStorage.setItem('GF','Gulf Air Bahrain');
        localStorage.setItem('IB','Iberia Airlines');
        localStorage.setItem('J2','Azerbaijan Airlines');
        localStorage.setItem('KK','Atlasjet');
        localStorage.setItem('KL','KLM');
        localStorage.setItem('KU','Kuwait Airways');
        localStorage.setItem('LH','Lufthansa');
        localStorage.setItem('LX','Swiss Air Lines');
        localStorage.setItem('OS','Austrian Airlines');
        localStorage.setItem('OV','Estonian Air');
        localStorage.setItem('PC','Pegasus Airlines');
        localStorage.setItem('PS','Ukraine Airlines');
        localStorage.setItem('QR','Qatar Airways');
        localStorage.setItem('TK','Turkish Airlines');
        localStorage.setItem('VY','Vueling Airlines');
        localStorage.setItem('WY','Oman Air');
        
        //ایرلاینهای داخلی
        localStorage.setItem('W5','ماهان');
        localStorage.setItem('IV','کاسپین');
        localStorage.setItem('B9','ایرتور');
        localStorage.setItem('EP','آسمان');
        localStorage.setItem('JI','معراج');
        localStorage.setItem('I3','آتا');
        localStorage.setItem('ZV','زاگرس');
        localStorage.setItem('IR','ایران ایر');
        localStorage.setItem('HH','تابان');
        localStorage.setItem('AK','اترک');
        localStorage.setItem('QB','قشم ایر');
        localStorage.setItem('VR','وارش');
        localStorage.setItem('NV','کارون');
        localStorage.setItem('Y9','کیش ایر');
        localStorage.setItem('_007','هواپیمایی ساها');
    
        //اول چک میکنیم که قبلا تو لوکال ذخیره شده یا نه
        if(localStorage.getItem(code) !==null){
            return localStorage.getItem(code)
        }

        axios.get('/airlineName/'+code)
            .then(function (response) {
                localStorage.setItem(code,response.data[0].name);
                return response.data[0].name
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });


            
    }//function
    

    //تو این حالت از سشن استفاده میکنیم و سرعت لود سایت رو افزایش میدیم
    function airportName(code){

        //فرودگاه های بین المللی ایران
        localStorage.setItem('IKA','امام خمینی');
        localStorage.setItem('ABD','آبادان');
        localStorage.setItem('ACP','سهند');
        localStorage.setItem('ACZ','زابل');
        localStorage.setItem('ADU','اردبیل');
        localStorage.setItem('AEU','ابوموسی');
        localStorage.setItem('AFZ','سبزوار');
        localStorage.setItem('AHW','اهواز');
        localStorage.setItem('AJK','اراک');
        localStorage.setItem('AKW','آقاجاری');
        localStorage.setItem('AWZ','اهواز');
        localStorage.setItem('AZD','یزد');
        localStorage.setItem('BBL','بابلسر');
        localStorage.setItem('BDH','بندر لنگه');
        localStorage.setItem('BJB','بجنورد');
        localStorage.setItem('BND','بجنورد');
        localStorage.setItem('BUZ','بوشهر');
        localStorage.setItem('BXR','بام');
        localStorage.setItem('CKT','سرخس');
    
        //فرودگاه های داخلی ایران
        localStorage.setItem('CQD','شهرکرد');
        localStorage.setItem('DEF','دزفول');
        localStorage.setItem('GBT','گرگان');
        localStorage.setItem('GCH','گچساران');
        localStorage.setItem('GZW','قزوین');
        localStorage.setItem('HDM','همدان');
        localStorage.setItem('IFN','اصفهان');
        localStorage.setItem('IHR','ایرانشهر');
        localStorage.setItem('IIL','ایلام');
        localStorage.setItem('JAR','جهرم');
        localStorage.setItem('JWN','زنجان');
        localStorage.setItem('JYR','جیرفت');
        localStorage.setItem('KER','کرمان');
        localStorage.setItem('KHD','خرم آباد');
        localStorage.setItem('KHK','خارک');
        localStorage.setItem('KHY','خوی');
        localStorage.setItem('KIH','کیش');
        localStorage.setItem('MHD','مشهد');
        localStorage.setItem('NSH','نوشهر');
        localStorage.setItem('OMH','ارومیه');
        localStorage.setItem('PGU','فرودگاه خلیج فارس');
        localStorage.setItem('PYK','فرودگاه پیام');
        localStorage.setItem('QMJ','مسجد سلیمان');
        localStorage.setItem('RAS','رشت');
        localStorage.setItem('RJN','رفسنجان');
        localStorage.setItem('RUD','شاهرود');
        localStorage.setItem('RZR','رامسر');
        localStorage.setItem('SDG','سنندج');
        localStorage.setItem('SYZ','شیراز');
        localStorage.setItem('TBZ','تبریز');
        localStorage.setItem('TCX','طبس');
        localStorage.setItem('THR','مهرآباد');
        localStorage.setItem('XBJ','بیرجند');
        localStorage.setItem('YES','یاسوج');
        localStorage.setItem('ZAH','زاهدان');
    
        //فرودگاه های بین المللی
        localStorage.setItem('DXB','دبی');
        localStorage.setItem('LGW','لندن');
        localStorage.setItem('IST','استانبول');
        localStorage.setItem('STN','لندن');
    
        localStorage.setItem('DOH','دوحه');
        localStorage.setItem('FRA','فرانکفورت');
        localStorage.setItem('SAW','استانبول');
        localStorage.setItem('KBP','کی اف');
        localStorage.setItem('KWI','کویت');
        localStorage.setItem('STN','لندن');
        localStorage.setItem('LCY','لندن');
        localStorage.setItem('LHR','لندن');
        localStorage.setItem('LGW','لندن');
        localStorage.setItem('SVO','مسکو');
        localStorage.setItem('MUC','مونیخ');
        localStorage.setItem('MCT','مسقط');
        localStorage.setItem('VIE','وی انا');
        localStorage.setItem('ZRH','زوریخ');
        localStorage.setItem('YYZ','ونکوور ');
        localStorage.setItem('GYD','حیدر علی اف');
    
        
        //اول چک میکنیم که قبلا تو لوکال ذخیره شده یا نه
        if(localStorage.getItem(code)){
            return localStorage.getItem(code)
        }

        axios.get('/airportName/'+code)
            .then(function (response) {
                localStorage.setItem(code,response.data[0].name);
                return response.data[0].name;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });

    }
    
    
      // نوع کابین Y - 1 - Economy S - 2 - Premium Economy C - 3 - Business J - 4 -
      // Premium Business F - 5 - First P - 6 - Premium First Default - 100 - Default
    
      function checkCabinType(cabin){
        let cabins = [];
        cabins[1]='Economy-H';
        cabins[2]='Premium Economy-S';
        cabins[3]='Business-C';
        cabins[4]='Premium Business-J';
        cabins[5]='First-F';
        cabins[6]='Premium First-P';
        if(cabin in cabins){
            return cabins[cabin];
        }
        return cabin;
      }
    
      function formatCurrency(value) {
        return value.toLocaleString();
      }
    
      function formatInsideTagMoney(tagName) {
        var divs = document.getElementsByName(tagName);
        for (let index = 0; index < divs.length; index++) {
          divs[index].innerText = formatCurrency(divs[index].innerText);
    
        }
      }
    
      function calcaulateTravelTime(time){
        let hour = parseInt(time / 60);
        let min = time % 60;
        // this.travelTime="2 ساعت و 25 دقیقه";
        return `${hour} ساعت و ${min} دقیقه`;
      }
    
      //تبدیل تاریخ میلادی به شمسی
      function shamsiDate(Date){
        return moment(Date).format('jYYYY/jM/jD HH:mm')
      }

      //تبدیل تاریخ شمسی به میلادی
      function shamsiToMiladi(Date){
          return moment(Date,'jYYYY/jM/jD').format('YYYY/M/D')
      }

    
    //فرمت بندی تاریخ میلادی
    function FormatMiladiDate(requestedDate){
        let OldDate = new Date(requestedDate);
        let formatted_date = OldDate.getFullYear() + "/" + (OldDate.getMonth() + 1) + "/" + OldDate.getDate();
        return formatted_date;
    }
    
    //فرمت بندی تاریخ میلادی بهمراه ساعت
    function FormatMiladiDateHour(requestedDate){
    let OldDate = new Date(requestedDate);
    let formatted_date = OldDate.getFullYear() + "/" + (OldDate.getMonth() + 1) + "/" + OldDate.getDate() + " " + OldDate.getHours() + ":" + OldDate.getMinutes() + ":" + OldDate.getSeconds();
    
    return formatted_date;
    }
    
    //پیدا کردن مقادیر غیر تکراری آرایه ها
    function onlyUnique(value, index, self){ 
        return self.indexOf(value) === index;
    }
    
    //نمایش روز و ماه شمسی
    function ShowDay(miladiDate){
        // moment.locale("fa");
        // moment.loadPersian();
        return moment(miladiDate).format(' Do jMMMM jYYYY');
    }

//شمارش تعداد مسافران
//مقدار داخل تگ مشخصی را با فرمت مناسب پول جایگزین میکند
function passengersCount() {
    let arr = ['adult','child','infant'];
    arr.map((item)=>{
        var divs = document.getElementsByName(item);
        for (var i = 0; i < divs.length; i++) {
            divs[i].innerText = localStorage.getItem(item,'0');
        } //for
    })

}//function

 //تبدیل کد رشته زمان به تاریخ میلادی
 //1254452541=2015/01/17
 function MiladiFormat(inputValue) {
    if (!inputValue)
      return '';
    return inputValue.locale('en').format('YYYY/MM/DD hh:mm:ss');
}

//تغییر فرمت میلادی به فرمت قابل فهم برای وب سرویس
  //کلا باید تاریخ میلادی به وب سرویس ارسال بشه
function PartoDateFormat(inputValue) {

    if (!inputValue)
      return '';
    return moment(inputValue).locale('en').format('YYYY-MM-DDThh:mm:ss');
  }
  
 function farsiCounter(index){
    switch (index) {
        case 1:
            return 'اول'
            break;
        case 2:
            return 'دوم'
            break;
        case 3:
            return 'سوم'
            break;
        case 4:
            return 'چهارم'
            break;
        case 5:
            return 'پنجم'
            break;
    
        default:
            return index
            break;
    }
}

function farsiRate(rate){
    switch (rate) {
        case 0:
        case 1:
            return 'ضعیف'
            break;
        case 2:
        case 3:
            return 'متوسط'
            break;

        case 4:
            return 'خوب'
            break;

        case 5:
            return 'عالی'
            break;
        default:
            return 'ضعیف'
            break;
    }
}


function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function between(x, min, max) {
    return x >= min && x <= max;
  }


$(document).ready(function () {
    //تنظیم مبدا و مقصد پروازهای داخلی
    if(localStorage.getItem('origin') !== null){

        $("select#inline_origin").val(localStorage.getItem('origin'));
    }
    if(localStorage.getItem('destination') !== null){

        $("select#inline_destination").val(localStorage.getItem('destination'));
    }

    // $('.hotelCity').select2({
    //     // placeholder: "Choose tags...",
    //     // language: "fa",
    //     language: {
    //         // You can find all of the options in the language files provided in the
    //         // build. They all must be functions that return the string that should be
    //         // displayed.
    //             inputTooShort: function () {
    //                 return "حداقل سه کاراکتر از نام شهر مقصد را وارد نمایید.";
    //             }
    //         },

    //     minimumInputLength: 3,
    //     ajax: {
    //         url: '/cityHotel',
    //         dataType: 'json',
    //         data: function (params) {
    //             return {
    //                 q: $.trim(params.term)
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: data
    //             };
    //         },
    //         cache: true
    //     }
    // });

  
})


//بستن منوی کاربری وقتی روی جای دیگری کلیک بشه 
// $("#profile-list").focusout(function() {
//     alert(1)
//     $('#profile-list').hide();

// });
// $(document).not("#profile-list").click(function() {
//     alert(2)
//     $('#profile-list').hide();
// });

// $('body').click(function(evt) {
//     if($(evt.target).parents('#showProfilePanel').length==1) {
//         $('#profile-list').hide();
//     }
//     // console.log($(evt.target).parents('#profile-list'));
// });


