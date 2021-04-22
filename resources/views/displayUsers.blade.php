@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Manage Users</h1>
    @foreach ($userArray as $user)
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;">{{ $user->getFirstName() }} {{ $user->getLastName() }}</h5>
                </div>
                <div class="card-body d-sm-flex flex-row justify-content-sm-center">
                    <div class="btn-toolbar"></div>
                    <div style="width: 75%; height: auto;">
                        <p
                            style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email: {{ $user->getEmail() }}</p>
                        <p
                            style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Role: {{ $user->getUserRole() }}</p>
                        <p
                            style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Suspended: {{ $user->getSuspended() }}</p>
                    </div>
                    <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                        @if($user->getProfileComplete())
                        <a class="nav-link border rounded-0 border-primary" href="{{ route('profiles.show', $user->getUserID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">User Profile</a>
                        @endif
                        <a class="nav-link border rounded-0 border-primary" href="" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</a>
                            <form action="{{route('users.destroy', $user->getUserID() )}})}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-lg btn-outline-warning border" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Delete</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
