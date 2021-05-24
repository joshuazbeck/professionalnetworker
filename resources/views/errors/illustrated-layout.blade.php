<!DOCTYPE html>
<html style="filter: blur(0px);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Professional Networker</title>
    <meta name="description" content="This site is designed for CST-256 as a professional networking webpage demo built on Laravel">
    <link rel="icon" type="image/jpeg" sizes="1900x1250" href="/assets/img/header-bg.jpg">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="{{ asset('assets//assets/css/styles.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body id="page-top" style="filter: blur(0px);">
    <header class="masthead" style="background: url({{ asset('assets/img/zachary-keimig-FmU0VB7JJpU-unsplash.jpg') }}) center / cover;">
        <div class="container">
            <div class="intro-text" style="padding-top: 150px;padding-bottom: 150px;">
                <div class="intro-lead-in"><span>@yield('title')</span></div>
                <div class="intro-heading text-uppercase"><span data-bss-hover-animate="shake"></span><span>@yield('code')</span> - <span>@yield('message')</span></div><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" data-bss-hover-animate="rubberBand" href="{{route('/')}}">Back Home</a>
            </div>
        </div>
    </header>
    @include('layouts.footer')
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="/assets/js/script.min.js"></script>
</body>

</html>