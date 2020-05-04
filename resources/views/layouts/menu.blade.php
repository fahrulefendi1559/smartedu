<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('assets/img/logo.png') }}" width="50px" height="50px""/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

                <li class="{{ Request::segment(1) == 'home' ? ' active' : '' }}">
                    <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
        </ul>

    </div>
</nav>
