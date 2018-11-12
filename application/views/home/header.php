<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COMPUTRABAJO | Inicio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/AdminLTE.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/dropzone.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/basic.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/skins/_all-skins.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select/bootstrap-select.css">

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select/bootstrap-select.css">

  <link href="<?php echo base_url(); ?>public/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">

<!-- DataTable -->
  <link href="<?php echo base_url(); ?>public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/bower_components/datatables.net/js/jquery.dataTables.min.js" rel="stylesheet">

  <!-- Datetime Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/datetimepicker/bootstrap-datetimepicker.min.css">
  <!-- Daterange picker -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<?php
  if (!$this->session->userdata('s_idusuario')) {
    redirect('login');
  }
 ?>

</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<script type="text/javascript">
          var baseurl="<?php echo base_url(); ?>";

</script>
