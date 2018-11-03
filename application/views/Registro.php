
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EmpleoSV - Pagina de registro</title>
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
    <a href="../../index2.html"><b>EMPLEO</b>SV</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Complete el formulario para registrarse!</p>
    <!--<form action="<?php echo base_url()."CRegistro/registrar" ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8"> -->
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
              <option value="AL">Albania</option>
              <option value="DE">Alemania</option>
              <option value="AD">Andorra</option>
              <option value="AO">Angola</option>
              <option value="AI">Anguilla</option>
              <option value="AQ">Antartida</option>
              <option value="AG">Antigua y Barbuda</option>
              <option value="AN">Antillas Holandesas</option>
              <option value="SA">Arabia Saudita</option>
              <option value="DZ">Argelia</option>
              <option value="AR">Argentina</option>
              <option value="AM">Armenia</option>
              <option value="AW">Aruba</option>
              <option value="AU">Australia</option>
              <option value="AT">Austria</option>
              <option value="BS">Bahamas</option>
              <option value="BH">Bahrein</option>
              <option value="BD">Bangladesh</option>
              <option value="BB">Barbados</option>
              <option value="BE">Belgica</option>
              <option value="BZ">Belice</option>
              <option value="BJ">Benin</option>
              <option value="BM">Bermudas</option>
              <option value="BY">Bielorrusia</option>
              <option value="MM">Birmania</option>
              <option value="BO">Bolivia</option>
              <option value="BA">Bosnia y Herzegovina</option>
              <option value="BW">Botswana</option>
              <option value="BR">Brasil</option>
              <option value="BN">Brunei</option>
              <option value="BG">Bulgaria</option>
              <option value="BF">Burkina Faso</option>
              <option value="BI">Burundi</option>
              <option value="CV">Cabo Verde</option>
              <option value="KH">Camboya</option>
              <option value="CM">Camerun</option>
              <option value="CA">Canada</option>
              <option value="TD">Chad</option>
              <option value="CL">Chile</option>
              <option value="CN">China</option>
              <option value="CY">Chipre</option>
              <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
              <option value="CO">Colombia</option>
              <option value="KM">Comores</option>
              <option value="CG">Congo</option>
              <option value="CD">Congo, RepÃºblica Democratica del</option>
              <option value="KR">Corea</option>
              <option value="KP">Corea del Norte</option>
              <option value="CI">Costa de Marfil</option>
              <option value="CR">Costa Rica</option>
              <option value="HR">Croacia (Hrvatska)</option>
              <option value="CU">Cuba</option>
              <option value="DK">Dinamarca</option>
              <option value="DJ">Djibouti</option>
              <option value="DM">Dominica</option>
              <option value="EC">Ecuador</option>
              <option value="EG">Egipto</option>
              <option value="SV">El Salvador</option>
              <option value="AE">Emiratos Ãrabes Unidos</option>
              <option value="ER">Eritrea</option>
              <option value="SI">Eslovenia</option>
              <option value="ES">España</option>
              <option value="US">Estados Unidos</option>
              <option value="EE">Estonia</option>
              <option value="ET">Etiopi­a</option>
              <option value="FJ">Fiji</option>
              <option value="PH">Filipinas</option>
              <option value="FI">Finlandia</option>
              <option value="FR">Francia</option>
              <option value="GM">Gambia</option>
              <option value="GE">Georgia</option>
              <option value="GH">Ghana</option>
              <option value="GI">Gibraltar</option>
              <option value="GD">Granada</option>
              <option value="GR">Grecia</option>
              <option value="GL">Groenlandia</option>
              <option value="GP">Guadalupe</option>
              <option value="GU">Guam</option>
              <option value="GT">Guatemala</option>
              <option value="GY">Guayana</option>
              <option value="GF">Guayana Francesa</option>
              <option value="GN">Guinea</option>
              <option value="GQ">Guinea Ecuatorial</option>
              <option value="GW">Guinea-Bissau</option>
              <option value="HT">Haiti</option>
              <option value="HN">Honduras</option>
              <option value="HU">Hungri­a</option>
              <option value="IN">India</option>
              <option value="ID">Indonesia</option>
              <option value="IQ">Irak</option>
              <option value="IR">Iran</option>
              <option value="IE">Irlanda</option>
              <option value="BV">Isla Bouvet</option>
              <option value="CX">Isla de Christmas</option>
              <option value="IS">Islandia</option>
              <option value="KY">Islas Caiman</option>
              <option value="CK">Islas Cook</option>
              <option value="CC">Islas de Cocos o Keeling</option>
              <option value="FO">Islas Faroe</option>
              <option value="HM">Islas Heard y McDonald</option>
              <option value="FK">Islas Malvinas</option>
              <option value="MP">Islas Marianas del Norte</option>
              <option value="MH">Islas Marshall</option>
              <option value="UM">Islas menores de Estados Unidos</option>
              <option value="PW">Islas Palau</option>
              <option value="SB">Islas Salomon</option>
              <option value="SJ">Islas Svalbard y Jan Mayen</option>
              <option value="TK">Islas Tokelau</option>
              <option value="TC">Islas Turks y Caicos</option>
              <option value="WF">Islas Wallis y Futuna</option>
              <option value="IL">Israel</option>
              <option value="IT">Italia</option>
              <option value="JM">Jamaica</option>
              <option value="JO">Jordania</option>
              <option value="KE">Kenia</option>
              <option value="KI">Kiribati</option>
              <option value="KW">Kuwait</option>
              <option value="LA">Laos</option>
              <option value="LS">Lesotho</option>
              <option value="LV">Letonia</option>
              <option value="LR">Liberia</option>
              <option value="LY">Libia</option>
              <option value="LI">Liechtenstein</option>
              <option value="LT">Lituania</option>
              <option value="LU">Luxemburgo</option>
              <option value="MK">Macedonia, Ex-RepÃºblica Yugoslava de</option>
              <option value="MG">Madagascar</option>
              <option value="MY">Malasia</option>
              <option value="MW">Malawi</option>
              <option value="MV">Maldivas</option>
              <option value="MT">Malta</option>
              <option value="MA">Marruecos</option>
              <option value="MQ">Martinica</option>
              <option value="MU">Mauricio</option>
              <option value="MR">Mauritania</option>
              <option value="YT">Mayotte</option>
              <option value="MX">Mexico</option>
              <option value="FM">Micronesia</option>
              <option value="MD">Moldavia</option>
              <option value="MC">Monaco</option>
              <option value="MN">Mongolia</option>
              <option value="MS">Montserrat</option>
              <option value="MZ">Mozambique</option>
              <option value="NA">Namibia</option>
              <option value="NR">Nauru</option>
              <option value="NP">Nepal</option>
              <option value="NI">Nicaragua</option>
              <option value="NG">Nigeria</option>
              <option value="NU">Niue</option>
              <option value="NF">Norfolk</option>
              <option value="NO">Noruega</option>
              <option value="NC">Nueva Caledonia</option>
              <option value="NZ">Nueva Zelanda</option>
              <option value="NL">Pai­ses Bajos</option>
              <option value="PA">Panama</option>
              <option value="PK">PaquistÃ¡n</option>
              <option value="PY">Paraguay</option>
              <option value="PN">Pitcairn</option>
              <option value="PF">Polinesia Francesa</option>
              <option value="PL">Polonia</option>
              <option value="PT">Portugal</option>
              <option value="PR">Puerto Rico</option>
              <option value="QA">Qatar</option>
              <option value="UK">Reino Unido</option>
              <option value="CF">Republica Centroafricana</option>
              <option value="CZ">Republica Checa</option>
              <option value="ZA">Republica de Sudafrica</option>
              <option value="DO">Republica Dominicana</option>
              <option value="SK">Republica Eslovaca</option>
              <option value="RW">Ruanda</option>
              <option value="RO">Rumania</option>
              <option value="RU">Rusia</option>
              <option value="EH">Sahara Occidental</option>
              <option value="KN">Saint Kitts y Nevis</option>
              <option value="WS">Samoa</option>
              <option value="AS">Samoa Americana</option>
              <option value="SM">San Marino</option>
              <option value="VC">San Vicente y Granadinas</option>
              <option value="SH">Santa Helena</option>
              <option value="SN">Senegal</option>
              <option value="SC">Seychelles</option>
              <option value="SL">Sierra Leona</option>
              <option value="SG">Singapur</option>
              <option value="SY">Siria</option>
              <option value="SO">Somalia</option>
              <option value="LK">Sri Lanka</option>
              <option value="PM">St. Pierre y Miquelon</option>
              <option value="SZ">Suazilandia</option>
              <option value="SE">Suecia</option>
              <option value="CH">Suiza</option>
              <option value="SR">Surinam</option>
              <option value="TH">Tailandia</option>
              <option value="TW">Taiwan</option>
              <option value="TZ">Tanzania</option>
              <option value="TF">Territorios franceses del Sur</option>
              <option value="TP">Timor Oriental</option>
              <option value="TG">Togo</option>
              <option value="TO">Tonga</option>
              <option value="TT">Trinidad y Tobago</option>
              <option value="TR">Turqui­a</option>
              <option value="TV">Tuvalu</option>
              <option value="UA">Ucrania</option>
              <option value="UG">Uganda</option>
              <option value="UY">Uruguay</option>
              <option value="VU">Vanuatu</option>
              <option value="VE">Venezuela</option>
              <option value="VN">Vietnam</option>
              <option value="YE">Yemen</option>
              <option value="YU">Yugoslavia</option>
              <option value="ZM">Zambia</option>
              <option value="ZW">Zimbabue</option>
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
            <input type="file" id="exampleInputFile" name="foto" required>
            <p class="help-block">Extención del archivo: jpg,png,jpeg.</p>
            <?php if ($error)
            {
              echo "<span class='error'>$error_archivo</span>";
            } ?>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="exampleInputFile">Curriculum Vitae</label>
            <input type="file" id="exampleInputFile" name="curriculum" required>
            <p class="help-block">Extención del archivo: pdf,doc,docx.</p>
            <?php if ($error)
            {
              echo "<span class='error'>$error_archivo</span>";
            } ?>
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

    <a href="login.html" class="text-center">Ya soy miembro. Ingresar con mi cuenta.</a>
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
</body>
</html>
