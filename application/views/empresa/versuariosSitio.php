<div class="content-wrapper">
    <section class="content-header">
    <h1>Usuarios del sitio
     <small>Ver y administrar los usuariosd el sitio</small>
   </h1>
   <?php
   if(isset($mensaje))
   {
     ?>
    <div class='<?php
    if($error==false)
    {
       echo "alert alert-info alert-dismissible";
    }else{

     echo "alert alert-danger alert-dismissible";

    } ?>'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Mensaje</h4>
                <?php echo $mensaje; ?>
    </div>
  <?php
   }
   ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        Usuarios
                    </div>
                    <div class="box-body">
                    <table id="tablaBase" class="table  table-bordered btn-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
             
              <th>E-mail</th>
              <th>Pais</th>
              <th>Departamento</th>
              <th>Controles</th>
            </tr>
          </thead>
          <tbody>
            <?php
                if(isset($usuarios))
                {
                  foreach($usuarios as $usuario)
                  {
                  ?>
                  <tr>
                  <td><?php echo $usuario->idUsuario ?> </td>
                  <td class="classNombre"><?php echo $usuario->nombre ?></td>
                  
                  <td class="classCorreo"><?php echo $usuario->email ?></td>
                  <td class="classPais"><?php echo $usuario->pais ?></td>
                  <td class="classDepartamento"><?php echo $usuario->departamento ?></td>
                  <td style="width:5%">
                    <a href="<?php ?>verPerfilUsuario/<?php echo $usuario->idUsuario ?>" class="btn btn-success btn-block">Ver</a>
                  </td>
                  </tr>
                  <?php
                  }
                }
            ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>