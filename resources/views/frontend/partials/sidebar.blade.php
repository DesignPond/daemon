<!-- sidebar wrapper -->
<div class="col-padded col-shaded"><!-- inner custom column -->
    <ul class="list-unstyled clear-margins"><!-- widgets -->
        @if (Request::is('/') || Request::is('contact'))
            <li class="widget-container widget_nav_menu"><!-- widget -->
                <h1 class="title-widget">Informations</h1>
                <ul>
                    <li><a href="#" title="menu item">Annonces</a></li>
                    <li><a href="#" title="menu item">Plan du cours</a></li>
                    <li><a href="#" title="menu item">Directives</a></li>
                    <li><a href="#" title="menu item">Calendrier du cours</a></li>
                </ul>
            </li>
            <li class="widget-container widget_recent_news"><!-- widgets list -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                    <li class="widget-container widget_course_search"><!-- widget -->
                        <h1 class="title-titan">Recherche</h1>
                        <form role="search" method="get" id="course-finder" action="#">
                            <div class="input-group">
                                <input type="text" placeholder="" autocomplete="off" class="form-control" id="find-course" name="find-course" />
                                <span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>
                            </div>
                        </form>
                    </li><!-- widget end -->
                    <li class="widget-container widget_text"><!-- widget -->
                        <a href="{{ url('auth/login') }}" class="custom-button cb-green" title="S'identifier">
                            <i class="custom-button-icon fa fa-check-square-o"></i>
                                <span class="custom-button-wrap">
                                    <span class="custom-button-title">Login</span>
                                    <span class="custom-button-tagline">Avec votre email UniNE</span>
                                </span>
                            <em></em>
                        </a>
                        <a href="#" class="custom-button cb-gray" title="Consulter les cours">
                            <i class="custom-button-icon fa  fa-play-circle-o"></i>
                                <span class="custom-button-wrap">
                                    <span class="custom-button-title">Demander un accès</span>
                                    <span class="custom-button-tagline">Vous devez être inscrit au cours de méthodologie juridique</span>
                                </span>
                            <em></em>
                        </a>
                    </li><!-- widget end -->
                </ul><!-- widgets end -->
            </li><!-- widgets list end -->
        @elseif(Request::is('page/*'))

            <?php
                if(isset($siblings)){
                    $helper = new \App\Helper\Helper();
                    foreach($siblings as $node){
                        echo $helper->renderSidebar($node, $page);
                    }
                }
            ?>

            <li class="widget-container widget_text"><!-- widget -->
                <a href="#" class="custom-button cb-yellow" title="Un problème?">
                    <i class="custom-button-icon fa fa-question-circle"></i>
                <span class="custom-button-wrap">
                    <span class="custom-button-title">Un problème?</span>
                    <span class="custom-button-tagline">Contacter un assistant</span>
                </span>
                    <em></em>
                </a>
            </li><!-- widget end -->
        @endif
    </ul><!-- widgets end -->
</div><!-- inner custom column end -->

