<html lang="en" style="filter: blur(0px);">
<head>
{{--    <base href="http://localhost/CST/GroupProject/">--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="description" content="This site is designed for CST-256 as a professional networking webpage demo built on Laravel">
    <link rel="icon" type="image/jpeg" sizes="1900x1250" href="{{ asset('assets/img/header-bg.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
{{--    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Header-Dark.css') }}">
{{--    <link rel="stylesheet" href="assets/css/Header-Dark.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Registration-Form-with-Photo.css') }}">
{{--    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">--}}
{{--    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">--}}
</head>
<body id="page-top" style="display: flex; flex-direction: column; margin-bottom: 15vh; min-height: 100vh;background: url({{ asset('assets/img/header-bg.jpg') }}) center / cover;">
@include('layouts.header')
@yield('content')
@include('layouts.footer')
</body>
</html>
