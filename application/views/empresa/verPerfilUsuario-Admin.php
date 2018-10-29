<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Perfil Aspirante
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
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">
                        <strong>Nombre</strong>
                        <p class="text-muted"> 
                            <?php echo $datosUsuario->nombre; ?>
                        </p>
                        <hr>
                        <strong>Nacimiento</strong>
                        <p class="text-muted">
                            <?php echo $datosUsuario->fechaNacimiento; ?>
                        </p>
                        <hr>
                        <strong>Genero</strong>
                        <p class="text-muted">
                             <?php echo $datosUsuario->genero; ?>
                        </p>
                        <hr>
                        <strong>Estado Civil</strong>
                        <p class="text-muted">
                            <?php echo $datosUsuario->estadoCivil; ?>
                        </p>
                        <hr>
                        <strong>Email</strong>
                        <p class="text-muted">
                           <?php echo $datosUsuario->email; ?>
                        </p>
                        <hr>
                        <strong >Dirección</strong>
                        <p class="text-muted">
                            <?php echo $datosUsuario->direccion; ?>
                        </p>
                        <hr>
                        <strong>Ciudad</strong>
                        <p class="text-muted">
                            <?php echo $datosUsuario->ciudad; ?>
                        </p>
                        <hr>
                        <strong>Departamento</strong>
                        <p>
                            <?php echo $datosUsuario->departamento; ?>
                        </p>
                        <hr>
                        <strong>Pais</strong>
                        <p class="text-muted">
                           <?php echo $datosUsuario->pais; ?>
                        </p>
                        <hr>
                        <strong>Skype</strong>
                        <p class="text-muted">
                            <?php echo $datosUsuario->skype; ?>
                        </p>
                    </div> 
                    <div class="box-body">
                        <p>

                        </p>
                    </div>  
                </div>
            </div>
       
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        <img class=" img-responsive img-circle" src="<?php echo base_url(); ?>public/photos/<?php echo $datosUsuario->foto; ?>" alt="User profile picture">
                        <hr>
                        <p>
                            <a href="<?php echo base_url(); ?>CEmpresa/descargarCurriculum/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-success btn-block">Descargar Curriculum</a>
                            <a href="<?php echo base_url(); ?>CEmpresa/descargarDUI/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-success btn-block">Descargar DUI</a>
                            <a href="<?php echo base_url(); ?>CEmpresa/descargarNIT/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-success btn-block">Descargar NIT</a>
                            <a href="<?php echo base_url(); ?>CEmpresa/descargarSolvencia/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-success btn-block">Descargar Solvencia</a>
                            <?php
                                if($datosUsuario->estado==1)
                                {
                                    ?>
                                    <a href="<?php echo base_url(); ?>CEmpresa/deshabiltarUsuario/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-danger btn-block">Deshabilitar Usuario</a>
                                    <?php
                                }else
                                {
                                    ?>
                                    <a href="<?php echo base_url(); ?>CEmpresa/habilitarUsuario/<?php echo $datosUsuario->idUsuario ?>" class="btn btn-info btn-block">Habilitar Usuario</a>
                            
                                    <?php
                                }
                            ?>
                             
                        </p>    
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        Conocimientos del Usuario
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                       
                        
                        <?php 
                            if(isset($conocimientosUsuario))
                            {
                                foreach($conocimientosUsuario as $cono)
                                {
                                    ?>
                                <li class="list-group-item list-group-item-success">
                                    <?php echo $cono->conocimientos; ?>
                                </li>
                                    <?php
                                }
                            }
                        ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>    
    </section>