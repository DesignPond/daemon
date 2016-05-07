<ul class="one-page-nav">
    <?php
        if(isset($hierarchy))
        {
            $helper = new \App\Helper\Helper();
            foreach($hierarchy as $page)
            {
                echo $helper->renderSubMenu($page);
            }
        }
    ?>
</ul>