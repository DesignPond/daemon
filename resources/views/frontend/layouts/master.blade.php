<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@Designpond | Cindy Leschaud">
    <meta name="description" content="Cours de méthodologie juridique | Faculté de droit, Universite de Neuchâtel">
    <title>Méthodologie juridique</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <!-- Styles -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/dropdown-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/jquery.fancybox.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/annotator.min.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/frontend.css');?>?<?php echo rand(1234,120000); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/guides.css');?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('schemas/Treant.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/schemas.css');?>?<?php echo rand(1234,120000); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('backend/css/types.css');?>?<?php echo rand(1234,120000); ?>">
</head>

<body class="Site" role="document">

<!-- device test, don't remove. javascript needed! -->
<span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
<!-- device test end -->

<div id="k-head" class="container"><!-- container + head wrapper -->
    <div class="row"><!-- row -->
        <div class="col-lg-12">

            <div id="k-site-logo" class="pull-left"><!-- site logo -->
                <h1 class="k-logo">
                    <a href="{{ url('/') }}" title="Home Page">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="Site Logo" class="img-responsive" />
                    </a>
                </h1>
                <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->
            </div><!-- site logo end -->

            <!-- Navigation  -->
            @include('frontend.partials.navigation')

        </div>
    </div><!-- row end -->
</div><!-- container + head wrapper end -->

<div id="k-body"><!-- content wrapper -->
    <div class="container"><!-- container -->

        <div class="row no-gutter"><!-- row -->
            <div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->

            </div><!-- top search end -->
            <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->

                <!-- breadcrumbs  -->
                @include('frontend.partials.breadcrumbs')

                <!-- message error  -->
                @include('frontend.partials.message')

            </div><!-- breadcrumbs end -->
        </div><!-- row end -->

        <!-- Slide  -->
        @if(Request::is('/'))
            @include('frontend.partials.slide')
        @endif

        <div class="row no-gutter"><!-- row -->

            <!-- Contenu -->
            @yield('content')
            <!-- Fin contenu -->

            <div class="clearfix"></div>
         </div><!-- row end -->

    </div><!-- container end -->
</div><!-- content wrapper end -->


<div id="k-footer"><!-- footer -->
    <div class="container"><!-- container -->
        <div class="row no-gutter"><!-- row -->
            <div class="col-lg-8 col-md-8"><!-- widgets column left -->
                <div class="col-padded col-naked">
                    @if(isset($links) && !$links->isEmpty())
                    <ul class="list-unstyled clear-margins"><!-- widgets -->
                        <li class="widget-container widget_nav_menu"><!-- widgets list -->
                            <h1 class="title-widget">Liens utiles</h1>
                            <ul>
                                @foreach($links as $link)
                                    <li><a target="_blank" href="{{ $link->url }}" title="menu item">{{ $link->titre }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    @endif
                </div>

            </div><!-- widgets column left end -->

            <div class="col-lg-4 col-md-4"><!-- widgets column right -->
                <div class="col-padded col-naked">
                    <ul class="list-unstyled clear-margins"><!-- widgets -->
                        <li class="widget-container widget_course_search"><!-- widgets list -->
                            <h1 class="title-widget">Recherche sur le site</h1>
                            <form role="search" method="post" id="course-finder" action="{{ url('search') }}">
                                {!! csrf_field() !!}
                                <div class="input-group">
                                    <input type="text" placeholder="Recherche..." autocomplete="off" class="form-control" id="find-course" name="term" />
                                    <span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

            </div><!-- widgets column right end -->
        </div><!-- row end -->
    </div><!-- container end -->
</div><!-- footer end -->

<div id="k-subfooter"><!-- subfooter -->
    <div class="container"><!-- container -->
        <div class="row"><!-- row -->
            <div class="col-lg-12">
                <p class="copy-text text-inverse">&copy; <?php echo date('Y'); ?>  Tous droits réservés.</p>
            </div>
        </div><!-- row end -->
    </div><!-- container end -->
</div><!-- subfooter end -->

<!-- jQuery -->
<script src="<?php echo asset('frontend/js/jquery/jquery-2.1.1.min.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery-migrate-1.2.1.min.js');?>"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo asset('frontend/js/annotator/annotator.js');?>?<?php echo rand(1234,120000); ?>"></script>

<!-- jQuery plugins -->
<script src="<?php echo asset('frontend/js/jquery/jquery.fancybox.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery.i18n.min.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery.expose.js');?>"></script>
<script src="<?php echo asset('frontend/js/jquery/jquery.lockfixed.js');?>"></script>
<script src="<?php echo asset('schemas/Treant.js');?>"></script>
<script src="<?php echo asset('schemas/vendor/raphael.js');?>"></script>

<script src="<?php echo asset('frontend/js/main.js');?>?<?php echo rand(1234,120000); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo asset('frontend/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- Drop-down -->
<script src="<?php echo asset('frontend/js/jquery/dropdown-menu.min.js');?>"></script>
<!-- Theme -->
<script src="<?php echo asset('frontend/js/theme.js');?>"></script>

</body>
</html>