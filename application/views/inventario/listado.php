    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <?php if($this->session->flashdata('msg')):?>
              <div class="alert alert-<?=$this->session->flashdata('type')?> alert-dismissible fade show" role="alert">
                <strong>Aviso</strong> <?=$this->session->flashdata('msg');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif;?>
            <div class="card">
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
                                <th>Valor</th> 
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Costo/Precio</th>
                                <th>Stock</th>
                                <th>Valor</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if(isset($productos)):
                                    foreach($productos as $p):?>
                                        <tr>    
                                            <td><?=$p->codigo?></td>
                                            <td><?=$p->nombre?></td>
                                            <td><?=number_format($p->costo,2,',','.')?> / <?=number_format($p->precio,2,',','.')?></td>
                                            <td><?=number_format($p->stock,2,',','.')?></td>
                                            <td><?=number_format($p->valor,2,',','.')?></td>
                                            <td><a href="<?=base_url('inventario/editar_producto/').$p->id?>" class="btn btn-primary">Detalles</a></td>
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