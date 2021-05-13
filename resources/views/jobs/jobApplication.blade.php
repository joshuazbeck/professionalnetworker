@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <section class="d-flex justify-content-center align-items-center" style="width: 100vw;height: 100vh;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 0px;margin-bottom: 0;">
        <div class="d-xl-flex" data-bss-hover-animate="pulse" style="margin: 50px;padding-top: 54px;padding-bottom: 47px;padding-right: 100px;padding-left: 100px;background: var(--gray-dark);border-radius: 26px;margin-top: 0;box-shadow: 4px 7px 20px 5px rgba(33,37,41,0.46);opacity: 1;">
            <form class="d-xl-flex flex-column" method="post" action='{{ route("processApplication") }}' enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="JobID" value="{{ $job->getJobID() }}" />
                <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center align-items-xl-start illustration" style="margin-top: 10px;margin-bottom: 10px;">
                    <i class="icon ion-ios-locked" style="text-align: center;color: var(--primary);"></i>
                </div>
                <h1 style="text-align: center;font-size: 36px;color: var(--primary);">Job Application</h1>
                <header></header>
                <div class="form-group">
                    <h5 class="text-primary text-center">Hello {{ $user->getFirstName() }}, you are applying for </h5>
                    <h5 class="text-primary text-center">"{{ $job->getJobTitle() }}"</h5>
                    <h5 class="text-primary text-center">with</h5>
                    <h5 class="text-primary text-center">{{ $job->getCompany() }}</h5>
                </div>
                
                <label class="text-primary text-center">Please attach your resume to complete the application</label><br>
                
                <div class="form-group">
                    <input type="file" class="text-primary" name="fileToUpload" id="fileToUpload" required>
                    @error('fileToUpload')
                        <h6 class="text-primary h-auto" style="margin-top:10px;font-size: 65%">{{ $message }}</h6>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background: var(--primary);margin-top: 19px;">Apply</button>
                </div>
            </form>
        </div>
    </section>
@endsection
