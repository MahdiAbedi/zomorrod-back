@extends('master')

@section('body')
<!-- ################################### صفحه وارد کردن اطلاعات مسافران ######################## -->

    <!-- ورود اطلاعات مسافران -->  
    <main id="passengerInfos"  style="display:block">

        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="order-steps container">
            <ul class="flex-between travelers-info">
                <li>
                    <span>جستجو</span>
                    <!-- <i class="fa fa-check circle"></i> -->
                    <i class="far fa-check-circle circle"></i>
                </li>
                <li>
                    <span>انتخاب پرواز</span>
                    <i class="far fa-check-circle circle green"></i>
                </li>
                <li>
                    <span>اطلاعات مسافران</span>
                    <i class="fa fa-plane choose-plane green"></i>

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
        <form action="/goToBank" method="POST">
        @csrf
        <div class="container">
            <!-- بخش نمایش بلیط رفت انتخاب شده و انتظار برای انتخاب بلیط برگشت -->
            <div class="ticket-preview" id="ticketPreview">
                <!-- اطلاعات بلیط رفت و برگشت -->
            </div>
            <!-- قسمتی که دکمه های اضافه کردن اطلاعات مسافران هست -->
            <section class="btn-container">
                <a href="#" class="info btn btn-green"><i class="fas fa-chevron-circle-left"></i> لطفا اطلاعات مسافران
                    را وارد نمایید.</a>

                <div class="add-btn">
                    <a href="#" class="title"><span name="adult">1</span> بزرگسال</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
                <div class="add-btn">
                    <a href="#" class="title"><span name="child">0</span> کودک</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
                <div class="add-btn">
                    <a href="#" class="title"><span name="infant">0</span> نوزاد</a>
                    <a href="#" class="action"><i class="fas fa-plus"></i></a>
                </div>
            </section>

            <!-- تب اطلاعات مسافران -->
            <div id="PassengerInfo">
            <!-- ############################ ورود اطلاعات مسافران ################################## -->

            </div>

            <!-- اطلاعات تماس -->
            <div class="contact-info">

                <a href="#" class="info btn btn-green"><i class="fas fa-chevron-circle-left"></i>اطلاعات تماس</a>
                <input type="text" placeholder="ایمیل" name="passengerEmail" id="passengerEmail" value="mahdiabedi220@yahoo.com">
                <input type="text" name="passengerTel" placeholder="تلفن همراه" id="passengerTel" value="09395187902">
                <div class="info">
                    <input type="checkbox" name="confirm" id="confirm" checked>
                    <label for="confirm">
                        <a href="#">قوانین سایت</a> و <a href="#">قوانین پرواز</a> را مطالعه کرده ام و آنرا تایید میکنم.
                    </label>
                </div>
            </div>

            <a class="btn btn-zgreen continue-btn" onclick="showConfirmDate()">ادامه فرآیند خرید</a>
        </div>


    </main>
