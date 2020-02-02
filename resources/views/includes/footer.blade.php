 <!-- منوی پایین -->


    <footer>
        <div class="footer container">
            <div class="newsletter">
                <input type="button" id="newletterBtn" onclick="submitNewsLetter()" class="btn btn-zgreen" value="ارسال خبرنامه"><i class="icon-search"></i>
                <input type="email" id="newsletter" class="left-border right-border"
                    placeholder="برای دریافت آخرین اخبار تورها ایمیل خود را وارد نمایید." contenteditable="false">
                <p id="successNewsLetter" style="display:none">ایمیل شما با موفقیت ثبت شد</p>

            </div>
            <div class="social_icons">
                <a href="https://www.instagram.com/setarehzomorrod" rel="nofollow" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/setarehzomorrod" rel="" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/setarehzomorrod" rel="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://plus.google.com/setarehzomorrod" rel="" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://telegram.me/setarehzomorrod" rel="nofollow" target="_blank"><i class="fab fa-telegram-plane"></i></a> 
                <a href="https://www.youtube.com/channel/setarehzomorrod" rel="nofollow" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.linkedin.com/company/setarehzomorrod" rel="nofollow" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer flex container">
            <div class="footer1">
                <div class="about">
                    <h3>مهمترین لینکها</h3>
                    <div class="flex">
                        <ul>
                            <li><a href="">بلیط هواپیما</a></li>
                            <li><a href="">رزرو هتل</a></li>
                            <li><a href="">تور مسافرتی</a></li>
                            <li><a href="">اخذ ویزا</a></li>
                            <li><a href="">بیمه مسافرتی</a></li>
                            <li><a href="">مجله گردشگری</a></li>
                        </ul>
                        <ul>
                            <li><a href="">قوانین و مقررات</a></li>
                            <li><a href="">پشتیبانی 24 ساعته</a></li>
                            <li><a href="">راهنمای خرید</a></li>
                            <li><a href="">باشگاه مشتریان</a></li>
                            <li><a href="">درباره ما</a></li>
                            <li><a href="">تماس با ما</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="address">
                    <p><i class="fas fa-map-marker"></i>
                        تهران،پاسداران،خیابان گل نبی،خیابان ناطق نوری پ34
                    </p>
                    <p>شماره تماس 24 ساعته: <a href="tel:02172407">72407-021</a></p>
                </div>
            </div>
            
            <div class="footer2">
                <div class="footer_links">
                    <h3>اطلاعات تکمیلی</h3>
                    <ul>
                        <li><a href="">بلیط چارتر</a></li>                        
                        <li><a href="">راهنمای خرید بلیط هواپیما(داخلی)</a></li>
                        <li><a href="">راهنمای خرید هواپیما(خارجی)</a></li>
                        <li><a href="">راهنمای خرید بلیط قطار</a></li>
                        <li><a href="">راهنمای رزور هتل خارجی</a></li>
                        <li><a href="">راهنمای استرداد بلیط</a></li>
                        <li><a href="">اطلاعات فرودگاهی</a></li>
                        <li><a href="">شیوه نامه حقوق مسافر</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer3">
                <div class="footer_links">
                    <h3>درباره ستاره زمرد</h3>
                    <p>شرکت خدمات مسافرتی ستاره زمرد مفتخر است به پشتوانه ی مجموعه هلدینگ خود در اعزام محصل و دانشجو به
                        کشورهای مالزی، سنگاپور، اتریش، آلمان، سوئیس، سوئد، روسیه و کانادا، ارائه دهنده ی بهترین خدمات به
                        همکاران (B2B)و مسافران (B2C) با گارانتی قیمت و بصورت کاملا رقابتی می باشد.شرکت خدمات مسافرتی
                        ستاره زمرد مفتخر است به پشتوانه ی مجموعه هلدینگ خود در اعزام محصل و دانشجو به کشورهای مالزی،
                    </p>
                </div>

                <div class="mojavezha">
                <a target="_blank" href="https://trustseal.enamad.ir/?id=110756&amp;Code=zUn6UmX7H7owtt7hHkfe">
                <img class="lazy" data-src="/img/logos/namad1.png" alt="نماد اعتماد الکترونیک" style="cursor:pointer" id="lqTmTo4h9y6PWkE0BqHq">
                </a>
                    <a href="#"><img class="lazy" data-src="/img/logos/namad2.png" alt="جشنواره وب"></a>
                    <a href="#"><img class="lazy" data-src="/img/logos/namad3.png" alt="نماد اعتماد رسانه"></a>
                    <a href="#"><img class="lazy" data-src="/img/logos/namad4.png" alt="اتحادیه کشوری"></a>
                </div>
            </div>
        </div>
    </footer>

</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
@yield('scripts')
<!-- newsletter  -->
<script>
function submitNewsLetter(){

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('newsletter').value))
    {
        axios.post('/newsletter', {
        email   :   document.getElementById('newsletter').value,
        date    :   new Date()
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });

        document.getElementById('newsletter').style.display = "none";
        document.getElementById('newletterBtn').style.display = "none";
        document.getElementById('successNewsLetter').style.display = "block";
    }else{
        alert("ایمیل وارد شده صحیح نمیباشد")
        return (false)
    }
    


   
}
</script>
<script src="/js/custom.js" defer></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" defer integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js" defer></script>

<!-- Owl Slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer></script>

<!-- CSRF  -->
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// document.getElementById('csrf').value="{{ csrf_token() }}";
</script>
<!-- Moment  -->
<!-- <script src="/js/moment.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" defer integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/fa.js" defer></script>
<script src="/js/moment-jalaali.js" defer></script>
<!-- React  -->
<script src="https://unpkg.com/react@16/umd/react.production.min.js" defer></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js" defer></script>
<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script> -->
<!-- <script crossorigin src="/js/react.production.min.js"></script>
<script crossorigin src="/js/react-dom.production.min.js"></script> -->

<!-- React compiles codes in my project -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js" defer></script>
<script src="/js/app.js" defer></script>
<script src="/js/custom.js" defer></script>
</html>