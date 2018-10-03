
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CompuTrabajo</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        </ul>
      </div>
    </nav>
</header>

<aside class="main-sidebar" >
    <section class="sidebar" style="height: auto;">

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header ">Usuario</li>
        <li class="active">
          <a href="<?php echo base_url(); ?>index.php/CInicio">
            <i class="fa fa-cubes"></i> <span>Ver Propuestas</span>
          </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>index.php/CUsuario/verPostulaciones">
              <i class="fa fa-cubes"></i> <span>Ver mis postulaciones</span>
            </a>
        </li>
        <li >
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Perfil</span>
            </a>
        </li>
        <li >
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Cerrar Sesión</span>
            </a>
        </li>
        <li class="header ">Empresa</li>
        <li >
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Realizar Propuesta</span>
            </a>
        </li>
        <li >
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Revisar Propuestas</span>
            </a>
        </li>
        <li >
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Ver Perfil</span>
            </a>
        </li>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>
