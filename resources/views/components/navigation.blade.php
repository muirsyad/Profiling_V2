<div>

    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <nav class="navbar navbar-dark side-admin bg-gradient align-items-start sidebar sidebar-dark accordion  p-0">
        <div class="container-fluid d-flex flex-column p-0"><a
                class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon "><img src="{{ asset('assets/img/logo.png') }}" style="width:100px"
                        alt=""></div><br>

            </a>
            <div class="sidebar-brand-text text-white"><span>Disc Profiling</span></div>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="{{ route('ad_index') }}"><i
                            class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cHome') }}"><i
                            class="fas fa-users"></i><span>Client</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('vquest') }}"><i
                            class="fas fa-question"></i><span>Question</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('template') }}"><i
                            class="fas fa-book"></i><span>Template report</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i
                            class="far fa-user"></i><span>Profile</span></a></li>
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-link nav-link btnlg"><i
                                class="fas fa-external-link-alt"></i>Logout</button>
                    </form>
                </li>
                {{-- <a class="nav-link" href="{{ route('vquest') }}"><i
                            class="fas fa-question"></i><span>Logout</span></a></li> --}}


            </ul>
            <div class="text-center d-none d-md-inline"></div><button class="btn rounded-circle border-0"
                id="sidebarToggle" type="button"></button>
        </div>
    </nav>
</div>
