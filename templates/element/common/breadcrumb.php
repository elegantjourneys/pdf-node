<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
	<ol class="breadcrumb">
        <?php
            foreach($tourPrimaryData['breadcrumb'] as $breadCrumb)
            {
               
                if($breadCrumb['link_display'])
                {
        ?>
                <li class="breadcrumb-item"><a href="<?=$breadCrumb['link']?>"><?=$breadCrumb['title']?></a></li>
        <?php
                }
                else
                {
        ?>
                <li class="breadcrumb-item active" aria-current="page"><?=$breadCrumb['title']?></li>
        <?php
                }
            }
        ?>
      
    </ol>
</nav>