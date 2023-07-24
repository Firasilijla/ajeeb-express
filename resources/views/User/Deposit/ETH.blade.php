@extends('User.layouts.app')
@section('title',' Deposit ETH ')
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

        <div class="d-flex align-items-center justify-content-center  p-10" style="width: 100%;">
            <div class="card card-custom  ">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-info mr-5">
                            <span class="symbol-label">
                                <img src="{{asset('userassets/img/logos/eth.png')}}" class="h-75 " alt="">
                            </span>
                        </div>

                        <div class="d-flex flex-column flex-grow-1">
                            <!-- <i class="fas fa-copy"></i> -->

                            <i class="fas fa-copy copy-icon display-4"></i>
                            <i class="fas fa-check copied-icon " style="font-size: 25px;"></i>
                        </div>

                    </div>
                    <!--end::Top-->

                    <!--begin::Bottom-->
                    <div class="pt-4">
                        <!--begin::Image-->
                        <div id="Qr_image_eth" style="background-image: url('http://127.0.0.1:8000/assets/media/images/QR/6tqISF03JuavPeB446n9rVKoHvHCVJ8vzXcWmoSl.png');height:260px;background-position: center;background-size: contain;background-repeat: no-repeat;"></div>

                        <!-- <img class="bgi-no-repeat bgi-size-cover rounded min-h-265px" width="100%" height="250" id="btc_qr" src="{{asset('userassets/img/admin/qr.png')}}" alt=""> -->
                        <!--end::Image-->


                        <!--begin::Text-->
                        <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2 copy-text text-center" id="Qr_address_eth">
                        </p>
                        <!--end::Text-->

                        <!--begin::Action-->

                        <!--end::Action-->
                    </div>
                    <!--end::Bottom-->

                    <!--begin::Separator-->
                    <div class="separator separator-solid mt-2 mb-4"></div>
                    <!--end::Separator-->

                    <!--begin::Editor-->
                    <div class="col-md-12">
                        <form class="d-flex flex-column align-items-center" enctype="multipart/form-data" id="myForm" >

                            @csrf
                            <input type="text" name="quantites" value="1" placeholder="Balanced" class="form-control">
                            <input type="button" value="Deposit" class="form-control btn btn-info mt-5" id="deposit">
                            <input type="hidden" name="quantites_convert" value="1">
                            <input type="hidden" name="type" value="ETH">

                        </form>
                    </div>
                    <!--edit::Editor-->
                </div>
                <!--end::Body-->
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


        $.ajax({
            type: "POST",
            url: "{{ route('user.Settings.getQRData') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {
                Qr_image_eth_url = "{{asset('url')}}";
                Qr_image_eth = Qr_image_eth_url.replace("url", res.Qr_image_eth);
                $("#Qr_image_eth").css("background-image", "url(" + Qr_image_eth + ")");
                $("#Qr_address_eth").text(res.Qr_address_eth);
              
            
            }
        });
    });

    $(document).ready(function() {

        $('body').on('click', '#deposit', function() {
            let myForm = document.getElementById('myForm');
            let formData = new FormData($('#myForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('user.Deposit.DepositAmount') }}",
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

        // ---------------------------------------
        var copyIcon = $(".copy-icon");
        var copiedIcon = $(".copied-icon");
        var copyText = $(".copy-text").text();

        copyIcon.on("click", function() {
            // Copy the text to the clipboard
            copyToClipboard(copyText);

            // Change the icon to "تم النسخ"
            // copyIcon.removeClass("fa-copy").addClass("fa-check");
            copyIcon.hide()
            copiedIcon.show();

            // Revert the icon after 2 seconds
            setTimeout(function() {
                // copyIcon.removeClass("fa-check").addClass("fa-copy");
                copyIcon.show();
                copiedIcon.hide();
            }, 2000);
        });

        // Function to copy text to clipboard
        function copyToClipboard(text) {
            var tempInput = $("<input>");
            $("body").append(tempInput);
            tempInput.val(text).select();
            document.execCommand("copy");
            tempInput.remove();
        }
    });
</script>
@endsection