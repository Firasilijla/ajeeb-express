@extends('User.layouts.app')
@section('title',' TrxPlus - Trx-deposit ')
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
                                            <input class="form-control form-control-lg form-control-solid" name="receive_amount" id="receive_amount" type="number" value="Krox" name="lname" id="lname" />
                                            <span class="form-text  error" id="receive_amount_error"></span>

                                        </div>
                                        <div class="col-12">
                                            <span class="form-text text-mute mt-5 mb-5" id="trx_amount">TRX</span>

                                        </div>
                                        <div class="col-12">
                                            <input class="form-control form-control-lg btn btn-success" type="button" id="buytrx" value="Buy TRX" />

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
           $("#trx_amount").text( $(this).val()+"TRX");
    });
    $('body').on('click', '#buytrx', function() {
            var amount = $("#receive_amount").val();
            if (amount == 0) {
                $("#receive_amount_error").text('The Ammount Must Be more Than Zero');
            } else {
                $("#receive_amount_error").text('');
                var url = 'acceptTRXAmount?usd=' + amount;

                window.location.href = url;
            }
        });
</script>
@endsection