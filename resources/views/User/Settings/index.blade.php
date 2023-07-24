@extends('User.layouts.app')
@section('title',' Verify Profile ')
@section('content')
<link href="{{asset('assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />

<style>
    .error {
        color: red;
    }
</style>
<div class="container">
    <div class="row p-4">
        <div class="card d-flex flex-column-fluid card-custom">
            <div class="card-body px-0">
                <form enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7 my-2">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label class="col-3"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-10">Veryfication Settings:</h6>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"> Identity Image
                                            <br>

                                            <a class="p-4 label label-light-<?php

                                                                            use Illuminate\Support\Facades\Auth;

                                                                            echo (Auth::user()->verify == 1) ? 'success' : 'danger' ?> label-inline font-weight-bold" href="<?php echo (Auth::user()->verify == 1) ? route('user.Profile.editProfile') : route('user.Settings.userSettings') ?>"><?php echo (Auth::user()->verify == 1) ? 'Verified' : 'Verify Now' ?><i class="
                                                                              <?php echo (Auth::user()->verify == 1) ? 'fas fa-award' : 'fas fa-user-lock' ?>  m-2 text-<?php echo (Auth::user()->verify == 1) ? 'success' : 'danger' ?> font-size-h5"></i>
                                            </a>

                                        </label>

                                        <div class="col-9">
                                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(<?php echo asset('assets/media/images/QR/notfound.png') ?>);background-size: contain;width: 250px;height: 250px;">
                                                <div class="image-input-wrapper" style="width: 250px;height: 250px;"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="identity" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="identity_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input type="button" id="verify" class="btn btn-danger" value="Verify">
                                    </div>
                                    <!--end::Group-->
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ContentJs')
<script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
<script>
    $('body').on('click', '#verify', function() {
        let myForm = document.getElementById('myForm');
        let formData = new FormData($('#myForm')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('user.Settings.Verify') }}",
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
    $(function() {
        $.ajax({
            type: "POST",
            url: "{{ route('user.Profile.data') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {

                $("#kt_user_edit_avatar").css("background-image", "url(" + res.identity + ")");



            },
            error: function(res) {
                alert("error");
            }
        });

    });
</script>
@endsection