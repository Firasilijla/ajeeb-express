@extends('User.layouts.app')
@section('title','Trading ')
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

        <div class="d-flex align-items-center justify-content-center p-10" style="width: 100%;">
            <div class="card card-custom  ">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-warning mr-5 ">
                            <span class="symbol-label">
                                <img src="{{asset('userassets/img/logos/Bitcoin_r.png')}}" class="h-75 " alt="">
                            </span>
                        </div>

                        <div class="d-flex flex-column flex-grow-1">
                            <!-- <i class="fas fa-copy"></i> -->

                          <h1>about</h1>


                        </div>

                    </div>
                    <!--end::Top-->

                    <!--begin::Bottom-->
                
                    <!--end::Bottom-->

                    <!--begin::Separator-->
                    <div class="separator separator-solid mt-2 mb-4"></div>
                    <!--end::Separator-->

                    <!--begin::Editor-->

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


        $('body').on('click', '#trading', function() {


            Swal.fire({
                title: ' are You Surr To buy    ',
                text: " are You Surr To buy Trx final Attempts",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '  Yes Sure'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.Trading.Trading') }}",
                        enctype: "multipart/form-data",
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(res) {

                            if (res.status == '1') {

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
                } else {
                    Swal.fire(
                        "fail operation",
                        "You Canceld Operation",
                        'fail'
                    );
                }

            })


        });
    });
</script>
@endsection