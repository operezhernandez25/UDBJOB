var idEliminar;
var validacion=false;
var validacionUpdate=false;


$(document).ready(function()
{
  $("#imagenGuardar").change(function()
    {
        var d = new Date();
        let n=Date.now();
        $("#nombreArchivo").val(n);
        var fileInput = document.getElementById('imagenGuardar');
        var file= fileInput.files[0];
        var mpImg
        mpImg = new MegaPixImage(file);
        var resCanvas1 = document.getElementById('resultCanvas1');
            mpImg.render(resCanvas1, { maxWidth: 350, maxHeight: 350,quality: 1 });

    });

    //validaciones para nuevo
    $('#formNuevo').submit(function(e) {

        if($("#nombreIngresar").val()=="")
        {
            $( "#nombreIngresar" ).closest( ".form-group" ).addClass( "has-error" );
            $( "#nombreIngresar" ).focus();
            e.preventDefault();
            return false;
        }else $( "#nombreIngresar" ).closest( ".form-group" ).removeClass( "has-error" );

        if($("#apellidoIngresar").val()=="")
        {
            $( "#apellidoIngresar" ).closest( ".form-group" ).addClass( "has-error" );
            $( "#apellidoIngresar" ).focus();
            e.preventDefault();
            return false;
        }else $( "#apellidoIngresar" ).closest( ".form-group" ).removeClass( "has-error" );

        if($("#correoIngresar").val()=="")
        {
            $( "#correoIngresar" ).closest( ".form-group" ).addClass( "has-error" );
            $( "#correoIngresar" ).focus();
            e.preventDefault();
            return false;
        }else $( "#correoIngresar" ).closest( ".form-group" ).removeClass( "has-error" );

        if($("#passIngresar").val()=="")
        {
            $( "#passIngresar" ).closest( ".form-group" ).addClass( "has-error" );
            $( "#passIngresar" ).focus();
            e.preventDefault();
            return false;
        }else $( "#passIngresar" ).closest( ".form-group" ).removeClass( "has-error" );

        if(!validacion)
        {
            alert("Imagen invalida, seleccione otra imagen.");
            e.preventDefault();
            return false;
        }
        var imgCanvas = document.getElementById('resultCanvas1');
        $("#imgSend").val(imgCanvas.toDataURL());
      });

      //funcion para modificar una base
    $("#home").on('click','.btn.btn-success.btn-block.modificarBoton',function(){
        $("#mensajeUpdate").empty();
        $("#idModificar").val($(this).attr("idMod"));
        //seleccionando el tipo de user
        $('#cmbtipoModificar').val($(this).attr("idTipo"));
        $('#cmbtipoModificar').selectpicker('render');
        //Mostrando la imagen actual
        var canvas = document.getElementById('modificarCanvas');
        var context = canvas.getContext('2d');
        var base_image = new Image();
        base_image.src = baseurl+$(this).attr("img");
        base_image.width=250;
        base_image.height=250;
        console.log(base_image);
        base_image.onload = function(){
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.drawImage(base_image, 0, 0);
          }
         $("#nombreModificar").val($(this).attr("nombre"));
         $("#apellidoModificar").val($(this).attr("apellido"));
         $("#correoModificar").val($(this).attr("correo"));
         $("#cmbtipoModificar").val($(this).attr("idTipo"));
         $("#modal-modificar").modal("toggle");
    });

    //funcion boton modificar nombre
    $("#actualizarNombre").click(function()
    {
        if($("#nombreModificar").val()=="")
        {
            $("#nombreModificar").closest( ".form-group" ).addClass( "has-error" );
            $("#nombreModificar").focus();
            return false;
        }else $("#nombreModificar").closest( ".form-group" ).removeClass( "has-error" );

        if($("[idMod="+$("#idModificar").val()+"]").attr("nombre")== $("#nombreModificar").val())
            return false;
        let nombre =$("#nombreModificar").val();
        $.ajax({
            url: baseurl+'index.php/CUsuarioE/updateNombre',
            method: 'post',
            data:{  nombre:nombre,
                    id:$("#idModificar").val()},
            beforeSend: function(){
                $("#modalboddy").append(
                                '<div class="overlay">'+
                                  '<i class="fa fa-refresh fa-spin"></i>'+
                                '</div>');
            },
            success: function(data) {
                console.log(data);

                if(!data.error)
                {
                    $("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classNombre").text(nombre);
                    $("[idMod="+$("#idModificar").val()+"]").attr("nombre",nombre);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Nombres actualizado correctamente.'+
                        '</div>'
                    );

                }else
                {
                    alert(data.mensaje);
                }
                $(".overlay").remove();
            }
        });
    });

    //funcion boton modificar apellidos
    $("#actualizarApellido").click(function()
    {
        if($("#apellidoModificar").val()=="")
        {
            $("#apellidoModificar").closest( ".form-group" ).addClass( "has-error" );
            $("#apellidoModificar").focus();
            return false;
        }else $("#apellidoModificar").closest( ".form-group" ).removeClass( "has-error" );

        if($("[idMod="+$("#idModificar").val()+"]").attr("apellido")== $("#apellidoModificar").val())
            return false;
        let apellido =$("#apellidoModificar").val();
        $.ajax({
            url: baseurl+'index.php/CUsuarioE/updateApellido',
            method: 'post',
            data:{  apellido:apellido,
                    id:$("#idModificar").val()},
            beforeSend: function(){
                $("#modalboddy").append(
                                '<div class="overlay">'+
                                  '<i class="fa fa-refresh fa-spin"></i>'+
                                '</div>');
            },
            success: function(data) {
                console.log(data);

                if(!data.error)
                {
                    $("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classApellido").text(apellido);
                    $("[idMod="+$("#idModificar").val()+"]").attr("apellido",apellido);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Apellidos actualizados correctamente.'+
                        '</div>'
                    );

                }else
                {
                    alert(data.mensaje);
                }
                $(".overlay").remove();
            }
        });
    });

    //funcion boton modificar correo
    $("#actualizarCorreo").click(function()
    {
        if($("#correoModificar").val()=="")
        {
            $("#correoModificar").closest( ".form-group" ).addClass( "has-error" );
            $("#correoModificar").focus();
            return false;
        }else
        {
          if (emailValido($("#correoModificar").val())) {
            $("#correoModificar").closest( ".form-group" ).removeClass( "has-error" );
          }
          else {
            $("#correoModificar").closest( ".form-group" ).addClass( "has-error" );
            $("#correoModificar").focus();
            return false;
          }
        }

        if($("[idMod="+$("#idModificar").val()+"]").attr("correo")== $("#correoModificar").val())
            return false;
        let correo =$("#correoModificar").val();
        $.ajax({
            url: baseurl+'index.php/CUsuarioE/updateCorreo',
            method: 'post',
            data:{  correo:correo,
                    id:$("#idModificar").val()},
            beforeSend: function(){
                $("#modalboddy").append(
                                '<div class="overlay">'+
                                  '<i class="fa fa-refresh fa-spin"></i>'+
                                '</div>');
            },
            success: function(data) {
                console.log(data);

                if(!data.error)
                {
                    $("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classCorreo").text(correo);
                    $("[idMod="+$("#idModificar").val()+"]").attr("correo",correo);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Correo actualizado correctamente.'+
                        '</div>'
                    );

                }else
                {
                    alert(data.mensaje);
                }
                $(".overlay").remove();
            }
        });
    });

    //funcion boton modificar tipo de base
    $("#actualizarTipo").click(function(){
        if($("#cmbtipoModificar").val()=="")
        {
            $("#cmbtipoModificar").closest( ".form-group" ).addClass( "has-error" );
            $("#cmbtipoModificar").focus();
            return false;
        }else $("#cmbtipoModificar").closest( ".form-group" ).removeClass( "has-error" );

        if($("[idMod="+$("#idModificar").val()+"]").attr("idTipo")== $("#cmbtipoModificar").val())
            return false;
            let idTipo=$("#cmbtipoModificar").val();
            let tipo = $("#cmbtipoModificar").children("option").filter(":selected").text()
            $.ajax({
            url: baseurl+'index.php/CUsuarioE/updateTipo',
            method: 'post',
            data:{  idTipo:idTipo,
                    id:$("#idModificar").val()},
            beforeSend: function(){
                $("#modalboddy").append(
                                '<div class="overlay">'+
                                  '<i class="fa fa-refresh fa-spin"></i>'+
                                '</div>');
            },
            success: function(data) {

                if(!data.error)
                {
                  if (idTipo==0) {
                    $("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classTipo").html('<span class="label label-info">'+tipo+'</span>');
                    $("[idMod="+$("#idModificar").val()+"]").attr("idTipo",idTipo);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Tipo de usuario actualizado correctamente.'+
                        '</div>'
                    );
                  }else {
                    $("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classTipo").html('<span class="label label-success">'+tipo+'</span>');
                    $("[idMod="+$("#idModificar").val()+"]").attr("idTipo",idTipo);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Tipo de usuario actualizado correctamente.'+
                        '</div>'
                    );
                  }


                }else
                {
                    alert(data.mensaje);
                }
                $(".overlay").remove();
            }
        });
    });

    $("#actualizarImagen").click(function()
    {
        if(!validacionUpdate)
        {
            alert("Imagen invalida");
            return false;
        }

        let imgCanvasMod = document.getElementById('modificarCanvas');
        let baseurlImg=imgCanvasMod.toDataURL();

        $.ajax({
            url: baseurl+'index.php/CUsuarioE/updateImagen',
            method: 'post',
            data:{  imgSend:baseurlImg,
                    nombreMod:$("#nombreArchivoMod").val(),
                    id:$("#idModificar").val()},
            beforeSend: function(){
                $("#modalboddy").append(
                                '<div class="overlay">'+
                                  '<i class="fa fa-refresh fa-spin"></i>'+
                                '</div>');
            },
            success: function(data) {
                if(!data.error)
                {
                    let imgurl='<img src="'+baseurl+'/uploads/usere/'+$("#nombreArchivoMod").val()+'.jpg" alt="Imagen" height="250" width="250">';
                    $($("[idMod="+$("#idModificar").val()+"]").closest("td").siblings(".classImg")).find("a")
                    .attr(
                        'data-content',imgurl);
                    $('[data-toggle="popover"]').popover({ trigger: "hover | focus", html: "true",'container': 'body' });

                    $("[idMod="+$("#idModificar").val()+"]").attr("img",imgSend);
                    $("#mensajeUpdate").empty();
                    $("#mensajeUpdate").append(
                        '<div class="alert alert-success" role="alert"> '+
                            'Imagen actualizada correctamente.'+
                        '</div>'
                    );

                }else
                {
                    alert(data.mensaje);
                }
                console.log(data);
                $(".overlay").remove();
            }
        });

    });

    //funcion para cargar la imagen en el canvas de modificar
    $("#imagenGuardarMod").change(function()
    {
        var d = new Date();
        var n = d.getFullYear()+'-'+d.getMonth()+'-'+d.getDay()+'-'+d.getHours()+'-'+d.getMinutes()+'-'+d.getSeconds()+'-'+d.getMilliseconds();
        $("#nombreArchivoMod").val(n);

        var fileInput = document.getElementById('imagenGuardarMod');
        var file= fileInput.files[0];
        var mpImg;
        mpImg = new MegaPixImage(file);
        var resCanvas1 = document.getElementById('modificarCanvas');
            mpImg.render(resCanvas1, { maxWidth: 350, maxHeight: 350,quality: 1 });
    });

    //funcion para eliminar una base
    $("#home").on('click',".btn.btn-danger.btn-block.eliminarBoton",function(){
        idEliminar=$(this).attr("idEli");
        $("#idEliminar").val(idEliminar);
       $("#modal-eliminar").modal("toggle");
    });
    
});


//funcion que valida si la imagen es correcta
function validate_fileupload(input_element)
{
    var el = document.getElementById("feedback");
    var fileName = input_element.value;
    var allowed_extensions = new Array("jpg","png",'JPG',"PNG","gif");
    var file_extension = fileName.split('.').pop();
    for(var i = 0; i < allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true; // valid file extension
        }
    }
    return false;
}

//Funcion que verifica que el email sea valido
function emailValido(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

function eliminar()
{
    $("#idEliminar").val(idEliminar);
}
