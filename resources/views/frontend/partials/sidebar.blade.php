<!-- Vertical Menu -->
<nav class="menu-vertical-wrapper">
    <ul class="menu-vertical  js-menu-vertical" data-prepend-to=".js-layout" data-select="Menu">
        <?php
        if(isset($hierarchy))
        {
            $helper = new \App\Helper\Helper();
            foreach($hierarchy as $page)
            {
                echo $helper->renderMenu($page);
            }
        }
        ?>
    </ul>
</nav>