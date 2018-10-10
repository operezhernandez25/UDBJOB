<div class="content-wrapper">
<section class="content-header">
  <h1>
    Perfil del Usuario
  </h1>
</section>

<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
              foreach($usuario as $usu)
              {
              ?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>/public/photos/<?php echo $usu->foto?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo $usu->nombres." ".$usu->apellidos; ?></h3>

              <p class="text-muted text-center"><?php echo $usu->email ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Fecha nacimiento</b> <a class="pull-right"><?php echo $usu->fechaNacimiento ?></a>
                </li>
                <li class="list-group-item">
                  <b>Genero</b> <a class="pull-right"><?php echo $usu->genero ?></a>
                </li>
                <li class="list-group-item">
                  <b>Estado Civil</b> <a class="pull-right"><?php echo $usu->estadoCivil ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <strong><i class="fa fa-map margin-r-5"></i> Pais</strong>

              <p class="text-muted"><?php echo $usu->pais ?></p>

              <hr>

              <strong><i class="fa  fa-map-signs margin-r-5"></i> Departamento</strong>

              <p class="text-muted"><?php echo $usu->departamento ?></p>

              <hr>

              <strong><i class="fa fa-map-pin margin-r-5"></i> Ciudad</strong>

              <p class="text-muted"><?php echo $usu->ciudad ?></p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>

              <p class="text-muted"><?php echo $usu->direccion ?></p>

              <hr>

              <strong><i class="fa fa-phone-square margin-r-5"></i> Telefonos</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-skype margin-r-5"></i> Skype</strong>

              <p class="text-muted"><?php echo $usu->skype ?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Conocimientos</strong>

              <p>
                <?php
                  function colorRandom()
                  {
                    $color=rand(1,5);
                    if ($color==1) {
                      return "danger";
                    }
                    elseif ($color==2) {
                      return "warning";
                    }
                    elseif ($color==3) {
                      return "success";
                    }
                    elseif ($color==4) {
                      return "primary";
                    }
                    elseif ($color==5) {
                      return "info";
                    }
                  }

                foreach($conocimientos as $skill)
                {
                ?>
                <span class="label label-<?php echo colorRandom(); ?>"><?php echo $skill->conocimientos ?></span>
                <?php
                }
                ?>
              </p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <?php
          }
          ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li class="active"><a href="#settings" data-toggle="tab">Datos Generales</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class=" active tab-pane" id="settings">
                <form class="form-horizontal">
                  <?php
                  foreach($usuario as $usu)
                  {
                  ?>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-user margin-r-5"></i> Nombres</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" id="nombreModificar" value="<?php echo $usu->nombres ?>" name="Modificar" placeholder="Nombres" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-user margin-r-5"></i> Apellidos</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" id="nombreModificar" value="<?php echo $usu->apellidos ?>" name="Modificar" placeholder="Apellidos" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-calendar margin-r-5"></i> Fecha nacimiento</label>
                    <div class="col-sm-8 input-group">
                        <input type="date" class="form-control" id="nombreModificar" value="<?php echo $usu->fechaNacimiento ?>" name="Modificar" placeholder="Fecha nacimiento" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-calendar margin-r-5"></i> Genero</label>
                    <div class="col-sm-8 input-group">
                      <select id="cmbNacionalidad" name="cmbNacionalidad" class="form-control selectpicker" data-live-search="true" required>
                        <option value="" selected>Seleccione su Pais</option>
                        <option value="Albania">Albania</option>
                        <option value="Alemania">Alemania</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antartida">Antartida</option>
                        <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                        <option value="Antillas Holandesas">Antillas Holandesas</option>
                        <option value="Arabia Saudita">Arabia Saudita</option>
                        <option value="Argelia">Argelia</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrein">Bahrein</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belgica">Belgica</option>
                        <option value="Belice">Belice</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermudas">Bermudas</option>
                        <option value="Bielorrusia">Bielorrusia</option>
                        <option value="Birmania">Birmania</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cabo Verde">Cabo Verde</option>
                        <option value="Camboya">Camboya</option>
                        <option value="Camerun">Camerun</option>
                        <option value="Canada">Canada</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Chipre">Chipre</option>
                        <option value="Ciudad del Vaticano (Santa Sede)">Ciudad del Vaticano (Santa Sede)</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comores">Comores</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, RepÃºblica Democratica del">Congo, RepÃºblica Democratica del</option>
                        <option value="Corea">Corea</option>
                        <option value="Corea del Norte">Corea del Norte</option>
                        <option value="Costa de Marfil">Costa de Marfil</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croacia (Hrvatska)">Croacia (Hrvatska)</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Dinamarca">Dinamarca</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egipto">Egipto</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Emiratos Ãrabes Unidos">Emiratos Ãrabes Unidos</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Eslovenia">Eslovenia</option>
                        <option value="España">España</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Etiopi­a">Etiopi­a</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Filipinas">Filipinas</option>
                        <option value="Finlandia">Finlandia</option>
                        <option value="Francia">Francia</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Granada">Granada</option>
                        <option value="Grecia">Grecia</option>
                        <option value="Groenlandia">Groenlandia</option>
                        <option value="Guadalupe">Guadalupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guayana">Guayana</option>
                        <option value="Guayana Francesa">Guayana Francesa</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungri­a">Hungri­a</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Irak">Irak</option>
                        <option value="Iran">Iran</option>
                        <option value="Irlanda">Irlanda</option>
                        <option value="Isla Bouvet">Isla Bouvet</option>
                        <option value="Isla de Christmas">Isla de Christmas</option>
                        <option value="Islandia">Islandia</option>
                        <option value="Islas Caiman">Islas Caiman</option>
                        <option value="Islas Cook">Islas Cook</option>
                        <option value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>
                        <option value="Islas Faroe">Islas Faroe</option>
                        <option value="Islas Heard y McDonald">Islas Heard y McDonald</option>
                        <option value="Islas Malvinas">Islas Malvinas</option>
                        <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                        <option value="Islas Marshall">Islas Marshall</option>
                        <option value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>
                        <option value="Islas Palau">Islas Palau</option>
                        <option value="Islas Salomon">Islas Salomon</option>
                        <option value="Islas Svalbard y Jan Mayen">Islas Svalbard y Jan Mayen</option>
                        <option value="Islas Tokelau">Islas Tokelau</option>
                        <option value="Islas Turks y Caicos">Islas Turks y Caicos</option>
                        <option value="Islas Wallis y Futuna">Islas Wallis y Futuna</option>
                        <option value="Israel">Israel</option>
                        <option value="Italia">Italia</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Jordania">Jordania</option>
                        <option value="Kenia">Kenia</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Laos">Laos</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Letonia">Letonia</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libia">Libia</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lituania">Lituania</option>
                        <option value="Luxemburgo">Luxemburgo</option>
                        <option value="Macedonia, Ex-RepÃºblica Yugoslava de">Macedonia, Ex-RepÃºblica Yugoslava de</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malasia">Malasia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldivas">Maldivas</option>
                        <option value="Malta">Malta</option>
                        <option value="Marruecos">Marruecos</option>
                        <option value="Martinica">Martinica</option>
                        <option value="Mauricio">Mauricio</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia">Micronesia</option>
                        <option value="Moldavia">Moldavia</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk">Norfolk</option>
                        <option value="Noruega">Noruega</option>
                        <option value="Nueva Caledonia">Nueva Caledonia</option>
                        <option value="Nueva Zelanda">Nueva Zelanda</option>
                        <option value="Pai­ses Bajos">Pai­ses Bajos</option>
                        <option value="Panama">Panama</option>
                        <option value="PaquistÃ¡n">PaquistÃ¡n</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Polinesia Francesa">Polinesia Francesa</option>
                        <option value="Polonia">Polonia</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reino Unido">Reino Unido</option>
                        <option value="Republica Centroafricana">Republica Centroafricana</option>
                        <option value="Republica Checa">Republica Checa</option>
                        <option value="Republica de Sudafrica">Republica de Sudafrica</option>
                        <option value="Republica Dominicana">Republica Dominicana</option>
                        <option value="Republica Eslovaca">Republica Eslovaca</option>
                        <option value="Ruanda">Ruanda</option>
                        <option value="Rumania">Rumania</option>
                        <option value="Rusia">Rusia</option>
                        <option value="Sahara Occidental">Sahara Occidental</option>
                        <option value="Saint Kitts y Nevis">Saint Kitts y Nevis</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa Americana">Samoa Americana</option>
                        <option value="San Marino">San Marino</option>
                        <option value="San Vicente y Granadinas">San Vicente y Granadinas</option>
                        <option value="Santa Helena">Santa Helena</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leona">Sierra Leona</option>
                        <option value="Singapur">Singapur</option>
                        <option value="Siria">Siria</option>
                        <option value="Somalia">Somalia</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="St. Pierre y Miquelon">St. Pierre y Miquelon</option>
                        <option value="Suazilandia">Suazilandia</option>
                        <option value="Suecia">Suecia</option>
                        <option value="Suiza">Suiza</option>
                        <option value="Surinam">Surinam</option>
                        <option value="Tailandia">Tailandia</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Territorios franceses del Sur">Territorios franceses del Sur</option>
                        <option value="Timor Oriental">Timor Oriental</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                        <option value="Turqui­a">Turqui­a</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Ucrania">Ucrania</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Yugoslavia">Yugoslavia</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabue">Zimbabue</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-calendar margin-r-5"></i> Estado civil</label>
                    <div class="col-sm-8 input-group">
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-map-pin margin margin-r-5"></i> Ciudad</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" id="nombreModificar" value="<?php echo $usu->ciudad ?>" name="Modificar" placeholder="Ciudad" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-map-marker margin-r-5"></i> Dirección</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" id="nombreModificar" value="<?php echo $usu->direccion ?>" name="Modificar" placeholder="Dirección" required>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-skype margin-r-5"></i> Skype</label>
                    <div class="col-sm-8 input-group">
                        <input type="text" class="form-control" id="nombreModificar" value="<?php echo $usu->skype ?>" name="Modificar" placeholder="Skype" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label"><i class="fa fa-at margin-r-5"></i> E-mail</label>
                    <div class="col-sm-8 input-group">
                        <input type="email" class="form-control" id="nombreModificar" value="<?php echo $usu->email ?>" name="Modificar" placeholder="E-mail" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                      <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-refresh margin-r-5"></i> Actualizar información</button>
                    </div>
                  </div>

                  <?php
                  }
                  ?>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
