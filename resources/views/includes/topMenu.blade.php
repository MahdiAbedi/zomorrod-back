<div class="topmenu">

    <nav class="topmenu-container container">
        <!-- منوی همبرگر در حالت موبایل  -->
        <div class="hamberger-menu" onclick="hamburgerMenu(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>

        <ul class="menu right-menu hide" id="hamburger-menu">
            <li class="menu-item active">
                <!-- <img src="/img/icons/home.png" alt="منوی"> -->
                <a href="/">خانه</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/airplane-icon-colored.png" alt="منوی"> -->
                <a href="#">بلیط هواپیما</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/hotel.png" alt="منوی"> -->
                <a href="#">رزو هتل</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/tour.png" alt="منوی"> -->
                <a href="#">تور مسافرتی</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/visa.png" alt="منوی"> -->
                <a href="#">ویزا</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/bime.png" alt="منوی"> -->
                <a href="#">بیمه</a>
            </li>
            <li class="menu-item">
                <!-- <img src="/img/icons/blog.png" alt="منوی"> -->
                <a href="#">مجله گردشگری</a>
            </li>
            <li class="menu-item other">
                <a href="#">...</a>
            </li>


        </ul>

        <ul class="menu left-menu">

            <li class="menu-item">
                <img src="/img/icons/search.png" alt="منوی">
            </li>
            @guest
            <!-- login -->
            <li class="menu-item"  id="showProfilePanel" onclick="showProfilePanel('block')">
                <img src="/img/icons/login.png" alt="منوی">

            </li>
            <!-- Login Panel  -->
            <div class="login-container" id="profile-list" style="display:none">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- <label for="userName">نام کاربری</label> -->
                    <input type="text" name="email" placeholder="ایمیل">
                    <input type="password" name="password" placeholder="رمز عبور">
                    <input type="submit" class="btn btn-blue" value="ورود">

                </form>
                <div class="panel">
                    <a href="/reset">بازیابی رمز عبور</a>
                    <hr />
                    <button onclick="window.location.href = '/register';" class="btn btn-green">ثبت نام</button>
                </div>
            </div>
            @else
            <a class="menu-item" id="showProfilePanel" onclick="showProfilePanel()">
                <img src="/img/icons/login.png" alt="منوی">
               
                <span> {{ Auth::user()->name }} <svg fill="#626262" width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="v-middle chevron hidden-xs hidden-sm"><g fill-rule="evenodd"><polygon fill-rule="nonzero" points="10.466 3.06 11.173 3.767 6.002 8.939 .83 3.767 1.537 3.06 6.002 7.524"></polygon></g></svg>
                        </span>
            </a>
            <div class="profile-list" id="profile-list" style="display:none">
                <div class="half first">
                    <div class="top">
                        <strong>mac70god@gmail.com</strong>
                        <p>موجودی : 120،000 هزارتومان</p>
                    </div>
                    <div class="bottom">
                        <img src="./img/profile/nice-smile.svg" alt="" srcset="">
                        <p>0 امتیاز</p>
                        <a href="/points" class="btn">جزئیات امتیازها</a>
                        <a href="/clube">باشگاه مشتریان ستاره زمرد</a>
                    </div>
                </div>
                <div class="half">
                    <ul class="profile-menu">
                        <li><a href="/profile"></i><p>اطلاعات حساب کاربری</p></a></li>
                        <li><a href="/orders"></i><p>سفارشات و استردادها</p></a></li>
                        <li><a href="/transactions"></i><p>تراکنشهای حساب</p></a></li>
                        <li><a href="/passengers"></i><p>لیست مسافران</p></a></li>
                        <li><a href="/credit"></i><p>افزایش اعتبار</p></a></li>
                        <li><a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="red"></i><p>خروج از حساب</p></a></li>
                    </ul>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @endguest
            <li class="menu-item">
                <a href="tel:02172407">021-72407</a>
                <img src="/img/icons/tel.png" class="tel" alt="منوی">
            </li>

            <li class="menu-item logo">
                <a href="/">
                <img src="/img/logo.png" alt="منوی">
                </a>

            </li>

        </ul>
    </nav>


</div>
