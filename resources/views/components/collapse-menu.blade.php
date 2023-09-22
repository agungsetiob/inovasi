      <ul class=" navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <i class="fa fa-hospital-user fa-xl"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Hi {{ Auth::user()->username }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        @if (Auth::user()->role == 'admin')
        <li class="nav-item {{ (request()->is('admin')) ? 'active bg-active' : '' }}">
            <a class="nav-link" href="{{url('admin')}}">
                <i class="fas fa-fw fa-tachometer-alt fa-xl"></i>
                <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item {{ (request()->is('proyek/*')) ? 'active bg-active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                    <i class="fa fa-fw fa-code fa-xl"></i>
                    <span>Projects</span>
                </a>
                <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('proyek/inovasi')}}"><i class="fas fa-fw fa-rocket"></i> Inovasi</a>
                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-microscope"></i> Litbang</a>
                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-atom"></i> Riset</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ (request()->is('messages')) ? 'active bg-active' : '' }}">
                <a class="nav-link" href="{{url('messages')}}">
                    <i class="fas fa-fw fa-envelope fa-xl"></i>
                    <span>Messages</span></a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">

                <li class="nav-item {{ (request()->is('users')) ? 'active bg-active' : '' }}">
                    <a class="nav-link" href="{{url('users')}}">
                        <i class="fas fa-fw fa-user fa-xl"></i>
                        <span>Users</span></a>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">

                    <li class="nav-item {{ (request()->is('master/*')) ? 'active bg-active' : '' }}">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-fw fa-filter fa-xl"></i>
                            <span>Master</span>
                        </a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{route('skpd.index')}}"><i class="fas fa-fw fa-sitemap"></i> SKPD/UPTD</a>
                                <a class="collapse-item" href="{{url('master/jenis')}}"><i class="fas fa-fw fa-list"></i> Jenis</a>
                                <a class="collapse-item" href="{{url('master/bentuk')}}"><i class="fas fa-fw fa-shapes"></i> Bentuk</a>
                                <a class="collapse-item" href="{{route('urusan.index')}}"><i class="fas fa-fw fa-info"></i> Urusan</a>
                                <a class="collapse-item" href="{{route('indikator.index')}}"><i class="fas fa-fw fa-chart-simple"></i> Indikator</a>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">

                    <li class="nav-item {{ (request()->is('setting/*')) ? 'active bg-active' : '' }}">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-fw fa-gear fa-xl"></i>
                            <span>Settings</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="#"><i class="fas fa-fw fa-wrench"></i> Web setting</a>
                                <a class="collapse-item" href="{{url('setting/profile')}}"><i class="fas fa-fw fa-mosque"></i> About</a>
                                <a class="collapse-item" href="{{url('upload-file')}}"><i class="fas fa-fw fa-image"></i> Carousel</a>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">

                    <li class="nav-item {{ (request()->is('backup')) ? 'active bg-active' : '' }}">
                        <a class="nav-link" href="{{url('backup')}}">
                            <i class="fas fa-fw fa-database fa-xl"></i>
                            <span>Backup</span></a>
                        </li>
                        <hr class="sidebar-divider d-none d-md-block">
                        @elseif (Auth::user()->role == 'user')
                        <li class="nav-item active {{ (request()->is('user/')) ? 'active bg-active' : '' }}">
                            <a class="nav-link" href="{{url('user/')}}">
                                <i class="fas fa-fw fa-tachometer-alt fa-xl"></i>
                                <span>Dashboard</span></a>
                            </li>
                            <hr class="sidebar-divider d-none d-md-block">

                            <li class="nav-item {{ (request()->is('proyek/*')) ? 'active bg-active' : '' }}">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                                    <i class="fa fa-fw fa-code fa-xl"></i>
                                    <span>Projects</span>
                                </a>
                                <div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item" href="{{url('proyek/inovasi')}}"><i class="fas fa-fw fa-rocket"></i> Inovasi</a>
                                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-microscope"></i> Litbang</a>
                                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-atom"></i> Riset</a>
                                    </div>
                                </div>
                            </li>
                            <hr class="sidebar-divider d-none d-md-block">
                            @endif
                        </ul>
        <!-- End of Sidebar -->