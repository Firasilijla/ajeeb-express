@extends('User.layouts.app')
@section('title',' Home ')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-custom mb-5">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->


                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1" />
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1" />
                                            <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">$ {{Auth::user()->total_amount}} </span>
                            <span class="text-muted font-weight-bold mt-2"> USDT Balanced</span>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-custom mb-5 ">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                    <strong style="font-size: 25px;">T</strong>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">T {{Auth::user()->total_trx}}</span>
                            <span class="text-muted font-weight-bold mt-2"> TRX Balanced</span>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" id="mobile-transaction">

            <ul class="d-flex nav flex-row pl-2 pr-2  pb-3  container-fluid d-flex  flex-md-row align-items-center justify-content-center">
                <!--begin::Item-->
                <li class="nav-item m-5 " id="kt_demo_panel_toggle" data-toggle="tooltip" title="">
                    <a class="btn  btn-lg btn-success text-center btn-bg-light btn-text-success btn-hover-success active  d-flex  flex-column align-items-center justify-content-center" style="width: 120px;" href="{{route('user.Deposit.UsergetDeposit')}}">
                        <i class="fas fa-arrow-alt-circle-down" style="font-size: 25px;"></i>
                        <p class="m-3">Deposit</p>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item m-5" data-toggle="tooltip" title="" data-placement="left" data-original-title="Layout Builder">
                    <a class="btn btn-lg  btn-bg-light btn-text-danger btn-hover-danger active d-flex  flex-column align-items-center justify-content-center" style="width: 120px;" href="{{route('user.Withdrow.getWithdrow')}}" target="">
                        <i class="fas fa-arrow-circle-up" style="font-size: 25px;"></i>
                        <p class="m-3">Withdraw</p>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item m-5" data-toggle="tooltip" title="" data-placement="left" data-original-title="Documentation">
                    <a class="btn btn-lg  btn-bg-light btn-text-primary btn-hover-primary active d-flex  flex-column align-items-center justify-content-center" style="width: 120px;" href="{{route('user.TRX.getTRX')}}" target="">
                        <i class="far fa-credit-card" style="font-size: 25px;"></i>
                        <p class="m-3">Buy Trx</p>
                    </a>
                </li>

                <!--end::Item-->
            </ul>
        </div>
        <!-- <div class="row"> -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="ml-6">
                            <span class="svg-icon svg-icon-primary svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                                <img src="{{asset('userassets/img/logos/Bitcoin_r.png')}}" width="60" height="60">
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="{{route('user.UserChart.BTCTradindChart')}}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">BitCoin</a>
                            <div class="text-dark-75">50285.6 $</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="ml-6">
                            <span class="svg-icon svg-icon-danger svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                <img src="{{asset('userassets/img/logos/eth.png')}}" width="60" height="60">
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="{{route('user.UserChart.ETHTradindChart')}}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Ethereum</a>
                            <div class="text-dark-75">46846489.9</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="ml-6">
                            <span class="svg-icon svg-icon-danger svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                <img src="{{asset('userassets/img/logos/lti.png')}}" width="60" height="60">
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="{{route('user.UserChart.LTCTradindChart')}}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">LiteCoin</a>
                            <div class="text-dark-75">4961551.5 $</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <!--begin::Callout-->
            <div class="card card-custom wave wave-animate-slow wave-dark mb-8 mb-lg-0">
                <div class="card-body">
                    <div class="d-flex align-items-center p-5">
                        <!--begin::Icon-->
                        <div class="ml-6">
                            <span class="svg-icon svg-icon-danger svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                <img src="{{asset('userassets/img/logos/xrp.png')}}" width="60" height="60"> <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column">
                            <a href="{{route('user.UserChart.XRPTradindChart')}}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">XRPUSD</a>
                            <div class="text-dark-75">649664.9 $</div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
            <!--end::Callout-->
        </div>
        <!-- </div> -->
        <div class="spacer mt-5 col-lg-12 ">
            <h2 class="text-right mt-5">Transaction </h2>
        </div>
        <div class="col-lg-12 col-md-10 col-sm-10 col-10 mt-2" id="transactions">
            <!-- <div class="col-lg-12 col-md-6 col-sm-6 col-6 mt-2">
                <div class="card card-custom   mb-8 mb-lg-0">
                    <div class="card-body border rounded border-4 border-success p-1">
                        <div class="d-flex align-items-center justify-content-between p-1">
                            <div class="ml-6 d-flex align-items-center justify-content-between">
                                <span class="svg-icon svg-icon-danger svg-icon-4x">
                                    <img src="{{asset('userassets/img/logos/Bitcoin_r.png')}}" width="40" height="40">
                                </span>
                                <div>
                                    <span class=" mr-5 " style="font-weight: bolder;font-family: 'Times New Roman', Times, serif;font-size: 20px;">Deposit</span>
                                </div>
                            </div>
                            <div class="">
                                <a class="btn btn-sm btn-icon btn-bg-light btn-text-success btn-hover-success" href="{{route('user.Deposit.UsergetDeposit')}}">
                                    <i class="fas fa-arrow-alt-circle-down"></i>
                                </a>
                                <div class="text-dark-75 mt-2">649664.9 $</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>


    </div>
