
<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Conocimientos
        </h1>


    </section>
    <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header">
                          Conocimientos por aprobar.
              </div>
              <div class="box-body" id ="listaMisPropuestas">
                  <div class="form-group">
                      <input class="search form-control" placeholder="Filtrar" />
                  </div>
                  <ul class="list list-group">
                          <?php if(isset($conocimientos)){
                              foreach($conocimientos as $con){
                             ?>
                           <li class="list-group-item">
                               <a href="<?php echo base_url(); ?>CEmpresa/aprobarConocimiento/<?php echo $con->idConocimiento ?>"
                                 class="btn btn-success pull-right" onclick="return aprobar()" title="Aprobar"><span class="fa fa-check"></span></a>
                                <p><h4 class="list-group-item-heading titulo"><strong><?php echo $con->conocimientos ?></strong></h4></p>
                           </li>

                           <?php } } ?>
                  </ul>
                  <ul class="pagination"></ul>
              </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <i class="fa fa-info-circle"></i>
                        <strong>¡IMPORTANTE!</strong>
            </div>
            <div class="box-body">
              Al aprobar uno de los conocimientos listados, usted está aprobando que este pueda ser seleccionado por cualquier usuario que se registre.
            </div>
     </div>
 </div>
</div>
   </section>

   <script type="text/javascript">
   function aprobar()
   {
     return confirm('¿Estás seguro que quieres aprobar este conocimiento?');
   }
   </script>
