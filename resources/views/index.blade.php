@extends('layouts.layout')
@section('title', 'Home - Professional Networker')
@section('content')
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
        <div class="container">
            <div class="intro-text" style="padding-top: 150px;padding-bottom: 150px;">
                <div class="intro-lead-in"><span>It shouldn't be hard!</span></div>
                <div class="intro-heading text-uppercase">
                    <span data-bss-hover-animate="shake">After all, we're better together</span>
                </div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" data-bss-hover-animate="rubberBand" href="{{ route('users.create') }}">Jump in!</a>
            </div>
        </div>
    </header>
@endsection
