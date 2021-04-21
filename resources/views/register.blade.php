<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CST256ProfessionalNetworking</title>
    <meta name="description" content="This site is designed for CST-256 as a professional networking webpage demo built on Laravel">
    <link rel="icon" type="image/jpeg" sizes="1900x1250" href="assets/img/header-bg.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body style="background: url(&quot;assets/img/header-bg.jpg&quot;) center / cover;">
    <?php include "resources/views/header.php"?>
    <section>
        <section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="padding-top: 0px;padding-bottom: 0px;">
            <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center" data-bss-hover-animate="pulse" style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 0;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
                <div style="background: url(&quot;assets/img/hian-oliveira-vOwj38HFrJ0-unsplash.jpg&quot;) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
                <section style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                    <div class="form-container" style="margin-right: 0px;">
                        <form method="post" style="width: auto;" action="{{route('doregister')}}"><i class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center" style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                            <h2 class="text-center" style="color: var(--primary);"><strong>Create</strong> an account.</h2>
                            <div class="input-group">
                                <div class="input-group-prepend"></div>
                                <div class="input-group-append"></div>
                            </div><input class="form-control" type="text" data-aos="fade-up" name="firstName" placeholder="First Name" style="background: var(--dark);margin-top: 23px;"><input class="form-control" type="text" data-aos="fade-up" name="lastName" placeholder="Last Name" style="background: var(--dark);margin-top: 23px;"><input class="form-control" type="email" data-aos="fade-up" name="email" placeholder="Email" style="background: var(--dark);margin-top: 25px;"><input class="form-control" type="password" data-aos="fade-up" name="password" placeholder="Password" style="background: var(--dark);margin-top: 23px;"><input class="form-control" type="password" data-aos="fade-up" name="password-repeat" placeholder="Password (repeat)" style="background: var(--dark);margin-top: 23px;"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Sign Up</button><a class="d-md-flex justify-content-md-center already" href="login" style="color: var(--light);font-size: 9px;margin-top: 10px;">You already have an account? Login here.</a>
                        </form>
                    </div>
                </section>
            </div>
        </section>
    </section>
  	<?php include "resources/views/footer.php"?>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
</body>

</html>