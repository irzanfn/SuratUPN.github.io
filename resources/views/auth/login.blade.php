<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Si-APIK</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('img/upn.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="log/css/util.css">
    <link rel="stylesheet" type="text/css" href="log/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{route('login')}}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>
                    <div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz">
                        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>
                    <br>

                    <div class="wrap-input100" data-validate="Password is required">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('log/images/bg-01.png');">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="log/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="log/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="log/vendor/bootstrap/js/popper.js"></script>
    <script src="log/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="log/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="log/vendor/daterangepicker/moment.min.js"></script>
    <script src="log/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="log/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="log/js/main.js"></script>

</body>

</html>