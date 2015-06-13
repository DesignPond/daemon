<ul class="list-unstyled clear-margins"><!-- widgets -->
    @if (Request::is('/'))
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
                    <a href="#" class="custom-button cb-green" title="S'identifier">
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
    @elseif(Request::is('content'))
        <li class="widget-container widget_up_events"><!-- widget -->
            <h1 class="title-widget">Annonces</h1>
            <ul class="list-unstyled">
                <li class="up-event-wrap">
                    <h1 class="title-median"><a href="#" title="Annual alumni game">Lectures préparatoires</a></h1>
                    <div class="up-event-meta clearfix">
                        <div class="up-event-date">Oct 9, 2015</div>
                    </div>
                    <p>Lectures préparatoires pour le cours du 9 octobre<br/>
                        <a href="#" class="moretag" title="read more">Plus</a>
                    </p>
                </li>
                <li class="up-event-wrap">
                    <h1 class="title-median"><a href="#" title="School talents gathering">Inscriptions</a></h1>
                    <div class="up-event-meta clearfix">
                        <div class="up-event-date">Aou 25, 2015</div><div class="up-event-time">8:30 - 18:30</div>
                    </div>
                    <p>Inscriptions pour les visites du Parlement<br/>
                        <a href="#" class="moretag" title="read more">Plus</a>
                    </p>
                </li>
            </ul>
        </li>
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
    @else
        <li class="widget-container widget_nav_menu"><!-- widget -->
            <h1 class="title-widget">La recherche juridique</h1>
            <h6><a href="#">La législation suisse</a></h6>
            <ul>
                <li><a href="{{ url('detail') }}" title="menu item">La législation fédérale</a></li>
                <li><a href="{{ url('loi') }}" title="menu item">La structure d’une loi fédérale</a></li>
                <li><a href="#" title="menu item">Les législations cantonales</a></li>
            </ul>
            <h6><a href="#">La jurisprudence</a></h6>
            <h6><a href="#">La doctrine</a></h6>
        </li>
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