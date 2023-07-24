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
</head>

<body>
    <style>
        .login {
            width: 400px;
            height: auto;
            /* margin: 50px auto; */
            border: 2px solid white;
            padding: 30px;
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
                <h2 class="login__title">Login</h2>
                <div class="login-form">
                    <form class="login-card-form" novalidate="novalidate" id="LoginForm" action="{{route('check')}}" method="post">
                        @csrf
                        <div class="login-form__row">
                            <label class="login-form__label">Username</label>
                            <input class="login-form__input required form-control " type="text" id="username" name="username" value="" placeholder="username or email" required autocomplete="username" autofocus>
                        </div>
                        <div class="login-form__row">
                            <label class="login-form__label">Password</label>
                            <input id="password" type="password" class="login-form__input required form-control " name="password" placeholder="password" required autocomplete="current-password">
                        </div>
                        <!-- <div class="login-form__forgot-pass"><a href="reset.html">Forgot Password?</a></div> -->
                        <div class="login-form__row">
                            <input type="submit" name="submit" class="login-form__submit button button--main button--full" id="submit" value="SIGN IN" />
                        </div>
                    </form>

                    <div class="login-form__bottom">
                        <p>Don't have an account? <br /><a href="{{route('getRegister')}}">SIGNUP NOW!</a></p>
                    </div>
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