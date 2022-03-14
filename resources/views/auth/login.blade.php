<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Bintang Tobing">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ASCEND HR Helper - Login</title>
    <link rel="shortcut icon" href="{!!asset('icon.png')!!}" type="image/png" sizes="64x64">

    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/bootstrap/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/animate/animate.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/css-hamburgers/hamburgers.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/animsition/css/animsition.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/select2/select2.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/vendor/daterangepicker/daterangepicker.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/css/util.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('auth/css/main.css')!!}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                @if(session('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('gagal')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="/login/{{csrf_token()}}">
                    @csrf
                    <span class="login100-form-title p-b-51">
                        Welcome
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Email is required">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="{!!asset('auth/vendor/jquery/jquery-3.2.1.min.js')!!}"></script>
    <script src="{!!asset('auth/vendor/animsition/js/animsition.min.js')!!}"></script>
    <script src="{!!asset('auth/vendor/bootstrap/js/popper.js')!!}"></script>
    <script src="{!!asset('auth/vendor/bootstrap/js/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('auth/vendor/select2/select2.min.js')!!}"></script>
    <script src="{!!asset('auth/vendor/daterangepicker/moment.min.js')!!}"></script>
    <script src="{!!asset('auth/vendor/daterangepicker/daterangepicker.js')!!}"></script>
    <script src="{!!asset('auth/vendor/countdowntime/countdowntime.js')!!}"></script>
    <script src="{!!asset('auth/js/main.js')!!}"></script>

</body>

</html>