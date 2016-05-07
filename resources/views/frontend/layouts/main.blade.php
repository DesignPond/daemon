<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@Designpond | Cindy Leschaud">
    <meta name="description" content="Documentation">
    <title>Droit Formation | Documentation</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <!-- Include StyleSheets -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/frontend.css');?>?<?php echo rand(1234,120000); ?>">

    <script src="js/modernizr.js"></script>
</head>

<body class="">

<!-- End of Preloader -->
<div class="page js-page ">
    <!-- One Page Sidebar -->
    <div class="one-page-sidebar">
        <!-- One Page Sidebar Header -->
        <div class="one-page-sidebar-header">
            <!-- One Page Logo -->
            <div class="one-page-logo">
                <!-- Logo Image -->
                <a href="{{ url('/') }}" class="logo-image"><img height="85px" src="{{ asset('frontend/images/logo_inverse.svg') }}" alt="logo"></a>
                <!-- End of Logo Image -->
            </div>
            <!-- End of One Page Logo -->
            <!-- One Page Meta -->
            <div class="one-page-meta">
                <ul class="one-page-meta-list">
                    <li><a href="#"><i class="one-page-meta-list-icon fa fa-link"></i>Website</a></li>
                    <li><a href="#"><i class="one-page-meta-list-icon fa fa-github-alt"></i>GitHub</a></li>
                    <li><a href="#"><i class="one-page-meta-list-icon fa fa-question"></i>Support</a></li>
                </ul>
            </div>
            <!-- End of One Page Meta -->
        </div>
        <!-- End of One Page Sidebar Header -->
        <!-- One Page Nav -->
        <div class="one-page-nav-wrapper js-custom-scrollbar">
            @include('frontend.partials.subnav')
        </div>
        <!-- End of One Page Nav -->
        <!-- One Page Sidebar Footer -->
        <footer class="one-page-sidebar-footer">
            <a href="http://designpond.ch">DesignPond</a>, all rights reserved. {{ date('Y') }} &copy;
        </footer>
        <!-- End of One Page Sidebar Footer -->
    </div>
    <!-- End of One Page Sidebar -->

    <!-- One Page Content -->
    <div class="one-page-content">
        <!-- Header -->
        <header class="header large header-one-page js-header-fixed">
            <div class="container-fluid container-spaced">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-5">
                        <div class="visible-sm-block visible-xs-block">
                            <!-- Logo Image -->
                            <a href="{{ url('/') }}" class="logo-image logo-animated"><img height="85px" src="{{ asset('frontend/images/logo_inverse.svg') }}" alt="logo"></a>
                            <!-- End of Logo Image -->
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-7">
                        <h2 class="pull-left">Administration</h2>
                        <!-- Menu -->
                        @include('frontend.partials.navigation')
                        <!-- End of Menu -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->
        <div id="content">
            <div class="container-fluid container-spaced">

                <!-- messages and errors -->
                @include('backend.partials.message')

                <!-- Contenu -->
                @yield('content')
                <!-- Fin contenu -->
            </div>
        </div>

    </div>
    <!-- End of One Page Content -->
</div>

<!-- jQuery -->
<script src="<?php echo asset('frontend/js/jquery/jquery-2.1.1.min.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Bootstrap -->
<script src="<?php echo asset('frontend/bootstrap/js/bootstrap.min.js');?>"></script>

<script src="<?php echo asset('frontend/js/all.js');?>"></script>
<script src="<?php echo asset('frontend/js/custom.js');?>"></script>
</body>

</html>