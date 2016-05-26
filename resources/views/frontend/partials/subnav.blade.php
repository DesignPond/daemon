<ul class="one-page-nav js-one-page-nav js-menu-vertical" data-prepend-to=".js-prepend-mobile-menu">
    <?php
        if(!$pages->isEmpty())
        {
            $helper = new \App\Helper\Helper();
            foreach($pages as $page)
            {
                echo $helper->renderSubMenu($page);
            }
        }
    ?>
</ul>