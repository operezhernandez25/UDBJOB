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
