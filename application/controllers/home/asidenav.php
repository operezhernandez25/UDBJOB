
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PARATY</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger">5</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notificaciones de cotizaciones activas</li>
              <li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 cotizaciones han sido realizadas en estos días
                    </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="#">Ver todas</a></li>
            </ul>
          </li> -->

          <!-- User Account: style can be found in dropdown.less -->
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
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="img-circle" alt="Imagen de usuario">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('s_usuario'); ?></p>

        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header ">Opciones</li>
        <?php if($this->uri->segment(1)=='nuevaCotizacion' || $this->uri->segment(1)=='cotizaciones')
                echo '<li class="treeview active menu-open">';
                else
                echo '<li class="treeview">';
        ?>

          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Cotizaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo ($this->uri->segment(1)=='nuevaCotizacion')?'class="active"':''; ?>><a href="<?php echo base_url(); ?>nuevaCotizacion"><i class="fa fa-plus-square"></i> Nueva Cotización</a></li>
            <li <?php echo ($this->uri->segment(1)=='cotizaciones')?'class="active"':''; ?>><a href="<?php echo base_url(); ?>cotizaciones"><i class="fa fa-edit"></i> Ver Cotizaciones</a></li>
            <li><a href="<?php echo base_url(); ?>abonos"><i class="fa fa-plus-square"></i> Añadir Abono</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>mostrarpaquetes">
            <i class="fa fa-cubes"></i> <span>Paquetes</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>mostrarservicios">
            <i class="fa fa-dropbox"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">Detalles</small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url(); ?>index.php/cSubServicios">
            <i class="fa fa-dropbox"></i> <span>SubServicios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">Detalles</small>
            </span>
          </a>
        </li>

        <li>
        <a href="<?php echo base_url();?>index.php/cInventario">
          <i class="fa fa-dropbox"></i> <span>Inventario</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">Bodega</small>
          </span>
        </a>
      </li>
      <li
      <?php
       if($this->uri->segment(1)=="follajes" || $this->uri->segment(1)=="bases" || $this->uri->segment(1)=="flores")
       {
          echo 'class="treeview active menu-open"';
       }else
       {
          echo ' class="treeview"';
       }
      ?> >
          <a href="#">
            <i class="fa fa-pagelines"></i>
            <span>Centros de mesa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1)=="bases") echo 'class="active"' ?>><a href="<?php echo base_url();?>bases"><i class="fa fa-database"></i> Bases</a></li>
            <li <?php if($this->uri->segment(1)=="flores") echo 'class="active"' ?>><a href="<?php echo base_url();?>flores"><i class="fa fa-eye"></i>Flores</a></li>
            <li <?php if($this->uri->segment(1)=="follajes") echo 'class="active"' ?>><a href="<?php echo base_url();?>follajes"><i class="fa fa-eye"></i>Follajes</a></li>
          </ul>
        </li>
        <?php
        if ($this->session->userdata('s_tipoUser')!=2) {
          echo '<li>
          <a href="'.base_url().'usuarios">
            <i class="fa fa-user"></i> <span>Usuarios</span>

          </a>
        </li>';
        }

        ?>




        <li>
        <a href="<?php echo base_url();?>index.php/cCalendario">
          <i class="fa fa-calendar"></i> <span>Calendario</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">Eventos</small>
          </span>
        </a>
      </li>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>
