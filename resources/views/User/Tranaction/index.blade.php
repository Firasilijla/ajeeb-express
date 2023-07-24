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

        <!-- </div> -->
        <div class="spacer mt-5 col-lg-12 ">
            <h2 class="text-right mt-5">Transaction </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2" id="transactions">
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

<!-- -----------modal -->
<div class="modal fade  Passcode-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Transaction Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" data-scroll="true" data-height="100">

                <div class="row">

                    <div class="col-lg-12 d-flex justify-content-between align-item-center">
                        <div class="ml-6">
                            <span class="svg-icon svg-icon-danger svg-icon-4x">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                <img id="trans_logo" src="{{asset('userassets/img/logos/lti.png')}}" width="50" height="50">
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <div class="mr-6">
                        
                            
                            <a id="trans_status" class="p-4 label label-light-success label-inline font-weight-bold">Verified <i class="fas fa-award  m-2 text-success font-size-h5"></i></a> 
                            <a id="trans_type" class="btn btn-sm btn-icon btn-bg-light btn-text-success btn-hover-success" href="{{route('user.Deposit.UsergetDeposit')}}">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="form-group row">
                            <label class="col-xl-12 col-lg-12 col-form-label text-right">
                                Transaction Quantites</label>

                            <div class="col-lg-9 col-xl-12">
                                <input readonly id="trans_Quantites" class="form-control form-control form-control-lg" name="" type="text" value="" placeholder=" " />

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="form-group row">
                            <label class="col-xl-12 col-lg-12 col-form-label text-right">
                            Transaction Quantites Convert</label>
                            <div class="col-lg-9 col-xl-12">
                                <input readonly id="trans_Quantites_Convert"  class="form-control form-control form-control-lg" type="text" value="" placeholder=" " />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="form-group row">
                            <label class="col-xl-12 col-lg-12 col-form-label text-right">
                            Transaction Date</label>
                            <div class="col-lg-9 col-xl-12">
                                <input readonly id="trans_date"  class="form-control form-control form-control-lg" type="text" value="" placeholder=" " />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button"  class="btn btn-primary font-weight-bold">Ok </button>
            </div>
        </div>
    </div>
