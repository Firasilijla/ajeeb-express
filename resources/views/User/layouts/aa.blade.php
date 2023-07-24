<html lang="en">
<?php

use Illuminate\Support\Facades\Auth; ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui" />
    <title>TrxPlus - Wallet</title>
    <link rel="stylesheet" href="{{asset('userassets/vendor/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('userassets/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('userassets/css/style.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&amp;display=swap" rel="stylesheet" />
    <script src="{{asset('userassets/fontawesome/js/all.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .container .coin-price {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 3px #ccc;
            margin: 7px;
        }

        .container .coin-price .logo {
            width: 70px;
            margin-right: 10px;
        }

        .container .coin-price .logo img {
            width: 100%;
        }

        .container .coin-price div {
            display: block;
        }

        .container .coin-price div h1 {
            font-size: 20px;
        }
    </style>
    <style type="text/css">
        /* Chart.js */
        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        .goog-te-banner-frame,
        .skiptranslates,
        #goog-gt-tt {
            display: none !important;
        }

        .skiptranslate {
            display: none;
        }

        body {
            top: 0px !important;
        }

        .coin {
            cursor: pointer;
            content: "";
            width: 52px;
            height: 52px;
            display: inline-block;
            position: relative;
            margin: 5px;
            top: 6px;
            border-radius: 50px;
            z-index: 500;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.1);
        }

        .coin:after {
            content: "";
            width: 42px;
            height: 42px;
            display: block;
            top: 4px;
            left: 4px;
            position: absolute;
            border-radius: 50px;
            z-index: 600;
        }

        .coin:before {
            content: "";
            width: 50px;
            height: 50px;
            display: block;
            position: absolute;
            border-radius: 50px;
            z-index: 500;
        }

        .coin:hover {
            top: -1px;
            transition: all 0.5s ease-in-out;
            box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.2);
        }

        .diamond {
            background: linear-gradient(45deg,
                    rgb(187, 237, 250) 0%,
                    rgba(249, 243, 232, 1) 56%,
                    rgb(175, 245, 255) 96%);
        }

        .diamond:before {
            background: linear-gradient(135deg,
                    #b9f2ff 0%,
                    #f7e6c5 50%,
                    #9be8fc 100%);
            border: 1px solid #67d3ec;
        }

        .diamond:after {
            background: linear-gradient(45deg,
                    rgb(187, 237, 250) 0%,
                    rgba(249, 243, 232, 1) 56%,
                    rgb(175, 242, 255) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgb(58, 186, 220);
            border-right: 1px solid rgb(54, 186, 220);
            box-shadow: inset 0px 0px 2px 2px rgba(153, 106, 26, 0.05);
        }

        .diamond:hover:after {
            background: linear-gradient(45deg,
                    rgb(175, 242, 255) 0%,
                    rgba(249, 243, 232, 1) 41%,
                    rgb(175, 242, 255) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgb(58, 186, 220);
            border-right: 1px solid rgb(54, 186, 220);
            box-shadow: inset 0px 0px 2px 2px rgba(153, 106, 26, 0.05);
        }

        .bronze {
            background: linear-gradient(45deg,
                    rgba(223, 182, 103, 1) 0%,
                    rgba(249, 243, 232, 1) 56%,
                    rgba(231, 192, 116, 1) 96%);
        }

        .bronze:before {
            background: linear-gradient(135deg,
                    #d19c35 0%,
                    #f7e6c5 50%,
                    #e8b558 100%);
            border: 1px solid #e6b86a;
        }

        .bronze:after {
            background: linear-gradient(45deg,
                    rgba(223, 182, 103, 1) 0%,
                    rgba(249, 243, 232, 1) 56%,
                    rgba(231, 192, 116, 1) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(209, 156, 53, 0.3);
            border-right: 1px solid rgba(209, 156, 53, 0.5);
            box-shadow: inset 0px 0px 2px 2px rgba(153, 106, 26, 0.05);
        }

        .bronze:hover:after {
            background: linear-gradient(45deg,
                    rgba(223, 182, 103, 1) 0%,
                    rgba(249, 243, 232, 1) 41%,
                    rgba(231, 192, 116, 1) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(209, 156, 53, 0.3);
            border-right: 1px solid rgba(209, 156, 53, 0.5);
            box-shadow: inset 0px 0px 2px 2px rgba(153, 106, 26, 0.05);
        }

        .silver {
            background: linear-gradient(45deg,
                    rgba(160, 160, 160, 1) 0%,
                    rgba(232, 232, 232, 1) 56%);
        }

        .silver:before {
            background: linear-gradient(45deg,
                    rgba(181, 181, 181, 1) 0%,
                    rgba(252, 252, 252, 1) 56%,
                    rgba(232, 232, 232, 1) 96%);
            border: 1px solid rgba(181, 181, 181, 1);
        }

        .silver:after {
            background: linear-gradient(45deg,
                    rgba(181, 181, 181, 1) 0%,
                    rgba(252, 252, 252, 1) 56%,
                    rgba(232, 232, 232, 1) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(160, 160, 160, 0.3);
            border-right: 1px solid rgba(160, 160, 160, 0.5);
            box-shadow: inset 0px 0px 2px 2px rgba(150, 150, 150, 0.05);
        }

        .silver:hover:after {
            background: linear-gradient(45deg,
                    rgba(181, 181, 181, 1) 0%,
                    rgba(252, 252, 252, 1) 38%,
                    rgba(232, 232, 232, 1) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(160, 160, 160, 0.3);
            border-right: 1px solid rgba(160, 160, 160, 0.5);
            box-shadow: inset 0px 0px 2px 2px rgba(150, 150, 150, 0.05);
        }

        .gold {
            background: linear-gradient(45deg,
                    rgba(242, 215, 12, 1) 0%,
                    rgba(255, 255, 255, 1) 56%,
                    rgba(252, 235, 0, 1) 96%);
        }

        .gold:before {
            background: linear-gradient(45deg,
                    rgba(242, 215, 12, 1) 0%,
                    rgba(255, 255, 255, 1) 56%,
                    rgba(252, 235, 0, 1) 96%);
            border: 1px solid rgba(242, 215, 12, 1);
        }

        .gold:after {
            background: linear-gradient(45deg,
                    rgba(242, 215, 12, 1) 0%,
                    rgba(255, 255, 255, 1) 56%,
                    rgba(252, 235, 0, 1) 96%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(242, 215, 12, 0.3);
            border-right: 1px solid rgba(242, 215, 12, 0.3);
            box-shadow: inset 0px 0px 2px 2px rgba(150, 150, 150, 0.05);
        }

        .gold:hover:after {
            background: linear-gradient(45deg,
                    rgba(242, 215, 12, 1) 3%,
                    rgba(255, 255, 255, 1) 39%,
                    rgba(252, 235, 0, 1) 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-left: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(242, 215, 12, 0.3);
            border-right: 1px solid rgba(242, 215, 12, 0.3);
            box-shadow: inset 0px 0px 2px 2px rgba(150, 150, 150, 0.05);
        }

        .coin p {
            font-family: georgia;
            font-style: italic;
            position: absolute;
            font-size: 28px;
            z-index: 700;
            top: 6px;
            left: 55px;
        }

        .coin.bronze p {
            color: rgba(223, 182, 103, 1);
        }

        .coin.silver p {
            color: rgba(160, 160, 160, 1);
        }

        .coin.gold p {
            color: rgba(242, 215, 50, 1);
        }

        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99;
            }

            to {
                opacity: 1;
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
</head>

<body>
    <!-- Overlay panel -->
    <div class="body-overlay"></div>
    <!-- Left panel -->
    <div id="panel-left">
        <div class="panel panel--left">
            <!-- Slider -->
            <div class="panel__navigation swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px)">
                    <div class="swiper-slide swiper-slide-active" style="width: 286px">
                        <div class="subnav-header closepanel">
                            <img src="{{asset('userassets/img/icons/arrow-back.svg')}}" alt="" title="" />
                        </div>
                        <div class="user-details">
                            <div class="user-details__thumb">
                                <img src="{{asset('userassets/img/photos/avatar-5.jpg')}}" alt="" title="" style="background-color: #0a0038; max-width: 80px" />
                            </div>
                            <div class="user-details__title">
                                <span>Hello</span> Sam Murad<span>
                                    <div class="coin diamond" style="right: 50px">
                                        <p>Diamond</p>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <nav class="main-nav">
                            <ul>
                                <li>
                                    <a href="setting.html"><img src="{{asset('userassets/img/icons/user.svg')}}" alt="" title="" /><span>My Account</span></a>
                                </li>
                                <li class="">
                                    <a href="transaction.html"><img src="{{asset('userassets/img/icons/listing.svg')}}" alt="" title="" /><span>Transaction</span></a>
                                </li>
                                <li>
                                    <a href="wallet.html"><img src="{{asset('userassets/img/icons/wallet.svg')}}" alt="" title="" /><span>My Wallet</span></a>
                                </li>
                                <li>
                                    <a href="contact.html"><img src="{{asset('userassets/img/icons/contact.svg')}}" alt="" title="" /><span>Help &amp; Support</span></a>
                                </li>
                            </ul>
                        </nav>
                        <div class="buttons buttons--centered">
                            <a href="{{route('user.user.logout')}}" class="button button--main button--small">LOGOUT</a>
                        </div>
                    </div>
                    <form id="logout-form" action="logout" method="POST" class="d-none">
                        <input type="hidden" name="_token" value="UoeiGX8h6EymOQLISr7AWgMLTMfsMjezeYqCt2JD" />
                    </form>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>

    <div class="page page--main" data-page="main">
        <!-- HEADER -->
        <header class="header header--fixed">
            <div class="header__inner">
            	
                <div class="header__icon open-panel" data-panel="left">
                    <img src="{{asset('userassets/img/icons/user.svg')}}" alt="image" title="image" />
                </div>
                <div>
                    <a href="{{route('user.Settings.userSettings')}}"> <i class="fa fa-user"></i> Setting
                    </a>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT -->

        <div class="page__content page__content--full page__content--with-bottom-nav">
            <div class="account-info">
                <div class="account-info__title">TOTAL BALANCE</div>
                <div class="account-info__total">${{Auth::user()->total_amount}}</div>
                <!-- <svg
            class="account-info__svg"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 100 100"
            preserveAspectRatio="none"
          >
            <path d="M0,0 Q50,201 100,0 L100,100 0,100 Z" fill="#0f0638" />
          </svg> -->
            </div>

            <div class="account-buttons">
                <a href="{{route('user.Deposit.UsergetDeposit')}}">
                    <img src="{{asset('userassets/img/icons/bottom.svg')}}" alt="" title="" />
                    <span>Deposit</span>
                </a>
                <a href="{{route('user.Withdrow.getWithdrow')}}">
                    <img src="{{asset('userassets/img/icons/top.svg')}}" alt="" title="" />
                    <span>Withdraw</span>
                </a>
                <a href="{{route('user.TRX.getTRX')}}">
                    <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" />
                    <span>Bay TRX</span>
                </a>
            </div>
            <!-- <div class="container">
                <div class="coin-price">
                    <div class="logo"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEi32rDKQR2Swi7YfHjDzyZUBGEmxTz77OClnm24SZl7kWuls7fsVCIfAObY_JRJIReQnBWZIPSVfDLSqDvqeu4CCXCoNQIoUGK-OSDUGMtDJFxh9vmU6WGajIgXH4CsR_-sXU0qWbyJTJl7N0BSTB8HcAGSpCJ54G1daZPnU6h2oANo2CTGsbHCoaGJHQ">
                    </div>
                    <div>
                        <h1>$<span id=""></span></h1>
                        <h1>Bitcoin</h1>
                    </div>
                </div>
                <div class="coin-price">
                    <div class="logo"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEhrUFoHC68rLHQYMV41awqGtoeU6qI-CkSVmcYK-KBCrOvL-jzwLOx8pN-5B8aALsHh1Zc9mmDm8LVQSSpdpsw0v6vrJsv4r9_lv0ic5aYbogc3i3h9mG6ZGMc7g9_cGSRh_soaKmXtpMEOxBFIsmiTa_wticu9T07MbqQ42J9NwowHp8tn8OUIBlhjqA">
                    </div>
                    <div>
                        <h1>$<span id=""></span></h1>
                        <h1>Litecoin</h1>
                    </div>
                </div>

                <div class="coin-price">
                    <div class="logo"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEgfcodOJm7ZIXw2kiqdo5abN4cUvFYgyqpKt91zHI8710ltPK5Ny_S5X93w9LSDsF5jW61frn3C8a_8w2GXu4bf0clzxuJljoQ8n6az5EI5zQOcl5W2LScP-1-41NQwPW5A3JWT9EwejtOnHsd3q2-llUsJJQ3Z74v_2FOPn0TrI2529NS9_hmFbvModw">
                    </div>
                    <div>
                        <h1>$<span id=""></span></h1>
                        <h1>Ethereum</h1>
                    </div>
                </div>
                <div class="coin-price">
                    <div class="logo"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEj9YzGIFUSMpRoWE4IjGl_o2zpdPkvtUS6jzIgZWEWl7ztYyV20oXu80A52v0R_nXpt_qXVBzxnfse2_pfeIbVHwQSR3oLqqAyMqVqnzJpdbSCBHA2b_zlheiLY3Bb0PYCEXQny7q-FnGE01ZtxVFVC8DbLWW-ZC1PC-gaqL7IC7ZfRxFOZufcv8lcY1g">
                    </div>
                    <div>
                        <h1>$<span id=""></span></h1>
                        <h1>Dogecoin</h1>
                    </div>
                </div>

            </div> -->

            <div class="page-inner">
                <div class="page__title-bar">
                    <h3>Crypto Wallets</h3>
                </div>
                <div class="cards cards--11">
                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/logos/bitcoin.png')}}" alt="" title="" /><span>Bitcoin <b id="BTC_q"></b></span>
                        </div>
                        <div>$<strong id="bitcoin"></strong></div>
                    </a>
                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/logos/ethereum.png')}}" alt="" title="" /><span>Ethereum <b id="ETH_q"></b></span>
                        </div>
                        <div class="card-coin__price">$<strong id="ethereum"></strong></div>
                    </a>
                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/logos/tether.png')}}" alt="" title="" /><span>Litecoin <b id="LTC_q"></b></span>
                        </div>
                        <div class="card-coin__price">$<strong id="Litecoin"></strong></div>
                    </a>
                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/logos/XRPUSD.png')}}" alt="" title="" /><span>XRPUSD <b id="XRP_q"></b></span>
                        </div>
                        <div class="card-coin__price">$<strong id="XRPUSD"></strong></div>
                    </a>
                </div>

                <div class="page__title-bar mt-20">
                    <h3>Transaction History</h3>
                </div>

                <div class="cards cards--11 auto-rep">
                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 08:45:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$16,000.00 </strong><span class="plus">4L******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" /><span>TRX - Deposit <b>25-Mar-2023 08:40:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$146.00 </strong><span class="plus">Bx******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 08:35:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$2,700.00 </strong><span class="plus">EA******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" /><span>TRX - Deposit<b>25-Mar-2023 08:25:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$750.00 </strong><span class="plus">Bm******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 08:20:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$400.00 </strong><span class="plus">QE******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 08:15:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$74,614.00 </strong><span class="plus">o0******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 08:10:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$410.00 </strong><span class="plus">av******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 08:05:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$420.00 </strong><span class="plus">Dr******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 08:00:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$146.00 </strong><span class="plus">ut******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 07:55:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$400.00 </strong><span class="plus">UA******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 07:45:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$300.00 </strong><span class="plus">Gk******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 07:40:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$115.00 </strong><span class="plus">7b******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 07:35:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$8,456.00 </strong><span class="plus">xH******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 07:30:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$20.00 </strong><span class="plus">Z9******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 07:25:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$412.00 </strong><span class="plus">W2******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" /><span>TRX - Deposit <b>25-Mar-2023 07:15:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$2,136.00 </strong><span class="plus">yl******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 07:10:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$247.00 </strong><span class="plus">Jf******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" /><span>TRX - Deposit <b>25-Mar-2023 07:00:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$157.00 </strong><span class="plus">gv******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/minus-bold.svg')}}" alt="" title="" /><span>Withdraw <b>25-Mar-2023 06:55:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>-$146.00 </strong><span class="plus">ln******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/swap.svg')}}" alt="" title="" /><span>TRX - Deposit <b>25-Mar-2023 06:50:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$8,456.00 </strong><span class="plus">4I******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 06:45:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$8,456.00 </strong><span class="plus">tE******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 06:35:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$412.00 </strong><span class="plus">sk******</span>
                        </div>
                    </a>

                    <a class="card-coin" href="#">
                        <div class="card-coin__logo">
                            <img src="{{asset('userassets/img/icons/plus-bold.svg')}}" alt="" title="" /><span>Deposit - USDT<b>25-Mar-2023 06:25:01 AM</b></span>
                        </div>
                        <div class="card-coin__price">
                            <strong>+$2,136.00 </strong><span class="plus">kN******</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE END -->

    <!-- Bottom navigation -->
    <div id="bottom-toolbar" class="bottom-toolbar">
        <div class="bottom-navigation bottom-navigation--gradient">
            <ul class="bottom-navigation__icons">
                <li>
                    <a href="{{route('user.Trading.getTrading')}}">
                        <i class="fa-solid fa-trophy" style="font-size: 30px; color: #fff;"></i>
                    </a>
                </li>
                <li>
                    <a href="transaction.html">
                        <i class="fa-solid fa-square-poll-horizontal" style="font-size: 30px; color: #fff;"></i>
                    </a>
                </li>
                <li class="centered">
                    <a href="wallet.html">
                        <i class="fa-solid fa-wallet" style="font-size: 30px; color: #fff;"></i>
                    </a>
                </li>
                <li>
                    <a href="convert.html">
                        <i class="fa-solid fa-arrow-right-arrow-left" style="font-size: 30px; color: #fff;"></i>
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        <i class="fa-solid fa-paper-plane" style="font-size: 30px; color: #fff;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>



    <!-- Alert -->
    <div id="popup-alert">
        <div class="popup popup--centered popup--shadow popup--alert">
            <div class="popup__close">
                <a href="#" class="close-popup" data-popup="alert"><img src="{{asset('userassets/img/icons/close.svg')}}" alt="" title="" /></a>
            </div>
            <div class="popup__icon">
                <img src="{{asset('userassets/img/icons/alert.svg')}}" alt="" title="" />
            </div>
            <h2 class="popup__title">Hey there !</h2>
            <p class="popup__text">
                This is an alert example. Creativity is breaking out of established
                patterns to look at things in a different way.
            </p>
        </div>
    </div>

    <!-- Notifications -->

    <script src="{{asset('userassets/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/jquery/jquery.validate.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/charts/Chart.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/charts/chartjs-plugin-style.min.js')}}"></script>
    <script src="{{asset('userassets/js/custom-charts.js')}}"></script>
    <script src="{{asset('userassets/js/swiper-init.js')}}"></script>
    <script src="{{asset('userassets/js/jquery.custom.js')}}"></script>
    <script src="{{asset('userassets/js/header-scroll.js')}}"></script>

    <script src="{{asset('userassets/js/swiper-init-swipe.js')}}"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        $(document).ready(function() {
            $("#google_translate_element").bind(
                "DOMNodeInserted",
                function(event) {
                    $(".goog-te-menu-value span:first").html("LANGUAGE");
                    $(".goog-te-menu-frame.skiptranslate").load(function() {
                        setTimeout(function() {
                            $(".goog-te-menu-frame.skiptranslate")
                                .contents()
                                .find(".goog-te-menu2-item-selected .text")
                                .html("LANGUAGE");
                        }, 100);
                    });
                }
            );
        });
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: "en",
                    includedLanguages: "en,fr,ar,es",
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                },
                "google_translate_element"
            );
        }
    </script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            setInterval(function() {
                $.get("get_data", function(data) {
                    $(".auto-rep").empty();
                    for (i in data.records) {
                        item = data.records[i];

                        if (item.process === "deposit") {
                            $(".auto-rep").append(`

<a class="card-coin" href="#">
                    <div class="card-coin__logo"><img src="{{asset('userassets/img/icons/plus-bold.svg" alt="" title=""/><span>${item.process} - USDT<b>${item.date}</b></span></div>
                    <div class="card-coin__price"><strong>+$${item.amount} </strong><span class="plus">${item.username}</span></div>
                </a>
                                                              `);
                        } else if (item.process === "withdraw") {
                            $(".auto-rep").append(`
                                                        <a class="card-coin" href="#">
                    <div class="card-coin__logo"><img src="{{asset('userassets/img/icons/minus-bold.svg" alt="" title=""/><span>${item.process} <b>${item.date}</b></span></div>
                    <div class="card-coin__price"><strong>-$${item.amount} </strong><span class="plus">${item.username}</span></div>
                </a>

                                                              `);
                        } else if (item.process === "transfer") {
                            $(".auto-rep").append(`
                                                        <a class="card-coin" href="#">
                                                            <div class="card-coin__logo"><img src="{{asset('userassets/img/icons/swap.svg" alt="" title=""/><span>${item.process} <b>${item.date}</b></span></div>
                                                            <div class="card-coin__price"><strong>-$${item.amount} </strong><span class="plus">${item.username}</span></div>
                                                        </a>
                                                              `);
                        }
                    }
                });
            }, 10000);
        });
    </script>

    <script src="ap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getData() {
            // alert('ss');
            var btc = document.getElementById("bitcoin");
            var ltc = document.getElementById("litecoin");
            var eth = document.getElementById("ethereum");
            var doge = document.getElementById("dogecoin");
            var liveprice = {
                "async": true,
                "scroosDomain": true,
                "url": "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Clitecoin%2Cethereum%2Cdogecoin&vs_currencies=usd",

                "method": "GET",
                "headers": {}
            }
            $.ajax(liveprice).done(function(response) {
                // $('#bitcoin').val(response.bitcoin.usd);
                // $('#litecoin').val(response.litecoin.usd);
                // $('#ethereum').val(response.ethereum.usd);
                // $('#dogecoin').val(response.dogecoin.usd);

                // $('#bitcoin').text(<?php echo Auth::user()->total_amount ?>+"/"+response.bitcoin.usd);

                // $('#litecoin').text(<?php echo Auth::user()->total_amount ?>);
                // $('#ethereum').text(<?php echo Auth::user()->total_amount ?>);
                // $('#dogecoin').text(<?php echo Auth::user()->total_amount ?>);

                $('#bitcoin').text((<?php echo Auth::user()->total_amount ?> / (response.bitcoin.usd)) + " BTC");
                $('#BTC_q').text("$ " + response.bitcoin.usd);

                $('#ethereum').text((<?php echo Auth::user()->total_amount ?> / (response.ethereum.usd)) + " BTC");
                $('#ETH_q').text("$ " + response.ethereum.usd);

                $('#Litecoin').text((<?php echo Auth::user()->total_amount ?> / (response.litecoin.usd)) + " BTC");
                $('#LTC_q').text("$ " + response.litecoin.usd);

                $('#XRPUSD').text((<?php echo Auth::user()->total_amount ?> / (response.dogecoin.usd)) + " BTC");
                $('#XRP_q').text("$ " + response.dogecoin.usd);

                // btc.innerHTML = response.bitcoin.usd;
                // ltc.innerHTML = response.litecoin.usd;
                // eth.innerHTML = response.ethereum.usd;
                // doge.innerHTML = response.dogecoin.usd;

            });
        }
        getData();
        setInterval(getData, 5000);
    </script>

</body>

</html>