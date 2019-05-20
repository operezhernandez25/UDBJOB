
$(document).ready(function()
{
  //funcion para cargar datos de los cmb en vista Perfil
  infoUsuario();
  //funcion para listar conocimientos del usuario en vista Perfil
  conocimientosUsuario();


  //validaciones para modificar el perfil del usuario
  $('#formNuevo').submit(function(e) {
      if($("#nombreModificar").val()=="")
      {
          $( "#nombreModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#nombreModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#nombreModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#apellidoModificar").val()=="")
      {
          $( "#apellidoModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#apellidoModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#apellidoModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#departamentoModificar").val()=="")
      {
          $( "#departamentoModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#departamentoModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#departamentoModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#ciudadModificar").val()=="")
      {
          $( "#ciudadModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#ciudadModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#ciudadModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#direccionModificar").val()=="")
      {
          $( "#direccionModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#direccionModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#direccionModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#skypeModificar").val()=="")
      {
          $( "#skypeModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#skypeModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#skypeModificar" ).closest( ".form-group" ).removeClass( "has-error" );

      if($("#emailModificar").val()=="")
      {
          $( "#emailModificar" ).closest( ".form-group" ).addClass( "has-error" );
          $( "#emailModificar" ).focus();
          e.preventDefault();
          return false;
      }else $( "#emailModificar" ).closest( ".form-group" ).removeClass( "has-error" );

    });

    //funcion agregar conocimientos
    $("#btnAddConocimiento").click(function()
    {
      conocimientosModal();
      $("#newConocimiento").val('');
    });

    //Boton para agregar un Nuevo Conocimiento al usuario
    $('#mbtnAgregarConocimiento').click(function(){
      //Desabilitando el boton si tiene la clase disabled
      if($("#mbtnAgregarConocimiento").hasClass("disabled"))
      {
        return false;
      }

      //validando el modal
      //mbtnAgregarConocimiento
      if($("#mcmbConocimientos").val()==0)//validando que se selecciono un conocimiento
      {
        $("#mcmbConocimientos").closest( ".form-group" ).addClass( "has-error" );
        $("#mcmbConocimientos").focus();
        return false;
      }

        $.ajax({
          url: baseurl+'index.php/CUsuario/ingresarConocimientoUser',
          method: 'post',
          data:{
              mcmbConocimientos:$("#mcmbConocimientos").val(),
              },
              beforeSend: function(){
                $("#mbtnAgregarConocimiento").addClass("disabled");
                $("#modalboddy").append(
                          '<div class="overlay">'+
                            '<i class="fa fa-refresh fa-spin"></i>'+
                            '</div>');
                          },
              success: function(data) {
                $("#mbtnAgregarConocimiento").removeClass("disabled");
                data=JSON.parse(data);
                $('#ListarSub').append(
                  '<li id="Lista-'+data.idConocimiento+'">'+
                  '<small class="label label-'+RandColor()+'" style="font-size: 13px">'+$("#mcmbConocimientos :selected").text()+'</small>'+
                  '<div class="tools">'+
                  '<i class="fa fa-trash-o eliminarRequerimientos" idElement="'+data.idConocimiento+'" nombre="'+$("#mcmbConocimientos :selected").text()+'" name="btnDelete" id="btnDelete"></i>'+
                  '</div>'+
                  '</li>'
                );
                $("#modal-success").modal('hide');
                $(".overlay").remove();
              },
              error: function()
              {
                alert("Error de conexión!");
              }
            });
    });

    //Boton para agregar un Nuevo Conocimiento
    $('#btnNuevoConocimiento').click(function(){
      //Desabilitando el boton si tiene la clase disabled
      if($("#btnNuevoConocimiento").hasClass("disabled"))
      {
        return false;
      }

      //validando el modal
      if($("#newConocimiento").val()=='')//validando que se selecciono un conocimiento
      {
        $("#newConocimiento").closest( ".form-group" ).addClass( "has-error" );
        $("#newConocimiento").focus();
        return false;
      }

        $.ajax({
          url: baseurl+'index.php/CUsuario/ingresarConocimientoNew',
          method: 'post',
          data:{
              newConocimiento:$("#newConocimiento").val(),
              },
              beforeSend: function(){
                $("#btnNuevoConocimiento").addClass("disabled");
                $("#modalboddy").append(
                          '<div class="overlay">'+
                            '<i class="fa fa-refresh fa-spin"></i>'+
                            '</div>');
                          },
              success: function(data) {
                $("#btnNuevoConocimiento").removeClass("disabled");
                data=JSON.parse(data);
                $('#ListarSub').append(
                  '<li id="Lista-'+data.nuevoId+'">'+
                  '<small class="label label-'+RandColor()+'" style="font-size: 13px">'+$("#newConocimiento").val()+'</small>'+
                  '<div class="tools">'+
                  '<i class="fa fa-trash-o eliminarRequerimientos" idElement="'+data.nuevoId+'" nombre="'+$("#newConocimiento").val()+'" name="btnDelete" id="btnDelete"></i>'+
                  '</div>'+
                  '</li>'
                );

                $("#modal-success").modal('hide');
                $(".overlay").remove();
              },
              error: function()
              {
                alert("Error de conexión!");
              }
            });
    });

//Funcion para borrar un conocimiento al dar click al trash
$("#ListarSub").on('click','.fa.fa-trash-o.eliminarRequerimientos',function(){

    let id=$(this).attr("idElement");
    $.ajax({
        url: baseurl+'index.php/CUsuario/eliminarConocimiento',
        method: 'post',
        data:{
            hdnId:id
          },
          beforeSend: function(){
            $("#modalboddy").append(
                            '<div class="overlay">'+
                              '<i class="fa fa-refresh fa-spin"></i>'+
                            '</div>');
          },
          success: function(data) {
            $("#Lista-"+id).remove();
            $('#btnCerrar').click();
            $('#modal-eliminarsub').modal('hide');
            $('#mensajeExitoDelete').fadeIn();
            setTimeout(function() {
              $("#mensajeExitoDelete").fadeOut();
            },5000);
            $(".overlay").remove();
            return false;
          },
          error: function()
          {
            alert("Error de conexión!");
          }
      });
});

  //funcion modificar password
  $("#actualizarPass").click(function()
  {
    if($("#modificarContraseña").val()=="")
    {
        $( "#modificarContraseña" ).closest( ".form-group" ).addClass( "has-error" );
        $( "#modificarContraseña" ).focus();
        return false;
    }else $( "#modificarContraseña" ).closest( ".form-group" ).removeClass( "has-error" );

    if($("#modificarContraseñaVerif").val()=="")
    {
        $( "#modificarContraseñaVerif" ).closest( ".form-group" ).addClass( "has-error" );
        $( "#modificarContraseñaVerif" ).focus();
        return false;
    }else $( "#modificarContraseñaVerif" ).closest( ".form-group" ).removeClass( "has-error" );

    if($("#modificarContraseña").val()!=$("#modificarContraseñaVerif").val())
    {
      alert('Las contraseñas no coinciden, intentelo de nuevo.');
      $( "#modificarContraseña").closest( ".form-group" ).addClass( "has-error" );
      $( "#modificarContraseñaVerif" ).closest( ".form-group" ).addClass( "has-error" );
      $( "#modificarContraseña").focus();
        return false;
    }else{
      $( "#modificarContraseña" ).closest( ".form-group" ).removeClass( "has-error" );
      $( "#modificarContraseñaVerif" ).closest( ".form-group" ).removeClass( "has-error" );
    }

    //Modificando contraseña
    
  });

});


//funcion que  de la bdd a la vista Perfil
function infoUsuario(){

  $.ajax({
      url: baseurl+'index.php/CUsuario/infoUsuario',
      method: 'post',
      beforeSend: function(){
      },
      success: function(data) {
        //toda la info del user perfil
        var c=JSON.parse(data);
        //recorriendo la informacion y poniendola en los combo
        $.each(c,function(i,item){
          //cambiando cmbGenero
          $('#cmbGenero').val(item.genero);
          $('#cmbGenero').selectpicker('refresh');
          //cambiando cmbEstado
          $('#cmbEstado').val(item.estadoCivil);
          $('#cmbEstado').selectpicker('refresh');
          //cambiando cmbNacionalidad
          $('#cmbNacionalidad').val(item.pais);
          $('#cmbNacionalidad').selectpicker('refresh');
        });
      },
      error: function()
      {
          alert("Error de conexión!");
      }
  });
}

//funcion para listar los conocimientos en el modalconocimientos
function conocimientosModal(){
  $("#mcmbConocimientos").selectpicker('destroy');
  $("#mcmbConocimientos").empty();
  $('#mcmbConocimientos').selectpicker('refresh');
  $("#mcmbConocimientos").selectpicker('render');
  $("#mcmbConocimientos").append("<option value =''>Elegir un conocimiento</option>");
  $('#mcmbConocimientos').selectpicker('refresh');
  $("#mcmbConocimientos").selectpicker('render');
  //Listar conocimientos en mcmbSubServicio
  $.ajax({
      url: baseurl+'index.php/CUsuario/getConocimientos',
      method: 'post',
      beforeSend: function(){
        $("#boxPrincipal").append(
            '<div class="overlay">'+
              '<i class="fa fa-refresh fa-spin"></i>'+
            '</div>'

        );
      },
      success: function(data) {
        //todos los conocimientos de la base de datos
        var c=JSON.parse(data);

        $.ajax({
            url: baseurl+'index.php/CUsuario/getConocimientosUser',
            method: 'post',
            beforeSend: function(){
            },
            success: function(data) {
              //los conocimientos que tiene el usuario logeado
              var d=JSON.parse(data);

              //recorriendo los conocimientos que estan en la base de datos
              $.each(c,function(i,item){
                var contador=0;

                //recorriendo los conocimientos del usuario logeado
                $.each(d,function(j,key){
                  if (item.idConocimiento == key.idConocimiento){//si el conocimiento se encuentra en el conocimientoUsuario aumenta el contador
                    contador++;
                  }
                });
                if (contador==0) {
                  $('#mcmbConocimientos').append('<option value="'+item.idConocimiento+'">'+item.conocimientos+'</option>');
                  $('#mcmbConocimientos').selectpicker('refresh');
                  $('#mcmbConocimientos').selectpicker('refresh');
                  $("#mcmbConocimientos").selectpicker('render');
                  $(".overlay").remove();
                }
              });
            },
            error: function()
            {
                alert("Error de conexión!");
            }
        });
      },
      error: function()
      {
          alert("Error de conexión!");
      }
  });
}

//funcion para listar los conocimientos del usuarios
function conocimientosUsuario(){
  //Listar conocimientos
  $.ajax({
      url: baseurl+'index.php/CUsuario/getConocimientosVerif',
      method: 'post',
      beforeSend: function(){
        $("#boxPrincipal").append(
            '<div class="overlay">'+
              '<i class="fa fa-refresh fa-spin"></i>'+
            '</div>'

        );
      },
      success: function(data) {
        //todos los conocimientos de la base de datos
        var c=JSON.parse(data);

        $.ajax({
            url: baseurl+'index.php/CUsuario/getConocimientosUser',
            method: 'post',
            beforeSend: function(){
            },
            success: function(data) {
              //los conocimientos que tiene el usuario logeado
              var d=JSON.parse(data);

              //recorriendo los conocimientos que estan en la base de datos
              $.each(c,function(i,item){
                var contador=0;

                //recorriendo los conocimientos del usuario logeado
                $.each(d,function(j,key){
                  if (item.idConocimiento == key.idConocimiento){
                      $('#ListarSub').append(
                        '<li id="Lista-'+item.idConocimiento+'">'+
                          '<small class="label label-'+RandColor()+'" style="font-size: 13px">'+item.conocimientos+'</small>'+
                          '<div class="tools">'+
                            '<i class="fa fa-trash-o eliminarRequerimientos" idElement="'+item.idConocimiento+'" nombre="'+item.nombre+'" name="btnDelete" id="btnDelete"></i>'+
                            '</div>'+
                            '</li>'
                      );
                  }
                });
              });
              $(".overlay").remove();
            },
            error: function()
            {
                alert("Error de conexión!");
            }
        });
      },
      error: function()
      {
          alert("Error de conexión!");
      }
  });
}

//color colorRandom
function RandColor(){
  var color=Math.floor(Math.random() * (5 - 1)) + 1;
  if (color==1) {
    return 'info';
  }
  else if (color==2) {
    return 'warning';
  }
  else if (color==3) {
    return 'danger';
  }
  else if (color==4) {
    return 'success';
  }
  else if (color==5) {
    return 'primary';
  }
}
