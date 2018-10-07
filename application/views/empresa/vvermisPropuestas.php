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
                    <div class="box-body">
                        <div class="list-group">
                            <?php
                                if(isset($propuestas))
                                {
                                    foreach($propuestas as $pro){
                                    ?>
                                   <a href="<?php echo base_url(); ?>index.php/CEmpresa/verPropuesta/<?php echo $pro->idPropuesta ?>" class="list-group-item">
                                        <h4 class="list-group-item-heading"><?php echo $pro->titulo; ?></h4>
                                    
                                        Fecha de creación: <strong><?php echo $pro->fecha; ?></strong>
                                        <p class="list-group-item-text">
                                        Jornada: <strong><?php echo $pro->jornada; ?></strong>
                                        </p>
                                        <p class="list-group-item-text">
                                            Salario:$<strong><?php echo $pro->salario; ?></strong>
                                        </p>
                                    </a> 
                                    <?php
                                    }
                                }
                            ?>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>