<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Elegant Journeys :: Admin</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/animate.css" type="text/css" />
  <!-- <link rel="stylesheet" href="<?=WEBROOT?>front/font-awesome/css/font-awesome.min.css" type="text/css" /> -->
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/js/nestable/nestable.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?=WEBROOT?>admin/js/datepicker/datepicker.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="<?=WEBROOT?>admin/js/ie/html5shiv.js"></script>
    <script src="<?=WEBROOT?>admin/js/ie/respond.min.js"></script>
    <script src="<?=WEBROOT?>admin/js/ie/excanvas.js"></script>
  <![endif]-->

<?php
	//echo $this->Html->script('ckfinder/ckeditor/ckeditor');
	//echo $this->Html->script('ckfinder/ckfinder');
?>
<?php

	echo $this->Html->script('ckeditor/ckeditor');

	echo $this->Html->script('ckfinder/ckfinder');

?>		

</head>
<body>
  <section class="vbox">
    <?php echo $this->element("Admin.header"); ?>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter nav-xs aside-md hidden-print" id="nav">
          <section class="vbox">
            <header class="header bg-primary lter text-center clearfix">
              <div class="btn-group">

                <div class="btn-group hidden-nav-xs">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">

                    <span class="caret"></span>
                  </button>

                </div>
              </div>
            </header>
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">

                <!-- nav -->
                <?php echo $this->element("Admin.sidebar");?>
                <!-- / nav -->
              </div>
            </section>

            <footer class="footer lt hidden-xs b-t b-light">
              <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">Active chats</header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No active chats.</p>
                      <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <div id="invite" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">
                      John <i class="fa fa-circle text-success"></i>
                    </header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No contacts in your lists.</p>
                      <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-default btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-default" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
              </div>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
          <?php /* ?>
            <header class="header bg-light bg-gradient b-b">
              <p><b><?php echo $page_title; ?></b></p>
            </header>
           <?php */ ?>
            <?php echo $this->fetch('content'); ?>


          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="<?=WEBROOT?>admin/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?=WEBROOT?>admin/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?=WEBROOT?>admin/js/app.js"></script>
  <script src="<?=WEBROOT?>admin/js/app.plugin.js"></script>
  <script src="<?=WEBROOT?>admin/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?=WEBROOT?>admin/js/sortable/jquery.sortable.js"></script>
<script src="<?=WEBROOT?>admin/js/nestable/jquery.nestable.js"></script>
<script src="<?=WEBROOT?>admin/js/nestable/demo.js"></script>

<script src="<?=WEBROOT?>admin/js/datepicker/bootstrap-datepicker.js"></script>

</body>
</html>