</div>
@endsection
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


        // --------------
        var icondeposit = ' <i class="fas fa-arrow-alt-circle-down"></i>';
        var iconwithdraw = ' <i class="fas fa-arrow-circle-up"></i>';
        var icontrx = ' <i class="far fa-credit-card"></i>';

        $.ajax({
            type: "POST",
            url: "{{ route('user.Tranaction.getTranactionUserData') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {

                $("#transactions").empty();
                $.each(res, function(key, value) {
                    var logo = "";
                    var transType = "";
                    var iconOperation = "";
                    var color = "";
                    if (value.type == "TRX") {
                        logo = xrp_logo;
                        transType = "Deposit TRX";
                        iconOperation = icontrx;
                        color = "primary";
                    }
                    if (value.type == "WITHDROW") {
                        logo = xrp_logo;
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
                  
                    $("#transactions").append(' <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-2">' +
                        '<div class="card card-custom   mb-8 mb-lg-0 transaction-details" data-toggle="modal" data-target="#exampleModalSizeXl2"  href="javascript:void(0)"  data-id="' + value.id + '">' +
                        '<div class="card-body border rounded border-1 border-dark p-1">' +
                        '  <div class="d-flex align-items-center justify-content-between p-1">' +

                        ' <div class="ml-6 d-flex align-items-center justify-content-between">' +
                        ' <span class="svg-icon svg-icon-' + color + ' svg-icon-4x">' + logo + ' </span>' +
                        '  <div>' +
                        ' <span class=" mr-5 " style="font-weight: bolder;font-family: ' +
                        'Times New Roman , Times, serif;font-size: 20px;">' + transType + '</span>' +
                        '  </div>' +
                        ' </div>' +

                        '  <div class="">' +
                        '   <a class="btn btn-sm btn-icon btn-bg-light btn-text-' + color + ' btn-hover-' + color + '" >' +
                        '     ' + iconOperation +
                        '  </a>' +
                        '  <div class="text-dark-75 mt-2">' + value.quantites + ' $</div>' +
                        '  </div>' +

                        '  </div>' +
                        ' </div>' +
                        ' </div>' +

                        '   ');

                });






            },
            error: function(res) {
                alert("error");
            }
        });

        // --------transaction-details- 
        $('body').on('click', '.transaction-details', function() {
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "{{ route('user.Tranaction.getTranactionDetails') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                dataType: 'json',
                success: function(res) {
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


                    // --------------
                    var icondeposit = ' <i class="fas fa-arrow-alt-circle-down"></i>';
                    var iconwithdraw = ' <i class="fas fa-arrow-circle-up"></i>';
                    var icontrx = ' <i class="far fa-credit-card"></i>';
                    var logo = "";
                    var transType = "";
                    var iconOperation = "";
                    var color = "";
                    if (res.type == "TRX") {
                        logo = xrp_logo_path;
                        transType = "Deposit TRX";
                        iconOperation = icontrx;
                        color = "primary";
                    }
                    if (res.type == "WITHDROW") {
                        logo = xrp_logo_path;
                        transType = "Withdraw";
                        iconOperation = iconwithdraw;
                        color = "danger";
                    }

                    if (res.type == "DEPOSIT_USD") {
                        logo = xrp_logo_path;
                        transType = "Deposit USD";
                        iconOperation = icondeposit;
                        color = "success";
                    }

                    if (res.type == "DEPOSIT_BTC") {
                        logo = bitcoin_logo_path;
                        transType = "Deposit BTC";
                        iconOperation = icondeposit;
                        color = "success";
                    }

                    if (res.type == "DEPOSIT_LTC") {
                        logo = ltc_logo_path;
                        transType = "Deposit LTC";
                        iconOperation = icondeposit;
                        color = "success";
                    }
                    if (res.type == "DEPOSIT_ETH") {
                        logo = eth_logo_path;
                        transType = "Deposit ETH";
                        iconOperation = icondeposit;
                        color = "success";
                    }
                    $("#trans_Quantites").val(res.quantites+" $");
                    $("#trans_Quantites_Convert").val(res.quantites_convert);
                    $("#trans_date").val(res.created_at);
                    $("#trans_logo").attr("src",logo);

                    $("#trans_type").empty();
                    $("#trans_type").removeClass("btn btn-sm btn-icon btn-bg-light btn-text-danger btn-hover-danger");
                    $("#trans_type").removeClass("btn btn-sm btn-icon btn-bg-light btn-text-primary btn-hover-primary");
                    $("#trans_type").removeClass("btn btn-sm btn-icon btn-bg-light btn-text-success btn-hover-success");

                    $("#trans_type").addClass("btn btn-sm btn-icon btn-bg-light btn-text-"+color+" btn-hover-"+color);
                    $("#trans_type").append(iconOperation);


                    $("#trans_status").empty();
                    $("#trans_status").text("");
                    $("#trans_status").text((res.status==1)?"Accepted":"Not Accept");
                    // $("#trans_status").removeClass("p-4 label label-light-success label-inline font-weight-bold");
                    // $("#trans_status").removeClass("p-4 label label-light-danger label-inline font-weight-bold");
                    $("#trans_status").addClass("p-4 label label-light-"+((res.status==1)?"success":"danger")+" label-inline font-weight-bold");
                    $("#trans_status").append((res.status==1)?'<i class="fas fa-award  m-2 text-success font-size-h5"></i>':'  <i class="far fa-times-circle  m-2 text-danger font-size-h5"></i>');
                  
                   


                },
                error: function(res) {


                }

            });
        });
    });
</script>
@endsection