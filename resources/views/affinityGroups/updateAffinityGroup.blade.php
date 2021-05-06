@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')<section>
    <section
        class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center"
        style="padding-top: 0px;padding-bottom: 0px;">
        <div class="d-lg-flex d-xl-flex justify-content-md-center justify-content-xl-center"
             data-bss-hover-animate="pulse"
             style="margin: 0px;padding-top: 54px;padding-bottom: 47px;padding-right: -0;padding-left: 0;background: var(--gray-dark);border-radius: 26px;margin-top: 0;margin-left: 0px;width: 80vw;box-shadow: 5px 5px 20px rgba(33,37,41,0.4);">
            <div
                style="background: url({{ asset('assets/img/tiago-rosado-cMG5qjpnsyg-unsplash.jpg') }}) center / cover;height: auto;margin: 0px;width: 50%;margin-left: 52px;margin-right: 0px;margin-bottom: 19px;border-radius: 21px;border-top-left-radius: 26px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-bottom-left-radius: 30px;"></div>
            <section
                style="width: 40%;height: auto;margin: 0px;padding: 0px;padding-top: 0px;padding-bottom: 0px;margin-top: 59px;margin-bottom: 0;margin-right: auto;margin-left: AUTO;">
                <div class="form-container" style="margin-right: 0px;">
                    <form method="post" style="width: auto;" action="{{ route('affinitygroup.update', $affinitygroup->getAffinityGroupID()) }}">
                        @csrf
                        <input type="hidden" name="_method" value="put" />
                        <i class="icon ion-android-checkmark-circle d-flex d-lg-flex justify-content-center justify-content-xl-center"
                           style="text-align: center;color: var(--primary);padding-bottom: 18px;"></i>
                        <h2 class="text-center" style="color: var(--primary);"><strong>Update Affinity Group</strong></h2>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <div class="input-group-append"></div>
                        </div>
                        <input class="form-control bg-dark text-white" type="text" data-aos="fade-up" name="affinityGroupTitle"
                               placeholder="Job Title" value="{{ $affinitygroup->getAffinityGroupName()}}" style="background: var(--dark);margin-top: 23px;" required>
                        @error('affinityGroupTitle')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        <textarea class="form-control bg-dark text-white" type="text" data-aos="fade-up" name="affinityGroupDesc"
                                  placeholder="Group Description" style="background: var(--dark);margin-top: 23px;" required>{{ $affinitygroup->getAffinityGroupDesc()}}</textarea>
                        @error('affinityGroupTitle')
                        <p class="text-primary" style="font-size: 70%">{{ $message }}</p>
                        @enderror

                        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 15px;">Create Affinity Group!!
                        </button>

                    </form>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection
