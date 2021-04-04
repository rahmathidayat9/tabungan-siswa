<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index.html" class="b-brand">
               <div class="b-bg">
                   <i class="feather icon-trending-up"></i>
               </div>
               <span class="b-title">TABUNGAN</span>
           </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i>
            </a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <!-- <img src="{{ asset('templates/backend/datta-lite') }}/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image"> -->
                            <span>{{ Auth::user()->name }}</span>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route('user.profile.index') }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal" class="dropdown-item"><i class="feather icon-log-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                       Logout 
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>