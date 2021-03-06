<!-- BEGIN SIDEBAR -->
<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <!-- Recherche globale -->

        <li class="divider"></li>
        <li class="<?php echo (Request::is('admin') ? 'active' : '' ); ?>"><a href="{{ url('admin') }}">
             <i class="fa fa-home"></i> <span>Accueil</span></a>
        </li>
        <li class="<?php echo (Request::is('page') || Request::is('page/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/page') }}">
            <i class="fa fa-file"></i> <span>Pages</span></a>
        </li>
        <li class="<?php echo (Request::is('site') || Request::is('site/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/site') }}">
            <i class="fa fa-map-marker"></i> <span>Sites</span></a>
        </li>
        <li class="<?php echo (Request::is('user') || Request::is('user/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/user') }}">
                <i class="fa fa-users"></i> <span>Utilisateurs</span></a>
        </li>
        <li class="divider"></li>
        <li class="<?php echo (Request::is('ticket') || Request::is('ticket/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/ticket') }}">
            <i class="fa fa-ticket"></i> <span>Tickets</span></a>
        </li>
        <li class="<?php echo (Request::is('categorie') || Request::is('categorie/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/categorie') }}">
            <i class="fa fa-tag"></i> <span>Categories</span></a>
        </li>
        <li class="<?php echo (Request::is('comment') || Request::is('comment/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/comment') }}">
            <i class="fa fa-comment"></i> <span>Commentaires</span></a>
        </li>
        <li class="<?php echo (Request::is('priority') || Request::is('priority/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/priority') }}">
            <i class="fa fa-sort-numeric-desc"></i> <span>Priorités</span></a>
        </li>
        <li class="<?php echo (Request::is('status') || Request::is('status/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/status') }}">
            <i class="fa fa-exclamation-triangle"></i> <span>Statut</span></a>
        </li>

        <li class="divider"></li>
        <li class="<?php echo (Request::is('admin/config') ? 'active' : ''); ?>">
            <a href="{{ url('admin/config') }}"><i class="fa fa-cog"></i><span>Configurations</span></a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>