<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>TrxPlus - Trx-deposit</title>
    <link rel="stylesheet" href="{{asset('userassets/vendor/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('userassets/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <style>
        .skiptranslate {
            display: none;
        }

        body {
            top: 0px !important;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <!-- Overlay panel -->
    <div class="body-overlay"></div>
    <!-- Left panel -->
    <div id="panel-left"></div>



    <div class="page page--main" data-page="buy">

        <!-- HEADER -->
        <header class="header header--fixed">
            <div class="header__inner">
                <div class="header__icon"><a href="{{route('user.user.home')}}"><img src="{{asset('userassets/img/icons/arrow-back.svg')}}" alt="image" title="image" /></a></div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <div class="page__content page__content--with-header page__content--with-bottom-nav">
            <h2 class="page__title">Bay TRX</h2>

            <div class="fieldset">
                <div class="form">
                    <form enctype="multipart/form-data" id="myForm">
                        @csrf

                        <div class="form__row d-flex align-items-center justify-space">
                            <input type="number" name="receive_amount" id="receive_amount" value="" class="form__input form__input--23" placeholder="0.00" />
                            <div class="form__coin-icon select_icon"><img src="{{asset('userassets/img/logos/tether.png')}}" alt="" title="" /><span>USDT</span></div>
                            <span class="error" id="receive_amount_error"></span>
                        </div>

                        <div class="form__coin-total price"> TRX</div>
                    </form>
                </div>
            </div>




        </div>




    </div>
    <!-- PAGE END -->

    <div class="bottom-fixed-button">
        <input type="submit" id="buytrx" value="Buy TRX" class="button button--full button--main ">
    </div>

    <!-- Social Icons Popup -->
    <div id="popup-social"></div>

    <!-- Alert -->
    <div id="popup-success"></div>

    <!-- Notifications -->
    <div id="popup-notifications"></div>

    <script src="{{asset('userassets/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/jquery/jquery.validate.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('userassets/js/swiper-init-swipe.js')}}"></script>
    <script src="{{asset('userassets/js/jquery.custom.js')}}"></script>
    <script src="{{asset('userassets/js/header-scroll.js')}}"></script>
    <script>
        $('body').on('click', '#buytrx', function() {
            var amount = $("#receive_amount").val();
            if (amount == 0) {
                $("#receive_amount_error").text('The Ammount Must Be more Than Zero');
            } else {
                $("#receive_amount_error").text('');
                var url = 'acceptTRXAmount?usd=' + amount;

                window.location.href = url;
            }
        });
        $(".popup__close").click(function() {
            $(".popup--notifications").css("display", 'none');
            $(".open-popup").css("display", 'block');

        });
        $(".open-popup").click(function() {
            $(".open-popup").css("display", 'none');
        });
        $('.send_code').on('click', function() {
            $.get("resendCode", function(data) {
                $('.send_code').html("RE-SEND" + '<i class="fa fa-check"></i>');

            })
        });
        $("#selectoptions").change(function() {
            $(".select_icon").empty();
            if ($("#selectoptions").val() == "bit") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/bitcoin.png")}}" alt="" title=""/><span>BTC</span>');
                $(".price").html(5.20 + ' BTC');
            } else if ($("#selectoptions").val() == "eth") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/ethereum.png")}}"  alt="" title=""/><span>ETH</span>');
                $(".price").html(13.87 + ' ETH');

            } else if ($("#selectoptions").val() == "sand") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/sandbox.png")}}"  alt="" title=""/><span>SAND</span>');

                $(".price").html(2, 495.00 + ' SAND');

            } else {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/tether.png")}}"  alt="" title=""/><span>USDT</span>');
                $(".price").html(572550 + ' USDT');


            }
        });
    </script>
    <script>
        $("#selectoptions").change(function() {
            $(".select_icon").empty();
            if ($("#selectoptions").val() == "bit") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/bitcoin.png")}}" alt="" title=""/><span>BTC</span>');
                $(".price").html(5.20 + ' BTC');
            } else if ($("#selectoptions").val() == "eth") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/ethereum.png")}}" alt="" title=""/><span>ETH</span>');
                $(".price").html(13.87 + ' ETH');

            } else if ($("#selectoptions").val() == "sand") {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/sandbox.png")}}" alt="" title=""/><span>SAND</span>');

                $(".price").html(2, 495.00 + ' SAND');

            } else {
                $(".select_icon").html('<img src="{{asset("userassets/img/logos/tether.png")}}" alt="" title=""/><span>USDT</span>');
                $(".price").html(572, 550.00 + ' USDT');


            }
        });
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        $(document).ready(function() {
            $('#google_translate_element').bind('DOMNodeInserted', function(event) {
                $('.goog-te-menu-value span:first').html('LANGUAGE');
                $('.goog-te-menu-frame.skiptranslate').load(function() {
                    setTimeout(function() {
                        $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('LANGUAGE');
                    }, 100);
                });
            });
        });
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: "en,fr,ar,es",
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
</body>

</html>