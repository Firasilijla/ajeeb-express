<script src="{{asset('assets/plugins/jquery/dist/jquery.min.js')}}"></script>

<script>
    var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/file-upload/image-input.js') }}"></script>


<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/datatables/advanced/column-rendering.js')}}"></script>
<script>
    const input = document.getElementById("dateInput");
    input.addEventListener("input", (e) => {
        e.target.value = e.target.value
            .replace(/[^0-9]/g, "")
            .replace(/^(\d{4})(\d{2})(\d{2})$/, "$1-$2-$3");
    });
</script>
<script>
var uploadedFiles = [];

$('#kt_dropzone_3').dropzone({
    url: "{{ route('admin.partner.upload.files') }}",
    paramName: "file",
    maxFiles: 10,
    maxFilesize: 10,
    acceptedFiles: ".jpg,.png,.jpeg",
    addRemoveLinks: true, // تأكد من تفعيل هذه الخاصية
    dictRemoveFile: "❌ حذف", // نص الحذف
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function() {
        var myDropzone = this;

        this.on("success", function(file, response) {
            toastr.success("تم رفع الملف بنجاح!");

            // تأكد من أن الاستجابة تحتوي على ID للصورة المرفوعة
            if (response.id) {
                file.serverId = response.id;
                uploadedFiles.push(response.id);

                // إضافة معرف الصورة إلى العنصر ليتم التعرف عليه عند الحذف
                $(file.previewElement).attr("data-server-id", response.id);
            }
        });

        this.on("removedfile", function(file) {
            var serverId = $(file.previewElement).attr("data-server-id"); // جلب ID الملف

            if (serverId) {
                $.ajax({
                    url: "{{ route('admin.partner.deleteFile', ':id') }}".replace(':id', serverId),
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.info("تم حذف الملف.");
                        uploadedFiles = uploadedFiles.filter(item => item !== serverId); // إزالة الملف من القائمة
                    },
                    error: function() {
                        toastr.error("فشل حذف الملف.");
                    }
                });
            }
        });
    }
});

// عند الضغط على زر الإضافة، يتم إرسال البيانات للحفظ
$('#store-partners').on('click', function() {
    if (uploadedFiles.length === 0) {
        toastr.error("يجب رفع صورة واحدة على الأقل قبل الإضافة.");
        return;
    }

    $.ajax({
        url: "{{ route('admin.partners.store') }}",
        type: "POST",
        data: {
            images: uploadedFiles,
            "_token": "{{ csrf_token() }}"
        },
        success: function(response) {
            if (response.status == 1) {
                toastr.success(response.message);
                $('#myForm')[0].reset(); // إعادة تعيين النموذج
                uploadedFiles = []; // تفريغ الصور المحفوظة مؤقتًا
                $('#kt_dropzone_3')[0].dropzone.removeAllFiles(); // مسح الصور من Dropzone
                
                var oTable = $('#partners').dataTable();
                oTable.fnDraw(false);

                Swal.fire(
                    'تم إضافة العنصر!',
                    'تمت عملية إضافة العنصر بنجاح',
                    'success'
                );

                $(".stor-partners-modal").modal('toggle');
            } else {
                Swal.fire(
                    response.message,
                    'فشلت عملية إضافة العنصر',
                    'error'
                );
            }
        },
        error: function(xhr) {
            toastr.error(xhr.responseJSON.message);
        }
    });
});




</script>
<!-- <script src="{{asset('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script> -->