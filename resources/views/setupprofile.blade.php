@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <section>
        <section
            class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
            style="padding-top: 0px;padding-bottom: 0px;">
            <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center"
                 data-bss-hover-animate="pulse"
                 style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 0;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
                <div
                    style="background: url({{ asset('assets/img/daria-pimkina-SnfgiYqQKhI-unsplash.jpg') }}) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
                <section
                    style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                    <div class="form-container" style="margin-right: 0px;">
                        <form method="post" style="width: auto;" action='{{route("profiles.store")}}'>
                            @csrf
                            <i class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center"
                                style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                            <h2 class="text-center" style="color: var(--primary);">Set Up Profile</h2>
                            <select
                                class="form-control form-control bg-dark text-white" data-aos="fade-up" name="selector" value="Gender">
                                <optgroup label="Gender">
                                    <option value="1" selected="">Male</option>
                                    <option value="2">Female</option>
                                </optgroup>
                            </select><input class="form-control form-control bg-dark text-white" type="number" data-aos="fade-up" name="age"
                                            placeholder="Age" style="background: var(--dark);margin-top: 23px;">
                            <input
                                class="form-control text-white" type="tel" data-aos="fade-up" name="phoneNum"
                                placeholder="Phone Number" style="background: var(--dark);margin-top: 23px;">
                            <input
                                class="form-control text-white bg-dark" type="text" data-aos="fade-up" name="city" placeholder="City"
                                style="background: var(--dark);margin-top: 23px;">
                            <input class="form-control text-white bg-dark" type="text"
                                   data-aos="fade-up" name="state"
                                   placeholder="State (XX)"
                                   style="background: var(--dark);margin-top: 23px;">
                            <textarea
                                class="form-control text-white bg-dark" name="bio" placeholder="Short Bio"></textarea>
                            <button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Finish
                                Profile
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </section>
    </section>
@endsection
