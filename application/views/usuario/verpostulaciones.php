<div class="content-wrapper">
    <section class="content-header">
      <h1>
           Mis postulaciones
        <small>Detalles</small>
      </h1>

    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header " >
              <h3 class="box-title">Listado</h3>
            </div>
            <div class="box-body" id="test-list">
            <div class="form-group">
            <input class="search form-control" placeholder="Fitrar" />
            </div>
              <ul class="list list-group" >
                <?php if(isset($postulaciones)){
                   foreach($postulaciones as $pos){
                  ?>
                <li  class="list-group-item">
                    
                  
                  <a class="list-group-item" style="border: 0ch;" href="<?php echo base_url(); ?>index.php/CUsuario/verPostulacion/<?php echo $pos->idPropuesta ?>">
                  <?php
                    
                    if($pos->cont>0)
                    {
                      
                     echo ' <br><span class="badge bg-green">'.$pos->cont.'</span>';
                      
                    }

                    ?>
                 <span class="badge bg-blue"><?php switch($pos->estado){
                    case 0:echo 'Postulación'; break;
                    case 1: echo 'Preselección'; break;
                    case 2: echo 'Pruebas'; break;
                    case 3: echo 'Entrevista'; break;
                    case 4: echo 'Valoración y decisión'; break;
                    case 5: echo 'Seguimiento finalizado'; break;
                    } 
                    
                    ?>
                    
                    
                  </span>  
                  <h4 class="list-group-item-heading titulo"><?php echo $pos->titulo ?></h4>
                  
                      Fecha de postulación: <strong class="fecha"><?php echo $pos->fecha ?></strong>
                    <p class="list-group-item-text">
                      Jornada: <strong class="jornada"><?php echo $pos->jornada ?></strong>
                    </p>
                    <p class="list-group-item-text">
                        Salario: <strong class="salario"><?php echo $pos->salario ?></strong>
                    </p>
                    
                 
                  </a>
                  
                </li>

                <?php } } ?>
              </ul>
              <ul class="pagination"></ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Postulaciones</span>
              <span class="info-box-number"><?php echo $contador ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      </div> 

    </section>

