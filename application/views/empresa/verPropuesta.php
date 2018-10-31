<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Propuesta
        </h1>


    </section>
    <section class="content">
        <div class="row">

                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header">
                            <p>
                                <h4>Información de la propuesta</h4>
                            </p>
                        </div>
                        <div class="box-body">
                            <p><strong>Titulo:</strong> <?php echo $datosPropuesta->titulo; ?></p>
                            <p><strong>Descripción</strong> </p>
                            <?php echo $datosPropuesta->descripcion; ?>
                            <p><strong>Jornada: </strong> <?php echo $datosPropuesta->jornada; ?></p>
                            <p><strong>Salario: </strong> <?php echo $datosPropuesta->salario; ?></p>
                            <p><strong>Conocimientos</strong></p>
                            <ul class="list-group">
                                <?php
                                    if(isset($conocimientos))
                                    {
                                        foreach($conocimientos as $cono)
                                        {
                                            echo '<li class="list-group-item">'.$cono->conocimientos.' </li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <p>
                                <h4>Listado de aplicantes</h4>
                            </p>
                        </div>
                        <div class="box-body">
                            <ul class="list-group">
                                <?php
                                    if(isset($postulaciones))
                                    {
                                        foreach($postulaciones as $pos)
                                        {
                                            ?>
                                <li class="list-group-item">
                                
                                    <p>   <a href="<?php echo base_url(); ?>CEmpresa/perfilPostulante/<?php echo $pos->idUsuario.'/'.$datosPropuesta->idPropuesta;?>" class="btn btn-primary btn-sm pull-right">Ver Perfil</a>
                                        Nombre Postulante: <strong><?php echo $pos->nombreUsuario ?></strong><?php if($pos->contador>0){ ?> - <span class="label label-primary "><?php echo $pos->contador ?> </span> <?php } ?><br>
                                       Fecha Postulación: <strong><?php echo $pos->fecha ?></strong><br>
                                        Estado: <strong>
                                                <?php
                                                    switch($pos->estado)
                                                    {
                                                        case 0: 
                                                            echo 'Pendiente de revisión';
                                                            break;
                                                        case 1: 
                                                            echo 'Preseleccionado';
                                                            break;
                                                        case 2:
                                                            echo 'Pruebas Realizadas';
                                                            break;
                                                        case 3:
                                                            echo 'Entrevista Realizada';
                                                            break;
                                                        case 4:
                                                            echo 'Valoración y decisión';
                                                            break;  
                                                        case 5:
                                                            echo 'Contratado';
                                                            break;
                                                        case 6  :
                                                            echo 'Contratado';
                                                            break;             
                                                    }
                                                ?>
                                                </strong>
                                    </p>
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
        </div>
    </section>
