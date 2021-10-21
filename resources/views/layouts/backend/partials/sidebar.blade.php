<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index-2.html">Uc King</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index-2.html">CP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="index-0.html">Analytics</a></li> dashboard --}}
                    <li class="active"><a class="nav-link" href="{{ URL::to('/dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
            {{-- <li class="menu-header">Bincom App</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/role-register') }}">Admin</a></li>
                </ul>
            </li> --}}

            <li class="menu-header">State</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>State</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/states') }}">All States</a></li>
                </ul>
            </li>

            <li class="menu-header">LGA</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>LGA</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/lga') }}">All LGAs</a></li>
                </ul>
            </li>

            <li class="menu-header">Ward</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Ward</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/wards') }}">All Wards</a></li>
                </ul>
            </li>

            <li class="menu-header">Polling Unit</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Polling Unit</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/pollingUnits') }}">All Polling Units</a></li>
                </ul>
            </li>

            <li class="menu-header">Agent</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Agent</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/agents') }}">All Agents</a></li>
                </ul>
            </li>

            <li class="menu-header">Party</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Party</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/party') }}">All Parties</a></li>
                </ul>
            </li>

            <li class="menu-header">Announced LGA Res</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Announced LGA Res</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/AnnouncedLgaResult') }}">All LGA Results</a></li>
                </ul>
            </li>

            <li class="menu-header">Announced Pull Res</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Announced Pull Res</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/AnnouncedPullResult') }}">All Pull Results</a></li>
                </ul>
            </li>

            <li class="menu-header">State Result</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>State Result</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/AnnouncedStateResult') }}">All State Results</a></li>
                </ul>
            </li>

            <li class="menu-header">Ward Result</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span>Ward Result</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('/AnnouncedWardResult') }}">All Ward Results</a></li>
                </ul>
            </li>

            <li class="menu-header"></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-square"></i> <span></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#"></a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
