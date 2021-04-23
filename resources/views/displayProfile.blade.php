@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Profile</h1>
        <div class="row"
             style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
            <div class="col" style="border-style: none;">
                <div class="card"
                     style="border-radius: 10px; background: var(- -dark); border-style: none; border-top-width: 49px;">
                    <div class="card-header">
                        <h5 class="mb-0" style="color: var(- -light); text-align: left;">{{ $user->getFirstName() }} {{ $user->getLastName() }}</h5>
                    </div>
                    <div class="card-body d-sm-flex flex-row justify-content-sm-center">
                        <div class="btn-toolbar"></div>
                        <div style="width: 75%; height: auto;">
                            <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Phone: {{ $profile->getPhone() }}</p>
                            <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Age: {{ $profile->getAge() }}</p>
                            <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">City: {{ $profile->getCity() }}</p>
                            <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">State: {{ $profile->getState() }}</p>
                            <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Bio: {{ $profile->getBio() }}</p>
                        </div>
                        <div
                            class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                            role="group"
                            style="padding-right: 0px; margin-left: 0px; width: auto;">
                            <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="deleteUser/1" style="opacity: 0.5;pointer-events: none; margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</a></li>
                            <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('users.index') }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Back</a></li>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
