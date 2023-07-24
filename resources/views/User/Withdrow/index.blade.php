@extends('User.layouts.app')
@section('title',' WithDraw ')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Kv4fpoou7zc6J0BeeF8uK3lNpGM4yCtf41ugNgQAPwoyGckL6bC1fULk1UHFn3GqqGzLm7FhYlA4CB9NJq1Vdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />


<style>
    .copy-icon {
        cursor: pointer;
    }

    .copied-icon {
        display: none;
    }
</style>
<?php

use Illuminate\Support\Facades\Auth; ?>
<div class="container">
    <div class="row">

        <div class="d-flex align-items-center justify-content-center p-10" style="width: 100%;">
            <div class="card card-custom  ">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-success mr-5 ">
                            <span class="symbol-label">
                                <img src="{{asset('userassets/img/logos/teh.png')}}" class="h-75 " alt="">
                            </span>
                        </div>

                        <div class="d-flex flex-column flex-grow-1">
                            <!-- <i class="fas fa-copy"></i> -->

                        </div>

                    </div>
                    <!--end::Top-->

                    <!--begin::Bottom-->
                    <div class="pt-4">
                        <!--begin::Image-->

                        <!-- <img class="bgi-no-repeat bgi-size-cover rounded min-h-265px" width="100%" height="250" id="btc_qr" src="{{asset('userassets/img/admin/qr.png')}}" alt=""> -->
                        <!--end::Image-->


                        <!--begin::Text-->

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
                        <form class="d-flex flex-column align-items-center" enctype="multipart/form-data" id="myForm">

                            @csrf
                            <input type="text" name="withdrow_amount" value="" placeholder="withdrow amount" class="form-control">
                            <input type="text" name="withdrow_address" value="" placeholder="withdrow address" class="form-control mt-3">
                            <input type="button" value="Withdraw" class="form-control btn btn-success mt-5" id="Withdraw">

                        </form>
                    </div>
                    <!--edit::Editor-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
</div>
<!-- -----------modal -->
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
@endsection

@section('ContentJs')

<script src="{{asset('userassets/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>


<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script>
    $('body').on('click', '#Withdraw', function() {
        $(".Passcode-modal").modal('toggle');
    });
    $('body').on('click', '#passcode-btn', function() {
        var passcode = $("#passcode").val();
        if (passcode == <?php


                        echo Auth::user()->passcode ?>) {
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
</script>
@endsection