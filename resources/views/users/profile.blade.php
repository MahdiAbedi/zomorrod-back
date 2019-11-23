@extends('master')

@section('style')
<link rel="stylesheet" href="/css/profile/account-style.css">
@endsection
@section('body')

<body>
    <main id="profile-app" class="bg-gray main-wrapper">
        <div class="container">
            <nav class="profile-navigation">
                <ul class="clearfix">
                    <li class="profile-navigation__item"><a href="/profile"
                            class="nuxt-link-exact-active nuxt-link-active"><i class="icon icon-user-account"></i>
                            <h2>حساب کاربری</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/points" class=""><i class="icon icon-star"></i>
                            <h2>امتیازها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/orders" class=""><i class="icon icon-orders"></i>
                            <h2>سفارشات و استردادها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/transactions" class=""><i
                                class="icon icon-transactions"></i>
                            <h2>تراکنش‌ها</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/passengers" class=""><i
                                class="icon icon-passenger-list"></i>
                            <h2>لیست مسافران</h2>
                        </a></li>
                    <li class="profile-navigation__item"><a href="/credit" class=""><i class="icon icon-charge"></i>
                            <h2>افزایش اعتبار</h2>
                        </a></li>
                </ul>
                <h2 class="profile-navigation__title">
                    اطلاعات حساب کاربری
                </h2>
            </nav>
            <div class="account">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="box m-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-10">
                                    <dl class="account__balance clearfix">
                                        <dt class="account__balance-title">
                                            موجودی حساب:
                                        </dt>
                                        <dd class="account__balance-amount"><strong>0</strong> ریال
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2"><a href="/profile/balance"
                                        class="btn btn-block btn-primary btn-outline">
                                        افزایش اعتبار
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row t-p">
                    <div class="box info account-adjust-box">
                        <table class="table table-striped account__info">
                            <tbody>
                                <tr>
                                    <th>نام:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>نام خانوادگی:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>ایمیل:</th>
                                    <td>mac70god@gmail.com</td>
                                </tr>
                                <tr>
                                    <th>شماره همراه:</th>
                                    <td>
                                        09395187902
                                        <img src="../img/profile/check.svg" alt="check">
                                    </td>
                                </tr>
                                <tr>
                                    <th>شماره تلفن:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>جنسیت:</th>
                                    <td>مرد</td>
                                </tr>
                                <tr>
                                    <th>کد ملی:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>تاریخ تولد:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>شماره کارت:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>شماره حساب:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>شماره شبا:</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row ltr" style="display:flex">
                            <div class="col-xs-12 col-sm-3 col-md-4"><button id="edit-profile-action"
                                    class="btn btn-block btn-primary">
                                    ویرایش پروفایل
                                </button></div>
                            <div class="col-xs-12 col-sm-3 col-sm-offset-3 col-md-4 col-md-offset-0"><button
                                    id="edit-password-action" class="btn btn-block btn-primary btn-outline">
                                    تغییر کلمه عبور
                                </button></div>
                            <div class="col-xs-12 col-sm-3 col-md-4"><button id="signout-profile-action"
                                    class="btn btn-block btn-danger btn-outline">
                                    خروج از حساب کاربری
                                </button></div>
                        </div>
                    </div>
                    <div class="account__user-reward box account-adjust-box">
                        <div class="account__user-reward__container">
                            <div class="account__user-reward--top">
                                <div class="account__user-reward--top-right">
                                    <div class="current-level-box hidden-xs">
                                        <div class="current-level-box__detail">
                                            <div class="col-xs-12 current-level__detail--cnt">
                                                <div class="hidden-sm hidden-xs parent-cup-icon"><svg width="32px"
                                                        height="38px" viewBox="0 0 32 36" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" class="cup-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g id="my-account/loyalty-page---Desktop"
                                                                transform="translate(-1195.000000, -249.000000)"
                                                                stroke="#3B7BEA" fill-rule="nonzero" stroke-width="1.5">
                                                                <g id="Group-11"
                                                                    transform="translate(200.000000, 186.000000)">
                                                                    <g id="Content"
                                                                        transform="translate(40.000000, 7.000000)">
                                                                        <g id="Group-8"
                                                                            transform="translate(728.000000, 49.000000)">
                                                                            <path
                                                                                d="M233.207373,8 L233.207373,12.5335898 L230.534562,12.5335898 C229.152074,12.5335898 228,13.6669872 228,15.0270642 L228,18.3819206 C228,21.2380822 230.35023,23.5955488 233.299539,23.5955488 C233.806452,28.1291386 237.539171,31.6653386 242.147465,32.0733617 L242.147465,40.7778541 L238.092166,40.7778541 C237.723502,40.7778541 237.400922,41.0952054 237.400922,41.4578926 C237.400922,41.8205797 237.723502,42.137931 238.092166,42.137931 L247.723502,42.137931 C248.092166,42.137931 248.414747,41.8205797 248.414747,41.4578926 C248.414747,41.0952054 248.092166,40.7778541 247.723502,40.7778541 L243.529954,40.7778541 L243.529954,32.0733617 C248.276498,31.8013463 252.147465,28.1744745 252.700461,23.5955488 C255.603687,23.5955488 258,21.2380822 258,18.3819206 L258,15.0270642 C258,13.6669872 256.847926,12.5335898 255.465438,12.5335898 L252.792627,12.5335898 L252.792627,8 L233.207373,8 Z M229.382488,18.3819206 L229.382488,15.0270642 C229.382488,14.3923616 229.889401,13.8936667 230.534562,13.8936667 L233.207373,13.8936667 L233.207373,22.2354719 C231.087558,22.1448001 229.382488,20.4673719 229.382488,18.3819206 Z M251.364055,22.4621514 C251.364055,26.9957412 247.585253,30.7132848 242.976959,30.7132848 C238.368664,30.7132848 234.589862,26.9957412 234.589862,22.4621514 L234.589862,9.31474104 L251.364055,9.31474104 L251.364055,22.4621514 Z M255.419355,13.8936667 C256.064516,13.8936667 256.571429,14.3923616 256.571429,15.0270642 L256.571429,18.3819206 C256.571429,20.4673719 254.866359,22.190136 252.746544,22.2354719 L252.746544,13.8936667 L255.419355,13.8936667 Z"
                                                                                id="Shape"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg></div>
                                                <div class="current-level__detail--parent"><span
                                                        class="current-level--text">سطح فعلی شما:</span> <span
                                                        class="current-level--level"
                                                        style="background-color: rgba(59, 123, 234, 0.1); color: rgb(59, 123, 234);">
                                                        آبی
                                                    </span> <span class="current-level--promote clearfix"> تنها 25
                                                        امتیاز تا سطح بعدی</span></div>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <div
                                        class="smile-privilege-box smile-privilege-box__promotion-smile blue-loyalty-card">
                                        <div class="smile-privilege-box__detail">
                                            <div class="smile-privilege-box__detail--alibaba"><img
                                                    src="../img/profile/alibaba.svg?w=50&amp;h=50&amp;q=60"
                                                    alt="علی بابا"></div>
                                            <div class="smile-privilege-box__detail--smile"><img
                                                    src="../img/profile/smile.svg?w=50&amp;h=50&amp;q=60" alt="لبخند">
                                            </div>
                                            <div class="smile-privilege-box__email" style="color: rgb(12, 78, 191);">
                                                MAC70GOD@GMAIL.COM
                                            </div>
                                            <div class="smile-privilege-box__detail--title">
                                                امتیاز شما:
                                            </div>
                                            <div class="smile-privilege-box__detail--score"><span
                                                    class="smile-privilege-box__detail--privilege"> 5 </span> <span
                                                    class="smile-privilege-box__detail--smile-text"> امتیاز </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-privilege-area circular-level">
                                    <div class="tooltip-box">
                                        <div class="indicative-level-box" max-score="29" score="5"><svg width="120px"
                                                height="120px" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                class="indicative-level-box--ring-chart">
                                                <circle cx="60" cy="60" r="54" fill="none" stroke-width="6"
                                                    class="radius-circle" stroke="#3B7BEA"></circle>
                                                <circle cx="60" cy="60" r="54" fill="none" stroke="white"
                                                    stroke-width="7" stroke-dasharray="340"
                                                    stroke-dashoffset="-58.62068965517242"
                                                    transform="rotate(-90, 60,60)"></circle>
                                            </svg>
                                            <div class="indicative-level-box--inset-ring"
                                                style="color: rgb(59, 123, 234);">
                                                <div class="current-score">5</div>
                                                <div class="total-score"><span> از </span> 29 </div>
                                            </div>
                                            <div class="indicative-level-box--dashed-border"><svg stroke-width="8"
                                                    viewBox="0 0 142 142" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    style="position: absolute; top: -15px; right: -3px; width: 138px; height: 138px;">
                                                    <path
                                                        d="M77,131.838117 C107.375661,131.838117 132,107.213778 132,76.8381167 C132,46.4624555 107.375661,21.8381167 77,21.8381167 C46.6243388,21.8381167 22,46.4624555 22,76.8381167 C22,107.213778 46.6243388,131.838117 77,131.838117 Z"
                                                        id="Oval-Copy" stroke-opacity="0.4" stroke-width="3"
                                                        fill-opacity="0" fill="#FFFFFF" stroke-linecap="round"
                                                        stroke-dasharray="5" stroke="#3B7BEA"></path>
                                                </svg></div>
                                        </div> <span class="tooltiptext">%17</span>
                                    </div>
                                    <div class="col-xs-12 text-right next-level-info">
                                        سطح بعدی:
                                        <strong>
                                            طلائی
                                        </strong></div>
                                </div>
                            </div>
                            <div class="current-level-box current-level-under">
                                <div class="current-level-box__detail">
                                    <div class="col-xs-12 current-level__detail--cnt">
                                        <div class="hidden-sm hidden-xs parent-cup-icon"><svg width="32px" height="38px"
                                                viewBox="0 0 32 36" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" class="cup-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="my-account/loyalty-page---Desktop"
                                                        transform="translate(-1195.000000, -249.000000)"
                                                        stroke="#3B7BEA" fill-rule="nonzero" stroke-width="1.5">
                                                        <g id="Group-11" transform="translate(200.000000, 186.000000)">
                                                            <g id="Content" transform="translate(40.000000, 7.000000)">
                                                                <g id="Group-8"
                                                                    transform="translate(728.000000, 49.000000)">
                                                                    <path
                                                                        d="M233.207373,8 L233.207373,12.5335898 L230.534562,12.5335898 C229.152074,12.5335898 228,13.6669872 228,15.0270642 L228,18.3819206 C228,21.2380822 230.35023,23.5955488 233.299539,23.5955488 C233.806452,28.1291386 237.539171,31.6653386 242.147465,32.0733617 L242.147465,40.7778541 L238.092166,40.7778541 C237.723502,40.7778541 237.400922,41.0952054 237.400922,41.4578926 C237.400922,41.8205797 237.723502,42.137931 238.092166,42.137931 L247.723502,42.137931 C248.092166,42.137931 248.414747,41.8205797 248.414747,41.4578926 C248.414747,41.0952054 248.092166,40.7778541 247.723502,40.7778541 L243.529954,40.7778541 L243.529954,32.0733617 C248.276498,31.8013463 252.147465,28.1744745 252.700461,23.5955488 C255.603687,23.5955488 258,21.2380822 258,18.3819206 L258,15.0270642 C258,13.6669872 256.847926,12.5335898 255.465438,12.5335898 L252.792627,12.5335898 L252.792627,8 L233.207373,8 Z M229.382488,18.3819206 L229.382488,15.0270642 C229.382488,14.3923616 229.889401,13.8936667 230.534562,13.8936667 L233.207373,13.8936667 L233.207373,22.2354719 C231.087558,22.1448001 229.382488,20.4673719 229.382488,18.3819206 Z M251.364055,22.4621514 C251.364055,26.9957412 247.585253,30.7132848 242.976959,30.7132848 C238.368664,30.7132848 234.589862,26.9957412 234.589862,22.4621514 L234.589862,9.31474104 L251.364055,9.31474104 L251.364055,22.4621514 Z M255.419355,13.8936667 C256.064516,13.8936667 256.571429,14.3923616 256.571429,15.0270642 L256.571429,18.3819206 C256.571429,20.4673719 254.866359,22.190136 252.746544,22.2354719 L252.746544,13.8936667 L255.419355,13.8936667 Z"
                                                                        id="Shape"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="current-level__detail--parent"><span class="current-level--text">سطح
                                                فعلی شما:</span> <span class="current-level--level"
                                                style="background-color: rgba(59, 123, 234, 0.1); color: rgb(59, 123, 234);">
                                                آبی
                                            </span> <span class="current-level--promote clearfix"> تنها 25 امتیاز تا سطح
                                                بعدی</span></div>
                                    </div>
                                    <div class="col-xs-12 current-level--expiry">
                                        امتیاز های در حال انقضا تا انتهای
                                        <strong> آبان ماه :</strong> <strong class="text-red">
                                            0
                                            از
                                            5
                                        </strong></div>
                                </div>
                            </div> <span class="current-level-under current-level-link"><a href="/loyalty"
                                    class="">بیشتر بدانید</a></span>
                        </div>
                        <div class="flex-border-h"></div>
                        <div class="flex-row-center account__user-reward--bg-right"><img
                                src="../img/profile/newsletter.png" alt="envelope for referral"
                                class="envelope-person hidden-xs">
                            <div class="account__user-reward--bottom">
                                <h5>۱۵ امتیاز هدیه باشگاه مشتریان</h5> <span
                                    class="account__user-reward--bottom__desc">با دعوت از دوستان‌تان از طریق لینک زیر،
                                    امتیاز <a href="/loyalty" class="">باشگاه مشتریان</a> هدیه بگیرید.</span>
                                <div class="referral-link"><label title="کپی"
                                        data-clipboard-text="alibaba.ir/invitation?r=6quDa"
                                        class="referral-link__label clickable"><img src="../img/profile/copy.svg"
                                            alt="copy to clipboard"></label> <input id="shareLink" disabled="disabled"
                                        type="text" class="referral-link__input ltr">
                                    <div class="referral-link__copied text-center rounded">
                                        کپی شد!
                                    </div>
                                </div> <span class="share-info-title">به اشتراک گــذاری</span>
                                <div class="share-info">
                                    <div class="share-info__social-media"><a
                                            href="https://wa.me/?text=alibaba.ir/invitation?r=6quDa"><img
                                                src="../img/profile/whatsup.svg" alt="whatsapp logo"></a> <a
                                            href="https://t.me/share/url?url=alibaba.ir/invitation?r=6quDa&amp;text=دعوت از دوستان"><img
                                                src="../img/profile/telegram.svg" alt="telegram logo"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

@endsection
