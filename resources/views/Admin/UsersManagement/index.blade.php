@extends('layouts.app')
@section('title','مستخدمي النظام')
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
                مستخدمين النظام
                <div class="text-muted pt-2 font-size-sm">جميع المستخدمين في النظام </div>
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
                    </svg><!--end::Svg Icon--></span> مستخدم جديد
            </a>


            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <div id="" class="">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="admins" role="grid" aria-describedby="kt_datatable_info" style="width: 957px;">
                        <thead style="background-color: rgba(27, 160, 143, 0.544);color:black">
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">م</span></th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">المستخدم</span></th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">الاسم الاول</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> الاسم الثاني</span></th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">الايميل</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">رقم الهاتف</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">المبلغ الاجمالي</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> كميه TRX</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> النوع</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> حالة المستخدم</span> </th>
                            <th><span style="color:black;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; ;text-align: center;">الحدث</span> </th>
                        </thead>

                        <tbody>


                        </tbody>

                    </table>
                </div>
            </div>

        </div>
        <!--end: Datatable-->
    </div>
</div>

<!-- ------------------- modal --------------  -->
<div class="modal fade rtl edit-admins-modal" id="exampleModalSizeXl" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الملف الشخصي </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" data-scroll="true" data-height="500">
                <form class="form" id="myFormupdate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">الإسم الاول
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="fname" id="fname" type="text" placeholder="ادخل الاسم الاول  " />
                                    <span class="error" id="fname_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">الإسم الثاني
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="lname" id="lname" type="text" placeholder="ادخل الاسم الثاني  " />
                                    <span class="error" id="lname_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">اسم المستخدم
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="username" id="username" type="text" placeholder="  اسم المستخدم  " />
                                    <span class="error" id="username_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"> الايميل
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="email" id="email" type="text" value="" placeholder="ادخل  الايميل  " />
                                    <span class="error" id="email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"> رقم الهاتف
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="phone" id="phone" type="text" value="" placeholder="ادخل  رقم الهاتف  " />
                                    <span class="error" id="phone_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                    الصلاحية </label>

                                <div class="col-lg-9 col-xl-9">
                                    <div class="form-group">

                                        <select class="form-control form-control" name="type" id="type">
                                            <option></option>
                                            <option value="1">مدير</option>
                                            <option value="2">موظف</option>
                                        </select>
                                        <span class="error" id="type_error"></span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                    كلمة المرور</label>

                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="password" id="password" type="password" value="" placeholder="ادخل كلمة المرور " />
                                    <span class="error" id="password_error"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="update-user" class="btn btn-success font-weight-bold">تعديل </button>
            </div>
        </div>
    </div>
</div>
<!-- ------------------- modal --------------  -->
<div class="modal fade rtl store-admins-modal" id="exampleModalSizeXl2" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الملف الشخصي </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" data-scroll="true" data-height="500">
                <form class="form" id="myForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">الإسم الاول
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="fname" id="fname" type="text" placeholder="ادخل الاسم الاول  " />
                                    <span class="error" id="store_fname_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">الإسم الثاني
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="lname" id="lname" type="text" placeholder="ادخل الاسم الثاني  " />
                                    <span class="error" id="store_lname_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">اسم المستخدم
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="username" id="username" type="text" placeholder="  اسم المستخدم  " />
                                    <span class="error" id="store_username_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"> الايميل
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="email" id="email" type="text" value="" placeholder="ادخل  الايميل  " />
                                    <span class="error" id="store_email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"> رقم الهاتف
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="phone" id="phone" type="text" value="" placeholder="ادخل  رقم الهاتف  " />
                                    <span class="error" id="store_phone_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                    الصلاحية </label>

                                <div class="col-lg-9 col-xl-9">
                                    <div class="form-group">

                                        <select class="form-control form-control" name="type" id="type">
                                            <option></option>
                                            <option value="1">مدير</option>
                                            <option value="2">موظف</option>
                                        </select>
                                        <span class="error" id="store_type_error"></span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                    كلمة المرور</label>

                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control form-control-lg" name="password" id="password" type="password" value="" placeholder="ادخل كلمة المرور " />
                                    <span class="error" id="store_password_error"></span>

                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                <button type="button" id="store-user" class="btn btn-primary font-weight-bold">اضافه </button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>

