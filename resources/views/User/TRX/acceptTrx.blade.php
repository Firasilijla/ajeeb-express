@extends('User.layouts.app')
@section('title',' TrxPlus - Trx-Accept deposit ')
@section('content')
<link href="{{asset('assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />

<style>
    .error {
        color: red;
    }
</style>
<div class="container">
    <div class="row p-4 d-flex justify-content-center">
        <div class="card d-flex flex-column card-custom">
            <div class="card-body px-0">
                <form enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-6 text-lg-right text-left">Buy Trx</label>
                                        <div class="col-6"><img src="{{asset('userassets/img/logos/tether.png')}}" alt="" title="" width="40" height="40" /><span></span></div>

                                        <div class="col-12">
                                            <input class="form-control form-control-lg form-control-solid" readonly name="receive_amount" id="receive_amount" type="number" value="{{$usd}}" name="lname" id="lname" />
                                            <input type="hidden" name="trx_amount" value="{{$usd}}">

                                            <span class="form-text  error" id="receive_amount_error"></span>

                                        </div>
                                        <div class="col-12">
                                            <span class="form-text text-mute mt-5 mb-5" id="trx_amount_convert">TRX</span>

                                        </div>
                                        <div class="col-12">
                                            <input class="form-control form-control-lg btn btn-danger" type="button" id="buytrx" value="Buy Accept" />

                                        </div>
                                    </div>
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
    $('body').on('change', '#receive_amount', function() {
        $("#trx_amount").text($(this).val() + "TRX");
    });
    $('body').on('click', '#buytrx', function() {
        let myForm = document.getElementById('myForm');
        let formData = new FormData($('#myForm')[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('user.TRX.TRXAmount') }}",
            enctype: "multipart/form-data",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(res) {

                if (res.status == '1') {
                    $('#myForm')[0].reset();





                    Swal.fire({
                        title: 'you sure to do this Proccess',
                        text: "are You want to buy Trx really",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: ' yes buy '
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{route('user.TRX.getQrPgae')}}";
                            window.location.href = url;
                        } else {
                            var url = "{{route('user.TRX.getTRX')}}";
                            window.location.href = url;
                        }

                    })




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