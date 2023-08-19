@php
    $user = NULL;
    if (Auth::check()) {
        // Get the currently authenticated user...
        $user = Auth::user();
    }
@endphp
<div class="header hor-header">
    <div class="container">
        <div class="d-flex">
            <div class="">
                <a class="header-brand" href="{{asset('/')}}">
                    <img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                    <img src="assets/images/brand/logo-1.png" class="header-brand-img light-logo" alt="logo">
                </a>
                <!-- LOGO --> 
                <a class="header-brand header-brand1" href="{{asset('/')}}">
                    <img src="assets/images/brand/logo-white.png" class="header-brand-img desktop-logo" alt="logo">
                    <img src="assets/images/brand/logo-1.png" class="header-brand-img light-logo" alt="logo">
                </a>
                <!-- /LOGO -->
            </div>
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <div class="d-flex  ml-auto header-right-icons">
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                        <i class="fe fe-maximize-2 fullscreen-button"></i>
                    </a>
                </div>
                <!-- FULL-SCREEN -->
                <div class="dropdown d-md-flex notifications"> <a class="nav-link icon"
                        data-toggle="dropdown"> <i class="fe fe-bell"></i> <span
                            class="nav-unread badge badge-warning badge-pill">0</span> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> 
                        <a href="#" class="dropdown-item text-center">(0) Notifications</a>
                    </div>
                </div><!-- NOTIFICATIONS -->
                <div class="dropdown d-md-flex message">
                    <a class="nav-link icon text-center" data-toggle="dropdown"> 
                        <i class="fe fe-mail"></i>
                        <span class="nav-unread badge badge-danger badge-pill">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="#" class="dropdown-item text-center">(0) Messages.</a>
                    </div>
                </div><!-- MESSAGE-BOX -->
                <div class="dropdown profile-1"> <a class="nav-link icon text-center"
                    data-toggle="dropdown"> <i class="fe fe-user"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0">{{is_null($user) ? 'Uknown' : $user->nom.' ' .$user->prenom }}</h5>
                                <small class="text-muted">
                                    {{-- get user permissions group name --}}
                                </small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="{{asset('/profile')}}">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                        </a> 
                        <div class="dropdown-divider mt-0"></div>
                        <a class="dropdown-item" href="{{asset('/logout')}}">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Déconnexion
                        </a>
                    </div>
                </div>
                <div class="dropdown d-md-flex header-settings"> <a href="#" class="nav-link icon "
                        data-toggle="sidebar-right" data-target=".sidebar-right"> <i
                            class="fe fe-align-right"></i> </a> 
                        </div>
                            <!-- SIDE-MENU -->
            </div>
        </div>
    </div>
</div>