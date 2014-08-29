<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->_model->sitetitle; ?></title>
    <!--metatags-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--styles-->
    <link href="<?php echo GlobalUrl::SITEROOT; ?>/static/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo GlobalUrl::SITEROOT; ?>/static/css/screen.css" type="text/css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" type="text/css" rel="stylesheet">

    <script src="<?php echo GlobalUrl::SITEROOT; ?>/static/js/jquery.js"></script>
    <script src="<?php echo GlobalUrl::SITEROOT; ?>/static/js/bootstrap.js"></script>
    <script src="<?php echo GlobalUrl::SITEROOT; ?>/static/js/main.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="<?php echo $this->_model->pagecontext; ?>">

    <div id="site-navbar" class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand site-logo" href="<?php echo GlobalUrl::SITEROOT; ?>/">WerktGoed</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
        <?php $this->renderMenuBox(); ?>
        </div><!--/.container-fluid -->
      </div>
    </div>



    <div id="site-container" class="container">
