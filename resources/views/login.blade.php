@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <section class="d-flex justify-content-center align-items-center" style="width: 100vw;height: 100vh;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 0px;margin-bottom: 0;">
        <div class="d-xl-flex" data-bss-hover-animate="pulse" style="margin: 50px;padding-top: 54px;padding-bottom: 47px;padding-right: 100px;padding-left: 100px;background: var(--gray-dark);border-radius: 26px;margin-top: 0;box-shadow: 4px 7px 20px 5px rgba(33,37,41,0.46);opacity: 1;">
            <form class="d-xl-flex flex-column" method="post" action='{{route("dologin")}}'>
                @csrf
                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center align-items-xl-start illustration" style="margin-top: 10px;margin-bottom: 10px;">
                    <i class="icon ion-ios-locked" style="text-align: center;color: var(--primary);"></i>
                </div>
                <h1 style="text-align: center;font-size: 36px;color: var(--primary);">Login</h1>
                <header></header>
                <div class="form-group">
                    <input class="form-control bg-dark text-white" value="{{ old('email') }}" type="email" name="email" placeholder="Email" style="background: var(--gray-dark);padding: 12px 12px;margin-top: 32px;">
                    @error('email')
                    <h6 class="text-primary h-auto" style="font-size: 65%">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control bg-dark text-white" type="password" name="password" placeholder="Password" style="background: var(--gray-dark);padding: 12px 12px;margin-top: 6px;">
                    @error('password')
                    <h6 class="text-primary h-auto" style="font-size: 65%">{{ $message }}</h6>
                    @enderror
                </div>
                @error('info')
                <h6 class="text-primary h-auto" style="font-size: 65%">{{ $message }}</h6>
                @enderror
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background: var(--primary);margin-top: 19px;">Log In</button>
                </div>
                <a class="d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center forgot" href="#" style="border-color: var(--gray-dark);color: var(--light);font-size: 10px;text-align: center;">Forgot your email or password?</a>
                <a class="d-md-flex justify-content-md-center already" href="register" style="color: var(--light);font-size: 9px;padding-top: 7px;">Still need an account? Create one here.</a>
            </form>
        </div>
    </section>
@endsection
