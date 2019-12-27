<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li>
            <a href="{{url('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>
        @if(auth()->user()->role=="adminwilayah")
        <h3 class="menu-title">Data Master</h3><!-- /.menu-title -->
        <li>
            <a href="{{url('/user')}}"> <i class="menu-icon fa fa-list"></i>Users </a>
        </li>
        <li>
            <a href="{{url('/pembina')}}"> <i class="menu-icon fa fa-users"></i>Pembina </a>
        </li>
        <li>
            <a href="{{url('/kantor')}}"> <i class="menu-icon fa fa-suitcase"></i>Kantor </a>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Perusahaan</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-table"></i><a href="{{url('/potensi')}}">Potensi</a></li>
                <li><i class="fa fa-tasks"></i><a href="{{url('/perusahaanbinaan')}}">Peserta Binaan</a></li>
            </ul>
        </li>
        <li>
            <a href="/maps"> <i class="menu-icon fa fa-map-o"></i>Maps </a>
        </li>
        <h3 class="menu-title">Laporan </h3><!-- /.menu-title -->
        <li>
            <a href="{{url('laporan')}}"> <i class="menu-icon fa fa-print"></i>Laporan </a>
        </li>
        @endif        
        <h3 class="menu-title">Log Out </h3><!-- /.menu-title -->
        <li>
            <a href="{{url('/logout')}}"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
        </li>
    </ul>
</div><!-- /.navbar-collapse -->