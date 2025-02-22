@extends('Admin.layouts.app')
@section('title', 'All-Service')
@section('Breadcrumb')

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
<!--end::Title-->
<!--begin::Separator-->
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200"> </div>
<!--end::Separator-->
<!--begin::Search Form-->
<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Service </span>
</div>
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200"> </div>

<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All</span>
</div>
@endsection
@section('contents')

<div class="card card-custom " dir="{{ \App\Helpers\Helper::getTextDirection() }}">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">
            Service Data
                <div class="text-muted pt-2 font-size-sm">All entries in the system</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#exampleModalSizeXl2">
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg><!--end::Svg Icon--></span> Add New Entry
            </a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <div id="" class="">
            <div class="row">
                <div class="col-sm-12 table-container">
                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="services" role="grid" aria-describedby="kt_datatable_info" style="width: 957px;">
                        <thead>
                            <th><span>#</span></th>
                            <th><span>Image</span></th>
                            <th><span>Title</span></th>
                            <th><span>Description</span></th>
 
                            <th><span>Actions</span></th>
                        </thead>
                        <tbody>
                            <!-- Data will be added here dynamically based on language -->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!--end: Datatable-->
    </div>
</div>

<!-- ------------------- modal --------------  -->
<!-- ------------------- modal -------------- -->
<div class="modal fade  {{ \App\Helpers\Helper::getTextDirection() }} stor-service-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white " id="exampleModalLabel"> Add Service </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" data-scroll="true" data-height="500">
                <form class="form" id="myForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- صورة الواي إس -->
                            <div class="col-lg-12 row" dir="{{ \App\Helpers\Helper::getTextDirection() }}">
                                <div class="col-lg-6">
                                    <label> صورة </label>
                                    <div class="col-lg-12">
                                        <div class="image-input image-input-outline" id="kt_image_4">
                                            <div class="image-input-wrapper" id="serviceImage" style="background-image: url('<?php echo asset('assets/media/bg/bg-9.jpg') ?>'); center; background-size: cover; height: 150px; width: 150px;"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="إختر الصورة">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="serviceImage" accept=".png, .jpg, .jpeg" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="إلغاء الصورة">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text p-1 text-danger" id="store_image_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <!-- العنوان بالعربية والإنجليزية -->
                                    <div class="col-lg-12">
                                        <label class="col-xl-12 col-lg-12 col-form-label text-left"> العنوان (عربي) </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" placeholder="من فضلك ادخل العنوان بالعربية" name="title_ar" id="title_ar">
                                            <span class="form-text p-1 text-danger" id="store_title_ar_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-xl-12 col-lg-12 col-form-label text-left"> Title (English) </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" placeholder="Please enter the title in English" name="title_en" id="title_en">
                                            <span class="form-text p-1 text-danger" id="store_title_en_error"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!-- الوصف بالعربية والإنجليزية -->
                            <div class="col-lg-6">
                                <label class="col-xl-12 col-lg-12 col-form-label text-left"> الوصف (عربي) </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="8" placeholder="من فضلك ادخل الوصف بالعربية" name="description_ar" id="description_ar"></textarea>
                                    <span class="form-text p-1 text-danger" id="store_description_ar_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="col-xl-12 col-lg-12 col-form-label text-left"> Description (English) </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="8" placeholder="Please enter the description in English" name="description_en" id="description_en"></textarea>
                                    <span class="form-text p-1 text-danger" id="store_description_en_error"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">الغاء</button>
                <button type="button" id="store-service" class="btn btn-primary font-weight-bold store-service">اضافة</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade {{ \App\Helpers\Helper::getTextDirection() }} edit-service-modal" id="edit-exampleModalSizeXl" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLabel"> Edit Service </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" data-scroll="true" data-height="500">
                <form class="form" id="myFormupdate" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="services_id" id="services_id">

                    <div class="card-body">
                        <div class="row">

                            <!-- صورة الواي إس -->
                            <div class="col-lg-12 row" dir="{{ \App\Helpers\Helper::getTextDirection() }}">
                                <div class="col-lg-6">
                                    <label> صورة </label>
                                    <div class="col-lg-12">
                                        <div class="image-input image-input-outline" id="kt_image_3">
                                            <div class="image-input-wrapper" id="edit_serviceImage" style="background-image: url('<?php asset('assets/media/bg/bg-9.jpg') ?>'); center; background-size: cover; height: 150px; width: 150px;"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="إختر الصورة">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="serviceImage" accept=".png, .jpg, .jpeg" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="إلغاء الصورة">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text p-1 text-danger" id="edit_image_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <!-- العنوان بالعربية والإنجليزية -->
                                    <div class="col-lg-12">
                                        <label class="col-xl-12 col-lg-12 col-form-label text-left"> العنوان (عربي) </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" placeholder="من فضلك ادخل العنوان بالعربية" name="title_ar" id="edit_title_ar">
                                            <span class="form-text p-1 text-danger" id="edit_title_ar_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-xl-12 col-lg-12 col-form-label text-left"> Title (English) </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" placeholder="Please enter the title in English" name="title_en" id="edit_title_en">
                                            <span class="form-text p-1 text-danger" id="edit_title_en_error"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                      
                            <!-- الوصف بالعربية والإنجليزية -->
                            <div class="col-lg-6">
                                <label class="col-xl-12 col-lg-12 col-form-label text-left"> الوصف (عربي) </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="8" placeholder="من فضلك ادخل الوصف بالعربية" name="description_ar" id="edit_description_ar"></textarea>
                                    <span class="form-text p-1 text-danger" id="edit_description_ar_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="col-xl-12 col-lg-12 col-form-label text-left"> Description (English) </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="8" placeholder="Please enter the description in English" name="description_en" id="edit_description_en"></textarea>
                                    <span class="form-text p-1 text-danger" id="edit_description_en_error"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">إلغاء</button>
                <button type="button" id="update-service" class="btn btn-success font-weight-bold ">تعديل</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(function() {
        var table = $('#services').DataTable({
            initComplete: function() {
                $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
            },
            paging: true,
            searching: true,
            oLanguage: {
                sSearch: 'Search',
                oPaginate: {
                    sFirst: "First page",
                    sPrevious: "Previous page",
                    sNext: "Next page",
                    sLast: "Last page"
                },
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)"
            },
            responsive: true,
            columnDefs: [{
                    width: "10px",
                    targets: 0
                },
                {
                    width: "150px",
                    targets: 1
                },
                {
                    width: "150px",
                    targets: 2
                },
                {
                    width: "150px",
                    targets: 3
                },
                {
                    width: "200px",
                    targets: 4
                }
            ],
            lengthMenu: [4, 5, 10, 20, 50, 100, 200, 500],
            processing: true,
            serverSide: true,
            destroy: true,
            order: [
                [0, 'asc']
            ],
            ajax: {
                data: {
                    _token: '{{ csrf_token() }}',
                    language: "{{ app()->getLocale() }}" // Send current language
                },
                url: "{{ route('admin.services.index') }}", // Ensure controller route is correct
                type: "GET" // تأكد من استخدام GET بدلاً من POST
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image'
                }, // سيتم عرض الصورة بشكل صحيح من الـ Controller
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                }, 
                {
                    data: 'action',
                    name: 'action',
                    width: 50,
                    orderable: false,
                    searchable: false
                }
            ],
        });
    });

    $('body').on('click', '#store-service', function() {
        let myForm = document.getElementById('myForm');
        let formData = new FormData($('#myForm')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.services.store') }}", // تأكد من تغيير الرابط إلى المسار الصحيح
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status == 1) {
                    var oTable = $('#services').dataTable(); // تأكد من تغيير اسم الجدول إذا لزم الأمر
                    oTable.fnDraw(false);
                    $('#myForm')[0].reset();

                    Swal.fire(
                        'تم إضافة العنصر!',
                        'تمت عملية إضافة العنصر بنجاح',
                        'success'
                    );

                    $(".stor-service-modal").modal('toggle');
                    $("#title_ar").text("");
                    $("#title_en").text("");
                    $("#description_ar").text("");
                    $("#description_en").text("");
                    $("#avatar").text("");

                } else {
                    Swal.fire(
                        res.msg,
                        'فشلت عملية إضافة العنصر',
                        'error'
                    );
                }
            },
            error: function(reject) {
                $("#title_ar").text("");
                $("#title_en").text("");
                $("#description_ar").text("");
                $("#description_en").text("");
                $("#avatar").text("");

                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#store_" + key + "_error").text(val[0]);
                });
            }
        });
    });
    $('body').on('click', '.edit-service', function() {
        var services_id = $(this).data('id'); // الحصول على الـ ID من الـ data-attribute

        $.ajax({
            type: "GET",
            url: "{{ route('admin.services.edit', ':services_id') }}".replace(':services_id', services_id), // تمرير الـ ID بشكل صحيح في الـ URL
            data: {
                "_token": "{{ csrf_token() }}",
                'id': services_id
            },
            dataType: 'json',
            success: function(res) {

                if (res.success) {

                    $(".edit-service-modal").modal('toggle'); // فتح المودال للتعديل

                    // تعبئة الحقول في الفورم بالبيانات التي تم جلبها
                    $("#services_id").val(res.data.id);
                    //  
                 
                    // العنوان باللغتين
                    $("#edit_title_ar").val(res.data.title_ar);
                    $("#edit_title_en").val(res.data.title_en);
                    // الوصف باللغتين
                    $("#edit_description_ar").val(res.data.description_ar);
                    $("#edit_description_en").val(res.data.description_en);

                    var update_avatar_url = "{{ asset('/storage/') }}/"; // تأكد من المسار الصحيح
                    update_avatar_url += res.data.image; // إضافة اسم الصورة إلى المسار

                    // تحديث صورة الخلفية للمكون باستخدام URL الصورة
                    $("#edit_serviceImage").css("background-image", "url(" + update_avatar_url + ")");

                }
            },
            error: function(res) {
                // في حالة حدوث خطأ
                console.log("Error:", res);
            }
        });
    });


    $('body').on('click', '#update-service', function() {
        let myForm = document.getElementById('myFormupdate');
        let formData = new FormData($('#myFormupdate')[0]);
        var services_id = $("#services_id").val();
        formData.set('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.set('_method', 'PUT'); // تحويل الطلب إلى PUT


        $.ajax({
            type: "POST", // Laravel لا يدعم PUT مباشرةً، لذا استخدم POST مع _method
            url: "{{ route('admin.services.update', ':services_id') }}".replace(':services_id', services_id),
            enctype: "multipart/form-data",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.success) {
                    $(".edit-service-modal").modal('toggle');
                    var oTable = $('#services').DataTable();
                    oTable.ajax.reload(null, false);
                    $('#myFormupdate')[0].reset();

                    Swal.fire('تعديل البيانات!', 'تمت عملية التعديل بنجاح.', 'success');
                } else {

                    Swal.fire('خطأ!', 'فشلت عملية التعديل.', 'error');
                }
            },
            error: function(reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#edit_" + key + "_error").text(val[0]);
                });
            }
        });

    });


    $('body').on('click', '.delete-service', function() {
        var id = $(this).data('id'); // نحصل على الـ ID من الـ data attribute
        Swal.fire({
            title: 'هل انت متأكد من عمليه الحذف',
            text: "هل تريد حذف هذا العنصر؟",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم قم بالحذف',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE", // استخدام DELETE لأننا نحذف العنصر
                    url: "/admin/services/" + id, // المسار الذي يحدد العنصر بناءً على الـ ID
                    data: {
                        "_token": "{{ csrf_token() }}", // ارسال الـ CSRF token
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#services').dataTable();
                        oTable.fnDraw(false);

                        if (res.status === '1') {
                            Swal.fire({
                                title: 'تم الحذف بنجاح',
                                text: 'تمت عملية حذف العنصر بنجاح',
                                confirmButtonText: 'تم',
                                icon: 'success',
                            });
                        }
                        if (res.status === '0') {
                            Swal.fire({
                                title: 'فشلت عملية الحذف',
                                text: 'فشلت عملية حذف العنصر',
                                confirmButtonText: 'تم',
                                icon: 'warning',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'حدث خطأ',
                            text: 'فشل الاتصال بالخادم',
                            icon: 'error',
                            confirmButtonText: 'تم'
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'تم الإلغاء',
                    text: 'تم إلغاء عملية الحذف',
                    icon: 'error',
                    confirmButtonText: 'تم'
                });
            }
        })
    });
</script>



@endsection