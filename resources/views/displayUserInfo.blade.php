@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
<h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Information</h1>
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
                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email: {{ $user->getEmail() }}</p>
                </div>
                <div
                    class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                    role="group"
                    style="padding-right: 0px; margin-left: 0px; width: auto;">
                    <a class="nav-link border rounded-0 border-primary" href="{{ route('users.edit', $user->getUserID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update User</a>

                </div>
            </div>
            <div class="card-footer">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    User Profile
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="card-body d-sm-flex flex-row justify-content-sm-center">
                                    <div class="btn-toolbar"></div>
                                    <div style="width: 75%; height: auto;">
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Phone: {{ $profile->getPhone() }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Age: {{ $profile->getAge() }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Gender: @if($profile->getIsMale() == 0) Female @else Male @endif</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">City: {{ $profile->getCity() }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">State: {{ $profile->getState() }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Bio: {{ $profile->getBio() }}</p>
                                    </div>
                                    <div
                                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                                        role="group"
                                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('profiles.edit', $user->getUserID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</a></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Professional Profile
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Coming in Milestone 3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
