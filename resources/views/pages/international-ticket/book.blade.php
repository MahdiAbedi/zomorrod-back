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
        <form action="/international/factor" method="POST">
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
                <input type="text" placeholder="ایمیل" name="passengerEmail" id="passengerEmail">
                <input type="text" name="passengerTel" placeholder="تلفن همراه" id="passengerTel">
                <div class="info">
                    <input type="checkbox" name="confirm" id="confirm">
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
                <a href="#" class="btn btn-transparent">مبلغ قابل پرداخت:22,488,000 <span>ریال</span></a>
                <button href="#" class="btn btn-zgreen" type="submit">پرداخت آنلاین</button>
            </div>

        </div>



    </main>
    </form>
<script>
let ticket = JSON.parse(localStorage.getItem('ticket'));
function showConfirmDate(){
    passengerInfoConfirm();
    //ثبت اطلاعات اتوماتیک برای تایید
    document.getElementById('emailPreview').innerText=document.getElementById('passengerEmail').value;
    document.getElementById('telPreview').innerText=document.getElementById('passengerTel').value;
    
    // document.getElementById("passengerInfos").style.display = "none";    //نمایش صفحه تایید
    // document.getElementById("confirmData").style.display = "block";     //محفی کردن صفحه ورود اطلاعات
}
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
    let ticketConfirm='';
    ticket.OriginDestinationOptions.map((item,index)=>{
        //برای اینکه اگر توقفی در مسیر بود فقط بلیط مسیر رفت و بلیط آخرین مسیر را نشون بده
        // if(index==0 || index == ticket.OriginDestinationOptions.length-1){

            ticketConfirm += `
                    <div class="half">
                        <h3 class="green"><span>&#11044 </span>بلیط رفت</h3>

                        <table>
                            <thead>
                                <tr>
                                    <th>شرکت هواپیمایی</th>
                                    <th>${airlineName(item.FlightSegments[0].MarketingAirlineCode)}</th>

                                </tr>
                            </thead>
                            <tr>
                                <td>مبدا</td>
                                <td>${airportName(item.FlightSegments[0].DepartureAirportLocationCode)}</td>

                            </tr>
                            <tr>
                                <td>مقصد</td>
                                <td>${airportName(item.FlightSegments[0].ArrivalAirportLocationCode)}</td>
                            </tr>
                            <tr>
                                <td>تاریخ و ساعت پرواز</td>
                                <td>${ShowDay(item.FlightSegments[0].DepartureDateTime)} ساعت ${moment(item.FlightSegments[0].DepartureDateTime).format('HH:mm')}</td>
                            </tr>
                            <tr>
                                <td>شماره پرواز</td>
                                <td>${item.FlightSegments[0].FlightNumber}</td>
                            </tr>
                            <tr>
                                <td>کلاس پروازی</td>
                                <td>${checkCabinType(item.FlightSegments[0].CabinClassCode)}</td>
                            </tr>
                            <tr>
                                <td>طول پرواز</td>
                                <td>${item.FlightSegments[0].JourneyDuration} ساعت</td>
                            </tr>
                        </table>
                    </div>`;

    })//map
    document.getElementById('ticketConfirm').innerHTML = ticketConfirm;
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

    var AirTravelers = [];//اطلاعات مسافران برای بوک کردن 
    var AirBookingData = '';

        
        for (let index = 0; index < PassengerFirstName.length; index++) {
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



            AirTravelers.push(
               {
                    DateOfBirth   : "1992-12-17T05:25:07",
                    Gender        : gender[index].selectedIndex,
                    PassengerType : "1",
                    PassengerName : {
                        PassengerFirstName   :    PassengerFirstName[index].value,
                        PassengerMiddleName  :    "",
                        PassengerLastName    :    PassengerLastName[index].value,
                        PassengerTitle       :    1
                        },
                    Passport: {
                        Country           :    (Country[index].value),
                        ExpiryDate        :    PartoDateFormat(ExpireDate[index].value),
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
            ClientUniqueId: "R123456",
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
        console.log(JSON.stringify(AirBookingData))
        axios.post('/AirBooking', {
            AirBookingData:AirBookingData
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
   
    // console.log(JSON.parse(AirBookingData));
    document.getElementById('passengerInfoConfirm').innerHTML = ticketConfirm;
}//CreateTicketPreview

//#################################### اجرای توابع بعد از بارگزاری صفحه###########################################
window.onload =()=>{
    CreateTicketPreview();
    passengersCount();
    ticketConfirm();
    
}


</script>
@endsection
