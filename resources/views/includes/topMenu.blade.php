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
                        <img src="/img/icons/home.png" alt="منوی">
                        <a href="/">خانه</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/airplane-icon-colored.png" alt="منوی">
                        <a href="#">بلیط هواپیما</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/hotel.png" alt="منوی">
                        <a href="#">رزو هتل</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/tour.png" alt="منوی">
                        <a href="#">تور مسافرتی</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/visa.png" alt="منوی">
                        <a href="#">ویزا</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/bime.png" alt="منوی">
                        <a href="#">بیمه</a>
                    </li>
                    <li class="menu-item">
                        <img src="/img/icons/blog.png" alt="منوی">
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
                    <li class="menu-item" id="login">
                        <img src="/img/icons/login.png" alt="منوی">
                        
                    </li>
                    <!-- Login Panel  -->
                    <div class="login-container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            
                                <!-- <label for="userName">نام کاربری</label> -->
                                <input type="text" name="email" placeholder="ایمیل">
                                <input type="password" name="password" placeholder="رمز عبور">
                                <input type="submit" class="btn btn-blue" value="ورود" >
                            
                        </form>
                        <div class="panel">
                            <a href="/reset">بازیابی رمز عبور</a>
                            <hr />
                            <button onclick="window.location.href = '/register';" class="btn btn-green">ثبت نام</button>
                        </div>
                    </div>
                    @else
                        <li class="menu-item">
                        <img src="/img/icons/login.png" alt="منوی">
                        {{ Auth::user()->name }}
                        </li>
                        <li class="menu-item">
                             <i class="fas fa-sign-out-alt"></i>
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                خروج
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    @endguest
                    <li class="menu-item">
                        <a href="tel:02172407">021-72407</a>
                        <img src="/img/icons/tel.png" class="tel" alt="منوی">
                    </li>

                    <li class="menu-item logo">
                        <img src="/img/logo.png" alt="منوی">

                    </li>

                </ul>
            </nav>


        </div>