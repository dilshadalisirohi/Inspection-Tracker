<!doctype html>
<html lang="en">
<head>
    @php
        $settings = \App\Models\Setting::find(1)
    @endphp
    <base href="{{ url('/') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ $settings->title }}</title>
	<meta name="description" content="">
	<!-- General CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/chosen/bootstrap-chosen.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ url('public/storage/uploads')."/".$settings->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ url('public/storage/uploads')."/".$settings->favicon }}" type="image/x-icon">
	</head>
<body>

    @yield('content')

	<!-- General JS Scripts -->
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/parsley.min.js') }}"></script>
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
</body>
</html>
