@extends('User.layouts.app')
@section('title',' Edit Profile ')
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
                <form class="form" id="kt_form">
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
                                            <h6 class="text-dark font-weight-bold mb-10">Customer Info:</h6>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">avatar
                                            <br>

                                            <a class="p-4 label label-light-<?php

                                                                            use Illuminate\Support\Facades\Auth;

                                                                            echo (Auth::user()->verify == 1) ? 'success' : 'danger' ?> label-inline font-weight-bold" href="<?php echo (Auth::user()->verify == 1) ? route('user.Profile.editProfile') : route('user.Settings.userSettings') ?>"><?php echo (Auth::user()->verify == 1) ? 'Verified' : 'Verify Now' ?><i class="
                                                                              <?php echo (Auth::user()->verify==1)?'fas fa-award' :'fas fa-user-lock'?>  m-2 text-<?php echo (Auth::user()->verify==1)?'success' :'danger'?> font-size-h5"></i>
                                                                            </a>

                                        </label>

                                        <div class="col-9">
                                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(assets/media/users/blank.png)">
                                                <div class="image-input-wrapper"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
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
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">First Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="Anna" name="fname" id="fname" />
                                            <span class="form-text  error" id="fname_error"></span>

                                        </div>

                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Last Name</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="Krox" name="lname" id="lname" />
                                            <span class="form-text  error" id="lname_error"></span>

                                        </div>

                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">UserName</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="Loop Inc." name="username" id="username" />
                                            <!-- <span class="form-text text-muted error"></span> -->
                                            <span class="form-text  error" id="username_error"></span>

                                        </div>
                                        <!-- <span class="form-text  error" id="username_error"></span> -->

                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Contact Phone</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" value="+45678967456" placeholder="Phone" name="phone" id="phone" />
                                            </div>
                                            <span class="form-text  error" id="phone_error"></span>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <!-- <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Email Address</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" value="anna@gmail.com" placeholder="Email" name="email" id="email" />
                                            </div>
                                            <span class="form-text text-muted error" id="email_error"></span>

                                        </div>
                                    </div> -->
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <input type="password" class="form-control form-control-lg form-control-solid" placeholder="Password" value="" name="password" id="password" />

                                            </div>
                                            <span class="form-text  error" id="password_error"></span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Confirm Password</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <input type="password" class="form-control form-control-lg form-control-solid" placeholder="CPassword " value="" name="cpassword" id="cpassword" />

                                            </div>
                                            <span class="form-text  error" id="cpassword_error"></span>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"> PassCode</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <input type="password" class="form-control form-control-lg form-control-solid" placeholder="PassCode" value="" name="passcode" id="passcode" />

                                            </div>
                                            <span class="form-text  error" id="passcode_error"></span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="button" id="update-user" class="btn btn-success" value="Update">
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
    $('body').on('click', '#update-user', function() {
        let formData = new FormData($(this).closest(".form")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('user.Profile.updateProfile') }}",
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.status == '1') {
                    Swal.fire(
                        ' Update Profile!',
                        '    Profile Updated successfully ',
                        'success'
                    );
                    $("#fname_error").text("");
                    $("#lname_error").text("");
                    $("#username_error").text("");
                    $("#cpassword_error").text("");
                    $("#password_error").text("");
                    $("#phone_error").text("");
                    $("#passcode_error").text("");


                } else {

                    Swal.fire(
                        ' Update Profile!',
                        ' Profile modification failed  ',
                        'fail'
                    );
                }



            },
            error: function(reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
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
                // $("#email").val(res.email);
                $("#cpassword").val(res.n_password);
                $("#passcode").val(res.passcode);
                $("#password").val(res.n_password);
                $("#username").val(res.username);
                $("#lname").val(res.lname);
                $("#fname").val(res.fname);
                $("#phone").val(res.phone);
                $("#kt_user_edit_avatar").css("background-image", "url(" + res.avatar + ")");



            },
            error: function(res) {
                alert("error");
            }
        });

    });
</script>
@endsection