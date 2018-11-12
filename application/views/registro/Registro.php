
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Computrabajo - Pagina de registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page" style="background-image: url('<?php echo base_url(); ?>public/img/login.png'); background-repeat: no-repeat;background-size: cover;">
<div class="register-box" style="border: 3px solid #000000; width:60%">
  <div class="register-logo">
    <a href="../../index2.html"><b>Computrabajo</b>SV</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Complete el formulario para registrarse!</p>
    <?php if ($error)
    {
      echo "<div class='alert alert-danger'>
            <strong>¡Error!</strong> $error_archivo.
            </div>";
    } ?>
    <?php echo form_open_multipart('CRegistro/registrar'); ?>
      <div class="row">
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Apellidos" name="apellido" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="date" class="form-control" placeholder="Fecha nacimiento" name="fechanac" required>
            <span class="fa fa-calendar form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group has-feedback">
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
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
          <label>Genero</label>
          <div class="radio">
            <label>
              <input type="radio" name="rbGenero" id="optionsRadios1" value="Masculino" checked="">
              Masculino
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="rbGenero" id="optionsRadios2" value="Femenino">
              Femenino
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="rbGenero" id="optionsRadios3" value="Otro">
              Otro
            </label>
          </div>
        </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label>Estado civil</label>
            <div class="radio">
              <label>
                <input type="radio" name="rbEstadoC" id="optionsRadios1" value="Soltero/a"  checked="">
                Soltero/a
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="rbEstadoC" id="optionsRadios2" value="Casado/a">
                Casado/a
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="rbEstadoC" id="optionsRadios3" value="Otro">
                Otro
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Correo electronico" name="email" required>
            <span class="fa fa-at form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
            <span class="fa fa-phone-square form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Departamento/Provincia" name="departamento" required>
            <span class="fa fa-map form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" required>
            <span class="fa fa-map-marker form-control-feedback"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
            <span class="fa fa-map-signs form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Skype" name="skype" required>
            <span class="fa fa-skype form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Verifique el password" name="confirm" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">Foto</label>
            <input type="file" id="foto" name="foto" required>
            <p class="help-block">Extención del archivo: jpg,png,jpeg.</p>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">Curriculum Vitae</label>
            <input type="file" id="curriculum" name="curriculum" required>
            <p class="help-block">Extención del archivo: pdf,doc,docx.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">DUI</label>
            <input type="file" id="dui" name="dui" required>
            <p class="help-block">Extención del archivo: pdf,jpg,png,jpeg.</p>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">NIT</label>
            <input type="file" id="nit" name="nit" required>
            <p class="help-block">Extención del archivo: pdf,jpg,png,jpeg.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">Solvencia policial</label>
            <input type="file" id="solvencia" name="solvencia" required>
            <p class="help-block">Extención del archivo: pdf,jpg,png,jpeg.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="registrar" class="btn btn-primary btn-block btn-flat">Registrarse </button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo base_url();?>/CLogin" class="text-center">Ya soy miembro. Ingresar con mi cuenta.</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>public/plugins/iCheck/icheck.min.js"></script>

<script>
(function($) {
    $.fn.checkFileType = function(options) {
        var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
        };
        options = $.extend(defaults, options);

        return this.each(function() {

            $(this).on('change', function() {
                var value = $(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);

                if ($.inArray(extension, options.allowedExtensions) == -1) {
                    options.error();
                    $(this).focus();
                } else {
                    options.success();

                }

            });

        });
    };

})(jQuery);

$(function() {
    $('#foto').checkFileType({
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        error: function() {
            alert('Error. Extensión del archivo incorrecta, por favor suba el archivo con las extensión indicada.');
        }
    });
    $('#curriculum').checkFileType({
        allowedExtensions: ['pdf', 'doc', 'docx'],
        error: function() {
            alert('Error. Extensión del archivo incorrecta, por favor suba el archivo con las extensión indicada.');
        }
    });
    $('#dui').checkFileType({
        allowedExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        error: function() {
            alert('Error. Extensión del archivo incorrecta, por favor suba el archivo con las extensión indicada.');
        }
    });
    $('#nit').checkFileType({
        allowedExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        error: function() {
            alert('Error. Extensión del archivo incorrecta, por favor suba el archivo con las extensión indicada.');
        }
    });
    $('#solvencia').checkFileType({
        allowedExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        error: function() {
            alert('Error. Extensión del archivo incorrecta, por favor suba el archivo con las extensión indicada.');
        }
    });

});
</script>
</body>
</html>
