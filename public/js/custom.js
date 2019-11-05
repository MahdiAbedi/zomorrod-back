$(document).ready(function () {

    $('.select2').select2();

    // showSearchPanel("HotelTicket");
    //درخواست لیست فرودگاه های بین المللی
        

    //#################### حرکت بین فیلدهای جستجو در صفحه اول ########################



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



















    function airlineName(code){
    
        let airlines = [];
        airlines['A3']='Aegean Airlines';
        airlines['AF']='Air France';
        airlines['AY']='Finnair';
        airlines['AZ']='Alitalia';
        airlines['BA']='British Airways';
        airlines['BE']='Flybe';
        airlines['BT']='Air Baltic';
        airlines['CZ']='China Southern Airlines';
        airlines['DY']='Norwegian Air Shuttle';
        airlines['EK']='Emirates Airline';
        airlines['EW']='Eurowings';
        airlines['EY']='Etihad Airways';
        airlines['G9']='Air Arabia';
        airlines['GF']='Gulf Air Bahrain';
        airlines['IB']='Iberia Airlines';
        airlines['J2']='Azerbaijan Airlines';
        airlines['KK']='Atlasjet';
        airlines['KL']='KLM';
        airlines['KU']='Kuwait Airways';
        airlines['LH']='Lufthansa';
        airlines['LX']='Swiss Air Lines';
        airlines['OS']='Austrian Airlines';
        airlines['OV']='Estonian Air';
        airlines['PC']='Pegasus Airlines';
        airlines['PS']='Ukraine Airlines';
        airlines['QR']='Qatar Airways';
        airlines['TK']='Turkish Airlines';
        airlines['VY']='Vueling Airlines';
        airlines['WY']='Oman Air';
        
        //ایرلاینهای داخلی
        airlines['W5']='ماهان';
        airlines['IV']='کاسپین';
        airlines['B9']='ایرتور';
        airlines['EP']='آسمان';
        airlines['JI']='معراج';
        airlines['I3']='آتا';
        airlines['ZV']='زاگرس';
        airlines['IR']='ایران ایر';
        airlines['HH']='تابان';
        airlines['AK']='اترک';
        airlines['QB']='قشم ایر';
        airlines['VR']='وارش';
        airlines['NV']='کارون';
        airlines['Y9']='کیش ایر';
    
        if(code in airlines){
            return airlines[code];
        }
        return code;
    }
    
    //نام فرودگاه ها بر اساس کد یاتا
    function airportName(code){
        
        let airports = [];
        //فرودگاه های بین المللی ایران
        airports['IKA']='امام خمینی';
        airports['ABD']='آبادان';
        airports['ACP']='سهند';
        airports['ACZ']='زابل';
        airports['ADU']='اردبیل';
        airports['AEU']='ابوموسی';
        airports['AFZ']='سبزوار';
        airports['AHW']='اهواز';
        airports['AJK']='اراک';
        airports['AKW']='آقاجاری';
        airports['AWZ']='اهواز';
        airports['AZD']='یزد';
        airports['BBL']='بابلسر';
        airports['BDH']='بندر لنگه';
        airports['BJB']='بجنورد';
        airports['BND']='بجنورد';
        airports['BUZ']='بوشهر';
        airports['BXR']='بام';
        airports['CKT']='سرخس';
    
        //فرودگاه های داخلی ایران
        airports['CQD']='شهرکرد';
        airports['DEF']='دزفول';
        airports['GBT']='گرگان';
        airports['GCH']='گچساران';
        airports['GZW']='قزوین';
        airports['HDM']='همدان';
        airports['IFN']='اصفهان';
        airports['IHR']='ایرانشهر';
        airports['IIL']='ایلام';
        airports['JAR']='جهرم';
        airports['JWN']='زنجان';
        airports['JYR']='جیرفت';
        airports['KER']='کرمان';
        airports['KHD']='خرم آباد';
        airports['KHK']='خارک';
        airports['KHY']='خوی';
        airports['KIH']='کیش';
        airports['MHD']='مشهد';
        airports['NSH']='نوشهر';
        airports['OMH']='ارومیه';
        airports['PGU']='فرودگاه خلیج فارس';
        airports['PYK']='فرودگاه پیام';
        airports['QMJ']='مسجد سلیمان';
        airports['RAS']='رشت';
        airports['RJN']='رفسنجان';
        airports['RUD']='شاهرود';
        airports['RZR']='رامسر';
        airports['SDG']='سنندج';
        airports['SYZ']='شیراز';
        airports['TBZ']='تبریز';
        airports['TCX']='طبس';
        airports['THR']='مهرآباد';
        airports['XBJ']='بیرجند';
        airports['YES']='یاسوج';
        airports['ZAH']='زاهدان';
    
        //فرودگاه های بین المللی
        airports['DXB']='دبی';
        airports['LGW']='لندن';
        airports['IST']='استانبول';
        airports['STN']='لندن';
    
        airports['DOH']='دوحه';
        airports['FRA']='فرانکفورت';
        airports['SAW']='استانبول';
        airports['KBP']='کی اف';
        airports['KWI']='کویت';
        airports['STN']='لندن';
        airports['LCY']='لندن';
        airports['LHR']='لندن';
        airports['LGW']='لندن';
        airports['SVO']='مسکو';
        airports['MUC']='مونیخ';
        airports['MCT']='مسقط';
        airports['VIE']='وی انا';
        airports['ZRH']='زوریخ';
        airports['YYZ']='ونکوور ';
        airports['GYD']='حیدر علی اف';
    
    
    
        if(code in airports){
            return airports[code];
        }
        return code;
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
          divs[index].innerText = formatCurrency(divs[i].innerText);
    
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
