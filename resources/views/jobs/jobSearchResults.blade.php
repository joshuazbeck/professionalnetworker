@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Search Jobs</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -gray-dark); border-style: none; border-top-width: 49px; ">
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background: var(--gray-dark);color:var(--primary);">
                    <form class="form-inline" method="post" action='{{route("doJobSearch")}}'>
                        @csrf
                        <input type="hidden" name="route" value="skills" />
                        <button type="submit" class="btn btn-primary mr-sm-2 form-control">Match Jobs By Skill</button>
                        <label class="form-control mr-sm-2 bg-dark border-0 text-primary">OR</label>
                    </form>
                    <form class="form-inline" method="post" action='{{route("doJobSearch")}}'>
                        @csrf
                        <input type="hidden" name="route" value="search" />
                        <input type="text" name="searchString" class="form-control mr-sm-2 bg-dark text-primary" placeholder="Search String...">

                        <select class="mr-sm-2 form-control text-primary bg-dark" name="searchColumn">
                            <option selected>Choose...</option>
                            <option value="TITLE">Title</option>
                            <option value="CITY">City</option>
                            <option value="DESCRIPTION">Description</option>
                        </select>
                        <button type="submit" class="btn btn-primary mr-sm-2 form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($jobsArray)
        @foreach ($jobsArray as $jobs)
            <div class="row"
                 style="color:var(--primary);margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
                <div class="col" style="border-style: none;">
                    <div class="card"
                         style="border-radius: 10px; background: var(- -dark); background:var(--gray-dark);border-style: none; border-top-width: 49px;">
                        <div class="card-header">
                            <h5 class="" style="color: var(- -light); text-align: left; ">{{ $jobs->getCompany() }}</h5>
                            <h6 class="mb-0" style="color: var(- -light); text-align: left; ">Position: {{ $jobs->getJobTitle() }}</h6>
                        </div>
                        <div class="card-footer" >
                            <div class="accordion" style="background:var(--gray-dark);" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" style="background:var(--gray-dark);" id="headingOne">
                                        <h2 class="mb-0" style="background:var(--gray-dark);">
                                            <button class="btn btn-block text-left" style="background:var(--gray-dark); color:var(--primary);" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               Job Details
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" style="background:var(--gray-dark);"class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body" style="background:var(--gray-dark);">
                                            <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                                                <div class="btn-toolbar"></div>
                                                <div style="width: 75%; height: auto;">
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Company: {{ $jobs->getCompany() }}</p>
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">City: {{ $jobs->getCity() }}</p>
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">State: {{ $jobs->getState() }}</p>
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">
                                                        Status: @if($jobs->getStatus() == 0) Full-Time @elseif($jobs->getStatus() == 1) Part-Time @else Internship @endif
                                                    </p>
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">
                                                        Hourly Pay: ${{ number_format($jobs->getPayHourly()) }}
                                                    </p>
                                                    <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">
                                                        Job Description: {{$jobs->getJobDescription()}}
                                                    </p>
                                                </div>
                                                <div
                                                    class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                                                    role="group"
                                                    style="padding-right: 0px; margin-left: 0px; width: auto;">
                                                    <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('applyForJob', $jobs->getJobID()) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Apply</a></li>
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
        @endforeach
    @else
        <h2 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 100px;">No Results Found</h2>
    @endif
@endsection
