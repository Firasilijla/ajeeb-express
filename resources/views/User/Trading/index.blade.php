@extends('User.layouts.app')
@section('title','Trading ')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Kv4fpoou7zc6J0BeeF8uK3lNpGM4yCtf41ugNgQAPwoyGckL6bC1fULk1UHFn3GqqGzLm7FhYlA4CB9NJq1Vdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .copy-icon {
        cursor: pointer;
    }

    .copied-icon {
        display: none;
    }
</style>

<div class="container">
    <div class="row">

        <div class="d-flex align-items-center justify-content-center p-10" style="width: 100%;">
            <div class="card card-custom  ">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-warning mr-5 ">
                            <span class="symbol-label">
                                <img src="{{asset('userassets/img/logos/Bitcoin_r.png')}}" class="h-75 " alt="">
                            </span>
                        </div>

                        <div class="d-flex flex-column flex-grow-1">
                            <!-- <i class="fas fa-copy"></i> -->

                            <form class="d-flex  align-items-center justify-content-end" enctype="multipart/form-data" id="myForm">
                                @csrf
                                <!-- <input type="button" value="Trading Now" class=" btn btn-warning" id="trading"> -->
                                <input type="button" value="buy" class=" btn btn-success  m-2   " id="buy">
                                <input type="button" value="sale" class=" btn btn-danger m-2" id="sale">

                            </form>


                        </div>

                    </div>
                    <!--end::Top-->

                    <!--begin::Bottom-->
                    <div class="pt-4">
                        <div class="row d-flex justify-content-center">
                            <div class="tradingview-widget-container" id="mobile-chart">

                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container__widget"></div>
                                <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> -->
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                                    {
                                        "symbols": [
                                            [
                                                "BINANCE:BTCUSDT|ALL"
                                            ]
                                        ],
                                        "chartOnly": false,
                                        "width": 400,
                                        "height": 500,
                                        "locale": "en",
                                        "colorTheme": "light",
                                        "autosize": false,
                                        "showVolume": false,
                                        "showMA": false,
                                        "hideDateRanges": false,
                                        "hideMarketStatus": false,
                                        "hideSymbolLogo": false,
                                        "scalePosition": "right",
                                        "scaleMode": "Normal",
                                        "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                        "fontSize": "10",
                                        "noTimeScale": false,
                                        "valuesTracking": "1",
                                        "changeMode": "price-and-percent",
                                        "chartType": "candlesticks",
                                        "maLineColor": "#2962FF",
                                        "maLineWidth": 1,
                                        "maLength": 9,
                                        "lineType": 0,
                                        "dateRanges": [
                                            "1d|1",
                                            "1m|30",
                                            "3m|60",
                                            "12m|1D",
                                            "60m|1W",
                                            "all|1M"
                                        ],
                                        "upColor": "#22ab94",
                                        "downColor": "#f7525f",
                                        "borderUpColor": "#22ab94",
                                        "borderDownColor": "#f7525f",
                                        "wickUpColor": "#22ab94",
                                        "wickDownColor": "#f7525f"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->

                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container " id="desktop-chart">
                                <div class="tradingview-widget-container__widget"></div>
                                <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> -->
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                                    {
                                        "symbols": [
                                            [
                                                "BINANCE:BTCUSDT|ALL"
                                            ]
                                        ],
                                        "chartOnly": false,
                                        "width": 1000,
                                        "height": 500,
                                        "locale": "en",
                                        "colorTheme": "light",
                                        "autosize": false,
                                        "showVolume": false,
                                        "showMA": false,
                                        "hideDateRanges": false,
                                        "hideMarketStatus": false,
                                        "hideSymbolLogo": false,
                                        "scalePosition": "right",
                                        "scaleMode": "Normal",
                                        "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                        "fontSize": "10",
                                        "noTimeScale": false,
                                        "valuesTracking": "1",
                                        "changeMode": "price-and-percent",
                                        "chartType": "candlesticks",
                                        "maLineColor": "#2962FF",
                                        "maLineWidth": 1,
                                        "maLength": 9,
                                        "lineType": 0,
                                        "dateRanges": [
                                            "1d|1",
                                            "1m|30",
                                            "3m|60",
                                            "12m|1D",
                                            "60m|1W",
                                            "all|1M"
                                        ],
                                        "upColor": "#22ab94",
                                        "downColor": "#f7525f",
                                        "borderUpColor": "#22ab94",
                                        "borderDownColor": "#f7525f",
                                        "wickUpColor": "#22ab94",
                                        "wickDownColor": "#f7525f"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <!--end::Bottom-->

                    <!--begin::Separator-->
                    <div class="separator separator-solid mt-2 mb-4"></div>
                    <!--end::Separator-->

                    <!--begin::Editor-->

                    <!--edit::Editor-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
</div>

<!-- -----------modal passcode -->
<div class="modal fade  Passcodebuy-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Trading PassCode </h5>
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
                                    <input class="form-control form-control form-control-lg" name="passcode" id="passcode_buy" type="password" value="" placeholder="Enter PassCode " />
                                    <span class="error" id="passcode_error"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="buy-now" class="btn btn-primary font-weight-bold">Buy Now </button>
            </div>
        </div>
    </div>
</div>

<!-- -----------modal passcode -->
<div class="modal fade  Passcodesale-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Trading PassCode </h5>
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
                                    <input class="form-control form-control form-control-lg" name="passcode" id="passcode_sale" type="password" value="" placeholder="Enter PassCode " />
                                    <span class="error" id="passcode_error"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="sale-now" class="btn btn-primary font-weight-bold">Sale Now </button>
            </div>
        </div>
    </div>
</div>
<!-- -----------modal buy -->
<div class="modal fade  buy-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Trading Buy USD</h5>
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
                                    Buy Quantity</label>
                                <div class="col-lg-9 col-xl-12">
                                    <input class="form-control form-control form-control-lg mb-4" name="buy_q" id="buy_q" type="number" value="" placeholder="Enter buy Quantity " />
                                    <span class="error p-4 mt-4" id="bitcoin_buy"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="buy-ok" class="btn btn-success font-weight-bold">Buy </button>
            </div>
        </div>
    </div>
</div>
<!-- ---------- modal sale ----  -->
<div class="modal fade  sale-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Trading Sale </h5>
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
                                    Sale Quantity</label>
                                <div class="col-lg-9 col-xl-12">
                                    <input class="form-control form-control form-control-lg" name="sale_q" id="sale_q" type="number" value="" placeholder="Enter sale Quantity " />
                                    <span class="error" id="usd_sal"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="sale-ok" class="btn btn-success font-weight-bold">Sale  </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ContentJs')

<script src="{{asset('userassets/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script> -->

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

<script>
    $(function() {

        var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });
        $("#buy_q").on("input", function() {
            const enteredValue = $(this).val();
            $("#bitcoin_buy").text(enteredValue + " BTC");
        });
        $("#sale_q").on("input", function() {
            const enteredValue = $(this).val();
            $("#usd_sal").text(enteredValue + " USD");
        });
        $('body').on('click', '#buy', function() {
            $(".buy-modal").modal('toggle');

        });
        $('body').on('click', '#buy-ok', function() {
            // alert($("#buy_q").val());
            $.ajax({

                type: "POST",
                url: "{{ route('user.Trading.buy_ok') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'buy_q': $("#buy_q").val()
                },
                dataType: 'json',


                success: function(res) {

                    if (res.status == '1') {

                        $(".buy-modal").modal('toggle');
                        $(".Passcodebuy-modal").modal('toggle');
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
        $('body').on('click', '#buy-now', function() {
            // alert($("#passcode_buy").val());
            $.ajax({

                type: "POST",
                url: "{{ route('user.Trading.buy_now') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'buy_q': $("#buy_q").val(),
                    'passcode': $("#passcode_buy").val(),
                    'bitcoin': $("#bitcoin_buy").text()
                },
                dataType: 'json',
                success: function(res) {

                    if (res.status == '1') {
                        Swal.fire(
                            res.title,
                            res.msg,
                            'success'
                        );
                        $(".Passcodebuy-modal").modal('toggle');

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

      
        $('body').on('click', '#sale', function() {
            $(".sale-modal").modal('toggle');

        });
        $('body').on('click', '#sale-ok', function() {
            // alert($("#buy_q").val());
            $.ajax({

                type: "POST",
                url: "{{ route('user.Trading.sale_ok') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'sale_q': $("#sale_q").val()
                },
                dataType: 'json',


                success: function(res) {

                    if (res.status == '1') {

                        $(".sale-modal").modal('toggle');
                        $(".Passcodesale-modal").modal('toggle');
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
        $('body').on('click', '#sale-now', function() {
            // alert($("#passcode_buy").val());
            $.ajax({

                type: "POST",
                url: "{{ route('user.Trading.sale_now') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'sale_q': $("#sale_q").val(),
                    'passcode': $("#passcode_sale").val(),
                    'bitcoin': $("#bitcoin_sale").text()
                },
                dataType: 'json',
                success: function(res) {

                    if (res.status == '1') {
                        Swal.fire(
                            res.title,
                            res.msg,
                            'success'
                        );
                        $(".Passcodesale-modal").modal('toggle');

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
        $('body').on('click', '#trading', function() {


            Swal.fire({
                title: ' are You Surr To buy    ',
                text: " are You Surr To buy Trx final Attempts",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '  Yes Sure'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.Trading.Trading') }}",
                        enctype: "multipart/form-data",
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(res) {

                            if (res.status == '1') {

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
                } else {
                    Swal.fire(
                        "fail operation",
                        "You Canceld Operation",
                        'fail'
                    );
                }

            })


        });
    });
</script>
@endsection