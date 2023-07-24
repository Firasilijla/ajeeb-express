@extends('layouts.app')
@section('title',' عمليات السحب')
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
                عمليات السحب النظام
                <div class="text-muted pt-2 font-size-sm">جميع عمليات السحب في النظام </div>
            </h3>
        </div>
        <div class="card-toolbar">




            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <div id="" class="">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed" id="withdrow" role="grid" aria-describedby="kt_datatable_info" style="width: 957px;">
                        <thead style="background-color: #1B6B93;color:black">
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">م</span></th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">المستخدم</span></th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">الايميل</span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> الكميه </span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> النوع </span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> نوع عمليه السحب </span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> المبلغ المتواجد في المحفظه</span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> عنوان المحفظة </span> </th>
                            <th><span style="color:white;font-weight: bolder;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; ;text-align: center;">الحدث</span> </th>
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

<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>

<script>
    $(function() {

        var table = $('#withdrow').DataTable({
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
                "url": "{{ route('admin.Withdrow.index') }}",
                "type": "GET"

            },


            columns: [{
                    data: 'id',
                    name: 'id',

                },
                {
                    data: 'users.username',
                    name: 'users.username',

                }, {
                    data: 'users.email',
                    name: 'users.email',

                },
                {
                    data: 'quantites',
                    name: 'quantites',

                },


                {
                    data: 'type',
                    name: 'type',

                },


                {
                    data: 'withdrow_type',
                    name: 'withdrow_type',

                }, {
                    data: 'users.total_amount',
                    name: 'users.total_amount',

                },
                {
                    data: 'withdrow_address',
                    name: 'withdrow_address',
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],

        });

    });

    $('body').on('click', '.change_status', function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        $.ajax({
            type: "POST",
            url: "{{ route('admin.Transaction.excuteOperation') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'transaction_id': id,
                'status': status,
            },
            dataType: 'json',
            success: function(res) {
                var oTable = $('#withdrow').dataTable();
                oTable.fnDraw(false);
                if (res.status === '1') {
                    Swal.fire({
                        title: 'تمت العمليه بنجاح    ',
                        text: res.msg,
                        confirmButtonText: 'تم  ',
                        icon: 'success',
                    });

                }
                if (res.status === '0') {
                    Swal.fire({
                        title: ' فشلت عمليه    ',
                        text: res.msg,
                        confirmButtonText: 'تم  ',
                        icon: 'warning',
                    });
                }

            }
        });

        // // }
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