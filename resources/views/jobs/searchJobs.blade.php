@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Search Jobs</h1>
            <div class="row"
                 style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
                <div class="col" style="border-style: none;">
                    <div class="card"
                         style="border-radius: 10px; background: var(- -gray-dark); border-style: none; border-top-width: 49px; ">
                        <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background: var(--gray-dark);color:var(--primary);">
                            <form class="form-inline" method="post" action='{{route("doJobSearch")}}'>
                                @csrf
                                <input type="hidden" name="route" value="skills" />
                                <button type="submit" class="btn btn-primary mr-sm-2 form-control">Match Jobs By Skill</button>
                                <label class="form-control mr-sm-2 bg-dark border-0 text-primary">OR</label>
                            </form>
                            <form class="form-inline" method="post" action='{{route("doJobSearch")}}'>
                                @csrf
                                <input type="hidden" name="route" value="search" />
                                <input type="text" name="searchString" class="form-control mr-sm-2 bg-dark text-primary" placeholder="Search String...">

                                <select class="mr-sm-2 form-control text-primary bg-dark" name="searchColumn">
                                    <option selected>Choose...</option>
                                    <option value="COMPANY">Company</option>
                                    <option value="TITLE">Position</option>
                                    <option value="CITY">City</option>
                                    <option value="DESCRIPTION">Description</option>
                                </select>
                                <button type="submit" class="btn btn-primary mr-sm-2 form-control">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
