@php
    $user = NULL;
    if (Auth::check()) {
        // Get the currently authenticated user...
        $user = Auth::user();
    }
@endphp
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <a class="header-brand" href="{{asset('/')}}">
                <img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
            </a> 
            <a class="header-brand header-brand1" href="{{asset('/')}}">
                <img src="assets/images/brand/logo-white.png" class="header-brand-img desktop-logo" alt="logo">
            </a><!-- LOGO -->
            <div class="d-flex order-lg-2 ml-auto header-right-icons"> 
                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" 
                    data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false"
                    aria-label="Toggle navigation"> 
                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                </button>
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span> <img src="assets/images/avatar.jpg" class="profile-user brround cover-image"  style="background:transparent;"> </span> 
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0">{{is_null($user) ? 'Uknown' : $user->nom.' '.$user->prenom }}</h5>
                                <small class="text-muted">{{-- get user permissions group name --}}</small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div> 
                        <a class="dropdown-item" href="{{asset('/profile')}}">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile 
                        </a> 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{asset('/logout')}}"> 
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Déconnexion
                        </a>
                    </div>
                </div>
                <div class="dropdown d-md-flex header-settings"> 
                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right"></i> 
                    </a> 
                </div>
                <!-- SIDE-MENU -->
            </div>
        </div>
    </div>
</div>
<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4" style="margin-top: 48px;">
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown d-md-flex"> 
                <a class="nav-link icon full-screen-link nav-link-bg">
                    <i class="fe fe-maximize-2 fullscreen-button"></i> 
                </a> 
        </div><!-- FULL-SCREEN -->
            <div class="dropdown d-md-flex notifications"> <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i> </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item text-center">(0) Notifications</a>
                </div>
            </div><!-- NOTIFICATIONS -->
            <div class="dropdown d-md-flex message"> 
                <a class="nav-link icon text-center" data-toggle="dropdown"> <i class="fe fe-mail"></i> </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item text-center">(0) Messages</a>
                </div>
            </div><!-- MESSAGE-BOX -->
        </div>
    </div>
</div>