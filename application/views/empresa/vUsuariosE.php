<div class="content-wrapper">
 <section class="content-header">
   <h1>Usuarios
     <small>Usuarios de la empresa</small>
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
<hr>
<div class="box box-solid">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
      <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Listado usuarios</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Nuevo</a></li>
  </ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <br><br>
    <div class="table-responsive">
        <table id="tablaBase" class="table  table-bordered btn-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>E-mail</th>
              <th>Tipo de usuario</th>
              <th>Controles</th>
            </tr>
          </thead>
          <tbody>
            <?php
                if(isset($usuariose))
                {
                  foreach($usuariose as $usuario)
                  {
                  ?>
                  <tr>
                  <td><?php echo $usuario->idUsuarioEmpresa ?> </td>
                  <td class="classNombre"><?php echo $usuario->nombre ?></td>
                  <td class="classApellido"><?php echo $usuario->apellido ?></td>
                  <td class="classCorreo"><?php echo $usuario->correoElectronico ?></td>
                  <?php if ($usuario->tipoUsuario == 0): ?>
                    <td class="classTipo"><span class="label label-info">Administrador</span></td>
                  <?php else: ?>
                    <td class="classTipo"><span class="label label-success">Empleado</span></td>
                  <?php endif; ?>

                  <td style="width:5%">
                    <a class="btn btn-success btn-block modificarBoton"
                    idMod="<?php echo $usuario->idUsuarioEmpresa; ?>"
                    nombre="<?php echo $usuario->nombre ?>"
                    apellido="<?php echo $usuario->apellido ?>"
                    correo="<?php echo $usuario->correoElectronico ?>"
                    idTipo="<?php echo $usuario->tipoUsuario ?>"
                    img="<?php echo $usuario->img; ?>"
                    title="Editar">Ver y Modificar <span class="fa fa-pencil"></span></a>
                    <a class="btn btn-danger btn-block eliminarBoton"
                    idEli="<?php echo $usuario->idUsuarioEmpresa; ?>"
                    title="Editar">Eliminar <span class="fa fa-close"></span></a>
                  </td>
                  </t>
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
    <!--Tab para nuevo-->
    <div role="tabpanel" class="tab-pane" id="profile">
                    <div class ="col-md-1">
                    </div>
                    <form action="<?php echo base_url();?>CUsuarioE/setUserE" id="formNuevo" method="POST" role="form">
                      <div class ="col-md-4">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="thumbnail">
                             <!-- <img src="https://static.iris.net.co/soho/upload/images/2018/2/19/52471_1.jpg" alt="...">-->
                              <div class="row">
                                <center><div class ="col-md-6">
                                  <canvas id="resultCanvas1" width="280" height="280" style="border:1px solid #d3d3d3;"></canvas>
                                </div>
                                <div class="col-md-3"></div>
                              </div>
                              <div class="caption">
                                <p>Imagen a guardar</p>
                                <div class="form-group">
                                  <label class="btn btn-default">
                                    <input type="file" id="imagenGuardar" name="imagenGuardar" onchange="validacion= validate_fileupload(this);">
                                    </label>
                                  <p class="help-block">Foto de perfil.</p>
                                </div>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class ="col-md-6">
                        <input type="hidden" name="imgSend" id="imgSend" value="">
                        <input type="hidden" name="nombreArchivo" id="nombreArchivo" value="">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="nombreModificar">Nombres</label>
                                <input type="text" class="form-control" id="nombreIngresar" name="nombreIngresar" placeholder="Nombres">
                              </div>
                              <div class="form-group">
                                <label for="nombreModificar">Apellidos</label>
                                <input type="text" class="form-control" id="apellidoIngresar" name="apellidoIngresar" placeholder="Apellidos">
                              </div>
                              <div class="form-group">
                                <label for="cantidadModificar">Tipo de usuario</label>
                                <select class="selectpicker form-control" data-live-search="true" name="selectuser" id="selectuser">
                                  <option value="0">Administrador</option>
                                  <option value="1">Empleado</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nombreModificar">E-mail</label>
                                <input type="email" class="form-control" id="correoIngresar" name="correoIngresar" placeholder="E-mail">
                              </div>
                              <div class="form-group">
                                <label for="nombreModificar">Password</label>
                                <input type="password" class="form-control" id="passIngresar" name="passIngresar" placeholder="Contraseña">
                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Guardar usuario</button>
                            </div>

                    </div>
                    </form>
                    <div class ="col-md-1">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- Modal para modificar dependencias -->
  <div class="modal fade" id="modal-modificar">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Modificar Usuario</h4>
                    </div>
                    <div class="modal-body box" id="modalboddy">
                      <input type="hidden" name="imgSendMod" id="imgSendMod" value="">
                      <input type="hidden" name="idModificar" id="idModificar">
                        <input type="hidden" name="nombreArchivoMod" id="nombreArchivoMod" value="">
                            <div class="box-body">
                              <div id="mensajeUpdate"></div>
                      <form action="" method="POST" role="form">
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="form-group">
                          <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <div class="thumbnail">
                               <div class="row">
                                  <div class="col-md-2"></div>
                                  <div class ="col-md-6">
                                    <canvas id="modificarCanvas" width="250" height="250" style="border:1px solid #d3d3d3;"></canvas>
                                  </div>
                                  <div class="col-md-3"></div>
                                </div>
                                <div class="caption">
                                  <p>Imagen a guardar</p>
                                  <div class="form-group">
                                  <div class="input-group">
                                    <label class="btn btn-default">
                                      <input type="file" id="imagenGuardarMod" name="imagenGuardarMod" onchange="validacionUpdate= validate_fileupload(this);">
                                      </label>

                                    <div class="input-group-btn">
                                      <button type="button" id="actualizarImagen" class="btn btn bg-aqua color-palette">Actualizar</button>
                                    </div>
                                  </div>
                                    <p class="help-block">Imagen de perfil.</p>
                                  </div>
                                 </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                        <div class="col-xs-6">
                          <div class="form-group">
                            <label for="nombreModificar">Nombres</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nombreModificar" value="" name="nombreModificar" placeholder="Nombres">
                                <div class="input-group-btn">
                                  <button type="button" id="actualizarNombre" class="btn bg-aqua color-palette">Actualizar</button>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="nombreModificar">Apellidos</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="apellidoModificar" value="" name="apellidoModificar" placeholder="Apellidos">
                                <div class="input-group-btn">
                                  <button type="button" id="actualizarApellido" class="btn bg-aqua color-palette">Actualizar</button>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="nombreModificar">E-mail</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="correoModificar" value="" name="correoModificar" placeholder="E-mail">
                                <div class="input-group-btn">
                                  <button type="button" id="actualizarCorreo" class="btn bg-aqua color-palette">Actualizar</button>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="cantidadModificar">Tipo de usuario</label>
                            <div class="input-group">
                              <select class="selectpicker form-control" data-live-search="true" name="cmbtipoModificar" id="cmbtipoModificar">
                                <option value="0">Administrador</option>
                                <option value="1">Empleado</option>
                              </select>
                              <div class="input-group-btn">
                                  <button type="button" id="actualizarTipo" class="btn bg-aqua color-palette">Actualizar</button>
                                </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                      </div>
                      </form>

                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
  </div>
<!--Fin modal para modificar -->
<!-- Modal para eliminar una base -->
        <div class="modal fade" id="modal-eliminar" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Desactivar Usuario</h4>
              </div>
              <div class="modal-body">
                <p>Al dar click en aceptar se desactivara al Usuario</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                  <form method="post" action="<?php echo base_url(); ?>index.php/CUsuarioE/deleteUsere" onsubmit="eliminar()">
                    <input type="hidden" name="id" id="idEliminar">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                  </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
