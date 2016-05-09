<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@Designpond | Cindy Leschaud">
    <meta name="description" content="Documentation">
    <title>Documentation</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/dropdown-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/jquery.fancybox.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/frontend.css');?>?<?php echo rand(1234,120000); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/helpdesk.css');?>?<?php echo rand(1234,120000); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body>

<div class="page js-page page-frontend">
    <!-- Header -->
    <div class="header header-over large">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Logo Image -->
                    <a href="{{ url('/') }}" class="logo-image"><img src="{{ asset('frontend/images/logo.svg') }}" alt="logo"></a>
                    <!-- End of Logo Image -->
                </div>
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <!-- Menu -->
                    @include('frontend.partials.navigation')
                    <!-- End of Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header -->

    @include('frontend.partials.slide')
    <!-- messages and errors -->
    @include('backend.partials.message')

    <!-- End of Header Back -->
    <div class="panels" id="content">
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Contenu -->
                    @yield('content')
                    <!-- Fin contenu -->
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="js-footer-is-fixed">
        <!-- Footer Default -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-logo-wrapper">
                            <!-- Logo Image -->
                            <a href="{{ url('/') }}" class="logo-image "><img src="{{ asset('frontend/images/logos/logo-small.svg') }}" alt="logo"></a>
                            <!-- End of Logo Image -->
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="footer-wrapper">
                            <!-- Scroll top -->
                            <span class="scroll-top js-scroll-top"><i class="fa fa-angle-up"></i></span>
                            <!-- End of Scroll top -->
                            <!-- Footer Menu -->
                            <ul class="footer-menu helper right">
                                <li><a href="mailto:info@designpond.ch"> info@designpond.ch </a></li>
                            </ul>
                            <!-- End of Footer Menu -->
                            <!-- Copyright -->
                            <p class="copyright helper right"><a href="http://designpond.ch">DesignPond</a>, all rights reserved. {{ date('Y') }} &copy; </p>
                            <!-- End of Copyright -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Footer Default -->
    </footer>
    @yield('footer')
    <!-- End of Footer -->
</div>

<!-- jQuery -->
<script src="<?php echo asset('frontend/js/jquery/jquery-2.1.1.min.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Bootstrap -->
<script src="<?php echo asset('frontend/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- Drop-down -->
<script src="<?php echo asset('frontend/js/jquery/dropdown-menu.min.js');?>"></script>

<!-- jQuery plugins -->
<script src="<?php echo asset('schemas/Treant.js');?>"></script>
<script src="<?php echo asset('schemas/vendor/raphael.js');?>"></script>

<script src="<?php echo asset('frontend/js/all.js');?>"></script>
<script src="<?php echo asset('frontend/js/custom.js');?>"></script>

</body>
</html>