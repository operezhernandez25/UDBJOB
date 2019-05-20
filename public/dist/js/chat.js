$(document).ready(function()
{
    $('#caja-chat').scrollTop($('#caja-chat')[0].scrollHeight);
    $("#MensajeEnviar").keypress(function(e){
        if(e.which == 13) {
            $.ajax({
                url: baseurl+'index.php/CEmpresa/guardarMensaje',
                method: 'post',
                data:{  idPostulacion:idPostulacion,
                        mensaje:$(this).val()},

                beforeSend: function(){
                    
                },
                success: function(data) {
                    console.log(data);
                    data=JSON.parse(data);
                    if(!data.error)
                    {
                        let d = new Date();
                        let fecha=d.getFullYear()+'-'+d.getMonth()+'-'+d.getDay();
                        
                     $("#caja-chat").append(
                         '<!-- Message to the right -->'+
                         '<div class="direct-chat-msg right">'+
                           '<div class="direct-chat-info clearfix">'+
                             '<span class="direct-chat-name pull-right">Nosotros</span>'+
                             '<span class="direct-chat-timestamp pull-left">'+fecha+'</span>'+
                           '</div>'+
                           '<!-- /.direct-chat-info -->'+
                           '<img class="direct-chat-img" src="http://pngimage.net/wp-content/uploads/2018/06/usuario-icono-png.png" alt="message user image">'+
                           '<!-- /.direct-chat-img -->'+
                           '<div class="direct-chat-text">'+
                           $("#MensajeEnviar").val()+
                           '</div>'+
                           '<!-- /.direct-chat-text -->'+
                        '</div>'+
                         '<!-- /.direct-chat-msg -->'
                     );
                    
                    $('#caja-chat').scrollTop($('#caja-chat')[0].scrollHeight);   
                    $("#MensajeEnviar").val("");
                    }else
                    {
                        alert("Ocurrio un error");
                    }

                }
            });
            
        }
       
    });

   setInterval(function(){ 
        $.ajax({
            url: baseurl+'index.php/CEmpresa/buscarMensajesSinVisto',
            method: 'post',
            data:{  idPostulacion:idPostulacion},

            beforeSend: function(){
                
            },
            success: function(data) {
                console.log(data);
                data=JSON.parse(data);
                if(!data.error)
                {
                    let d = new Date();
                    let fecha=d.getFullYear()+'-'+d.getMonth()+'-'+d.getDay();
                    
                    data.mensajes.forEach(element => {
                        $("#caja-chat").append(
                            '<!-- Message to the right -->'+
                            '<div class="direct-chat-msg ">'+
                              '<div class="direct-chat-info clearfix">'+
                                '<span class="direct-chat-name pull-left">Nosotros</span>'+
                                '<span class="direct-chat-timestamp pull-right">'+element.fecha+'</span>'+
                              '</div>'+
                              '<!-- /.direct-chat-info -->'+
                              '<img class="direct-chat-img" src="http://pngimage.net/wp-content/uploads/2018/06/usuario-icono-png.png" alt="message user image">'+
                              '<!-- /.direct-chat-img -->'+
                              '<div class="direct-chat-text">'+
                              element.mensaje+
                              '</div>'+
                              '<!-- /.direct-chat-text -->'+
                           '</div>'+
                            '<!-- /.direct-chat-msg -->'
                        );
                        $('#caja-chat').scrollTop($('#caja-chat')[0].scrollHeight);   
                    });
                    if(data.mensajes.length>0)
                    {
                        var audio = new Audio(baseurl+'public/sound/notification.mp3');
                    audio.volume = 0.2;
                    audio.play();
                    }
                    
                
                }else
                {
                    alert("Ocurrio un error");
                }

            }
        });
        
    
    
    }, 250);

    

});