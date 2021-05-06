@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
<h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">User Skills</h1>
<div class="row"
     style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px; ">
    <div class="col" style="border-style: none; ">
        <div class="card"
             style="border-radius: 10px; color:white;background:var(--gray-dark); border-style: none; border-top-width: 49px;">
            <div class="card-header">
                <h5 class="mb-0" style="color: var(- -light); text-align: left;">User Skills</h5>
            </div>
            <form method="post" action="{{ route('updateUserSkills', session('userID')) }}">
                @csrf
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="profileID" value="" />
                <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                    <div style="width: 75%; height: auto;">
                        @if($skills)
                            @foreach($skills as $skill)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="skillarray[]"
                                      @if($userSkill) @if (!is_bool(array_search($skill->getSkillId(), array_column($userSkill, 'skillId')))) checked @endif @endif value="{{ $skill->getSkillId() }}">
                                <label class="form-check-label" for="inlineCheckbox1">{{ $skill->getName() }}</label>
                            </div>
                            @endforeach
                            @endif
                    </div>
                    <div
                        class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                        role="group"
                        style="padding-right: 0px; margin-left: 0px; width: auto;">
                        <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('userinfo', session('userID')) }}"
                           style="text-align:center;margin-right: 0px; margin-top: 6px; padding-left: 25px; padding-right: 25px; margin-bottom: 6px; color:white; background:var(--gray-dark); border-radius: 6px; border-style: none;">Cancel</a></li>
                        <div>
                            <button class="nav-link border rounded-0 border-primary" type="submit" style="margin-right: 0px; margin-top: 6px; padding-left: 50px; padding-right: 50px; margin-bottom: 6px; color:white; background:var(--gray-dark); border-radius: 6px;border-style: none; color: lightblue;">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

