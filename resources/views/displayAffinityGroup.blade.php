@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Manage Jobs</h1>
    @if ($affinityGroupArray)
    @foreach ($affinityGroupArray as $group)
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px;">
        <div class="col" style="border-style: none;">
            <div class="card"
                 style="border-radius: 10px; background: var(- -gray-dark); border-style: none; border-top-width: 49px; ">
                <div class="card-header" style="background: var(--gray-dark);">
                    <h5 class="mb-0" style="color: var(--primary); text-align: left; ">{{ $group->getAffinityGroupName() }}</h5>
                </div>
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background: var(--gray-dark);color:var(--primary);">
                   
                 <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="background: var(--gray-dark); padding-right: 0px; margin-left: 0px; width: auto;">

						@if ($user->getUserID() >= 3)
						<a class="nav-link border rounded-0 border-primary" href="{{ route('affinitygroup.edit', $group->getAffinityGroupID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Update</a>
						<form action="{{ route('affinitygroup.destroy', $group->getAffinityGroupID }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 50px; padding-right: 50px; margin-bottom: 6px; border-radius: 6px; background: var(--gray-dark);border-color: red;border-style: none; color: red;">Delete</button>
                        </form>
						@endif
						
						@if ($user->isFollowingAffinityGroup($group->getAffinityGroupID(), $user->getUserID()))
						<a class="nav-link border rounded-0 border-primary" href="{{ route('user.unfollowgroup', [ $group->getAffinityGroupID(), $user->getUserID()] ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Unfollow Group</a>
						<a class="nav-link border rounded-0 border-primary" href="{{ route('affinitygroup.view', $group->getAffinityGroupID() ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">View</a>
						@else
                        <a class="nav-link border rounded-0 border-primary" href="{{ route('user.followgroup', [ $group->getAffinityGroupID(), $user->getUserID()] ) }}" style="margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; background: var(- -info); border-radius: 6px; border-style: none;">Follow Group</a>
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
