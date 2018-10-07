<div class="content-wrapper">
    <section class="content-header">
    <h1>
         Nueva Propuesta
        
    </h1>
    
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        
                    </div>
                    <div class="box-body">
                        <form method="post" action="<?php echo base_url() ?>CEmpresa/guardarPropuesta">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" required class="form-control" name="titulo"
                                 id="titulo" placeholder="Titulo">
                            </div>
                             <div class="form-group">
                                <label for="descripcion">Descripción</label>
                               
                                <textarea name="descripcion" id="descripcion" required class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; " 
                                placeholder="Descripción"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="conocimientos">Conocimientos</label>
                                    <select class="form-control selectpicker" required name="conocimientos[]" id="conocimientos" data-live-search="true" multiple>
                                            <?php
                                            if(isset($conocimientos))
                                            {
                                                foreach($conocimientos as $conocimiento)
                                                {
                                                    echo '<option value="'.$conocimiento->idConocimiento.'">'.$conocimiento->conocimientos.'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Jornada</label>
                               
                                <input type="text" name="jornada" id="jornada" required class="form-control" 
                                placeholder="Jornada">
                                
                            </div>
                            <div class="form-group">
                                <label for="salario">Salario</label>
                                <input type="text" name="salario" id="salario" required class="form-control" 
                                placeholder="Salario">
                            </div>
                           <!-- <div class="form-group">
                                <label for="descripcion">Prueba Tecnica</label>
                               
                                <input type="file" name="archivo" id="archivo">
                                <small>SOLO PDF</small>
                            </div>-->
                            <div class="form-group">
                                <button id="button" type="submit"  class="btn btn-primary">Realizar</button>
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
           <div class="col-md-4">
                <div class="box box-success" id="boxAgregarConocimiento">
                    <div class="box-header">
                        ¿No encuentrás el conocimiento? <strong>Agregalo</strong>
                    </div>
                    <div class="box-body">
                        <div id="mensajeUpdate">

                        </div>
                        <div class="form-group">
                            <label for="conocimientoAdd">Conocimiento</label>
                            <input class="form-control" type="text" name="conocimientoAdd" id="conocimientoAdd">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="AgregarConocimientoBoton">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>