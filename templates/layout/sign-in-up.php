<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/font.css" type="text/css" />
    <link rel="stylesheet" href="<?=WEBROOT?>admin/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="<?=WEBROOT?>admin/js/ie/html5shiv.js"></script>
    <script src="<?=WEBROOT?>admin/js/ie/respond.min.js"></script>
    <script src="<?=WEBROOT?>admin/js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
<?= $this->fetch('content') ?>
  <script src="<?=WEBROOT?>admin/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?=WEBROOT?>admin/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?=WEBROOT?>admin/js/app.js"></script>
  <script src="<?=WEBROOT?>admin/js/app.plugin.js"></script>
  <script src="<?=WEBROOT?>admin/js/slimscroll/jquery.slimscroll.min.js"></script>
  
</body>
</html>