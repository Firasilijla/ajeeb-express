<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>TrxPlus - Buy</title>
    <link rel="stylesheet" href="{{asset('userassets/vendor/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('userassets/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">



    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />


    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-dark.png')}}" />
    <style>
        *{
            background-color: #114E60;
        }
       

        .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flex-col {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #114E60;
        }

        .flex-col img {
            margin: 30  px 0px 15px 0px;

        }

        .flex-col input {
            margin: 30px 0px 15px 0px;
            width: 280px;
        }

        i {
            padding: 5px;
            font-size: 20px;
            background-color: #eee;
            color: #114E60;
            box-shadow: 0px 0px 15px black;
            margin: 5px;
        }

        .btn-bottom input {
            position: fixed;
            z-index: 999;
            width: 100%;
            background-color: #114E60;
            color: #eee;
            text-align: center;
            height: 50px;
            bottom: 0;
            border: none;

        }
    </style>
</head>

<body>

   


    <div class="page page--main" data-page="buy">

        <!-- HEADER -->
        <header class="header header--fixed">
            <div class="header__inner">
                <div class="header__icon"><a href="{{route('user.user.home')}}"><img src="{{asset('userassets/img/icons/arrow-back.svg')}}" alt="image" title="image" /></a></div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <div class="flex-col" id="" >
            <img src="{{asset('userassets/img/admin/qr.png')}}">
            <div class="flex">
            <h1>ETH</h1>
            <form enctype="multipart/form-data" id="myForm">
                        @csrf
                <input type="text" readonly value="TEgZr9tHVz1k1UxqPWkAN6XPnDa4yu7NB1">
                <input type="text" name="quantites" value="1">
                    <input type="hidden" name="quantites_convert" value="1">                <input type="hidden" name="type" value="ETH">
                <i class="fas fa-copy"></i>
                </form>
            </div>
        </div>

    </div>
    </div>

    </div>
    <!-- PAGE END -->
    <div class="btn btn-bottom">

    <input type="submit" value="  إياداع" id="deposit">
    </div>

   

    <!-- Notifications -->
    <div id="popup-notifications"></div>
    <script src="{{asset('userassets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var copyLinks = document.querySelectorAll('.copy-link');
            copyLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var href = this.getAttribute('value');

                    // Create a temporary input element
                    var tempInput = document.createElement('input');
                    tempInput.style.position = 'fixed';
                    tempInput.style.opacity = '0';
                    tempInput.value = href;
                    document.body.appendChild(tempInput);
                    tempInput.select();

                    // Copy the link href to the clipboard
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    this.setAttribute('title', 'Copied!');
                    setTimeout(() => {
                        this.setAttribute('title', 'Click to copy');
                    }, 2000);

                });
            });
        });
        $(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('user.Settings.getQRData') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(res) {
                    Qr_image_trc_url = "{{asset('url')}}";
                    Qr_image_trc = Qr_image_trc_url.replace("url", res.Qr_image_trc);
                    Qr_image_erc_url = "{{asset('url')}}";
                    Qr_image_erc = Qr_image_erc_url.replace("url", res.Qr_image_erc);

                    $("#Qr_image_trc").attr("src", Qr_image_trc);
                    $("#Qr_image_erc").attr("src", Qr_image_erc);
                    $("#Qr_address_trc").val(res.Qr_address_trc);
                    $("#Qr_address_erc").val(res.Qr_address_erc);
                }
            });
        });
        // -------------copies link ------ 


        $('body').on('click', '#deposit', function() {
            let myForm = document.getElementById('myForm');
            let formData = new FormData($('#myForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('user.Deposit.DepositAmount')}}",
                enctype: "multipart/form-data",
                data: formData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {

                    if (res.status == '1') {
                        $('#myForm')[0].reset();

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
        $('#yourInputBoxHere').mask("99/99", {
            placeholder: 'MM/YY'
        });
        $('#card_number').mask("9999 9999 9999 9999");
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
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
    <script src="{{asset('userassets/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/jquery/jquery.validate.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('userassets/js/swiper-init-swipe.js')}}"></script>
    <script src="{{asset('userassets/js/jquery.custom.js')}}"></script>
    <script src="{{asset('userassets/js/header-scroll.js')}}"></script>









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
    <script>
        "use strict";
        var KTDatatablesAdvancedColumnRendering = function() {

            var init = function() {
                var table = $('#kt_datatable');

                // begin first table
                table.DataTable({
                    responsive: true,
                    paging: true,
                    columnDefs: [{
                            targets: 0,
                            title: 'Agent',
                            render: function(data, type, full, meta) {
                                var number = KTUtil.getRandomInt(1, 14);
                                var user_img = '100_' + number + '.jpg';

                                var output;
                                if (number > 8) {
                                    output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 flex-shrink-0">
                                        <img src="assets/media/users/` + user_img + `" alt="photo">
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
                                } else {
                                    var stateNo = KTUtil.getRandomInt(0, 7);
                                    var states = [
                                        'success',
                                        'light',
                                        'danger',
                                        'success',
                                        'warning',
                                        'dark',
                                        'primary',
                                        'info'
                                    ];

                                    var state = states[stateNo];

                                    output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full[2].substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
                                }

                                return output;
                            },
                        },
                        {
                            targets: 1,
                            render: function(data, type, full, meta) {
                                return '<a class="text-dark-50 text-hover-primary" href="mailto:' + data + '">' + data + '</a>';
                            },
                        },
                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
									</ul>\
							  	</div>\
							</div>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a>\
						';
                            },
                        },
                        {
                            targets: 4,
                            render: function(data, type, full, meta) {
                                var status = {
                                    1: {
                                        'title': 'Pending',
                                        'class': 'label-light-primary'
                                    },
                                    2: {
                                        'title': 'Delivered',
                                        'class': ' label-light-danger'
                                    },
                                    3: {
                                        'title': 'Canceled',
                                        'class': ' label-light-primary'
                                    },
                                    4: {
                                        'title': 'Success',
                                        'class': ' label-light-success'
                                    },
                                    5: {
                                        'title': 'Info',
                                        'class': ' label-light-info'
                                    },
                                    6: {
                                        'title': 'Danger',
                                        'class': ' label-light-danger'
                                    },
                                    7: {
                                        'title': 'Warning',
                                        'class': ' label-light-warning'
                                    },
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                            },
                        },
                        {
                            targets: 5,
                            render: function(data, type, full, meta) {
                                var status = {
                                    1: {
                                        'title': 'Online',
                                        'state': 'danger'
                                    },
                                    2: {
                                        'title': 'Retail',
                                        'state': 'primary'
                                    },
                                    3: {
                                        'title': 'Direct',
                                        'state': 'success'
                                    },
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                    '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                            },
                        },
                    ],
                });

                $('#kt_datatable_search_status').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_datatable_search_type').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Type');
                });

                $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
            };

            return {

                //main function to initiate the module
                init: function() {
                    init();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTDatatablesAdvancedColumnRendering.init();
        });
    </script>
</body>

</html>