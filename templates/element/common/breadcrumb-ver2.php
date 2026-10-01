
<nav style="--bs-breadcrumb-divider: '›'" aria-label="breadcrumb"class="pt-4 pb-4 small">
	<ol class="breadcrumb small text-black-50 m-0">
		 <?php
            foreach($data['breadcrumbs'] as $breadCrumb)
            {
				
               
                if($breadCrumb['link_url'])
                {
        ?>
					<li class="breadcrumb-item"><a href="<?=$breadCrumb['link']?>" class="text-decoration-none text-black-50"><?=$breadCrumb['label']?></a></li>
		 <?php
                }
                else
                {
        ?>
					<li class="breadcrumb-item"  aria-current="page"><?=$breadCrumb['label']?></li>
		 <?php
                }
            }
        ?>
	</ol>
</nav>
