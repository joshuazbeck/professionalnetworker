@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <section class="d-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="width: 100vw;height: 100vh;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-bottom: 0;">
        <div class="d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center" data-bss-hover-animate="pulse" style="margin: 50px;padding-top: 54px;padding-bottom: 47px;padding-right: 100px;padding-left: 100px;background: var(--gray-dark);border-radius: 26px;box-shadow: 4px 7px 20px 5px rgba(33,37,41,0.46);opacity: 1;"><i class="icon ion-ios-locked d-xl-flex justify-content-xl-center align-items-xl-center" style="text-align: center;color: var(--primary);"></i>
            <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 12px;">Administrator</h1>
            <a class="btn btn-primary d-xl-flex justify-content-xl-center" type="button" style="width: auto;padding-right: auto;padding-left: auto;margin-top: 40px;margin-bottom: 10px;" href="{{ route('users.index') }}">Manage Users</a>
            <a class="btn btn-primary d-xl-flex justify-content-xl-center" type="button" style="width: auto;padding-right: auto;padding-left: auto;margin-top: 10px;margin-bottom: 10px;" href="{{ route('jobs.index') }}">Manage Jobs</a>
            <a class="btn btn-primary d-xl-flex justify-content-xl-center" type="button" style="width: auto;padding-right: auto;padding-left: auto;margin-top: 10px;margin-bottom: 40px;" href="{{ route('jobs.create') }}">Add A Job</a>
        </div>
    </section>
@endsection
