@extends('User.layouts.app')
@section('title',' Deposit USD ')
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
                        <div class="symbol symbol-40 symbol-light-success mr-5">
                            <span class="symbol-label">
                                <img src="{{asset('userassets/img/logos/teh.png')}}" class="h-75 " alt="">
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
                        <div id="Qr_image_teh" style="background-image: url('http://127.0.0.1:8000/assets/media/images/QR/6tqISF03JuavPeB446n9rVKoHvHCVJ8vzXcWmoSl.png');height:260px;background-position: center;background-size: contain;background-repeat: no-repeat;"></div>

                        <!-- <img class="bgi-no-repeat bgi-size-cover rounded min-h-265px" width="100%" height="250" id="btc_qr" src="{{asset('userassets/img/admin/qr.png')}}" alt=""> -->
                        <!--end::Image-->


                        <!--begin::Text-->
                        <p id="Qr_address_teh" class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2 copy-text text-center">
                            TEgZr9tHVz1k1UxqPWkAN6XPnDa4yu7NB1TEgZr9tHVz1k1UxqPWkAN6XPnDa4yu7NB1
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
                        <form action="{{route('user.user.home')}}" class="d-flex flex-column align-items-center" enctype="multipart/form-data" id="myForm" >

                            @csrf
                            <input type="submit" value="OK" class="form-control btn btn-success mt-5" id="deposit">
                         

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
                Qr_image_teh_url = "{{asset('url')}}";
                Qr_image_teh = Qr_image_teh_url.replace("url", res.Qr_image_teh);
                $("#Qr_image_teh").css("background-image", "url(" + Qr_image_teh + ")");
                $("#Qr_address_teh").text(res.Qr_address_teh);
              
            
            }
        });
    });

    $(document).ready(function() {

      

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