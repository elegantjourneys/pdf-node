<?php
	$metaTags = $data['meta_tags'];
?>
<head>
    <meta charset="UTF-8" />
    
	<title><?=(isset($metaTags['meta_title']))?$metaTags['meta_title']:''?></title>
	<meta name="description" content="<?=(isset($metaTags['meta_description']))?$metaTags['meta_description']:''?>">
	<meta name="keywords" content="<?=(isset($metaTags['meta_keyword']))?$metaTags['meta_keyword']:''?>">
	<link rel="icon" type="image/x-icon" href="/version12/assets/img/favicon.ico">
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="canonical" href="<?=(isset($metaTags['canonical_url']))?$metaTags['canonical_url']:''?>" />
	
	<meta http-equiv="Pragma" content="Public">
	<meta http-equiv="Cache-Control" content="Public">
	<meta http-equiv="Cache-Control" content="max-age=86400">
	<meta http-equiv="Cache-Control" content="Public">
	<meta http-equiv="Cache-Control" content="must-revalidate">
	<meta http-equiv="Vary" content="User-Agent">


	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=(isset($metaTags['meta_title']))?$metaTags['meta_title']:''?>" />
	<meta property="og:site_name" content="Elegant Journeys" />
	<meta property="og:description" content="<?=(isset($metaTags['meta_description']))?$metaTags['meta_description']:''?>">
	<meta property="og:image" content="<?=(isset($metaTags['image']))?$metaTags['image']:''?>" />
	<meta property="og:image:width" content="560" />
	<meta property="og:image:height" content="292" />
	<meta name="og:url" content="<?=(isset($metaTags['canonical_url']))?$metaTags['canonical_url']:''?>" />



	<meta itemprop="name" content="<?=(isset($metaTags['itemprop_name']))?$metaTags['itemprop_name']:''?>"/>
	<meta itemprop="datePublished" content="<?=$metaTags['date_published']?>"/>
	<meta itemprop="dateModified" content="<?=$metaTags['date_modified']?>"/>


	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@elegantjourney">
	<meta name="twitter:title" content="<?=(isset($metaTags['meta_title']))?$metaTags['meta_title']:''?>">
	<meta name="twitter:description" content="<?=(isset($metaTags['meta_description']))?$metaTags['meta_description']:''?>">
    <meta name="twitter:image:src" content="<?=(isset($metaTags['image']))?$metaTags['image']:''?>">
    <meta property="twitter:image:height" content="560" />
    <meta property="twitter:image:width" content="292" />
    <link rel="stylesheet" href="<?=WEBROOT?>version2/assets/css/style.css?v=1" />
    <!-- Bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css"
    />
  	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
	<?php
	foreach($data['schema'] as $schemaScript)
	{
		if((isset($schemaScript))&&($schemaScript!=""))
		{
	?>
		<script type="application/ld+json">
			<?=$schemaScript?>
		</script> 
	<?php
		}
	}
	?>
</head>