<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />
    <!-- TITLE -->
    <title>Thabet Authentification</title>
    <!-- BOOTSTRAP CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/skin-modes.css" rel="stylesheet" />
    <!--HORIZONTAL CSS-->
    <link href="assets/plugins/horizontal-menu/horizontal-menu.css" rel="stylesheet" />
    <!-- SINGLE-PAGE CSS -->
    <link href="assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">
    <!--C3 CHARTS CSS -->
    <link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <!-- SELECT2 CSS -->
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet" />
    <!-- Switcher css -->
    <link href="assets/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" type="text/css" media="all" />
    <link href="assets/switcher/css/demo.css" rel="stylesheet" />
    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />
    <style>
        .css-selector {
            background: linear-gradient(69deg, #4199b4, #137cd2, #4b7fd5, #6c41b4);
            background-size: 800% 800%;

            -webkit-animation: AnimationName 7s ease infinite;
            -moz-animation: AnimationName 7s ease infinite;
            animation: AnimationName 7s ease infinite;
        }

        @-webkit-keyframes AnimationName {
            0%{background-position:0% 69%}
            50%{background-position:100% 32%}
            100%{background-position:0% 69%}
        }
        @-moz-keyframes AnimationName {
            0%{background-position:0% 69%}
            50%{background-position:100% 32%}
            100%{background-position:0% 69%}
        }
        @keyframes AnimationName {
            0%{background-position:0% 69%}
            50%{background-position:100% 32%}
            100%{background-position:0% 69%}
        }
    </style>
</head>

<body>
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img css-selector" >
        <!-- GLOABAL LOADER -->
        <div id="global-loader"> <img src="assets/images/loader2.svg" class="loader-img" alt="Loader"> </div>
        <!-- /GLOABAL LOADER -->
        <!-- PAGE -->
        <div class="page h-100">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <img src="assets/images/brand/logo-white.png" class="header-brand-img" alt="">
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" method="POST" action="/check-auth">
                            @csrf <!-- {{ csrf_field() }} -->
                            <span class="login100-form-title"> Login </span>
                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="email" placeholder="Email">
                                <span class="focus-input100"></span> 
                                <span class="symbol-input100"> <i class="zmdi zmdi-email" aria-hidden="true"></i> </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required"> 
                                <input class="input100" type="password" name="password" placeholder="Password"> 
                                <span class="focus-input100"></span> <span class="symbol-input100"> 
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i> 
                                </span> 
                            </div>
                            <div class="text-right pt-1">
                                <p class="mb-0">
                                    <a href="#" class="text-primary ml-1">Forgot Password?</a>
                                </p>
                            </div>
                            <div class="container-login100-form-btn"> 
                                <button type="submit" class="login100-form-btn btn-primary"> Login </button> 
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
    <!-- JQUERY JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/circle-progress.min.js"></script>
    <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="assets/plugins/input-mask/jquery.mask.min.js"></script>
    <script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/switcher/js/switcher.js"></script>
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>