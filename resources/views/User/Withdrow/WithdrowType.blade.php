@extends('User.layouts.app')
@section('title',' Withdraw ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-6  m-2">
            <!--begin::Callout-->
            <a href="{{route('user.Withdrow.WithdrowIndexUser')}}">
                <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex  align-items-center  justify-content-between">
                            <div class="d-flex align-items-center ">
                                <!--begin::Icon-->
                                <div class="ml-6">
                                    <span class="svg-icon svg-icon-danger svg-icon-4x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                        <img src="{{asset('userassets/img/logos/teh.png')}}" width="50" height="50">
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <span class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">USD</span>
                                </div>
                                <!--end::Content-->
                            </div>
                            <span class="svg-icon svg-icon-success">
                                <div class="display-4 text-success"> <strong id="USDT"> <?php

                                                                                        use Illuminate\Support\Facades\Auth;
                                                                                       echo  Auth::user()->total_amount." $" ?></strong></div>

                                <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1" />
                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                    </g>
                                </svg> -->
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <!--end::Callout-->
        </div>



        <!--end::Callout-->
    </div>
</div>
<script>
    $('body').on('click', '#Withdraw', function() {
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
</script>
@endsection