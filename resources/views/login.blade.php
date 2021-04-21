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

<body style="width: 100vw;height: 100vh;background: url(&quot;assets/img/header-bg.jpg&quot;) center / auto;">
    <?php include "resources/views/header.php"?>
    <section class="d-flex justify-content-center align-items-center" style="width: 100vw;height: 100vh;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 0px;margin-bottom: 0;">
        <div class="d-xl-flex" data-bss-hover-animate="pulse" style="margin: 50px;padding-top: 54px;padding-bottom: 47px;padding-right: 100px;padding-left: 100px;background: var(--gray-dark);border-radius: 26px;margin-top: 0;box-shadow: 4px 7px 20px 5px rgba(33,37,41,0.46);opacity: 1;">
            <form class="d-xl-flex flex-column" method="post" action='{{route("dologin")}}'>
            @csrf
                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center align-items-xl-start illustration" style="margin-top: 10px;margin-bottom: 10px;"><i class="icon ion-ios-locked" style="text-align: center;color: var(--primary);"></i></div>
                <h1 style="text-align: center;font-size: 36px;color: var(--primary);">Login</h1>
                <header></header>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" style="background: var(--gray-dark);padding: 12px 12px;margin-top: 32px;"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="background: var(--gray-dark);padding: 12px 12px;margin-top: 6px;"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: var(--primary);margin-top: 19px;">Log In</button></div><a class="d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center forgot" href="#" style="border-color: var(--gray-dark);color: var(--light);font-size: 10px;text-align: center;">Forgot your email or password?</a><a class="d-md-flex justify-content-md-center already" href="register" style="color: var(--light);font-size: 9px;padding-top: 7px;">Still need an account? Create one here.</a>
            </form>
        </div>
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