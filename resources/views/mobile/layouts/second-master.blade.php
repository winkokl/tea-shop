<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#92E136">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
    <meta name="keywords" content="android, ios, mobile, application template, progressive web app, ui kit, multiple color, dark layout">
	<meta name="description" content="Tea - Complete solution of some popular application like - Tea app, shop vendor app, driver app and progressive web app">
	<meta property="og:title" content="Tea: Pre-Build Tea Mobile App Template ( Bootstrap 5 + PWA )">
	<meta property="og:description" content="Tea - Complete solution of some popular application like - Tea app, shop vendor app, driver app and progressive web app">
	<meta property="og:image" content="https://Tea.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    @yield('meta')
	<!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('mobile/assets/images/favicon.png')}}">

    <!-- Title -->
	<title>@yield('title', app_name())</title>

    <!-- PWA Version -->
	<link rel="manifest" href="{{ asset('mobile/manifest.json')}}">
    @yield('before-styles-end')
	<!-- Global CSS -->
    <link href="{{ asset('mobile/assets/vendor/apexcharts/dist/apexcharts.css')}}" rel="stylesheet">
	<link href="{{ asset('mobile/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('mobile/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}">
	<link rel="stylesheet" href="{{ asset('mobile/assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link href="{{asset('mobile/assets/vendor/jquery-steps/css/jquery.steps.css')}}" rel="stylesheet">
	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mobile/assets/css/style.css')}}">

    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @yield('after-styles-end')
</head>
<body data-theme-color="color-primary" class="bg-primary">
    @yield('page-wraper')
<div class="page-wraper">

	<!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
    <!-- Preloader end-->

    <!-- Header -->
        @yield('header')
    <!-- Header end-->

    <!-- Sidebar -->
        @yield('sidebar')
    <!-- Sidebar end-->

    <!-- Banner -->
        @yield('banner')
    <!-- Banner end-->

    <!-- Page Content -->
        @yield('content')
    <!-- Page Content End-->

	<!-- Footer -->
        @yield('footer')
    <!-- Footer end-->

</div>
<!--**********************************
    Scripts
***********************************-->
@yield('before-scripts-end')
<script src="{{ asset('mobile/assets/js/jquery.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/apexcharts/dist/apexcharts.js')}}"></script><!-- Apexchart -->
{{-- <script src="{{ asset('mobile/assets/js/dashboard/dashboard-1.js')}}"></script> --}}
<script src="{{ asset('mobile/assets/vendor/jquery-steps/js/jquery.steps.min.js')}}"></script><!-- steps.js -->
<script src="{{ asset('mobile/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('mobile/assets/vendor/swiper/swiper-bundle.min.js')}}"></script><!-- Swiper -->
<script src="{{ asset('mobile/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script><!-- Swiper -->
<script src="{{ asset('mobile/assets/js/dz.carousel.js')}}"></script><!-- Swiper -->
<script src="{{ asset('mobile/assets/js/settings.js')}}"></script>
<script src="{{ asset('mobile/assets/js/custom.js')}}"></script>
@yield('after-scripts-end')
</body>
</html>
