<nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-dark text-center" id="mainNav"
     style="padding-bottom: 20px;padding-top: 20px;box-shadow: 0px 0px 11px rgba(254,209,54,0.12);">
    <div class="container-fluid">
        <a class="navbar-brand swing animated" href="{!! route('/') !!}">Professional Networker</a>
        <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
                type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                style="margin-bottom: 12px;margin-top: 12px;">
            <i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                @if(session()->has('userID'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('fullName') }}
                    </a>
                    <div class="dropdown-menu bg-secondary border-primary" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item font-weight-bold" href="{{ route('userinfo', session('userID') ) }}">Profile</a>
                        @if(session('userRole') == 3)
                            <a class="dropdown-item font-weight-bold" href="{!! route('admin') !!}">Admin
                            </a>
                        @endif
                        <a class="dropdown-item font-weight-bold" href="{!! route('logout') !!}">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{!! route('login') !!}"
                       style="text-align: center;margin-right: 24px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border rounded-0 border-primary js-scroll-trigger" href="{!! route('users.create') !!}" style="filter: blur(0px);text-align: center;margin-right: 24px;">Register</a>
                </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>
