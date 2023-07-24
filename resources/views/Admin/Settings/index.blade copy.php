@extends('layouts.app')
@section('title',' بيانات QR')
@section('content')
<style>
    #rtl,
    .rtl {
        direction: rtl;
    }

    .dataTables_wrapper .dataTables_filter {
        float: left;
        text-align: center;
    }

    th {
        font-weight: bolder;
        color: red;
        font-size: 20px;

    }

    .edit {
        background: transparent;
        border: none;
        padding: 0;
        margin: 0;
    }
</style>

<div class="card card-custom " id="rtl">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">
                بيانات استلام QR
                <div class="text-muted pt-2 font-size-sm">جميع بيانات QR </div>
            </h3>
        </div>

    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <div id="" class="">

            <div class="row">
                <div class="col-sm-12">
                    <form class="form" id="kt_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                صورة QR - TRC</label>
                                            <div class="col-lg-12">
                                                <div class="image-input image-input-outline" id="kt_user_edit_avatar">
                                                    <div class="image-input-wrapper" id="Qr_image_trc" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                    </div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="Qr_image_trc" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="Qr_image_trc_remove" />
                                                    </label>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                            </div>
                                            <input type="text" placeholder="رابط QR TRC " class="form-control float-right mr-2" name="Qr_address_trc" id="Qr_address_trc">
                                        </div>
                                        <span class="error" id="Qr_address_trc"></span>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->


                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                صورة QR - ERC</label>
                                            <div class="col-lg-12">
                                                <div class="image-input image-input-outline" id="kt_user_edit_avatar2">
                                                    <div class="image-input-wrapper" id="Qr_image_erc" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                    </div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="Qr_image_erc" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="Qr_image_erc_remove" />
                                                    </label>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                            </div>
                                            <input type="text" placeholder="رابط QR ERC " class="form-control float-right mr-2" name="Qr_address_erc" id="Qr_address_erc">
                                        </div>
                                        <span class="error" id="Qr_address_erc_error"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="button" class="btn btn-light-primary font-weight-bold change_qr_Image">تعديل</button>

                    </form>
                </div>
            </div>

        </div>
        <!--end: Datatable-->
    </div>
</div>

<!-- ------------------- modal --------------  -->

<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>

<script>
    $(function() {

        $.ajax({
            type: "POST",
            url: "{{ route('admin.Settings.getQRData') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {
                Qr_image_trc_url="{{asset('url')}}";
                Qr_image_trc = Qr_image_trc_url.replace("url", res.Qr_image_trc);
                Qr_image_erc_url="{{asset('url')}}";
                Qr_image_erc = Qr_image_erc_url.replace("url", res.Qr_image_erc);
                $("#Qr_image_trc").css("background-image", "url(" + Qr_image_trc + ")");
                $("#Qr_image_erc").css("background-image", "url(" + Qr_image_erc + ")");
                $("#Qr_address_trc").val(res.Qr_address_trc);
                $("#Qr_address_erc").val(res.Qr_address_erc);

            }
        });

    });
    // Workschedule.showImage

    $('body').on('click', '.change_qr_Image', function() {
        let myForm = document.getElementById('kt_form');
        let formData = new FormData($('#kt_form')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.Settings.update') }}",
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.status == '1') {
                    Swal.fire(
                        'تعديل التعديل!',
                        'تمت عمليه تعديل التعديل ب نجاح',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'تعديل البيانات!',
                        'فشلت عمليه تعديل التعديل',
                        'fail'
                    );
                }



            },
            error: function(reject) {

                Swal.fire({
                    title: ' فشلت عمليه التعديل ',
                    text: 'فشلت عمليه  تعديل البيانات يرجى تعبئة كامل البيانات ',
                    confirmButtonText: 'تم  ',
                    icon: 'warning',
                });


            }
        });

    });


// C

</script>

<script src="{{asset('assets/js/pages/custom/user/add-user.js')}}"></script>
<script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}"></script>
<script>
    var KTBootstrapDatetimepicker = function() {

        // Private functions
        var demos = function() {
            // minimal setup
            $('#bod').datetimepicker({
                format: "yyyy/mm/dd",
                todayHighlight: true,
                autoclose: true,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: 'bottom-left'
            });


            $('#date_biaa').datetimepicker({
                format: "yyyy/mm/dd",
                todayHighlight: true,
                autoclose: true,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: 'bottom-left'
            });
            // $('#graduation_year').datetimepicker({
            //     format: "yyyy/mm/dd",
            //     todayHighlight: true,
            //     autoclose: true,
            //     startView: 2,
            //     minView: 2,
            //     forceParse: 0,
            //     pickerPosition: 'bottom-left'
            // });
            $('.graduation_year').datetimepicker({
                format: "yyyy/mm/dd",
                todayHighlight: true,
                autoclose: true,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: 'bottom-left'
            });
            // $('.graduation_year').forEach(element => {
            //     element.datetimepicker({
            //     format: "yyyy/mm/dd",
            //     todayHighlight: true,
            //     autoclose: true,
            //     startView: 2,
            //     minView: 2,
            //     forceParse: 0,
            //     pickerPosition: 'bottom-left'
            // });
            // });
            $('.courseGraduationYear').datetimepicker({
                format: "yyyy/mm/dd",
                todayHighlight: true,
                autoclose: true,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: 'bottom-left'
            });

        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTBootstrapDatetimepicker.init();
    });
</script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
<script src="{{asset('assets/js/function.js')}}"></script>
@endsection