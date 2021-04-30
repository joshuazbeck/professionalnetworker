@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Manage Jobs</h1>
    @if ($jobsArray)
    @foreach ($jobsArray as $jobs)
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -gray-dark); border-style: none; border-top-width: 49px; ">
                <div class="card-header" style="background: var(--gray-dark);">
                    <h5 class="mb-0" style="color: var(--primary); text-align: left; ">{{ $jobs->getJobTitle() }}</h5>
                </div>
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background: var(--gray-dark);color:var(--primary);">
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
                        style="background: var(--gray-dark); padding-right: 0px; margin-left: 0px; width: auto;">

                        <a class="nav-link border rounded-0 border-primary" href="{{ route('jobs.edit', $jobs->getJobID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update Job</a>
                            <form action="{{ route('jobs.destroy', $jobs->getJobID()) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 50px; padding-right: 50px; margin-bottom: 6px; border-radius: 6px; background: var(--gray-dark);border-color: red;border-style: none; color: red;">Delete</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <h2 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 100px;">Currently No Jobs Available</h2>
    @endif
@endsection