<!-- ######################################## صفحه تایید اطلاعات ################################ -->
    <!-- تایید اطلاعات کاربر -->
    <main id="confirmData" style="display:none">
        <!-- نمایش مراحل انتخاب و خرید -->
        <div class="order-steps container">
            <ul class="flex-between confirm-info">
                <li>
                    <span>جستجو</span>
                    <!-- <i class="fa fa-check circle"></i> -->
                    <i class="far fa-check-circle circle"></i>
                </li>
                <li>
                    <span>انتخاب پرواز</span>
                    <i class="far fa-check-circle circle green"></i>
                </li>
                <li>
                    <span>اطلاعات مسافران</span>
                    <i class="far fa-check-circle circle green"></i>

                </li>
                <li>
                    <span>تائید اطلاعات</span>
                    <i class="fa fa-plane choose-plane"></i>
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

        <div class="container">
            <!-- اطلاعیه و هشدار بالای صفحه -->
            <div class="notices">
                <p><i class="fas fa-chevron-circle-left green"></i>لطفا اطلاعات وارد شده را کنترل کرده و پس از اطمینان
                    از درستی آنها،برای پرداخت هزینه اقدام نمایید.</p>
                <div class="flex-between">
                    <p><i class="fas fa-chevron-circle-left green"></i>توجه فرمایید:در صورتی که اطلاعات زیر را اشتباه
                        وارد نموده اید و یا نیاز به تغییر آن دارید،میتوانید از دکمه بازگشت استفاده کنید.</p>
                    <a onclick="hideConfirmDate()" class="btn btn-zgreen">بازگشت</a>
                </div>
            </div>

            <!-- پنل -->
            <!-- اطلاعات بلیط -->
            <div class="panel">
                <div class="title">اطلاعات بلیط</div>
                <div class="body  ticket-info-confirm" id="ticketConfirm">
                <!-- #################### نمایش اطلاعات بلیط رفت و برگشت هنگام تایید اطلاعات مسافر ############################### -->

                </div>
            </div>

            <!-- درخواست دهنده -->
            <div class="panel">
                <div class="title">درخواست دهنده</div>
                <div class="body">

                    <table class="gray-title">
                        <thead>
                            <tr>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>شماره موبایل</th>
                                <th>موجودی حساب</th>

                            </tr>
                        </thead>
                        <tr>
                            <td>{{(Auth::check()) ? Auth::user()->name : '-'}}</td>
                            <td id="emailPreview">-</td>
                            <td id="telPreview">-</td>
                            <td>0 <span>ریال</span></td>

                        </tr>

                    </table>
                </div>
            </div>

            <!-- مشخصات مسافران -->
            <div class="panel">
                <div class="title">مشخصات مسافران </div>
                <div class="body">
                    
                    <div class="passenger-info" id="passengerInfoConfirm">
                    <!-- ######################### تایید اطلاعات مسافران #############################   -->
                            
                    </div>
                </div>
            </div>

            <!-- کد تخفیف -->
            <div class="panel">
                <div class="title">کد تخفیف</div>
                <div class="body flex-between">
                    
                    <p>لطفا جهت اعمال تخفیف روی بلیط،کد تخفیف خود را وارد کنید و دکمه <<بررسی و اعمال کد>>  برای بزنید</p>
                    <div class="flex coupon">
                        <input type="text" name="" id="coupon">
                        <a href="#" class="btn btn-zgreen">بررسی و اعمال کد</a>
                    </div>
                </div>
            </div>


            <div class="pay">
                <a href="#" class="btn btn-transparent">مبلغ قابل پرداخت:<span id="finalPrice"></span> <span>ریال</span></a>
                <button href="#" class="btn btn-zgreen" type="submit" id="payBtn">پرداخت آنلاین</button>
            </div>

        </div>



    </main>
    </form>
