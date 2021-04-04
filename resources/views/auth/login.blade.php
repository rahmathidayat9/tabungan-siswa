<!DOCTYPE html>
<html lang="en">

<head>
    <title>TABUNGAN - LOGIN</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Web tabungan siswa , Dibuat dengan laravel-8" />
    <meta name="keywords" content="web app,laravel,school"/>
    <meta name="author" content="Rahmat Hidayatullah"/>

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('templates/backend/datta-lite') }}/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('templates/backend/datta-lite') }}/assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Login</h3>
                    @include('layouts.components.alert-dismissible')
                    <div class="input-group mb-3">
                        <input required="" name="username" type="" class="form-control @error('username') is-invalid @enderror" placeholder="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <input required="" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save Details</label>
                        </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                    <!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p> -->
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/js/vendor-all.min.js"></script>
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
