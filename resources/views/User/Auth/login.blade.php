@extends('User.layout.app')

@section('title','login')


@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary">Login</h2>
                </div>
                <div class="card-body p-5">
                    <form action="#" method="POST" id="login_form">
                        @csrf
                        <div id="login_alert"></div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none" href="/forgot">Forgot Password?</a>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" value="Login" class="btn btn-dark rounded-0" id="login_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <div>Don't have an account? <a href="/register" class="text-decoration-none">Register Here</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $("#login_form").submit(function(e) {
            e.preventDefault();
            $("#login_btn").val('Pleas Wait ...');
            $.ajax({
                url: "{{route('User.auth.login')}}",
                method: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.status == 200) {
                        $("#login_alert").html(showMessage('success', res.msg));
                        $("#login_form")[0].reset();
                        showStateMessage('email', '');
                        showStateMessage('password', '');
                        $("#login_btn").val('Login');
                        window.location = "{{route('User.auth.profile')}}"
                    } else if (res.status == 401) {
                        $("#login_alert").html(showMessage('danger', res.msg));
                        $("#login_btn").val('Login');
                    } else if (res.status == 404) {
                        $("#login_alert").html(showMessage('danger', res.msg));
                        $("#login_btn").val('Login');
                    }

                },
                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        showStateMessage(key, val[0]);
                    });
                }
            });
        });

    })
</script>

@endsection