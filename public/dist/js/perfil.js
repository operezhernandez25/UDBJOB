
$(document).ready(function()
{
  //funcion para cargar datos de los cmb en vista Perfil
  infoUsuario();

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
function conocimientosUser(){

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
