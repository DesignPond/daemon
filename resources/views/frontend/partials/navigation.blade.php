<!-- main navig -->
<nav id="k-menu" class="k-main-navig"><!-- main navig -->
    <ul id="drop-down-left" class="k-dropdown-menu">
        <li><a href="{{ url('/') }}" title="News">Accueil</a></li>
        <?php
            $helper = new \App\Helper\Helper();

            foreach($hierarchy as $page){
                echo $helper->renderMenu($page);
            }
        ?>
        <li><a href="{{ url('contact') }}" title="Un soucis?">Contact</a></li>
    </ul>
</nav>
<!-- main navig end -->

