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
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Registro de las operaciones de productos</h4>                
              </div>
              <div class="card-body ">
                  <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="">
                      <th>
                        Producto
                      </th>
                      <th>
                        Nº Doc
                      </th>
                      <th>
                        Tipo
                      </th>
                      <th>
                        Cant
                      </th>
                      <th>
                        Monto
                      </th>                      
                      <th>
                        Total
                      </th>
                      <th>
                        Fecha
                      </th>
                      <!--<th>
                        Stock
                      </th>
                      <th>
                        Valor
                      </th>-->
                    </thead>
                    <tbody>
                      <?php foreach ($operaciones as $p):?>
                      <tr>
                        <td>
                          <?=$this->producto->getProducto($p->id_producto)->nombre;?>
                        </td>
                        <td>
                          <?=$p->nro_documento;?>
                        </td>
                        <td>
                        <?php switch($p->tipo_operacion){
                              case 'e':
                                echo 'Entrada';
                                break;
                              case 's':
                                echo 'Salida';
                                break;
                          }
                          ?>
                        </td>
                        <td>                          
                            <?=number_format($p->cantidad,2,',','.')?>
                        </td>
                        <td>                          
                            <?=number_format($p->monto,2,',','.')?>
                        </td>
                        <td>
                            <?=number_format($p->total,2,',','.')?>
                        </td>
                        <td>
                          <?=date('d-m-Y H:i:s',strtotime($p->fecha));?>
                        </td>
                       <!-- <td>
                            <?=number_format($p->stock,2,',','.')?>
                        </td>
                        <td>
                            <?=number_format($p->valor,2,',','.')?>
                        </td>-->
                      </tr>                      
                      <?php endforeach;?>
                    </tbody>
                  </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>