</div>

<!-- --------------  -->
@section('ContentJs')
<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(function() {
        //   ------------logos ----------- 
        var bitcoin_logo_url = "{{asset('url')}}";
        var bitcoin_logo_path = bitcoin_logo_url.replace("url", "userassets/img/logos/Bitcoin_r.png");
        var bitcoin_logo = ' <img src="' + bitcoin_logo_path + '" width="40" height="40">';

        var eth_logo_url = "{{asset('url')}}";
        var eth_logo_path = eth_logo_url.replace("url", "userassets/img/logos/eth.png");
        var eth_logo = ' <img src="' + eth_logo_path + '" width="40" height="40">';

        var ltc_logo_url = "{{asset('url')}}";
        var ltc_logo_path = ltc_logo_url.replace("url", "userassets/img/logos/lti.png");
        var ltc_logo = ' <img src="' + ltc_logo_path + '" width="40" height="40">';

        var xrp_logo_url = "{{asset('url')}}";
        var xrp_logo_path = xrp_logo_url.replace("url", "userassets/img/logos/xrp.png");
        var xrp_logo = ' <img src="' + xrp_logo_path + '" width="40" height="40">';

        var trx_logo_url = "{{asset('url')}}";
        var trx_logo_path = trx_logo_url.replace("url", "userassets/img/logos/trx.png");
        var trx_logo = ' <img src="' + trx_logo_path + '" width="40" height="40">';


        var teh_logo_url = "{{asset('url')}}";
        var teh_logo_path = teh_logo_url.replace("url", "userassets/img/logos/teh.png");
        var teh_logo = ' <img src="' + teh_logo_path + '" width="40" height="40">';

        // --------------
        var icondeposit = ' <i class="fas fa-arrow-alt-circle-down"></i>';
        var iconwithdraw = ' <i class="fas fa-arrow-circle-up"></i>';
        var icontrx = ' <i class="far fa-credit-card"></i>';

        $.ajax({
            type: "POST",
            url: "{{ route('user.Tranaction.getTranactionData') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {

                // $("#transactions").empty();
                $.each(res, function(key, value) {
                    var logo = "";
                    var transType = "";
                    var iconOperation = "";
                    var color = "";
                    if (value.type == "TRX") {
                        logo = trx_logo;
                        transType = "Deposit TRX";
                        iconOperation = icontrx;
                        color = "primary";
                    }
                    if (value.type == "WITHDROW") {
                        logo = teh_logo;
                        transType = "Withdraw";
                        iconOperation = iconwithdraw;
                        color = "danger";
                    }

                    if (value.type == "DEPOSIT_USD") {
                        logo = xrp_logo;
                        transType = "Deposit USD";
                        iconOperation = icondeposit;
                        color = "success";
                    }

                    if (value.type == "DEPOSIT_BTC") {
                        logo = bitcoin_logo;
                        transType = "Deposit BTC";
                        iconOperation = icondeposit;
                        color = "success";
                    }

                    if (value.type == "DEPOSIT_LTC") {
                        logo = ltc_logo;
                        transType = "Deposit LTC";
                        iconOperation = icondeposit;
                        color = "success";
                    }
                    if (value.type == "DEPOSIT_ETH") {
                        logo = eth_logo;
                        transType = "Deposit ETH";
                        iconOperation = icondeposit;
                        color = "success";
                    }
                    // $("#transactions").append(' <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">' +
                    //     '<div class="card card-custom   mb-8 mb-lg-0">' +
                    //     '<div class="card-body border rounded border-4 border-' + color + ' p-1">' +
                    //     '  <div class="d-flex align-items-center justify-content-between p-1">' +

                    //     ' <div class="ml-6 d-flex align-items-center justify-content-between">' +
                    //     ' <span class="svg-icon svg-icon-' + color + ' svg-icon-4x">' + logo + ' </span>' +
                    //     '  <div>' +
                    //     ' <span class=" mr-5 " style="font-weight: bolder;font-family: ' +
                    //     'Times New Roman , Times, serif;font-size: 20px;">' + transType + '</span>' +
                    //     '  </div>' +
                    //     ' </div>' +

                    //     '  <div class="">' +
                    //     '   <a class="btn btn-sm btn-icon btn-bg-light btn-text-' + color + ' btn-hover-' + color + '" >' +
                    //     '     ' + iconOperation +
                    //     '  </a>' +
                    //     '  <div class="text-dark-75 mt-2">' + value.quantites + ' $</div>' +
                    //     '  </div>' +

                    //     '  </div>' +
                    //     ' </div>' +
                    //     ' </div>' +

                    //     '   </div>');

                });






            },
            error: function(res) {
                alert("error");
            }
        });






        let transactiontype = ["Deposit LTC", "Deposit BTC", "Deposit ETH", "Deposit XRP", "Deposit TRX", "Withdraw"];
        let transactionlogo = [ltc_logo, bitcoin_logo, eth_logo, xrp_logo, trx_logo, teh_logo];
        let transactionicon = [icondeposit, icontrx, iconwithdraw];
        let colorsArray = ["success", "success", "success", "success", "primary", "danger"];

        
        let randomq = Math.random() * 1000;
        

        let icon = transactionicon[0];
        for (let index = 0; index < 30; index++) {
            addStaticRandomElementToTransaction();

        }

        function addStaticRandomElementToTransaction() {
            const currentDate = new Date();

const year = currentDate.getFullYear(); // Returns the current year (e.g., 2023)
const month = currentDate.getMonth() + 1; // Returns the current month (0-11, so we add 1)
const day = currentDate.getDate(); // Returns the current day of the month (1-31)
const hours = currentDate.getHours(); // Returns the current hour (0-23)
const minutes = currentDate.getMinutes(); // Returns the current minute (0-59)
const seconds = currentDate.getSeconds(); // Returns the current second (0-59)

            // alert('dd');
            let randomIndex = Math.floor(Math.random() * 6);
            switch (randomIndex) {
                case 0:
                    icon = transactionicon[0];

                    break;
                case 1:
                    icon = transactionicon[0];
                    break;
                case 2:
                    icon = transactionicon[0];
                    break;
                case 3:
                    icon = transactionicon[0];
                    break;
                case 4:
                    icon = transactionicon[1];
                    break;
                case 5:
                    icon = transactionicon[2];
                    break;
            }

            let randomq = Math.random() * 1000;
            $("#transactions").prepend(' <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2 id="transactions">' +
                '<div class="card card-custom   mb-8 mb-lg-0">' +
                '<div class="card-body border rounded border-4 border-' + colorsArray[randomIndex] + ' p-1">' +
                '  <div class="d-flex align-items-center justify-content-between p-1">' +

                ' <div class="ml-6 d-flex align-items-center justify-content-between">' +
                ' <span class="svg-icon svg-icon-' + colorsArray[randomIndex] + ' svg-icon-4x">' + transactionlogo[randomIndex] + ' </span>' +
                '  <div>' +
                ' <span class=" mr-5 " style="font-weight: bolder;font-family: ' +
                'Times New Roman , Times, serif;font-size: 20px;">' + transactiontype[randomIndex] + '</span>' +
                '  </div>' +
                ' </div>' +

                '  <div class="">' +
                '   <a class="btn btn-sm btn-icon btn-bg-light btn-text-' + colorsArray[randomIndex] + ' btn-hover-' + colorsArray[randomIndex] + '" >' +
                '     ' + icon +
                '  </a>' +
                '  <div class="text-dark-75 mt-2">' + `${year}-${month}-${day} : ${hours}:${minutes}:${seconds}`+ '</div>' +

                '  <div class="text-dark-75 mt-2">' + randomq + ' $</div>' +
                '  </div>' +

                '  </div>' +
                ' </div>' +
                ' </div>' +

                '   </div>');
            // let lastElement = $("#transactions").children().last();
            // lastElement.remove();

        }

        function addRandomElementToTransaction() {
            const currentDate = new Date();

const year = currentDate.getFullYear(); // Returns the current year (e.g., 2023)
const month = currentDate.getMonth() + 1; // Returns the current month (0-11, so we add 1)
const day = currentDate.getDate(); // Returns the current day of the month (1-31)
const hours = currentDate.getHours(); // Returns the current hour (0-23)
const minutes = currentDate.getMinutes(); // Returns the current minute (0-59)
const seconds = currentDate.getSeconds(); // Returns the current second (0-59)

            let randomIndex = Math.floor(Math.random() * 6);
            switch (randomIndex) {
                case 0:
                    icon = transactionicon[0];

                    break;
                case 1:
                    icon = transactionicon[0];
                    break;
                case 2:
                    icon = transactionicon[0];
                    break;
                case 3:
                    icon = transactionicon[0];
                    break;
                case 4:
                    icon = transactionicon[1];
                    break;
                case 5:
                    icon = transactionicon[2];
                    break;
            }

            $("#transactions").prepend(' <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2 id="transactions">' +
                '<div class="card card-custom   mb-8 mb-lg-0">' +
                '<div class="card-body border rounded border-4 border-' + colorsArray[randomIndex] + ' p-1">' +
                '  <div class="d-flex align-items-center justify-content-between p-1">' +

                ' <div class="ml-6 d-flex align-items-center justify-content-between">' +
                ' <span class="svg-icon svg-icon-' + colorsArray[randomIndex] + ' svg-icon-4x">' + transactionlogo[randomIndex] + ' </span>' +
                '  <div>' +
                ' <span class=" mr-5 " style="font-weight: bolder;font-family: ' +
                'Times New Roman , Times, serif;font-size: 20px;">' + transactiontype[randomIndex] + '</span>' +
                '  </div>' +
                ' </div>' +

                '  <div class="">' +
                '   <a class="btn btn-sm btn-icon btn-bg-light btn-text-' + colorsArray[randomIndex] + ' btn-hover-' + colorsArray[randomIndex] + '" >' +
                '     ' + icon +
                '  </a>' +
                '  <div class="text-dark-75 mt-2">' + `${year}-${month}-${day} : ${hours}:${minutes}:${seconds}`+ '</div>' +
                '  <div class="text-dark-75 mt-2">' + randomq + ' $</div>' +
                '  </div>' +

                '  </div>' +
                ' </div>' +
                ' </div>' +

                '   </div>');
            let lastElement = $("#transactions").children().last();
            lastElement.remove();

        }
        setInterval(addRandomElementToTransaction, 2600);


    });
</script>
@endsection
@endsection