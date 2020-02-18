<main>
    <aside class="sidebar fixed" style="width: 260px; left: 0px; ">
        <div class="brand-logo">
            <div id="logo">
                <div class="foot1"></div>
                <div class="foot2"></div>
                <div class="foot3"></div>
                <div class="foot4"></div>
            </div> Materialism
        </div>
        <div class="user-logged-in">
            <div class="content">
                <div class="user-name">{{ Auth::user()->name }} <span class="text-muted f9">
                        @if (Auth::user()->is_admin == 1)
                        {{'Admin'}}
                        @else
                        {{'Member'}}
                        @endif
                    </span></div>
                <div class="user-email">{{ Auth::user()->email }}</div>
                <div class="user-actions">
                    <a class="m-r-5" href="#">settings</a>
                </div>
            </div>
        </div>
        <ul class="menu-links">
            <li icon="md md-blur-on"> <a href="{{route('home')}}"><i
                        class="md md-blur-on"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#UIelements" aria-expanded="true"
                    aria-controls="UIelements" class="collapsible-header waves-effect">
                    <i class="md md-photo"></i>Menu
                </a>
                <ul id="UIelements" class="collapse {{ Request::is('kegiatans*') ? 'in' : '' }}">
                    <li> <a href="{{route('kegiatans.create')}}"
                            class="{{ Request::is('kegiatans/tambah') ? 'active' : '' }}"><span>Tambah
                                Kegiatan</span></a></li>
                    <li> <a href="{{route('kegiatans.index')}}"
                            class="{{ Request::is('kegiatans') ? 'active' : '' }}"><span>Data Kegiatan</span></a></li>

                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#UIelements_user" aria-expanded="true"
                    aria-controls="UIelements_user" class="collapsible-header waves-effect">
                    <i class="md md-perm-identity"></i>User
                </a>
                <ul id="UIelements_user" class="collapse {{ Request::is('users*') ? 'in' : '' }}">
                    <li> <a href="{{route('users.index')}}"
                            class="{{ Request::is('users') ? 'active' : '' }}"><span>Data Diri</span></a></li>
                </ul>
            </li>

            @if (Auth::user()->is_admin == 1)
            <li>
                <a href="#" data-toggle="collapse" data-target="#UIelements_admin" aria-expanded="true"
                    aria-controls="UIelements_admin" class="collapsible-header waves-effect">
                    <i class="md md-person-add"></i>Admin Menu
                </a>
                <ul id="UIelements_admin" class="collapse {{ Request::is('admins*') ? 'in' : '' }}">
                    <li> <a href="{{route('admins.edit', ['admin' => Auth::user()->id])}}" class="{{Request::is('admins/*/edit') ? 'active' : ''}}"><span>Data Diri</span></a></li>
                    <li> <a href="{{route('admins.index')}}" class="{{Request::is('admins') ? 'active' : ''}}"><span>Data Siswa</span></a></li>
                    <li> <a href="{{route('admins.destroyed')}}" class="{{Request::is('admins/destroyed') ? 'active' : ''}}"><span>Data Siswa Terhapus</span></a></li>
                    <li> <a href="{{route('admins.create')}}" class="{{Request::is('admins/create') ? 'active' : ''}}"><span>Input Siswa Baru</span></a></li>
                    <li> <a href="{{route('admins.kegiatan')}}" class="{{Request::is('admins/kegiatan') ? 'active' : ''}}"><span>Galeri Kegiatan Siswa</span></a></li>
                </ul>
            </li>
            @endif
        </ul>
    </aside>
     <div class="main-container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header pull-left">
                    <button type="button" class="navbar-toggle pull-left m-15" data-activates=".sidebar"> <span
                            class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span>
                        <span class="icon-bar"></span> </button>
                    <ul class="breadcrumb">
                        <li><a href="#/">Materialism</a></li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right navbar-right-no-collapse">
                    <li class="dropdown pull-right">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple"
                                type="submit"> <i class="md md-exit-to-app f20"></i> </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
