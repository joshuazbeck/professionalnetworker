<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CST256ProfessionalNetworking</title>
    <meta name="description"
          content="This site is designed for CST-256 as a professional networking webpage demo built on Laravel">
    <link rel="icon" type="image/jpeg" sizes="1900x1250" href="assets/img/header-bg.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background: url(&quot;assets/img/header-bg.jpg&quot;) center / cover;">
<section>
    <section
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
        style="padding-top: 0px;padding-bottom: 0px;">
        <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center"
             data-bss-hover-animate="pulse"
             style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 10%;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
            <div
                style="background: url(&quot;assets/img/hian-oliveira-vOwj38HFrJ0-unsplash.jpg&quot;) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
            <section
                style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                <!-- Start: Form Container -->
                <div class="form-container" style="margin-right: 0px;">
                    <form method="post" style="width: auto;" action="{{route('doregister')}}"><i
                            class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center"
                            style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                        @csrf
                        <h2 class="text-center" style="color: var(--primary);"><strong>Create</strong> an account.</h2>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <div class="input-group-append"></div>
                        </div>
                        <input class="form-control" type="text" data-aos="fade-up" name="firstName"
                               placeholder="First Name" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control" type="text" data-aos="fade-up" name="lastName" placeholder="Last Name"
                            style="background: var(--dark);margin-top: 23px;" required>
                        <input class="form-control" type="email"
                                                                                     data-aos="fade-up" name="email"
                                                                                     placeholder="Email"
                                                                                     style="background: var(--dark);margin-top: 25px;" required>
                        <input
                            class="form-control" type="password" data-aos="fade-up" name="password"
                            placeholder="Password" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control" type="password" data-aos="fade-up" name="password-repeat"
                            placeholder="Password (repeat)" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control" type="tel" data-aos="fade-up" name="phoneNum"
                            placeholder="Phone Number" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control" type="number" data-aos="fade-up" name="age" placeholder="Age"
                            style="background: var(--dark);margin-top: 23px;" required>
                        <select class="form-control"
                                                                                      data-aos="fade-up" name="selector"
                                                                                      value="Gender" required>
                            <optgroup label="Gender">
                                <option value="1" selected="">Male</option>
                                <option value="2">Female</option>
                            </optgroup>
                        </select>
                        <input class="form-control" type="text" data-aos="fade-up" name="city"
                                        placeholder="City" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control" type="text" data-aos="fade-up" name="state" placeholder="State (XX)"
                            style="background: var(--dark);margin-top: 23px;" required>
                        <div class="form-check">
                            <label class="form-check-label d-md-flex"
                                                       style="color: var(--light);font-size: 13px;margin-top: 15px;">
                                <input
                                    class="form-check-input" type="checkbox">I agree to the license terms.</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Sign Up
                        </button>
                        <a class="d-md-flex justify-content-md-center already" href="login"
                           style="color: var(--light);font-size: 9px;margin-top: 10px;">You already have an account?
                            Login here.</a>
                    </form>
                </div><!-- End: Form Container -->
            </section>
        </div>
    </section>
</section>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav"
     style="padding-bottom: 20px;padding-top: 20px;box-shadow: 0px 0px 11px rgba(254,209,54,0.12);">
    <div class="container"><a class="navbar-brand swing animated" href="{{route('/')}}">Professional Networker</a>
        <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
                type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                style="margin-bottom: 12px;margin-top: 12px;"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto text-uppercase">
                <li class="nav-item"><a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="login"
                                        style="text-align: center;margin-right: 24px;">Login</a></li>
                <li class="nav-item"><a class="nav-link border rounded-0 border-primary js-scroll-trigger"
                                        href="register"
                                        style="filter: blur(0px);text-align: center;margin-right: 24px;">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="py-5"
         style="text-align: center;border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;background: var(--dark);">
    <small style="margin: auto;padding: auto;color: #4a4f55;">Copyright 2021&nbsp;(©) Joshua Beck, Mark Pratt, Shawn
        Fradet</small></section>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>