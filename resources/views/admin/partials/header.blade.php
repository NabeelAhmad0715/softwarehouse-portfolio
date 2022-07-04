<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('admin.pages.home') }}" class="logo">
            <img src="{{ asset('images/logo/logo-in-different-style.png') }}" alt="Logo">
        </a>
        <a href="{{ route('admin.pages.home') }}" class="logo logo-small">
            <img src="{{ asset('images/golder.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> --}}

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- User Menu -->
        @if(Auth::guard('admin')->check())
            @auth
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img style="margin-right:10px;" class="rounded-circle" style="margin-right:10px" @isset($settings)
                            src="{{ asset('/storage/' . $settings->site_logo) }}"
                        @else
                            src="{{ asset('images/logo/logo-in-different-style.png') }}"
                        @endisset
                        width="50" height="45" alt="Ryan Taylor">
                            {{ Auth::user()->username }}
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">My Profile</a>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                       </form>
                    </div>
                </li>
            @endauth
        @else
            <li class="nav-item">
                <a class="nav-link header-login"  href="{{route('admin.login')}}">login / Signup </a>
            </li>
        @endif
        <!-- /User Menu -->
    </ul>
    <!-- /Header Right Menu -->
</div>
