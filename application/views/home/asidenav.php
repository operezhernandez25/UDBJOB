
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
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('s_usuario'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('s_usuario'); ?>
                  <small><?php echo date('l d - M - Y h:i').'<br>'; ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>perfil" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat" id="btncerrarsesion">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<aside class="main-sidebar" >
    <section class="sidebar" style="height: auto;">

      <ul class="sidebar-menu" data-widget="tree">
      <?php
        if($this->session->userdata("s_tipo")==1)  { ?>
        <li class="header ">Usuario</li>
        <li class="active">
          <a href="<?php echo base_url(); ?>index.php/CInicio">
            <i class="fa fa-newspaper-o"></i> <span>Ver Propuestas</span>
          </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>index.php/CUsuario/verPostulaciones">
              <i class="glyphicon glyphicon-list-alt"></i> <span>Ver mis postulaciones</span>
            </a>
        </li>
        <li >
            <a href="#">
              <i class="fa fa-user-circle"></i> <span>Perfil</span>
            </a>
        </li>

        <?php } ?>
        <!--EMPRESA -->
       <?php if($this->session->userdata("s_tipo") == 0)  { ?>
         <?php if ($this->session->userdata("s_admin") == 0) { ?>
        <li class="header ">Empresa</li>
        <li >
            <a href="<?php echo base_url() ?>CEmpresa/nuevaPropuesta">
              <i class="fa fa-plus-square"></i> <span>Realizar Propuesta</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url();?>CEmpresa/verMisPropuestas">
              <i class="fa fa-newspaper-o"></i> <span>Propuestas de la empresa</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>usuarioEmpresa">
              <i class="fa fa-user-circle"></i> <span>Ver Perfil</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>CEmpresa/verConocimientos">
              <i class="glyphicon glyphicon-list-alt"></i> <span>Verificar conocimientos</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>usuarioEmpresa">
              <i class="fa fa-users"></i> <span>Usuarios</span>
            </a>
        </li>

      <?php } elseif ($this->session->userdata("s_admin") == 1) {?>
        <li class="header ">Empresa</li>
        <li >
            <a href="<?php echo base_url() ?>CEmpresa/nuevaPropuesta">
              <i class="fa fa-plus-square"></i> <span>Realizar Propuesta</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url();?>CEmpresa/verMisPropuestas">
              <i class="fa fa-newspaper-o"></i> <span>Propuestas de la empresa</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>usuarioEmpresa">
              <i class="fa fa-user-circle"></i> <span>Ver Perfil</span>
            </a>
        </li>
        <li >
            <a href="<?php echo base_url(); ?>usuarioEmpresa">
              <i class="fa fa-users"></i> <span>Usuarios</span>
            </a>
        </li>
      <?php } }?>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>
