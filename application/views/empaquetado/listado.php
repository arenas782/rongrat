    <div class="content">
        <div class="row">          
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Resumen - Empaquetados recientes</h4>
                <p class="card-category">Últimas 50 operaciones</p>
              </div>
              <div class="card-body ">
                  <div class="table-responsive">
                  <table class="table table-striped" id="datatable">
                    <thead class="">
                      <th>
                        Pernil
                      </th>
                      <th>
                        Paleta
                      </th>
                      <th>
                        Peine
                      </th>
                      <th>
                        Costilla
                      </th>
                      <th>
                        Nº piezas
                      </th>                      
                      <th>
                        Nº cerdos
                      </th>
                      <th>
                        Fecha
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach ($ultimos_empaquetados as $u):?>
                      <tr>
                        <td>
                            <?=number_format($u->pernil,2,',','.')?>
                        </td>
                        <td>
                            <?=number_format($u->paleta,2,',','.')?>
                        </td>
                        <td>
                            <?=number_format($u->peine,2,',','.')?>                        
                        </td>
                        <td>                          
                            <?=number_format($u->costilla,2,',','.')?>
                        </td>
                        <td>                          
                            <?=number_format($u->nro_piezas,2,',','.')?>
                        </td>
                        <td>
                            <?=number_format($u->nro_cerdos,2,',','.')?>
                        </td>
                        <td>
                            <?=date('d-m-Y',strtotime($u->fecha));?>
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
      