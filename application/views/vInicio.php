<style>
.sort.desc:after { width: 0; height: 0; border-left: 4px solid transparent; border-right: 4px solid transparent; border-bottom: 4px solid #2e2e2e; content: ""; position: relative; top: -9px; right: -4px; }
.sort.asc:after { width: 0; height: 0; border-left: 4px solid transparent; border-right: 4px solid transparent; border-top: 4px solid #2e2e2e; content: ""; position: relative; top: 11px; right: -4px; }
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
           Ofertas Sugeridas
        <small>Inicio</small>
      </h1>

    </section>

    <section class="content" id="listado-ofertasSugeridas">
        <div class="form-group">
          
            <div class="input-group">
              <input class="search form-control" placeholder="Fitrar" >
              <span class="input-group-btn">
                <button class="sort btn btn-primary" data-sort="titulo">Ordenar por titulo</button>
              </span>
              <span class="input-group-btn">
                <button class="sort btn btn-primary" data-sort="salario">Ordenar por salario</button>
              </span>
            </div>
          
        </div>
      <br>
      <ul class=" list list-group">
      <?php
        foreach($propuestas as $pro)
        {
          ?>
          <li class="list-group-item">
            <article class="search-result">
              <div class="col-xs-12 col-sm-12 col-md-2">
                <ul class="meta-search">
                  <li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo $pro->fecha ?></span></li>
                  <li><i class="glyphicon glyphicon-time"></i> <span class="jornada"><?php echo $pro->jornada ?></span></li>
                  <li><i class="glyphicon glyphicon-star"></i> <span class="salario"><?php echo $pro->salario ?></span></li>
                
                </ul>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                <h2><a href="<?php echo base_url(); ?>propuesta/<?php echo $pro->idPropuesta ?>" title="" class="titulo"><?php echo $pro->titulo ?></a><?php if($pro->realizado==1) echo '<span class="label label-danger">Postulado</span>' ?></h2>
                						    
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3">
                <ul class="meta-search">
                  <li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo $pro->nombre ?></span></li>
                  <li><i class="glyphicon glyphicon-time"></i> <span><?php echo $pro->pais ?></span></li>
                  <li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $pro->sector ?></span></li>
                  
                </ul>
                
              </div>
              <span class="clearfix borda">  
              </span>
            </article>
          </li>
          <?php
        }
      ?>
        
          
      </ul>
      <ul class="pagination"></ul>
    </section>


    <style>
    @import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";




hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 5px; }
.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 50px; }
.search-result ul { padding-left: 0 !important; list-style: none;  }
.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
.search-result ul li i { padding-right: 5px; }
.search-result .col-md-7 { position: relative; }
.search-result h2 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h2 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
.search-result span.plus { position: absolute; right: 0; top: 126px; }
.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
.search-result span.plus a:hover { background-color: #414141; }
.search-result span.plus a i { color: #fff !important; }
.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
    </style>