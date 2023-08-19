<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta name='base-url' content="{{url('/')}}">
        <!-- Favicon -->
        <link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon" /> 
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>{{ config('app.name') }} - @yield('title')</title>

        @section('css')

        <!-- BOOTSTRAP CSS -->
        <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />
        <!--HORIZONTAL CSS-->
        <link href="{{asset('assets/plugins/horizontal-menu/horizontal-menu.css')}}" rel="stylesheet" />
        <!--C3 CHARTS CSS -->
        <link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>
        <!-- SELECT2 CSS -->
        <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
        <!-- CUSTOM SCROLL BAR CSS-->
        <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
        <!--- FONT-ICONS CSS -->
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />
        <!-- SIDEBAR CSS -->
        <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
        <!-- Switcher css -->
        <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet" id="switcher-css" type="text/css" media="all" />
        <link href="{{asset('assets/switcher/css/demo.css')}}" rel="stylesheet" />
        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />
        
        <!-- Specific Css-->
        @section('sub-css')
        
        @show

        @show

    </head>
    <body class="horizontal-gradient">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader"> <img src="{{asset('assets/images/loader2.svg')}}" class="loader-img" alt="Loader"> </div>

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- APP-SIDEBAR -->
                @include('includes.app-sidebar')
                <!-- /APP-SIDEBAR -->

                <!-- Horizontal-main -->
                @include('includes.horizontal-main')
                <!-- /Horizontal-main -->

                <!-- Mobile Header -->
                @include('includes.mobile-header')
                <!-- /Mobile Header -->

                <!-- APP-CONTENT -->
                @section('app-content')
                    
                @show
                <!-- /APP-CONTENT -->

            </div>

            <!-- SIDE-BAR -->
            @include('includes.side-bar')
            <!-- /SIDE-BAR -->

            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center"> 
                            Copyright © {{ date('Y') }}. Designed by <a href="#"> {{ config('app.copyright', 'ABS Computer') }} </a> All rights reserved. 
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /FOOTER -->
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        

        @section('js')

        <!-- JQUERY JS -->
        <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>
        <script src="{{asset('assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>
        <script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('assets/plugins/time-picker/toggles.min.js')}}"></script>
        <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
        <script src="{{asset('assets/js/stiky.js')}}"></script>
        <script src="{{asset('assets/switcher/js/switcher.js')}}"></script>
        
        @section('sub-js')
            
        @show
    <!-- Specific Js-->
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/app.js?').time()}}"></script>

        @show

    </body>
</html>