<script>
document.getElementById('finalPrice').innerText=parseInt(localStorage.getItem('TicketPrice')).toLocaleString();
let ticket = JSON.parse(localStorage.getItem('ticket'));
//#################################### نمایش صفحه تایید اطلاعات وارد شده مسافران ################################
function showConfirmDate(){

    //############################# REVALIDATE TICKET BEFORE CONTINUE #############################################
    // axios.get('/airRevalidate')
    // .then((response) =>{
    //     // IF VALIDATE THE TICKET SHOW THE USER INFO PAGE ELSE STAY HERE
    //     if(response.data){
    //     }else{
    //       FlashMessage('هم اکنون ظرفیت این پرواز تکمیل گردیده است لطفا مجددا جستجو بفرمایید.');
    //     //   setInterval(function(){ window.location.replace("/"); }, 3000);

    //     }
    // })
    // .catch( (error)=> {
    //   console.log(error);
    //   FlashMessage('خطایی هنگام بررسی بلیط انتخاب شده رخ داده است لطفا با پشتیبانی سایت تماس حاصل بفرمایید.')
    // });


    //####################### ارسال اطلاعات مسافران برای ذخیره در دیتا بیس #########################
    passengerInfoConfirm()
    //ثبت اطلاعات اتوماتیک برای تایید
    document.getElementById('emailPreview').innerText=document.getElementById('passengerEmail').value;
    document.getElementById('telPreview').innerText=document.getElementById('passengerTel').value;
    
    document.getElementById("passengerInfos").style.display = "none";    //نمایش صفحه تایید
    document.getElementById("confirmData").style.display = "block";     //محفی کردن صفحه ورود اطلاعات

    // FlashMessage('مشکلی در رزرو بلیط شما رخ داده است لطفا با پشتیبانی سایت تماس بگیرید و یا پس از مدتی دوباره تلاش بفرمایید.')
}
//#################################### مخفی کردن صفحه تایید اطلاعات وارد شده مسافران ################################
function hideConfirmDate(){
    document.getElementById("confirmData").style.display = "none";    
    document.getElementById("passengerInfos").style.display = "block";    
}
//################################### پیش نمایش اطلاعات پرواز ####################################################
function CreateTicketPreview(){
    //if ticketPreview does not have '' value it's print undefinde on the screen (MahdiAbedi220@yahoo.com)
    let ticketPreview='';
    ticket.OriginDestinationOptions.map((item,index)=>{
        //برای اینکه اگر توقفی در مسیر بود فقط بلیط مسیر رفت و بلیط آخرین مسیر را نشون بده
        // if(index==0 || index == ticket.OriginDestinationOptions.length-1){

            ticketPreview += `
                <div class="went-ticket">
                    <div class="inner-ticket ticket-container">
                        <section class="single-ticket flex-between">
                            <div class="ticket_type">${item.FlightSegments[0].IsCharter ? 'چارتر': 'سیستمی'}</div>
                            <div class="legs">
                                <!-- لگ رفت و برگشت -->
                                <!-- لگ رفت -->
                                <div class="first-leg leg flex-between">
                                    <div class="logoes ">
                                        <img src="/img/airlines-logo/${item.FlightSegments[0].MarketingAirlineCode}.png" alt="">
                                    </div>
                                    <p class="destination">${airportName(item.FlightSegments[0].DepartureAirportLocationCode)} <span>${moment(item.FlightSegments[0].DepartureDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                                    <i class="fa fa-plane rotate-right green"></i>
                                    <p class="destination">${airportName(item.FlightSegments[0].ArrivalAirportLocationCode)} <span>${moment(item.FlightSegments[0].ArrivalDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>
                                    
                                </div>

                                <section class="inner-flight-detail ticket-detail">
                                    <!-- جزییات پرواز داخلی -->
                                    <div class="flight-detail">
                                        <div class="row">
                                            <span>کلاس پروازی : </span>
                                            <span>${checkCabinType(item.FlightSegments[0].CabinClassCode)}</span>
                                        </div>
                                        <div class="row">
                                            <span>شماره پرواز : </span>
                                            <span>${item.FlightSegments[0].FlightNumber}</span>
                                        </div>
                                        
                                        <div class="row">
                                            <span>طول پرواز : </span>
                                            <span>${item.FlightSegments[0].JourneyDuration}</span>
                                        </div>
                                    </div>

                                    <!-- قیمت هر بلیط -->
                                    <table class="ticket-price">
                                        <tbody><tr>
                                            <td>تعداد بزرگسال</td>
                                            <td ><span name="adult"></span> نفر</td>
                                        </tr>
                                        <tr>
                                            <td>تعداد خردسال</td>
                                            <td ><span name="child"></span> نفر</td>
                                        </tr>
                                        <tr>
                                            <td>تعداد نوزاد</td>
                                            <td ><span name="infant"></span> نفر</td>
                                        </tr>
                                        
                                    </tbody></table>

                                </section>

                            </div>
                        </section>



                    </div>
                </div>`;

    })//map
    document.getElementById('ticketPreview').innerHTML = ticketPreview;
}//CreateTicketPreview

