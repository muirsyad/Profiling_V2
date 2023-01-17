<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
<style>

</style>
<nav class="shadow navbar navbar-dark side-admin bg-gradient align-items-start sidebar sidebar-dark accordion p-0">
    <div class="container-fluid d-flex flex-column p-0">
        {{-- <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon img-fluid"><img src="{{ asset('assets/img/lhilogo.svg') }}" style="width:100px"
                    alt=""></div><br></a> --}}
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                {{-- <i class="fas fa-laugh-wink"></i> --}}
                <img class="img-fluid" src="{{ asset('assets/img/logo.svg') }}">
            </div>
            <div class="sidebar-brand-text mx-3">DiSC Profiling</div>
        </a>
        {{-- <div class="sidebar-brand-text text-white"><span>Disc Profiling</span></div> --}}
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="{{ route('ad_index') }}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('Cview') }}"><i
                        class="fas fa-users"></i><span>Client</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('vquest') }}"><i
                        class="fas fa-question"></i><span>Question</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('template') }}"><i
                        class="fas fa-book"></i><span>Template report</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('depart') }}"><i
                        class='fas fa-archive'></i><span>Departments</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i
                        class="far fa-user"></i><span>Profile</span></a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i
                        class="fas fa-external-link-alt"></i><span>Logout</span></a></li>
            {{-- <a class="nav-link" href="{{ route('vquest') }}"><i
                            class="fas fa-question"></i><span>Logout</span></a></li> --}}


        </ul>
        <div class="text-center d-none d-md-inline"></div><button class="btn rounded-circle border-0" id="sidebarToggle"
            type="button"></button>
    </div>
</nav>
