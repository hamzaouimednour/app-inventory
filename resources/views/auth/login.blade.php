<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name='base-url' content="{{url('/')}}">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.ico')}}" type="image/x-icon" /> 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Thabet - Administration Authentification</title>
    <!--Favicon -->
    <link rel="icon" href="" type="image/x-icon" />
    <!-- Bootstrap css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Style css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" /> <!-- Dark css -->
    <link href="{{asset('assets/css/style-auth.css')}}" rel="stylesheet" />
    <!-- Skins css -->
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />
    <!---Icons css-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />
    <!-- Switcher css -->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/switcher/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
</head>

<body class="h-100vh page-style1">

    <div id="global-loader" style="display: none;"> 
        <img src="{{asset('assets/images/loader-4.svg')}}" alt="loader">
    </div>

    <div class="page">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 d-block mx-auto">
                        <div class="row">
                            <div class="col-md-5 p-md-0">
                                <div class="card mb-0" style="border-radius: 8px 0px 0px 8px;">
                                    <div class="card-body page-single-content">

                                        @if (Auth::check())
                                        
                                        <div class="w-100">
                                            <div class="userprofile text-center">
                                                <div class="userpic mb-2">
                                                    @if (!empty(Auth::user()->profile_picture))
                                                        <img src="{{asset('assets/images/profile/'.Auth::user()->profile_picture)}}" alt="Profile-img" class="userpicimg">
                                                    @else
                                                        <img src="{{asset('assets/images/photos/user.png')}}" alt="Profile-img" class="userpicimg">
                                                    @endif
                                                </div>
                                                <p class="text-center"></p>
                                                
                                                <div class="dropdown-item text-center font-weight-semibold user h3 mt-3">
                                                    {{Auth::user()->nom}} {{Auth::user()->prenom}}
                                                </div>
                                                <small> {{Auth::user()->userRole->role}} </small>
                                                <div class="text-center mt-5 mb-3"> 
                                                    <a href="{{asset('/')}}" class="btn btn-warning-light btn-pill mb-1 mt-1 mr-3">
                                                        <i class="fe fe-airplay mr-1"></i> Acceuil
                                                    </a> 
                                                    <a href="{{asset('/logout')}}" class="btn btn-danger btn-pill mt-1 mb-1">
                                                        <i class="fe fe-log-out mr-1 mb-2"></i> Déconnexion
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            
                                        <div class="w-100">
                                            <div class="custom-logo">
                                                {{-- <a href="/">
                                                    <img src="" class="header-brand-img dark-logo" alt="logo">
                                                </a>  --}}
                                            </div>
                                            <div class="text-center mb-5">
                                                <h2>Authentification</h2>
                                            </div>
                                            <form id="loginForm" class="" method="POST" autocomplete="off">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label text-muted font-weight-normal">Pseudo d'utilisateur</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fe fe-user"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" name="username" maxlength="" pattern="[a-zA-Z0-9-]*" placeholder="identifiant" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label text-muted font-weight-normal">Mot de passe</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fe fe-lock"></i>
                                                            </div>
                                                        </div>
                                                        <input type="password" class="form-control" name="password" maxlength="" placeholder="******" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-5 mb-5">
                                                        <button id="submitLoginForm" type="submit" class="btn btn-lg primary-gradient btn-block">
                                                            <i class="fe fe-log-in"></i> &nbsp; CONNECTER
                                                        </button> 
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="mt-5 mb-5">
                                                <div class="font-weight-normal fs-16 text-muted">
                                                    Mot de passe oublié ? <a class="btn-link font-weight-normal" href="#"> cliquez ici</a>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 p-0">
                                <div class="card text-white custom-content page-content mt-0">
                                    <div class="card-body text-center justify-content-center">
                                        <div class="custom-body">
                                            <h2 class="mb-1">Bienvenue sur Thabet!</h2>
                                            <p class="text-white-50">Connectez-vous à votre compte.</p>
                                        </div>
                                        <div class="custom-logo1">
                                            <a href="{{asset('/')}}">
                                                <img src="" class="header-brand-img dark-logo" alt="logo">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/modules/dist/login.js')}}"></script>
</body>

</html>