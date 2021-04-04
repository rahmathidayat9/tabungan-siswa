<!DOCTYPE html>
<html lang="en">

<head>
    <title>TABUNGAN - {{ $title ?? '' }}</title>
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
    @stack('css')
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- sidebar start -->
    @include('layouts.backend.sidebar')
    <!-- sidebar end -->

    <!-- navbar start -->
    @include('layouts.backend.navbar')
    <!-- navbar end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header mb-4">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">{{ $contentTitle ?? '' }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            @yield('content')
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/js/vendor-all.min.js"></script>
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('templates/backend/datta-lite') }}/assets/js/pcoded.min.js"></script>
    @stack('js')
</body>
</html>
