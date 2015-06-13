<nav id="k-menu" class="k-main-navig"><!-- main navig -->
    <ul id="drop-down-left" class="k-dropdown-menu">
        <li><a href="{{ url('/') }}" title="News">Accueil</a></li>
        <li><a href="{{ url('/content') }}" title="Juridique">La recherche</a>
            <ul class="sub-menu">
                <li><a href="{{ url('/content') }}">La législation suisse</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('/detail') }}">La législation fédérale</a></li>
                        <li><a href="{{ url('/loi') }}">La structure d’une loi fédérale</a></li>
                        <li><a href="#">Les législations cantonales</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/content') }}">La jurisprudence</a>
                    <ul class="sub-menu">
                        <li><a href="#">Les jurisprudences fédérales</a></li>
                        <li><a href="#">Les jurisprudences cantonales</a></li>
                        <li><a href="#">La consultation de la jurisprudence</a></li>
                        <li><a href="#">La structure des arrêts du Tribunal fédéral</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/content') }}">La doctrine</a>
                    <ul class="sub-menu">
                        <li><a href="#">Les principaux types de publication</a></li>
                        <li><a href="#">La consultation de la doctrine</a></li>
                        <li><a href="#">Les revues principales du droit suisse</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="{{ url('/content') }}" class="Pages Collection" title="Juridique">La rédaction</a>
            <ul class="sub-menu">
                <li><a href="{{ url('/content') }}">Généralités</a></li>
                <li><a href="{{ url('/content') }}">La préparation</a>
                    <ul class="sub-menu">
                        <li><a href="#">Détermination de l’objectif</a></li>
                        <li><a href="#">Position du problème</a></li>
                        <li><a href="#">Examen du problème</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/content') }}">La rédaction proprement dite</a>
                    <ul class="sub-menu">
                        <li><a href="#">Les objectifs</a></li>
                        <li><a href="#">La structure</a></li>
                        <li><a href="#">La formulation</a></li>
                    </ul>
                </li>
                <li><a href="news-single.html">La mise au point</a>
                    <ul class="sub-menu">
                        <li><a href="#">L'établissement de l'appareil critique</a></li>
                        <li><a href="#">Les modes de références</a></li>
                        <li><a href="#">La mise en forme</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="{{ url('contact') }}" title="Un soucis?">Contact</a></li>
    </ul>
</nav><!-- main navig end -->