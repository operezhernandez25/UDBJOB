
</div>
<footer class="main-footer">
  <div id="testMod"> </div>
    <div class="pull-right hidden-xs">
      <b>Versión</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">PARATY</a>.</strong> Derechos reservados
  </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>public/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/morris.js/morris.min.js"></script>

<!--ChartJS Plugin -->
<script src="<?php echo base_url(); ?>public/bower_components/chart.js/Chart.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- select -->
<script src="<?php echo base_url(); ?>public/plugins/select/bootstrap-select.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- InputMask -->
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<!-- JQueryPrint -->
<script src="<?php echo base_url(); ?>public/bower_components/jQueryPrint/jQuery.print.js"></script>

<!-- jsPDF -->
<script src="<?php echo base_url(); ?>public/bower_components/jsPDF/jspdf.debug.js"></script>
<!-- html2canvas -->
<script src="<?php echo base_url(); ?>public/bower_components/jsPDF/html2canvas.js"></script>

<!-- Push.js -->
<script src="<?php echo base_url(); ?>public/dist/js/push.min.js"></script>

<script src="<?php echo base_url(); ?>public/dist/js/adminlte.min.js"></script>
<?php if ($this->uri->segment(1)=='nuevaCotizacion') {?>
  <script src="<?php echo base_url(); ?>public/dist/js/cotizacion.js"></script>
  <script src="<?php echo base_url(); ?>public/dist/js/jquery.editablediv.js"></script>

  <?php if($this->uri->segment(2)!="")
  { ?>
    <script type="text/javascript"> var cotizacionId= <?php echo $this->uri->segment(2); ?>
    </script>
    <script>
      var copiar=true;
      localStorage.removeItem('Paquete');
        localStorage.removeItem("servicios");
        localStorage.removeItem("serviciosAdd");
        localStorage.removeItem("serviciosIniciales");
        localStorage.removeItem("subsServicios");
        localStorage.removeItem("subsserviciosAdd");
    </script>
    <script src="<?php echo base_url(); ?>js/nuevaCotizacionCargada.js">

    </script>
  <?php } ?>

  <script src ="<?php echo base_url(); ?>public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<?php } ?>

<?php if($this->uri->segment(1)=='abonos')
{ ?>
  <script src="<?php echo base_url(); ?>js/abono.js"></script>
<?php } ?>

<?php if($this->uri->segment(1)=='perfil')
  {
    echo '<script src="'.base_url().'js/perfil.js"></script>'; 
  } ?>

<!-- highcharts -->
<script src="<?php echo base_url(); ?>public/bower_components/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/highcharts/exporting.js"></script>

<!-- timepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- datetimepicker -->
<script src="<?php echo base_url(); ?>public/bower_components/datetimepicker/bootstrap-datetimepicker.min.js"></script>

<!-- fullCalendar -->

<script src="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/fullcalendar/dist/locale/es.js"></script>
<!-- Page specific script -->

<!-- <script>
  $(function () {

    /* initialize the external events

    function init_events(ele) {
      ele.each(function () {
      })
    }
    /* initialize the calendar

    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

      $.post('<?php echo base_url(); ?>index.php/cCalendario/getEventos',
      function(data){

        $('#calendar').fullCalendar({
          header    : {
            left  : 'today, prev, next',
            center: 'title',
            right : 'month,agendaWeek,agendaDay',
          },
          //recibiendo eventos por JSON
          events    : $.parseJSON(data)
        });
      });
  });
</script> -->


<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();
        $('#example1').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ registros por página.",
        		"zeroRecords": "No se encontraron resultados en su búsqueda.",
        		"searchPlaceholder": "Buscar registros",
        		"info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
        		"infoEmpty": "No existen registros",
        		"infoFiltered": "(filtrado de un total de _MAX_ registros)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
          }
        });

        $("#btncerrarsesion").click(function()
        {
          window.localStorage.removeItem('avisoCookiesMostrado');
        });
    },

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  )
</script>
<script type="text/javascript">
  var baseurl="<?php echo base_url(); ?>";
</script>

<?php   if ($this->uri->segment(1)=='inicio') {?>
    <script>
    function datagrafico(base_url,year){
      namesMonth = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
      $.ajax({
        url: base_url +'index.php/inicio/grafico',
        type: 'POST',
        data: {year: year},
        dataType: 'json',
        beforeSend: function(){
          $("#boxgrafica").append(
            '<div class="overlay">'+
              '<i class="fa fa-refresh fa-spin"></i>'+
            '</div>');
        },
        success: function(data){
          var meses= new Array();
          var montos= new Array();
          $.each(data,function(key,value){
            meses.push(namesMonth[value.mes-1]);
            valor=Number(value.monto);
            montos.push(valor);
          });
          graficar(meses,montos,year);
          $(".overlay").remove();
        }
      });
    }

    var year=(new Date).getFullYear();
    datagrafico(baseurl,year);
    $('#year').on('change',function(){
      yearselect = $(this).val();
      datagrafico(baseurl,yearselect);
    });
    </script>
  <?php }?>
<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();
        $('#example').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ cotizaciones por página.",
        		"zeroRecords": "No se encontraron cotizaciones en su búsqueda.",
        		"searchPlaceholder": "Buscar cotizaciones",
        		"info": "Mostrando cotizaciones de _START_ al _END_ de un total de _TOTAL_ cotizaciones",
        		"infoEmpty": "No existen cotizaciones",
        		"infoFiltered": "(filtrado de un total de _MAX_ cotizaciones)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });
        $('#tabla').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ dependencia por página.",
        		"zeroRecords": "No se encontraron dependencias en su búsqueda.",
        		"searchPlaceholder": "Buscar dependencias",
        		"info": "Mostrando dependencias de _START_ al _END_ de un total de _TOTAL_ dependencias",
        		"infoEmpty": "No existen dependencias",
        		"infoFiltered": "(filtrado de un total de _MAX_ dependencias)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });
        $('#tablaBase').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ bases por página.",
        		"zeroRecords": "No se encontraron bases en su búsqueda.",
        		"searchPlaceholder": "Buscar bases",
        		"info": "Mostrando bases de _START_ al _END_ de un total de _TOTAL_ bases",
        		"infoEmpty": "No existen dependencias",
        		"infoFiltered": "(filtrado de un total de _MAX_ bases)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });

        $('#tablaSubServicios').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ SubServicios por página.",
        		"zeroRecords": "No se encontraron SubServicios en su búsqueda.",
        		"searchPlaceholder": "Buscar SubServicios",
        		"info": "Mostrando SubServicios de _START_ al _END_ de un total de _TOTAL_ SubServicios",
        		"infoEmpty": "No existen SubServicios",
        		"infoFiltered": "(filtrado de un total de _MAX_ SubServicios)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });

        $('#tablaServicios').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ Servicios por página.",
        		"zeroRecords": "No se encontraron Servicios en su búsqueda.",
        		"searchPlaceholder": "Buscar Servicios",
        		"info": "Mostrando Servicios de _START_ al _END_ de un total de _TOTAL_ Servicios",
        		"infoEmpty": "No existen Servicios"
          }
            });

        $('#tablaFlor').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ Flores por página.",
        		"zeroRecords": "No se encontraron Flores en su búsqueda.",
        		"searchPlaceholder": "Buscar Flores",
        		"info": "Mostrando Flores de _START_ al _END_ de un total de _TOTAL_ Flores",
        		"infoEmpty": "No existen Flores",
        		"infoFiltered": "(filtrado de un total de _MAX_ Flores)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });

        $('#tablaFollaje').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ Follajes por página.",
        		"zeroRecords": "No se encontraron Follajes en su búsqueda.",
        		"searchPlaceholder": "Buscar Follajes",
        		"info": "Mostrando Follajes de _START_ al _END_ de un total de _TOTAL_ Follajes",
        		"infoEmpty": "No existen Follajes",
        		"infoFiltered": "(filtrado de un total de _MAX_ Follajes)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });

        $('#tablaServicio').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ servicios por página.",
        		"zeroRecords": "No se encontraron bases en su búsqueda.",
        		"searchPlaceholder": "Buscar servicios",
        		"info": "Mostrando servicios de _START_ al _END_ de un total de _TOTAL_ servicios",
        		"infoEmpty": "No existen servicios",
        		"infoFiltered": "(filtrado de un total de _MAX_ servicios)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });

        $('#tablaPaquetes').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ paquetes por página.",
        		"zeroRecords": "No se encontraron paquetes en su búsqueda.",
        		"searchPlaceholder": "Buscar paquetes",
        		"info": "Mostrando paquetes de _START_ al _END_ de un total de _TOTAL_ paquetes",
        		"infoEmpty": "No existen paquetes",
        		"infoFiltered": "(filtrado de un total de _MAX_ paquetes)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });
        $('#tablaUsuarios').DataTable({
        	"language":{
        		"lengthMenu": "Mostrar _MENU_ usuarios por página.",
        		"zeroRecords": "No se encontraron usuarios en su búsqueda.",
        		"searchPlaceholder": "Buscar usuarios",
        		"info": "Mostrando usuarios de _START_ al _END_ de un total de _TOTAL_ usuarios",
        		"infoEmpty": "No existen usuarios",
        		"infoFiltered": "(filtrado de un total de _MAX_ usuarios)",
        		"search": "Buscar ",
        		"paginate": {
        			"first": "Primero",
        			"last": "Último",
        			"next": "Siguiente",
        			"previous": "Anterior"
        		}
        	}
        });
    })
</script>

<?php if ($this->uri->segment(2)=='imprimir') {?>
  <script src="<?php echo base_url(); ?>js/ImprimirCot.js"></script>
<?php } ?>

<?php if ($this->uri->segment(2)=='imprimirContrato') {?>
  <script src="<?php echo base_url(); ?>js/imprimirCot.js"></script>
<?php } ?>

<?php if ($this->uri->segment(1)=='cotizaciones') {?>
  <script src="<?php echo base_url(); ?>public/dist/js/vercotizacion.js"></script>
<?php } ?>

<?php if ($this->uri->segment(1)=='cInventario') {?>
  <script src="<?php echo base_url(); ?>js/inventario.js"></script>
<?php } ?>

<?php if (strtolower($this->uri->segment(1)=='mostrarservicios')) {?>
  <script src="<?php echo base_url(); ?>js/Servicio.js"></script>
  <script src="<?php echo base_url(); ?>js/ServicioNuevoSub.js"></script>
  <script src="<?php echo base_url(); ?>js/megapix-image.js"></script>
<?php } ?>

<?php if (strtolower($this->uri->segment(1)=='mostrarpaquetes')) {?>
  <script src="<?php echo base_url(); ?>js/Paquetes.js"></script>
  <script src="<?php echo base_url(); ?>js/megapix-image.js"></script>
<?php } ?>

<?php if (strtolower($this->uri->segment(1))=='csubservicios') {?>
  <script src="<?php echo base_url(); ?>js/SubServicios.js"></script>
<?php } ?>

<?php if (strtolower($this->uri->segment(1))=='bases') {?>
  <script src="<?php echo base_url(); ?>js/megapix-image.js"></script>
  <script src="<?php echo base_url(); ?>js/base.js"></script>
<?php } ?>
<?php if (strtolower($this->uri->segment(1))=='flores') {?>
  <script src="<?php echo base_url(); ?>js/megapix-image.js"></script>
  <script src="<?php echo base_url(); ?>js/flor.js"></script>
<?php } ?>
<?php if (strtolower($this->uri->segment(1))=='follajes') {?>
  <script src="<?php echo base_url(); ?>js/megapix-image.js"></script>
  <script src="<?php echo base_url(); ?>js/follaje.js"></script>
<?php } ?>
<?php if (strtolower($this->uri->segment(1))=='usuarios') {?>
  <script src="<?php echo base_url(); ?>js/usuarios.js"></script>
<?php } ?>


<script>
  $(function () {



    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Money Euro
    $('[data-mask]').inputmask();

  })
  </script>
<script>
            $(function() {
              var nowDate = new Date();
              var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

              $('input[name="datetimepicker1"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(2, 'hour'),
                minDate: today,
                locale: {
                  format: 'M/DD hh:mm A',
                  separator: " - ",

                  applyLabel: "Aceptar",
                  cancelLabel: "Cancelar",
                  fromLabel: "De",
                  toLabel: "Hasta",
                  daysOfWeek: [
                      "Do",
                      "Lu",
                      "Ma",
                      "Mi",
                      "Ju",
                      "Vi",
                      "Sa"
                  ],
                monthNames: [
                  "Enero",
                  "February",
                  "Marzo",
                  "Abril",
                  "Mayo",
                  "Junio",
                  "Julio",
                  "Agosto",
                  "Septiembre",
                  "Octubre",
                  "Noviembre",
                  "Diciembre"
              ]
                }

              },
               function(start, end, label) {
              console.log("A new date selection was made: " + start.format("YYYY-MM-DD hh:mm")+ ' to ' + end.format('YYYY-MM-DD'));
          });


            });
</script>
<script type="text/javascript">
  $('[data-toggle="tooltip"]').tooltip();
</script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'es',
                    format : 'YYYY-MM-DD hh:mm'
                });
            });
        </script>


<!-- Auditoria -->

<?php
  if(strtolower($this->uri->segment(1))=='inicio')
  {
    ?>
      <script src="<?php echo base_url(); ?>js/auditoria.js"></script>
      <script src="<?php echo base_url(); ?>js/Notificaciones.js"></script>
    <?php
  }
?>

</div>
</body>
</html>
