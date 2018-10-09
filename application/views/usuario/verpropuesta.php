<div class="content-wrapper">
    <section class="content-header">
      <h1>
           Propuesta
        <small>Detalles</small>
      </h1>

    </section>

    <section class="content">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo $propuesta->titulo; ?></h3>
                                
                                      
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body ">
                                  
                                  
                                  <h4><strong>Descripción</strong></h4>
                                 
                                  <?php echo $propuesta->descripcion; ?>
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
                                  <p>
                                        <button type="button" class="btn btn-primary btn-lg btn-block">Postularme</button>
                                  </p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!--Informacion-->
                    <div class="col-md-3">
                            <div class="box box-primary">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Resumen del empleo</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                      <strong><i class="fa fa-book margin-r-5"></i> <?php echo $propuesta->titulo; ?></strong>
                        
                                      <p class="text-muted">
                                            
                                      </p>
                        
                                      <hr>
                        
                                      <strong><i class="fa fa-map-marker margin-r-5"></i> Fecha</strong>
                        
                                      <p class="text-muted"><?php echo $propuesta->fecha; ?> </p>
                                      <hr>
                                      <strong>Jornada</strong>
                                      <p class="text-muted">
                                      <?php echo $propuesta->jornada; ?>
                                      </p>
                                      <hr>
                        
                                      <strong><i class="fa fa-map-marker margin-r-5"></i> Salario</strong>
                        
                                      <p class="text-muted"><?php echo $propuesta->salario; ?> </p>
                                      <!--<hr>
                                      <strong>Conocmientos</strong>
                                      <p>
                                         
                                                    <span class="label label-danger">UI Design</span>
                                                    <span class="label label-success">Coding</span>
                                                    <span class="label label-info">Javascript</span>
                                                    <span class="label label-warning">PHP</span>
                                                    <span class="label label-primary">Node.js</span>
                                                 
                                      </p>-->
                                       </div>
                                    <!-- /.box-body -->
                            </div>
                            <div class="box box-primary">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Acerca de la empresa</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                      <strong><i class="fa fa-book margin-r-5"></i> NOMBRE: </strong><?php echo $propuesta->nombre; ?>
                        
                                      <p class="text-muted">Sector: 
                                      <?php echo $propuesta->sector; ?>
                                      </p>
                        
                                      <hr>
                        
                                      <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                        
                                      <p class="text-muted"><?php echo $propuesta->direccion ?> </p>
                        
                                       </div>
                                    <!-- /.box-body -->
                            </div>
                            
                    </div>
                </div>
    </section>

   