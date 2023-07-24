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
        <div class="col-xl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">

                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="nav-text">بيانات التواصل </span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="nav-text">بيانات QR </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body px-0">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->

                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                            <form class="form" id="kt_form_media" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">بيانات التواصل :</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">الموقع </label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" value="" name="location" id="location" placeholder="Location" />
                                        <span class="form-text error" id="location_error"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">تليجرام </label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="telegram" id="telegram" placeholder="telegram" />
                                        <span class="form-text error" id="telegram_error"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right"> واتس اب</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp"  />
                                        <span class="form-text error" id="whatsapp_error"></span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Heading-->

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">ايميل </label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="email" id="email" value="" placeholder="Email" />
                                            <span class="form-text error" id="email_error"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-2"></div>
                                <button type="button" class=" btn btn-light-primary font-weight-bold change_media">تعديل</button>

                            </form>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
                            <form class="form" id="kt_form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->


                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                        صورة QR - Tether</label>
                                                    <div class="col-lg-12">
                                                        <div class="image-input image-input-outline" id="kt_user_edit_avatar2">
                                                            <div class="image-input-wrapper" id="Qr_image_teh" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="Qr_image_teh" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="Qr_image_teh_remove" />
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
                                                    <input type="text" placeholder="رابط QR teh " class="form-control float-right mr-2" name="Qr_address_teh" id="Qr_address_teh">
                                                </div>
                                                <span class="error" id="Qr_address_teh_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                        صورة QR - Bitcoin</label>
                                                    <div class="col-lg-12">
                                                        <div class="image-input image-input-outline" id="kt_user_edit_avatar">
                                                            <div class="image-input-wrapper" id="Qr_image_btc" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="Qr_image_btc" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="Qr_image_btc_remove" />
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
                                                    <input type="text" placeholder="رابط QR BTC " class="form-control float-right mr-2" name="Qr_address_btc" id="Qr_address_btc">
                                                </div>
                                                <span class="error" id="Qr_address_trc"></span>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                        صورة QR - Ethereum</label>
                                                    <div class="col-lg-12">
                                                        <div class="image-input image-input-outline" id="kt_user_edit_avatar3">
                                                            <div class="image-input-wrapper" id="Qr_image_eth" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="Qr_image_eth" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="Qr_image_eth_remove" />
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
                                                    <input type="text" placeholder="رابط QR ETH " class="form-control float-right mr-2" name="Qr_address_eth" id="Qr_address_eth">
                                                </div>
                                                <span class="error" id="Qr_address_eth"></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->


                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                        صورة QR - Litecoin</label>
                                                    <div class="col-lg-12">
                                                        <div class="image-input image-input-outline" id="kt_user_edit_avatar4">
                                                            <div class="image-input-wrapper" id="Qr_image_ltc" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="Qr_image_ltc" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="Qr_image_ltc_remove" />
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
                                                    <input type="text" placeholder="رابط QR LTC " class="form-control float-right mr-2" name="Qr_address_ltc" id="Qr_address_ltc">
                                                </div>
                                                <span class="error" id="Qr_address_ltc_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group row">
                                            <!-- <label class="col-xl-6 col-lg-6 col-form-label text-left">الصورة الشخصية</label> -->


                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-12 col-lg-12 col-form-label text-left">
                                                        صورة QR - TRX</label>
                                                    <div class="col-lg-12">
                                                        <div class="image-input image-input-outline" id="kt_user_edit_avatar5">
                                                            <div class="image-input-wrapper" id="Qr_image_trx" style="background-image: url('<?php echo asset('assets/media/images/QR/notfound.png') ?>');center;background-size: contain;height: 200; width: 200;">
                                                            </div>
                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="إختر الصورة  ">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="Qr_image_trx" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="Qr_image_trx_remove" />
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
                                                    <input type="text" placeholder="رابط QR TRX " class="form-control float-right mr-2" name="Qr_address_trx" id="Qr_address_trx">
                                                </div>
                                                <span class="error" id="Qr_address_trx_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!--begin::Heading-->

                                <div class="separator separator-dashed my-2"></div>
                                <button type="button" class=" btn btn-light-primary font-weight-bold change_qr_Image">تعديل</button>

                            </form>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->

                        <!--end::Tab Content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
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
                Qr_image_teh_url = "{{asset('url')}}";
                Qr_image_teh = Qr_image_teh_url.replace("url", res.Qr_image_teh);
                Qr_image_btc_url = "{{asset('url')}}";
                Qr_image_btc = Qr_image_btc_url.replace("url", res.Qr_image_btc);
                Qr_image_eth_url = "{{asset('url')}}";
                Qr_image_eth = Qr_image_eth_url.replace("url", res.Qr_image_eth);
                Qr_image_ltc_url = "{{asset('url')}}";
                Qr_image_ltc = Qr_image_ltc_url.replace("url", res.Qr_image_ltc);
                Qr_image_trx_url = "{{asset('url')}}";
                Qr_image_trx = Qr_image_trx_url.replace("url", res.Qr_image_trx);



                $("#Qr_image_teh").css("background-image", "url(" + Qr_image_teh + ")");
                $("#Qr_image_btc").css("background-image", "url(" + Qr_image_btc + ")");
                $("#Qr_image_eth").css("background-image", "url(" + Qr_image_eth + ")");
                $("#Qr_image_ltc").css("background-image", "url(" + Qr_image_ltc + ")");
                $("#Qr_image_trx").css("background-image", "url(" + Qr_image_trx + ")");

                $("#Qr_address_teh").val(res.Qr_address_teh);
                $("#Qr_address_btc").val(res.Qr_address_btc);
                $("#Qr_address_eth").val(res.Qr_address_eth);
                $("#Qr_address_ltc").val(res.Qr_address_ltc);
                $("#Qr_address_trx").val(res.Qr_address_trx);
                // ----------------------social ---------- 
                $("#location").val(res.location);
                $("#telegram").val(res.telegram);
                $("#whatsapp").val(res.whatsapp);
                $("#email").val(res.email);
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
    $('body').on('click', '.change_media', function() {
        let myForm = document.getElementById('kt_form_media');
        let formData = new FormData($('#kt_form_media')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.Settings.updatemedia') }}",
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