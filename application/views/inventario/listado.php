    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Listado de productos</h4>
                <p class="card-category">Todos los productos disponibles en almacén</p>
              </div>
              <div class="card-body ">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Costo/Precio</th>
                                <th>Stock</th>                                
                              <!--  <th>Acciones</th>-->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Costo/Precio</th>
                                <th>Stock</th>
                                <!--<th>Acciones</th>-->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if(isset($productos)):
                                    foreach($productos as $p):?>
                                        <tr>    
                                            <td><?=$p->codigo?></td>
                                            <td><?=$p->nombre?></td>
                                            <td><?=$p->costo?>/<?=$p->precio?></td>
                                            <td><?=$p->stock?></td>                                
                              <!--              <td><a href="#">Ver detalles</a></td>-->
                                        </tr>                        
                                    <?php 
                                    endforeach;
                            endif;
                            ?>                            
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>