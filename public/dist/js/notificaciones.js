$(document).ready(function()
{
  // var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
  // if(es_chrome){
  //   var avisoCookiesMostrado = window.localStorage.getItem('avisoCookiesMostrado');
  //   if(!avisoCookiesMostrado) {
  //
  //     $.ajax({
  //         url: baseurl+'index.php/CInicio/getPendientes',
  //         method: 'post',
  //         beforeSend: function(){
  //         },
  //         success: function(data) {
  //           var data=JSON.parse(data);
  //           $.each(data,function(i,item){
  //             $('#descripcion').html(
  //               "Tiene "+item.pendientes+" cotizaciones pendientes!"
  //             );
  //             $('#modal-notificacion').modal('show');
  //             setTimeout(function() {
  //               $('#modal-notificacion').modal('toggle');
  //             },4000);
  //         });
  //         window.localStorage.setItem('avisoCookiesMostrado', true);
  //         },
  //         error: function()
  //         {
  //             alert("Error de conexión!");
  //         }
  //     });
  //
  //
  //   }
  // }
  // else {
  //   var avisoCookiesMostrado = window.localStorage.getItem('avisoCookiesMostrado');
  //   if(!avisoCookiesMostrado) {
    $.ajax({
        url: baseurl+'index.php/CUsuario/countConocimiento',
        method: 'post',
        beforeSend: function(){
        },
        success: function(data) {
          var data=JSON.parse(data);
          $.each(data,function(i,item){
            if (item.numconocimiento==0) {
              Push.create("No tienes agregado ningun conocimiento!", {
                body: "Para ver propuestas, necesitas agregar conocimientos en tu perfil. Click en este mensaje para ver tu perfil.",
                icon: baseurl+'public/img/logo.png',
                timeout: 4000,
                onClick: function () {
                    window.location=baseurl+'perfil';
                    this.close();
                }
              });
            }

        });
        //window.localStorage.setItem('avisoCookiesMostrado', true);
        },
        error: function()
        {
            alert("Error de conexión!");
        }
    });
  //}
  //}

});
