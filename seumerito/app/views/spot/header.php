<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo PATH_STYLE; ?>assets/img/logo.png" type="image/x-icon"/>

    <title>Seu Mérito</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo PATH_STYLE; ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo PATH_STYLE; ?>assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo PATH_STYLE; ?>assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- BOO-BOX -->
    <script type="text/javascript" src="http://static.boo-box.com/javascripts/boo-inject.js"></script>
    <meta name="bbx-domain-token" content="1dd9683e77c488abb314b9f7fc910a2aab8cb765"/>
    <!-- / BOO-BOX -->
    
<!-- Hotjar Tracking Code for http://seumerito.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:201350,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
    
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT;?>">Seu Mérito</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo ROOT;?>">HOME</a></li>
            <li><a href="<?php echo ROOT;?>contents">Conteúdos</a></li>
            <li><a href="<?php echo ROOT;?>videos">Vídeo-aulas</a></li>
            <li><a href="<?php echo ROOT;?>share/material">Compartilhar</a></li>
            
            <?php if($this->auth->checkLogin('boolean')){ ?>
                <li><a href="<?php echo ROOT;?>dashboard">Dashboard</a></li>
            <?php }else{ ?>
                <li><a data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin">Entrar</a></li>
            <?php } ?>
            <!--
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="services.html">SERVICES</a></li>
            <li><a href="works.html">WORKS</a></li>

            -->            
            <?php if($this->auth->checkLogin('boolean')){ ?>
                <li><a data-toggle="modal" data-target="#Modal4" href="#Modal4"><i class="fa fa-envelope-o"></i></a></li>
            <?php }else{ ?>
                <li><a data-toggle="modal" data-target="#ModalLogin" href="#ModalLogin"><i class="fa fa-envelope-o"></i></a></li>
            <?php } ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>