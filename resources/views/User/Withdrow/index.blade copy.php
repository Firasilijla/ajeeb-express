<!DOCTYPE html>
<html lang="en">
<?php

use Illuminate\Support\Facades\Auth; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>TrxPlus - Withdraw</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('assets/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-dark.png')}}" />
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <style>
    </style>
    <style>
        body {
            top: 0px !important;
        }

        .skiptranslate {
            display: none;
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
        <div class="page__content page__content--with-header page__content--with-bottom-nav" id="receive-coin">
            <h2 class="page__title">Withdraw</h2>

            <div class="fieldset">
                <div class="form">
                    <form enctype="multipart/form-data" id="myForm">
                        @csrf

                        <div class="form__row d-flex align-items-center justify-space">
                            <input type="number" name="withdrow_amount" value="" class="form__input form__input--23" placeholder="0.00" />
                            <div class="form__coin-icon select_icon"><img src="{{asset('userassets/img/logos/tether.png')}}" alt="" title="" /><span>USDT</span></div>


                        </div>

                        <!-- <div class="form__coin-total price">572,550.00 USDT</div> -->
                </div>
            </div>
            <h2 class="page__title">Wallet address</h2>
            <div class="fieldset">

                <div class="form">
                    <div class="form__row">
                        <input type="text" name="withdrow_address" value="" class="form__input required" placeholder="" />
                    </div>
                    <!-- 0x20917F3d41BA1bb921 -->
                    <!-- Notifications -->

                    </form>
                </div>

            </div>



        </div>




    </div>
    <!-- PAGE END -->
    <div class="bottom-fixed-button">
        <input type="submit" id="Withdraw" value="Withdraw" class="button button--full button--main ">
    </div>
    <div class="modal fade  Passcode-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Withdrow PassCode </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body" data-scroll="true" data-height="100">
                    <form enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-xl-12 col-lg-12 col-form-label text-right">
                                        PassCode</label>

                                    <div class="col-lg-9 col-xl-12">
                                        <input class="form-control form-control form-control-lg" name="passcode" id="passcode" type="password" value="" placeholder="Enter PassCode " />
                                        <span class="error" id="passcode_error"></span>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                    <button type="button" id="passcode-btn" class="btn btn-primary font-weight-bold">WithDraw </button>
                </div>
            </div>
        </div>
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
        $('body').on('click', '#Withdraw', function() {
            $(".Passcode-modal").modal('toggle');

        });
        $('body').on('click', '#passcode-btn', function() {
            var passcode = $("#passcode").val();
            if (passcode == <?php echo Auth::user()->passcode ?>) {
                withdraw();
            } else {
                Swal.fire(
                    "PassCode InCorrect !!",
                    "Please Enter Correct PassCode !!",
                    'fail'
                );

            }
        });

        function withdraw() {
            let myForm = document.getElementById('myForm');
            let formData = new FormData($('#myForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('user.Withdrow.WithdrowAmount') }}",
                enctype: "multipart/form-data",
                data: formData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {

                    if (res.status == '1') {
                        $('#myForm')[0].reset();
                        // --------clear modal passcode -----
                        $("#passcode").val("");
                        $(".Passcode-modal").modal('toggle');
                        Swal.fire(
                            res.title,
                            res.msg,
                            'success'
                        );
                    } else {
                        Swal.fire(
                            res.title,
                            res.msg,
                            'fail'
                        );
                    }



                },
                error: function(reject) {
                    Swal.fire(
                        "fail operation",
                        "fail operation pleas try agine",
                        'fail'
                    );
                }
            });
        }
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
    <!-- ------------admin ----  -->

    <script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script>
        var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });
    </script>

    <!--end::Demo Panel-->
    <script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script>
        var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });
    </script>

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <!--end::Page Scripts-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/datatables/advanced/column-rendering.js')}}"></script>

    </script>

</body>

</html>