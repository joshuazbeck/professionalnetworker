@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
<h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Information</h1>
<div class="row"
     style="color:var(--primary);margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
    <div class="col" style="border-style: none;">
        <div class="card"
             style="border-radius: 10px; background: var(- -dark); background:var(--gray-dark);border-style: none; border-top-width: 49px;">
            <div class="card-header">
                <h5 class="mb-0" style="color: var(- -light); text-align: left; ">{{ $user->getFirstName() }} {{ $user->getLastName() }}</h5>
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
            <div class="card-footer" >
                <div class="accordion" style="background:var(--gray-dark);" id="accordionExample">
                    <div class="card">
                        <div class="card-header" style="background:var(--gray-dark);" id="headingOne">
                            <h2 class="mb-0" style="background:var(--gray-dark);">
                                <button class="btn btn-block text-left" style="background:var(--gray-dark); color:var(--primary);" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    User Profile
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" style="background:var(--gray-dark);"class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body" style="background:var(--gray-dark);">
                                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                                    <div class="btn-toolbar"></div>
                                    <div style="width: 75%; height: auto;">
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Occupation: {{ $profile->getOccupation() }}</p>
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
                    <div class="card" >
                        <div class="card-header" style="background:var(--gray-dark);" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" style="color:var(--primary);;background:var(--gray-dark);" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Professional Profile
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo"  class="collapse" style="background:var(--gray-dark);" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" style="background:var(--gray-dark);">
                            <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                                    <div class="btn-toolbar"></div>
                                    <div style="width: 75%; height: auto;">
                                        @if ($jobHistory)
                                            @foreach ($jobHistory as $job)
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Company: {{ $job->getCompanyName() }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Last Position Held: {{ $job->getJobTitle() }}</p>
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Start Date: {{ date("F Y", strtotime($job->getStartDate())) }}</p>
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Stop Date: {{ date("F Y", strtotime($job->getStopDate())) }}</p>
                                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Description: {{ $job->getDesc() }}</p>
                                                </br>
                                                </br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div
                                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                                        role="group"
                                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('jobHistory.create') }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Add Job</a></li>
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('jobHistory.show', $user->getUserID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Manage Jobs</a></li>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-header" style="background:var(--gray-dark);" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" style="color:var(--primary);;background:var(--gray-dark);" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Education
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree"  class="collapse" style="background:var(--gray-dark);" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="background:var(--gray-dark);">
                                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                                    <div class="btn-toolbar"></div>
                                    <div style="width: 75%; height: auto;">
                                        @if ($education)
                                            @foreach ($education as $edu)
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">School: {{ $edu->getSchoolName() }}</p>
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Field of Study: {{ $edu->getFieldStudy() }}</p>
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Degree Type: {{ $edu->getDegreeType() }}</p>
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Date Graduated: {{ date("F Y", strtotime($edu->getDateGraduated())) }}</p>
                                                </br>
                                                </br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div
                                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                                        role="group"
                                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('education.create') }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Add Education</a></li>
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('education.show', $user->getUserID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Manage Education</a></li>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-header" style="background:var(--gray-dark);" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" style="color:var(--primary);;background:var(--gray-dark);" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Skills/Strengths
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour"  class="collapse" style="background:var(--gray-dark);" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body" style="background:var(--gray-dark);">
                                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                                    <div class="btn-toolbar"></div>
                                    <div style="width: 75%; height: auto;">
                                        @if ($skills)
                                            @foreach ($skills as $skill)
                                                <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Skill: {{ $skill->getName() }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div
                                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                                        role="group"
                                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('editUserSkills', session('userID') ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Manage Skills</a></li>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