//################################### تایید اطلاعات بلیط رفت و برگشت #############################################
function ticketConfirm(){
    // let ticketConfirm='';
    // ticket.OriginDestinationOptions.map((item,index)=>{
    //     //برای اینکه اگر توقفی در مسیر بود فقط بلیط مسیر رفت و بلیط آخرین مسیر را نشون بده
    //     // if(index==0 || index == ticket.OriginDestinationOptions.length-1){

    //         ticketConfirm += `
    //                 <div class="half">
    //                     <h3 class="green"><span>&#11044 </span>بلیط رفت</h3>

    //                     <table>
    //                         <thead>
    //                             <tr>
    //                                 <th>شرکت هواپیمایی</th>
    //                                 <th>${airlineName(item.FlightSegments[0].MarketingAirlineCode)}</th>

    //                             </tr>
    //                         </thead>
    //                         <tr>
    //                             <td>مبدا</td>
    //                             <td>${airportName(item.FlightSegments[0].DepartureAirportLocationCode)}</td>

    //                         </tr>
    //                         <tr>
    //                             <td>مقصد</td>
    //                             <td>${airportName(item.FlightSegments[0].ArrivalAirportLocationCode)}</td>
    //                         </tr>
    //                         <tr>
    //                             <td>تاریخ و ساعت پرواز</td>
    //                             <td>${ShowDay(item.FlightSegments[0].DepartureDateTime)} ساعت ${moment(item.FlightSegments[0].DepartureDateTime).format('HH:mm')}</td>
    //                         </tr>
    //                         <tr>
    //                             <td>شماره پرواز</td>
    //                             <td>${item.FlightSegments[0].FlightNumber}</td>
    //                         </tr>
    //                         <tr>
    //                             <td>کلاس پروازی</td>
    //                             <td>${checkCabinType(item.FlightSegments[0].CabinClassCode)}</td>
    //                         </tr>
    //                         <tr>
    //                             <td>طول پرواز</td>
    //                             <td>${item.FlightSegments[0].JourneyDuration} ساعت</td>
    //                         </tr>
    //                     </table>
    //                 </div>`;

    // })//map
    // document.getElementById('ticketConfirm').innerHTML = ticketConfirm;
}//CreateTicketPreview
//###################################تایید اطلاعات کاربران  #######################################################
function passengerInfoConfirm(){
    let ticketConfirm   ='';
    var PassengerFirstName  = document.getElementsByClassName("PassengerFirstName");
    var PassengerLastName   = document.getElementsByClassName("PassengerLastName");
    var gender              = document.getElementsByClassName("gender");
    var DateOfBirth         = document.getElementsByClassName("DateOfBirth");
    var Country             = document.getElementsByClassName("Country");
    var PassportNumber      = document.getElementsByClassName("PassportNumber");
    var IssueDate           = document.getElementsByClassName("IssueDate");
    var ExpireDate          = document.getElementsByClassName("ExpireDate");
    var PassengerCodeMeli   = document.getElementsByClassName("PassengerCodeMeli");
    var PassengerType       = document.getElementsByClassName("PassengerType");//GET PASSENGER TYPE ADULT=1 , CHILD=2 ,INFANT=3 
    


    var AirTravelers = [];//اطلاعات مسافران برای بوک کردن 
    var AirBookingData = '';

        // console.log(PassengerFirstName)
        for (let index = 0; index < PassengerFirstName.length; index++) {
            // console.log(PassengerFirstName[index].value)
            ticketConfirm += `
                    <h3 class="green"><span>&#11044 </span>بزرگسال</h3>
                    <table class="gray-title">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>جنسیت</th>
                                    <th>تاریخ تولد</th>
                                    <th>کد ملی</th>
                                    <th>شماره پاسپورت</th>
                                    <th>اعتبار پاسپورت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>${PassengerFirstName[index].value}</td>
                                <td>${PassengerLastName[index].value}</td>
                                <td>${gender[index].options[gender[index].selectedIndex].text}</td>
                                <td>${(DateOfBirth[index].value)}</td>
                                <td>${(PassengerCodeMeli[index].value)}</td>
                                <td>${PassportNumber[index].value}</td>
                                <td>${(ExpireDate[index].value)}</td>
                                <td><a href="#" onclick="hideConfirmDate('hello')">ویرایش</a></td>

                            </tr>
    
                    </table>`;

        //#################################################################################################################
        //#################################################################################################################
            /*
                ####### PASSENGER TITLE ############
                Mr  =   0,  Adult - Male
                Mrs =   1,  Adule - Female
                Ms  =   2,  Adule - Female
                Miss=   3,  Child,Infant - Female
                Mstr=   4,  Child,Infant - Male

                ####### PASSENGER TYPE ############
                ADULT   =   1,
                CHILD   =   2,
                INFANT  =   3

            */


            let passengerTitle=0;
            // console.log(typeof PassengerType[index].value);
            // console.log(PassengerType[0].value)
            /** NOW WE HAVE TO CHECK IF PASSENGER IS ADULT OR CHILD OR INFANT WHAT SHOULD BE IT'S TITLE */
            switch (PassengerType[index].value) {
                
                case "1":
                    //PASSENGER IS ADULT
                    if(gender[index].value=="0"){
                        passengerTitle ="MR";
                    }else{
                        passengerTitle ="MRS";
                    }
                    break;
                    
                default:
                    //PASSENGER IS CHILD OR INFANT
                    if(gender[index].value=="0"){passengerTitle = "Mstr"}  //Mstr
                    else{passengerTitle = "Miss"}                        //Miss
                    break;
            }
            // alert(pasengerTitle)

            AirTravelers.push(
               {
                    DateOfBirth   : PartoDateFormat(shamsiToMiladi(DateOfBirth[index].value)),
                    Gender        : gender[index].selectedIndex,
                    PassengerType : PassengerType[index].value,
                    PassengerName : {
                        PassengerFirstName   :    PassengerFirstName[index].value,
                        PassengerMiddleName  :    "",
                        PassengerLastName    :    PassengerLastName[index].value,
                        PassengerTitle       :    passengerTitle
                        },
                    Passport: {
                        Country           :    (Country[index].value),
                        ExpiryDate        :    PartoDateFormat(shamsiToMiladi(ExpireDate[index].value)),
                        IssueDate         :    "",
                        PassportNumber    :    PassportNumber[index].value
                        },
                    NationalId            : PassengerCodeMeli[index].value,
                    Nationality           : Country[index].value,
                    ExtraServiceId        : [],
                    FrequentFlyerNumber   : "",
                    SeatPreference        : 0,
                    MealPreferenc         : 0,
                    Wheelchair            : false
                }
            );

        }//for

        let phoneNumber =    document.getElementById('passengerTel').value;
        let Email       =    document.getElementById('passengerEmail').value;
        AirBookingData = {
            FareSourceCode: localStorage.getItem('FareSourceCode'),
            SessionId: '',
            ClientUniqueId: "ST"+Math.ceil(Math.random() * 100000),
            MarkupForAdult: 0.0,
            MarkupForChild: 0.0,
            MarkupForInfant: 0.0,
            TravelerInfo: {
                PhoneNumber   :    phoneNumber,
                Email         :    Email,
                AirTravelers  :    AirTravelers
            }
        };
        // console.log(JSON.parse(AirBookingData))
        // console.log(JSON.stringify(AirBookingData))
        axios.post('/SaveBookingDate', {
            AirBookingData:AirBookingData,
            TicketPrice:localStorage.getItem('TicketPrice')
        })
        .then(function (response) {
            // console.log(response.data);
            // return true;
            
        })
        .catch(function (error) {
            // console.log(error);
            // return false;
        });
   
    // console.log(JSON.parse(AirBookingData));
    document.getElementById('passengerInfoConfirm').innerHTML = ticketConfirm;
}//CreateTicketPreview



//#################################### SAVE BOOKING DATA IN DATABASE ###############################################

//#################################### اجرای توابع بعد از بارگزاری صفحه###########################################
window.onload =()=>{
    CreateTicketPreview();
    passengersCount();
    ticketConfirm();
    
}




</script>
@endsection
