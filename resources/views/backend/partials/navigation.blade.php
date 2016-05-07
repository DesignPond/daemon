<!-- BEGIN SIDEBAR -->
<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <!-- Recherche globale -->
       <!-- @include('backend.partials.search')-->

        <li class="divider"></li>
        <li class="<?php echo (Request::is('admin') ? 'active' : '' ); ?>"><a href="{{ url('admin') }}">
             <i class="fa fa-home"></i> <span>Accueil</span></a>
        </li>
        <li class="<?php echo (Request::is('page') || Request::is('page/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/page') }}">
                <i class="fa fa-file"></i> <span>Pages</span></a>
        </li>
        <li class="<?php echo (Request::is('site') || Request::is('site/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/site') }}">
                <i class="fa fa-book"></i> <span>Sites</span></a>
        </li>
        <li class="<?php echo (Request::is('admin/config') ? 'active' : ''); ?>">
            <a href="{{ url('admin/config') }}"><i class="fa fa-cog"></i><span>Configurations</span></a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>