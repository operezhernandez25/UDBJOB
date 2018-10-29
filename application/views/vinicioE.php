<div class="content-wrapper">
    <section class="content-header">
      <h1>
           Estadisticas de la empresa
        <small>Inicio</small>
      </h1>

    </section>

    <section class="content" >
        <div class="row">
        <div class="col-md-4  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Propuestas de la empresa</span>
              <span class="info-box-number"><?php echo $propuestas->conta; ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4  col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cantidad de postulantes por <br> Propuesta(Promedio)</span>
              <span class="info-box-number"><?php 
              if(is_null($promedio[0]->promedio))$promedio[0]->promedio=0; echo round($promedio[0]->promedio); ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
    </section>

