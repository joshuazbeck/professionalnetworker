@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Manage Jobs</h1>
    @if ($group)
    @foreach ($group->getUsers() as $user)
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -gray-dark); border-style: none; border-top-width: 49px; ">
                <div class="card-header" style="background: var(--gray-dark);">
                    <h5 class="mb-0" style="color: var(--primary); text-align: left; ">{{ $user->getFirstName()." ".$user->getLastName() }}</h5>
                </div>
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background: var(--gray-dark);color:var(--primary);">
                    <div class="btn-toolbar"></div>
                    <div style="width: 75%; height: auto;">
                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email: {{ $user->getEmail() }}</p>
                        <p style="width: auto; min-width: 75%; max-width: 75%; height: auto; color: var(- -light);">Email: {{ $user->getPhoneNumber() }}</p>
                    </div>
                 <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="background: var(--gray-dark); padding-right: 0px; margin-left: 0px; width: auto;">

                            @endif
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
