<?php 
  $mvc = new MvcController();
  session_start();
  $usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema tutorias | TAW</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="views/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php"class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Ocultar navegación</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="views/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="index.php?action=salir" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $usuario; ?></p>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navegación</li>

        <!-- Control de sesion en la navegación-->
        <?php

          if(isset($_SESSION['sesion'])){ 
        ?>
            <li>
              <a href="index.php">
                <small class="label pull-left bg-yellow"><i class="glyphicon glyphicon-dashboard fa-fw fa-2x"></i> </small>
                <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="index.php?action=addLibro">
                <small class="label pull-left bg-green"><i class="fa fa-pencil-square-o fa-fw fa-2x"></i> </small>
                <span>Agregar un libro</span>
              </a>
            </li>

            <li>
              <a href="index.php?action=listaLibros">
                <small class="label pull-left bg-blue"><i class="glyphicon glyphicon glyphicon-book fa-fw fa-2x"></i> </small>
                <span>Listado de libros</span>
              </a>
            </li>

            

            <li>
              <a href="index.php?action=perfil">
                <small class="label pull-left bg-blue"><i class="glyphicon glyphicon glyphicon-user fa-fw fa-2x"></i> </small>
                <span>Perfil</span>
              </a>
            </li>

        <?php
          }else{
        ?>

            <li>
          <a href="index.php">
              <small class="label pull-left bg-yellow"><i class="glyphicon glyphicon-dashboard fa-fw fa-2x"></i> </small>
              <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="index.php?action=registro">
              <small class="label pull-left bg-green"><i class="fa fa-pencil-square-o fa-fw fa-2x"></i> </small>
              <span>Registro</span>
          </a>
        </li>

        <li>
          <a href="index.php?action=login">
              <small class="label pull-left bg-green"><i class="fa fa-pencil-square-o fa-fw fa-2x"></i> </small>
              <span>Login</span>
          </a>
        </li>

        <?php } ?>
        <!-- ./Control de sesion en la navegación-->
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

      <?php
        $mvc -> enlacesPaginasController();
      ?>

    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Universidad Politecnica de Victoria
    </div>
    <strong>Copyright &copy; 2018 <a href="#">TAW</a>.</strong>
  </footer>
  
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="views/dist/js/adminlte.min.js"></script>
</body>
</html>