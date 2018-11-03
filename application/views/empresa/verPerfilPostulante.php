<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Perfil Aspirante
        </h1>

        
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
                           
                           <?php
                            if($estadoPostulacion->estado==0){
                           ?>
                            <a href="<?php echo base_url(); ?>CEmpresa/contactarPostulante/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>"
                             class="btn btn-primary btn-block">Preselección</a>
                             <?php
                            }
                             ?>
                             <?php
                            if($estadoPostulacion->estado==1){
                           ?>
                            <button  data-toggle="modal" data-target="#pruebaFinalizadas"
                             class="btn btn-warning btn-block">Pruebas Finalizadas</button>
                             <?php
                            }
                             ?>
                             <?php
                            if($estadoPostulacion->estado==2){
                           ?>
                            <button  data-toggle="modal" data-target="#modalSkype"
                             class="btn btn-warning btn-block">Entrevista Realizada</button>
                             <?php
                            }
                             ?>
                             <?php
                            if($estadoPostulacion->estado==3){
                           ?>
                            <button  data-toggle="modal" data-target="#valoracionyde"
                             class="btn btn-primary btn-block">Valoración y decisión</button>
                             <?php
                            }
                             ?>
                             <?php
                            if($estadoPostulacion->estado==4){
                           ?>
                            <button  data-toggle="modal" data-target="#modalFinal"
                             class="btn btn-danger btn-block">Finalizar Proceso</button>
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


        <div class="row">
        <?php
            if($estadoPostulacion->estado>1)
            {
                ?>
                    <div class="col-md-4 col-sm-6 chat-caja" >
                        <div class="box box-warning direct-chat direct-chat-warning ">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Chat Directo</h3>
                
                                  <div class="box-tools pull-right">
                                    <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body"  >
                                  <!-- Conversations are loaded here -->
                                  <div class="direct-chat-messages" id="caja-chat" >
                                    <?php
                                        if(isset($mensajes))
                                        {
                                            foreach($mensajes as $men)
                                            {
                                                if($men->remitente==0)
                                                {
                                                    ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                      <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Nosotros</span>
                                        <span class="direct-chat-timestamp pull-left"><?php echo $men->fecha ?></span>
                                      </div>
                                      <!-- /.direct-chat-info -->
                                      <img class="direct-chat-img" src="http://pngimage.net/wp-content/uploads/2018/06/usuario-icono-png.png" alt="message user image">
                                      <!-- /.direct-chat-img -->
                                      <div class="direct-chat-text">
                                        <?php echo $men->mensaje ?>
                                      </div>
                                      <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                                    <?php
                                                }else if($men->remitente==1)
                                                {
                                                    ?>
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                      <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left"><?php echo $men->nombre ?></span>
                                        <span class="direct-chat-timestamp pull-right"><?php echo $men->fecha ?></span>
                                      </div>
                                      <!-- /.direct-chat-info -->
                                      <img class="direct-chat-img" src="http://pngimage.net/wp-content/uploads/2018/06/usuario-icono-png.png" alt="message user image">
                                      <!-- /.direct-chat-img -->
                                      <div class="direct-chat-text">
                                      <?php echo $men->mensaje ?>
                                      </div>
                                      <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->                    
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                
                                    
                
                                   
                
                                  </div>
                                  <!--/.direct-chat-messages-->
                
                                  
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer" >
                                  
                                    <div class="input-group">
                                      <input type="text" autocomplete="off" name="message" id="MensajeEnviar" placeholder="Escribe un mensaje ..." class="form-control">
                                      <span class="input-group-btn">
                                            <button type="button" class="btn btn-warning btn-flat">Enviar</button>
                                          </span>
                                    </div>
                                 
                                </div>
                                <!-- /.box-footer-->
                              </div>
                </div>
        </div>
                <?php
            }
        
        ?>
    </section>



        <style>
    .chat-caja {
   position: fixed;
   z-index:4;
  
   right: 0;
   bottom: 0;
   padding: 10px;
   margin: 0 auto;
}


</style>


<!-- Modal -->
<div class="modal fade" id="pruebaFinalizadas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje de confirmación</h4>
      </div>
      <div class="modal-body">
        Al dar click en aceptar se dará por concluida la etapa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo base_url(); ?>CEmpresa/pruebaFinalizadas/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Entrevista realizada-->
<div class="modal fade" id="modalSkype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje de confirmación</h4>
      </div>
      <div class="modal-body">
        Al dar click en aceptar se dará por concluida la etapa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo base_url(); ?>CEmpresa/skypeFinalizado/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
valoracionyde

<!-- Modal Entrevista realizada-->
<div class="modal fade" id="valoracionyde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje de confirmación</h4>
      </div>
      <div class="modal-body">
        Al dar click en aceptar se dará por concluida la etapa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo base_url(); ?>CEmpresa/valoracionydeFin/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>" class="btn btn-primary">Aceptar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal final-->
<div class="modal fade" id="modalFinal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje de confirmación</h4>
      </div>
      <div class="modal-body">
        Al dar click en aceptar se dará por concluida la etapa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo base_url(); ?>CEmpresa/aceptado/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>" class="btn btn-primary">Aceptado</a>
        <a href="<?php echo base_url(); ?>CEmpresa/rechazado/<?php
                            echo $datosUsuario->idUsuario.'/'.$idPropuesta;?>" class="btn btn-primary">Rechazado</a>                    
      </div>
    </div>
  </div>
</div>