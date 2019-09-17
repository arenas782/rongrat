<div class="content">
        <div class="row">          
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Sistema de control - Insumos e Inventario</h4>
                <p class="card-category">Últimas operaciones</p>
              </div>
              <div class="card-body ">
                  <div class="table-responsive">
                  <table class="table">
                    <thead class="">
                      <th>
                        Producto
                      </th>
                      <th>
                        Nº Documento
                      </th>
                      <th>
                        Tipo
                      </th>
                      <th>
                        Cantidad
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
                          <?=$p->cantidad?>
                        </td>
                        <td>                          
                          <?=$p->monto?>
                        </td>
                        <td>
                          <?=$p->total;?>
                        </td>
                        <td>
                          <?=date('d-m-Y H:i:s',strtotime($p->fecha));?>
                        </td>
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