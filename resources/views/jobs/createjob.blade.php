@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')<section>
    <section
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
        style="padding-top: 0px;padding-bottom: 0px;">
        <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center"
             data-bss-hover-animate="pulse"
             style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 0;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
            <div
                style="background: url({{ asset('assets/img/marten-newhall-uAFjFsMS3YY-unsplash.jpg') }}) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
            <section
                style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                <div class="form-container" style="margin-right: 0px;">
                    <form method="post" style="width: auto;" action="{{route('jobs.store')}}">
                        @csrf
                        <i class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center"
                           style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                        <h2 class="text-center" style="color: var(--primary);"><strong>Create</strong> a job</h2>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <div class="input-group-append"></div>
                        </div>
                        <input class="form-control bg-dark text-white" type="text" data-aos="fade-up" name="jobTitle"
                               placeholder="Job Title" value="{{old('jobtitle')}}" style="background: var(--dark);margin-top: 23px;" required>
                        @error('jobtitle')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror
                        <input class="form-control bg-dark text-white" value="{{old('desiredSkill')}}" type="text" data-aos="fade-up" name="desiredSkill" placeholder="Most Desired Skill"
                               style="background: var(--dark);margin-top: 23px;" required>
                        @error('desiredskill')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror
                        <input class="form-control bg-dark text-white" value="{{old('company')}}" type="text" data-aos="fade-up" name="company" placeholder="Company" style="background: var(--dark);margin-top: 25px;" required>
                        @error('company')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        <input class="form-control bg-dark text-white" value="{{ old('company') }}" type="text" data-aos="fade-up" name="city" placeholder="City" style="background: var(--dark);margin-top: 25px;" required>
                        @error('company')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        <input class="form-control bg-dark text-white" value="{{old('state')}}" type="text" data-aos="fade-up" name="state" placeholder="State" style="background: var(--dark);margin-top: 25px;" required>
                        @error('company')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                      	<input class="form-control text-white" type="number" data-aos="fade-up" name="payHourly" placeholder="Hourly Pay" style="background: var(--dark);margin-top: 23px;" required>
                         @error('payhourly')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                        <select class="text-primary" id="status" name="status" style="color:white; margin-top: 20px; padding: 10px; border: solid; border-color:white; border-radius: 5px; border-width: 1px; background:var(--gray-dark); width:100%;">
                          <option value="0" style="background:var(--gray-dark);">Full-Time</option>
                          <option value="1" style="background:var(--gray-dark);">Part-Time</option>
                          <option value="2" style="background:var(--gray-dark);">Internship</option>
                        </select>
                        </div>
                        @error('status')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        <textarea class="form-control text-white bg-dark" name="jobDescription" placeholder="Job Description" required></textarea>
                       	@error('jobdescription')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        @if($skills)
                            @foreach($skills as $skill)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="skillarray[]" value="{{ $skill->getSkillId() }}">
                                    <label class="form-check-label text-primary" for="inlineCheckbox1">{{ $skill->getName() }}</label>
                                </div>
                            @endforeach
                        @endif

                        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Create Job!!
                        </button>
                        <a class="d-md-flex justify-content-md-center already" href="{{route('jobs.index')}}"
                           style="color: var(--light);font-size: 9px;margin-top: 10px;">Need to edit a job?
                            Do that HERE!</a>
                    </form>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection
