@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Job History</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px; ">
        <div class="col" style="border-style: none; ">
            <div class="card"
                 style="border-radius: 10px; color:white;background:var(--gray-dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;">Add New Job History</h5>
                </div>
                <!-- Here is the error with inserting into database. -->
                <form method="post" action="{{ route('jobHistory.store', session('userID')) }}">
                    @csrf
                    <input type="hidden" name="userID" value="{{ session('userID') }}" />
                    <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                        <div style="width: 75%; height: auto;">
                            <!-- start of form -->
                            <div class="form-group">
                                <label for="job-company"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Company Name:</label>
                                <input type="text" name="job-company" value="" style="color:white; background:var(--gray-dark);">
                            </div>

                            <div class="form-group">
                                <label for="job-title"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Job Title:</label>
                                <input type="text" name="job-title" value="" style="color:white; background:var(--gray-dark);">
                            </div>

                            <div class="form-group">
                                <label for="date-start"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Date Started Employment:</label>
                                <input type="date" name="date-start" value="" style="color:white; background:var(--gray-dark);">
                            </div>

                            <div class="form-group">
                                <label for="date-stop"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Date Ended Employment:</label>
                                <input class="" type="date" id="stopDate" name="date-stop" value="" style="color:white; background:var(--gray-dark);">

                            </div>

                            <div class="form-group">
                                <label for="job-desc"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Job Description:</label>
                                <textarea type="textarea" name="job-desc" value="" style="color:white; background:var(--gray-dark);"></textarea>
                            </div>

                        </div>

                        <!-- submit button -->
                        <div
                            class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                            role="group"
                            style="padding-right: 0px; margin-left: 0px; width: auto;">
                            <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('userinfo', session('userID') ) }}"
                            style="text-align:center;margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; color:white; background:var(--gray-dark); border-radius: 6px; border-style: none;">Cancel</a></li>
                            <div>
                                <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 50px; padding-right: 50px; margin-bottom: 6px; color:white; background:var(--gray-dark); border-radius: 6px;border-style: none; color: lightblue;">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
