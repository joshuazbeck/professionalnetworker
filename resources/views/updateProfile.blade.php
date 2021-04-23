@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Update Profile</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;">{{ $user->getFirstName() }} {{ $user->getLastName() }}</h5>
                </div>
                <form method="post" action="{{ route('profiles.update', $user->getUserID()) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />
                    <input type="hidden" name="profileID" value="{{$profile->getProfileID()}}" />
                    <div class="card-body d-sm-flex flex-row justify-content-sm-center">
                        <div style="width: 75%; height: auto;">
                            <div class="form-group">
                                <label for="phone"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Phone:</label>
                                <input type="text" name="phone" value="{{ $profile->getPhone() }}">
                            </div>
                            <div class="form-group">
                                <label for="age"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Age:</label>
                                <input type="number" name="age" value="{{ $profile->getAge() }}">
                            </div>

                                <div class="form-group">
                                    <label for="gender"
                                           style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Gender:</label>
                                    <select name="gender" value="gender" required>
                                        <optgroup label="Gender">
                                            <option @if($profile->getIsMale() == 0) selected @endif value="0">Female
                                            </option>
                                            <option @if($profile->getIsMale() == 1) selected @endif value="1">Male
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="city"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">City:</label>
                                <input type="text" name="city" value="{{ $profile->getCity() }}">
                            </div>
                            <div class="form-group">
                                <label for="state"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">State:</label>
                                <input type="text" name="state" value="{{ $profile->getState() }}">
                            </div>
                            <div class="form-group">
                                <label for="Bio"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Bio:</label>
                                <textarea type="text" name="bio" style="width: 75%;">{{ $profile->getBio() }}</textarea>
                            </div>
                        </div>
                        <div
                            class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                            role="group"
                            style="padding-right: 0px; margin-left: 0px; width: auto;">
                            <a class="nav-link border rounded-0 border-primary js-scroll-trigger" @if(session('userRole')==3) href="{{ route('profiles.show', $user->getUserID()) }}" @else href="{{ route('userinfo', session('userID')) }}"  @endif
                               style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Cancel</a></li>
                            <div>
                                <button class="btn btn-lg btn-outline-warning border" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
