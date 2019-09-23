      <div class="content">
        <div class="row">          
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Resumen - Operaciones recientes</h4>
                <p class="card-category">Últimas 10 operaciones</p>
              </div>
              <div class="card-body ">
                  <div class="table-responsive">
                  <table class="table table-striped">
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
                      <?php foreach ($ultimas_operaciones as $p):?>
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
      