<script>
    $(function() {

        var table = $('#admins').DataTable({
            initComplete: function() {
                $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
            },
            // 'autoFill': false,
            "paging": true,
            "searching": true,
            "paging": true,
            "oLanguage": {
                "sSearch": ' بحث  ',
                "oPaginate": {
                    "sFirst": "الصفحه الاولى", // This is the link to the first page
                    "sPrevious": " الصفحه السابقه", // This is the link to the previous page
                    "sNext": "الصفحة التاليه", // This is the link to the next page
                    "sLast": "الصفحه الاخيرة" // This is the link to the last page
                },
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)"
            },
            lengthMenu: [4, 5, 10, 20, 50, 100, 200, 500],
            processing: true,
            serverSide: true,
            destroy: true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                'data': {
                    somefield: "Some field value",
                    _token: '{{csrf_token()}}'
                },
                "url": "{{ route('admin.admin.index') }}",
                "type": "GET"

            },


            columns: [{
                    data: 'id',
                    name: 'id',

                },
                {
                    data: 'username',
                    name: 'username',


                }, {
                    data: 'fname',
                    name: 'fname',

                },
                {
                    data: 'lname',
                    name: 'lname',

                },


                {
                    data: 'email',
                    name: 'email',

                },

                {
                    data: 'phone',
                    name: 'phone',

                }, {
                    data: 'total_amount',
                    name: 'total_amount',

                },
                {
                    data: 'total_trx',
                    name: 'total_trx',

                }, {
                    data: 'type',
                    name: 'type',

                },
                {
                    data: 'status',
                    name: 'status',

                },


                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],

        });

    });
    $('body').on('click', '.show_pass', function() {
        var admin_password = $(this).data('id');
        Swal.fire(
            ' كلمه المرور',
            admin_password + "",
            'success'
        );
    });
    $('body').on('click', '.change_status', function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        $.ajax({
            type: "POST",
            url: "{{ route('admin.admin.changeStatus') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'status': status,
            },
            dataType: 'json',
            success: function(res) {
                var oTable = $('#admins').dataTable();
                oTable.fnDraw(false);
                if (res.status === '1') {
                    if (status == 1) {
                        Swal.fire({
                            title: 'تم  تفعيل المستخدم ',
                            text: 'تمت عمليه تفعيل المستخدم ب نجاح',
                            confirmButtonText: 'تم  ',
                            icon: 'success',
                        });
                    } else {
                        Swal.fire({
                            title: 'تم  تعطيل المستخدم ',
                            text: 'تمت عمليه تعطيل المستخدم ب نجاح',
                            confirmButtonText: 'تم  ',
                            icon: 'error',
                        });
                    }

                }
                if (res.status === '0') {
                    Swal.fire({
                        title: ' فشلت عمليه تعديل الحالة  ',
                        text: 'فشلت عمليه  تعديل الحالة ',
                        confirmButtonText: 'تم  ',
                        icon: 'warning',
                    });
                }

            }
        });

        // // }
    });

    $('body').on('click', '.delete-user', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'هل انت متأكد من عمليه الحذف',
            text: "هل تريد حذف هذا العنصر ل اخر محاولة",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم قم بالحذف',
            cancelButtonText: ' إلغاء '

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.admin.delete') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#admins').dataTable();
                        oTable.fnDraw(false);
                        if (res.status === '1') {

                            Swal.fire({
                                title: 'حذف  المستخدم ',
                                text: 'تمت عمليه حذف المستخدم ب نجاح',
                                confirmButtonText: 'تم  ',
                                icon: 'success',
                            });
                        }
                        if (res.status === '0') {
                            Swal.fire({
                                title: ' فشلت عمليه الحذف ',
                                text: 'فشلت عمليه  حذف المستخدم ',
                                confirmButtonText: 'تم  ',
                                icon: 'warning',
                            });
                        }

                    }
                });

            } else {

                Swal.fire({
                    title: ' عذرا انت الغيت العمليه ',
                    text: '   تمت الغاء العمليه',
                    confirmButtonText: 'تم  ',
                    icon: 'error',
                })
            }
        })

        // // }
    });
    $('body').on('click', '.edit-user', function() {
        var user_id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "{{ route('admin.admin.edit') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': user_id
            },
            dataType: 'json',
            success: function(res) {

                $("#user_id").val(res.id);
                $("#fname").val(res.fname);
                $("#lname").val(res.lname);
                $("#username").val(res.username);
                $("#email").val(res.email);
                $("#phone").val(res.phone);
                $("#password").val(res.n_password);

                if (res.type === "user") {
                    $("#type").val(0).change();
                }
                if (res.type === "admin") {
                    $("#type").val(1).change();
                }



            },
            error: function(res) {


            }

        });
    });
    $('body').on('click', '#update-user', function() {

        let myForm = document.getElementById('myFormupdate');
        let formData = new FormData($('#myFormupdate')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.admin.updateUser') }}",
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.status == '1') {
                    var oTable = $('#admins').dataTable();
                    oTable.fnDraw(false);
                    $('#myFormupdate')[0].reset();
                    $(".edit-admins-modal").modal('toggle');
                    Swal.fire(
                        'تعديل المستخدم!',
                        'تمت عمليه تعديل المستخدم ب نجاح',
                        'success'
                    );
                } else {

                    Swal.fire(
                        'تعديل المستخدم!',
                        'فشلت عمليه تعديل المستخدم',
                        'fail'
                    );
                }



            },
            error: function(reject) {

                // Swal.fire({
                //     title: ' فشلت عمليه التعديل ',
                //     text: 'فشلت عمليه  تعديل المستخدم ',
                //     confirmButtonText: 'تم  ',
                //     icon: 'warning',
                // });


                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
    });
    $('body').on('click', '#store-user', function() {

        let myForm = document.getElementById('myForm');
        let formData = new FormData($('#myForm')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('admin.admin.StoreUser') }}",
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.status == '1') {
                    var oTable = $('#admins').dataTable();
                    oTable.fnDraw(false);
                    $('#myForm')[0].reset();
                    $(".store-admins-modal").modal('toggle');
                    Swal.fire(
                        'اضافه المستخدم!',
                        'تمت عمليه اضافه المستخدم ب نجاح',
                        'success'
                    );
                } else {

                    Swal.fire(
                        'اضافه المستخدم!',
                        'فشلت عمليه اضافه المستخدم',
                        'fail'
                    );
                }



            },
            error: function(reject) {



                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val) {
                    $("#store_" + key + "_error").text(val[0]);
                });
            }
        });
    });
    "use strict";
    var KTDatatablesAdvancedColumnRendering = function() {

        var init = function() {
            var table = $('#kt_datatable');

            // begin first table
            table.DataTable({
                responsive: true,
                paging: true,
                columnDefs: [{
                        targets: 0,
                        title: 'Agent',
                        render: function(data, type, full, meta) {
                            var number = KTUtil.getRandomInt(1, 14);
                            var user_img = '100_' + number + '.jpg';

                            var output;
                            if (number > 8) {
                                output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 flex-shrink-0">
                                        <img src="assets/media/users/` + user_img + `" alt="photo">
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
                            } else {
                                var stateNo = KTUtil.getRandomInt(0, 7);
                                var states = [
                                    'success',
                                    'light',
                                    'danger',
                                    'success',
                                    'warning',
                                    'dark',
                                    'primary',
                                    'info'
                                ];

                                var state = states[stateNo];

                                output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full[2].substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
                            }

                            return output;
                        },
                    },
                    {
                        targets: 1,
                        render: function(data, type, full, meta) {
                            return '<a class="text-dark-50 text-hover-primary" href="mailto:' + data + '">' + data + '</a>';
                        },
                    },
                    {
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
									</ul>\
							  	</div>\
							</div>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a>\
						';
                        },
                    },
                    {
                        targets: 4,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': 'label-light-primary'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                },
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 5,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {
                                    'title': 'Online',
                                    'state': 'danger'
                                },
                                2: {
                                    'title': 'Retail',
                                    'state': 'primary'
                                },
                                3: {
                                    'title': 'Direct',
                                    'state': 'success'
                                },
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                        },
                    },
                ],
            });

            $('#kt_datatable_search_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };

        return {

            //main function to initiate the module
            init: function() {
                init();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTDatatablesAdvancedColumnRendering.init();
    });
</script>

@endsection