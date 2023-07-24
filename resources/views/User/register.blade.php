<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>TrxPlus | Log In</title>
    <link rel="stylesheet" href="{{asset('userassets/vendor/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('userassets/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
        .login {
            width: 400px;
            height: auto;
            /* margin: 50px auto; */
            border: 2px solid white;
            padding: 30px 0px;
            margin: 10px;

        }

        .page {
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="page page--login" data-page="login">

        <!-- HEADER -->
        <!-- <header class="header header--fixed">
        <div class="header__inner">
            <div class="header__icon"><a href="https://plustrx.com"><img src="../assets/img/icons/arrow-back.svg" alt="" title=""/></a></div>
        </div>
    </header> -->

        <div class="login">
            <div class="login__content">
                <h2 class="login__title">Create an account</h2>
                <div class="login-form">
                    <form class="login-card-form" novalidate="novalidate" id="LoginForm" action="{{route('register')}}" method="post">
                        @csrf
                        <!-- <div class="container"> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">First Name</label>
                                        <input id="first_name" type="text" class="login-form__input required form-control " name="first_name" value="" placeholder="First Name" required autocomplete="first_name" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">Last Name</label>
                                        <input id="last_name" type="text" class="login-form__input required form-control " name="last_name" value="" placeholder="Last Name" required autocomplete="last_name" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">Username</label>
                                        <input id="username" type="text" class="login-form__input required form-control " name="username" value="" placeholder="Username" required autocomplete="username">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">E-mail</label>
                                        <input id="email" type="email" class="login-form__input required email form-control " name="email" value="" placeholder="E-mail" required autocomplete="email">

                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">Company</label>
                                        <input id="company" type="text" class="login-form__input  form-control " name="company" value="" placeholder="Company" autocomplete="company">

                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">Mobile number</label>
                                        <input id="phone" type="text" class="login-form__input required form-control " name="phone" value="" placeholder="+1(748)******" required autocomplete="phone">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-form__row">
                                        <label class="login-form__label">password</label>
                                        <input id="password" type="password" class="login-form__input required form-control " name="password" required placeholder="password" autocomplete="new-password">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="login-form__row">
                                        <label class="login-form__label">passcode</label>
                                        <input id="passcode" type="password" class="login-form__input required form-control " name="passcode" required placeholder="password" autocomplete="new-password">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        <!-- </div> -->

                        <div class="login-form__row">
                            <input type="submit" name="submit" class="login-form__submit button button--main button--full" id="submit" value="SIGN UP" />
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <!-- PAGE END -->

    <script src="{{asset('userassets/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/jquery/jquery.validate.min.js')}}"></script>
    <script src="{{asset('userassets/vendor/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('userassets/js/jquery.custom.js')}}"></script>
</body>

</html>