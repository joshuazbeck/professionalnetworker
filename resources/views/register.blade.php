@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')<section>
    <section
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
        style="padding-top: 0px;padding-bottom: 0px;">
        <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center"
             data-bss-hover-animate="pulse"
             style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 0;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
            <div
                style="background: url({{ asset('assets/img/hian-oliveira-vOwj38HFrJ0-unsplash.jpg') }}) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
            <section
                style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                <div class="form-container" style="margin-right: 0px;">
                    <form method="post" style="width: auto;" action="{{route('users.store')}}">
                        @csrf
                        <i class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center"
                           style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                        <h2 class="text-center" style="color: var(--primary);"><strong>Create</strong> an account.</h2>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <div class="input-group-append"></div>
                        </div>
                        <input class="form-control bg-dark text-white" type="text" data-aos="fade-up" name="firstName"
                               placeholder="First Name" style="background: var(--dark);margin-top: 23px;" required>
                        <input class="form-control bg-dark text-white" type="text" data-aos="fade-up" name="lastName" placeholder="Last Name"
                               style="background: var(--dark);margin-top: 23px;" required>
                        <input class="form-control bg-dark text-white" type="email" data-aos="fade-up" name="email" placeholder="Email" style="background: var(--dark);margin-top: 25px;" required>
                        <input
                            class="form-control bg-dark text-white" type="password" data-aos="fade-up" name="password"
                            placeholder="Password" style="background: var(--dark);margin-top: 23px;" required>
                        <input
                            class="form-control bg-dark text-white" type="password" data-aos="fade-up" name="password-repeat"
                            placeholder="Password (repeat)" style="background: var(--dark);margin-top: 23px;" required>
                        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Sign Up
                        </button>
                        <a class="d-md-flex justify-content-md-center already" href="login"
                           style="color: var(--light);font-size: 9px;margin-top: 10px;">You already have an account?
                            Login here.</a>
                    </form>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection
