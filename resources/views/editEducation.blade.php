@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <h1 style="text-align: center;font-size: 36px;color: var(--primary);margin-top: 29px;">Update Education</h1>
    <div class="row"
         style="margin-right: 10%; margin-left: 10%; margin-top: 8px; margin-bottom: 8px; ">
        <div class="col" style="border-style: none; ">
            <div class="card"
                 style="border-radius: 10px; color:white;background:var(--gray-dark); border-style: none; border-top-width: 49px;">
                <div class="card-header">
                    <h5 class="mb-0" style="color: var(- -light); text-align: left;">Update Education</h5>
                </div>
                <!-- Here is the error with inserting into database. -->
                <form method="post" action="{{ route('education.update', $education->getEduID()) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />
                    <input type="hidden" name="userID" value="{{ $education->getUserID()  }}" />
                    <div class="card-body d-sm-flex flex-row justify-content-sm-center" style="background:var(--gray-dark);">
                        <div style="width: 75%; height: auto;">
                            <!-- start of form -->
                            <div class="form-group">
                                <label for="school"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">School:</label>
                                <input type="text" name="school" value="{{ $education->getSchoolName() }}" style="color:white; background:var(--gray-dark);">
                            </div>

                            <div class="form-group">
                                <label for="field"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Field of Study:</label>
                                <input type="text" name="field" value="{{ $education->getFieldStudy() }}" style="color:white; background:var(--gray-dark);">
                            </div>

                            <div class="form-group">
                                <label for="degreeType"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Degree type:</label>
                                <select class="bg-dark text-light p-1" name="degreeType" value="degreeType" required>
                                    <optgroup label="Degree">
                                        <option value="HighSchool" @if($education->getDegreeType() == "HighSchool") selected @endif>High School Diploma
                                        </option>
                                        <option value="Associate" @if($education->getDegreeType() == "Associates") selected @endif>Associates
                                        </option>
                                        <option value="Bachelors" @if($education->getDegreeType() == "Bachelors") selected @endif>Bachelors
                                        </option>
                                        <option value="Masters" @if($education->getDegreeType() == "Masters") selected @endif>Masters
                                        </option>
                                        <option value="Doctorate" @if($education->getDegreeType() == "Doctorate") selected @endif>Doctorate
                                        </option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dateGrad"
                                       style="width: auto; min-width: 100%; max-width: 100%; height: auto; color: var(- -light);">Date Graduated:</label>
                                <input type="date" name="dateGrad" value="{{ $education->getDateGraduated() }}" style="color:white; background:var(--gray-dark);">
                            </div>

                        </div>

                        <!-- submit button -->
                        <div
                            class="btn-group d-lg-flex d-xl-flex flex-column justify-content-lg-center justify-content-xl-center"
                            role="group"
                            style="padding-right: 0px; margin-left: 0px; width: auto;">
                            <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{{ route('userinfo', session('userID') ) }}"
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
