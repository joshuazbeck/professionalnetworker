@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Update</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;"></h5>
                </div>
                <form method="post" action="{{ route('users.update', $user->getUserID()) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />
                <div class="card-body d-sm-flex flex-row justify-content-sm-center">
                    <div style="width: 75%; height: auto;">
                        <div class="form-group">
                            <label for="firstName"
                                   style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">First
                                Name:</label>
                            <input type="text" name="firstName" value="{{ $user->getFirstName() }}">
                        </div>
                        <div class="form-group">
                            <label for="lastName"
                                   style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Last
                                Name:</label>
                            <input type="text" name="lastName" value="{{ $user->getLastName() }}">
                        </div>
                        <div class="form-group">
                            <label for="email"
                                   style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email:</label>
                            <input type="text" name="email" value="{{ $user->getEmail() }}">
                        </div>
                        <div class="form-group">
                            <label for="selector"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">User
                                Role:</label>
                            <select name="selector" value="role" required>
                                <optgroup label="Role">
                                    <option @if($user->getUserRole() == 1) selected @endif value="1">1 - Customer
                                    </option>
                                    <option @if($user->getUserRole() == 2) selected @endif value="2">2 - Business
                                    </option>
                                    <option @if($user->getUserRole() == 3) selected @endif value="3">3 - Administrator
                                    </option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="suspended"
                                   style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Suspended:</label>
                            <select name="suspended" value="suspended" required>
                                <optgroup label="Suspended">
                                    <option @if($user->getSuspended() == 1) selected @endif value="1">True</option>
                                    <option @if($user->getSuspended() == 0) selected @endif value="0">False</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('users.index') }}"
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
