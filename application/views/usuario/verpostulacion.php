<div class="content-wrapper">
    <section class="content-header">
    <h1>
         Postulación
        <small>Detalles</small>
    </h1>
    
    </section>
    <section class="content">
        <div class="row">
            <div class="row fixed-row-bottom" >
                <?php if($postulacion->estado>1)
                {

                ?>  
                <div class="col-md-4 col-sm-6  chat-caja" >
                            <div class="box box-warning direct-chat direct-chat-warning ">
                                    <div class="box-header with-border">
                                    <h3 class="box-title">Chat Directo</h3>
                    
                                    <div class="box-tools pull-right">
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
                                                    if($men->remitente==1)
                                                    {
                                                        ?>
                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                          <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">Yo</span>
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
                                                    }else if($men->remitente==0)
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
                                        <span class="input-group-addon bg-green">Enter</span>
                                        </div>
                                    
                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>    
        <div class="row" id="row-principal">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header " >
                        <h3 class="box-title"><?php echo $postulacion->titulo ?></h3>
                    </div>
                    <div class="box-body ">
                            <p><STRONG>Empresa: </STRONG> <?php echo $postulacion->empresa ?></p> 
                            <p><strong>Dirección: </strong><?php echo $postulacion->direccion ?></p>
                            <p><strong>País: </strong><?php echo $postulacion->pais ?></p>
                            <hr>
                            <h5><strong>Descripcion</strong></h5>
                           
                            <?php echo $postulacion->descripcion ?>
                            <hr>
                            <h5><strong>Conocimientos Necesarios</strong></h5>
                                  <ul class="list-group">
                                  <?php 
                                                foreach($conocimientos as $cono)
                                                {
                                                ?>
                                            <li class="list-group-item"><?php echo $cono->conocimientos ?></li>
                                                <?php
                                                
                                                }
                                            ?>
                                  </ul>
                           
                      </div>
                      <!-- /.box-body -->
                </div>     
            </div>
            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                    <h4 class="box-title">
                        <?php 
                            switch($postulacion->estado)
                            {
                                case 0:echo 'Postulación enviada'; break;
                                case 1: echo 'Perfil Visto'; break;
                                case 2: echo 'Chat habilitado'; break;
                                case 3: echo 'Entrevista por Skype Realizada'; break;
                            }
                        ?>
                    </h4>
                    </div>
                    <div class="box-body">
                        <ul class="timeline">

                           <!-- timeline time label -->
                           <li class="time-label">
                                <span class="bg-green">
                                        <?php echo $postulacion->fecha; ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-check-square bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>  <?php echo $postulacion->fecha; ?></span>

                                    <h3 class="timeline-header"><a href="#">Postulación</a></h3>

                                    <div class="timeline-body">
                                       
                                    </div>

                                    <div class="timeline-footer">
                                       
                                    </div>
                                </div>
                            </li>
                            <?php
                                if(count($eventos)>0)
                                {
                                    ?>
                                    <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-green">
                                        <?php echo $eventos[0]->fecha; ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-check-square bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>  <?php echo $eventos[0]->hora; ?></span>

                                    <h3 class="timeline-header"><a href="#">Perfil Visto</a></h3>

                                    <div class="timeline-body">
                                        ¡Tu perfil fue visto por la empresa!
                                    </div>

                                    <div class="timeline-footer">
                                        
                                    </div>
                                </div>
                            </li>
                                    <?php
                                }
                                if(count($eventos)>1)
                                {

                            ?>
                            <!-- timeline time label -->
                           <li class="time-label">
                                <span class="bg-green">
                                <?php echo $eventos[1]->fecha; ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-check-square bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>  <?php echo $eventos[1]->hora; ?></span>

                                    <h3 class="timeline-header"><a href="#">Chat Habilitado</a></h3>

                                    <div class="timeline-body">
                                        ¡El chat directo fue habilitado!
                                    </div>

                                    <div class="timeline-footer">
                                       
                                    </div>
                                </div>
                            </li>
                            <?php  }
                            if(count($eventos)>1)
                            {
                            ?>
                            <!-- timeline time label -->
                           <li class="time-label">
                                <span class="bg-green">
                                <?php echo $eventos[1]->fecha; ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-check-square bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>  <?php echo $eventos[1]->hora; ?></span>

                                    <h3 class="timeline-header"><a href="#">Entrevista virtual Realizada</a></h3>

                                    <div class="timeline-body">
                                        ¡Entrevista por videoLlamada Realizada!
                                    </div>

                                    <div class="timeline-footer">
                                       
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                            <li class="time-label">
                                <span class="bg-red">
                                        Finalización
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
       
           
    </section>

    <style>
    .chat-caja {
   position: fixed;
   z-index:50000;
  
   left: 0;
   
   bottom: 0;
   padding: 10px;
   margin: 0 auto;
}


</style>



