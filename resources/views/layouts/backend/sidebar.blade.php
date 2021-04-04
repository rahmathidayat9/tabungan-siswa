<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
           <a href="" class="b-brand">
               <div class="b-bg">
                   <i class="feather icon-trending-up"></i>
               </div>
               <span class="b-title">TABUNGAN</span>
           </a>
           <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
       </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                @can('admin')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Admin</label>
                </li>
                
                <li class="nav-item {{ Request::is('admin') || Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item {{ Request::is('admin/laporan') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Generate Laporan</span></a>
                </li>
                <li class="nav-item {{ Request::is('') ? 'active' : '' }} pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Manage Data</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('admin.user.index') }}" class="">Users</a></li>
                        <li class=""><a href="{{ route('admin.pegawai.index') }}" class="">Pegawai</a></li>
                        <li class=""><a href="{{ route('admin.nasabah.index') }}" class="">Nasabah</a></li>
                        <li class=""><a href="{{ route('admin.rekening.index') }}" class="">Rekening</a></li>
                    </ul>
                </li>
                @endcan

                @can('operator')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Operator</label>
                </li>

                <li class="nav-item {{ Request::is('operator/nasabah') ? 'active' : '' }}">
                    <a href="{{ route('operator.nasabah.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Nasabah</span></a>
                </li>
                <li class="nav-item {{ Request::is('operator/rekening') ? 'active' : '' }}">
                    <a href="{{ route('operator.rekening.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Rekening</span></a>
                </li>
                @endcan

                @can('operator')
                <li class="nav-item {{ Request::is('') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu Entri</label>
                </li>

                <li class="nav-item {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}">
                    <a href="{{ route('transaksi.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                </li>
                @endcan

                @if(auth()->user()->level=='nasabah')
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Tabungan</label>
                </li>
                    <li class="nav-item">
                        <a href="{{ route('nasabah.transfer.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-credit-card"></i></span><span class="pcoded-mtext">Transfer</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('nasabah.transfer.histori') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Histori Transfer</span></a>
                    </li>
                @endif

                <li class="nav-item {{ Request::is('') ? 'active' : '' }} pcoded-menu-caption">
                    <label>Menu General</label>
                </li>

                <li class="nav-item {{ Request::is('user/home') ? 'active' : '' }}">
                    <a href="{{ route('user.home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/profile') ? 'active' : '' }}">
                    <a href="{{ route('user.profile.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                </li>
                <li class="nav-item {{ Request::is('user/change-password') ? 'active' : '' }}">
                    <a href="{{ route('user.change-password.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-unlock"></i></span><span class="pcoded-mtext">Ubah Password</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>