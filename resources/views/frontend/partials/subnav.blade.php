<ul class="one-page-nav">
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