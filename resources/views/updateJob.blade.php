@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Job Update</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; color: white; background:var(--gray-dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;"></h5>
                </div>
                <form method="post" action="{{ route('jobs.update', $job->getJobID()) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                    <div style="width: 75%; height: auto; color:var(--primary)" >
                        <div class="form-group" >
                            <label for="jobTitle"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">
                                Job Title:</label>
                            <input type="text" name="jobTitle" value="{{ $job->getJobTitle() }}" style="background:var(--gray-dark);">
                            @error('jobtitle')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desiredSkill"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Desired Skill:</label>
                            <input type="text" name="desiredSkill" value="{{ $job->getDesiredSkill() }}" style="background:var(--gray-dark);">
                            @error('desiredskill')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Company:</label>
                            <input type="text" name="company" value="{{ $job->getCompany() }}" style="background:var(--gray-dark);">
                            @error('company')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">City:</label>
                            <input type="text" name="city" value="{{ $job->getCity() }}" style="background:var(--gray-dark);">
                            @error('company')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">State:</label>
                            <input type="text" name="state" value="{{ $job->getState() }}" style="background:var(--gray-dark);">
                            @error('company')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label for="payHourly"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Hourly Pay:</label>
                            <input type="text" name="payHourly" value="{{ $job->getPayHourly() }}" style="background:var(--gray-dark);">
                            @error('payHourly')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="selector"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">User
                                Role:</label>
                            <select name="selector" value="status" required style="background:var(--gray-dark);">
                                <optgroup label="Status">
                                    <option @if($job->getStatus() == 0) selected @endif value="0">0 - Full-Time
                                    </option>
                                    <option @if($job->getStatus() == 1) selected @endif value="1">1 - Part-Time
                                    </option>
                                    <option @if($job->getStatus() == 2) selected @endif value="2">2 - Internship
                                    </option>
                                </optgroup>
                            </select>
                        </div>
                		<div class="form-group">
                            <label for="jobDescription"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Job Description:</label>
                            <input type="text" name="jobDescription" value="{{ $job->getJobDescription() }}" style="background:var(--gray-dark);">
                            @error('jobDescription')
                            <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger"
                           href="{{ route('jobs.index') }}"
                           style="text-align:center;margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Cancel</a></li>
                        <div>
                            <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 50px; padding-right: 50px; margin-bottom: 6px; background: var(- -info); background:var(--gray-dark); border-radius: 6px; border-color: red;border-style: none; color: lightblue;">Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
