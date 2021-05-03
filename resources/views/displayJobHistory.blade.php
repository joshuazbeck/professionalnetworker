@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Information</h1>
    <div class="row"
         style="color:var(--primary);margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -dark); background:var(--gray-dark);border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left; ">{{ $user->getFirstName() }} {{ $user->getLastName() }}</h5>
                </div>
                <div>
                    <table class="table">
                        <thead class="text-primary">
                        <tr>
                            <th>Company</th>
                            <th>Start Date</th>
                            <th>Stop Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($jobHistory)
                        @foreach($jobHistory as $job)
                            <tr>
                                <th class="text-light">
                                    {{ $job->getCompanyName() }}
                                </th>
                                <th class="text-light">
                                    {{ $job->getStartDate() }}
                                </th>
                                <th class="text-light">
                                    {{ $job->getStopDate() }}
                                </th>
                                <th style="width: 25%; text-align: center;">
                                    <div class="btn-group-sm">
                                        <form  class="form-inline" action="{{ route('jobHistory.destroy', $job->getJobID()) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete" />
                                            <a class="btn border rounded-0 border-primary text-light" href="{{ route('jobHistory.edit', $job->getJobID() ) }}" style="margin-right: 3px;" >Update</a>
                                            <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 6px; padding-left: 50px; padding-right: 50px; border-radius: 6px; background: var(--gray-dark);border-color: red;border-style: none; color: red;">Delete</button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn border rounded-0 border-primary text-light" href="{{ route('userinfo', session('userID') ) }}" >Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
