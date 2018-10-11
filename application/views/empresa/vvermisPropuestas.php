<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Propuestas realizadas
        </h1>

        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                        <h4>
                            Listado de Propuestas
                        </h4>
                    </div>
                    <div class="box-body" id ="listaMisPropuestas">
                        <div class="form-group">
                            <input class="search form-control" placeholder="Filtrar" />
                        </div>
                        <ul class="list list-group">
                                <?php if(isset($propuestas)){
                                    foreach($propuestas as $pos){
                                   ?>
                                 <li  class="list-group-item">
                                
                                   
                                    <p>
                                        <p>
                                            <h4 class="list-group-item-heading titulo"><?php echo $pos->titulo ?></h4>
                                    
                                        </p>
                                        Fecha de postulación: <strong class="fecha"><?php echo $pos->fecha ?></strong>
                                        <p class="list-group-item-text">
                                        Jornada: <strong class="jornada"><?php echo $pos->jornada ?></strong>
                                        </p>
                                        <p class="list-group-item-text">
                                            Salario: <strong class="salario"><?php echo $pos->salario ?></strong>
                                        </p>
                                    </p>
                                     
                                  
                                   </a>
                                   
                                 </li>
                 
                                 <?php } } ?>
                            
                                
                        </ul>
                        <ul class="pagination"></ul>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>