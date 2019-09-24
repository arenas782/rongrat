<div class="content">
        <div class="row">          
          <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Reporte de empaquetado</h4>                
                    </div>
                    <div class="card-body ">
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  autocomplet="off"> 
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12 offset-md-3" id="desdeinput">
                                    <label>Desde</label>
                                    <div class="form-group">
                                        <input type="text" name="desde" id="desde" class="form-control datetimepicker2" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12" id="hastainput">
                                    <label>Hasta</label>
                                    <div class="form-group">
                                        <input type="text" name="hasta" id="hasta" class="form-control datetimepicker2" required>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row ">
                                <div class="col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">Buscar</button>                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        
            <div class="row">          
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <?php if (isset($totales)):?>                            
                                <h4 class="card-title">Resultados para el período: <?= $desde.' / '.$hasta;?></h4>
                            <?php endif;?>
                        </div>
                        
                        <div class="card-body ">                            
                            <?php if (isset($totales)):?>                            
                                <?php if (count($totales)>0):?>                                  
                                <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                            <?php foreach ($totales as $t):?>
                                            <tr>
                                                <td>
                                                    <?=number_format($t->pernil,2,',','.')?>
                                                </td>
                                                <td>
                                                    <?=number_format($t->paleta,2,',','.')?>
                                                </td>                                                                                                
                                                <td>                          
                                                    <?=number_format($t->peine,2,',','.')?>
                                                </td>
                                                <td>                          
                                                    <?=number_format($t->costilla,2,',','.')?>
                                                </td>                                                
                                                <td>                          
                                                    <?=number_format($t->nro_piezas,2,',','.')?>
                                                </td>
                                                <td>
                                                    <?=number_format($t->nro_cerdos,2,',','.')?>
                                                </td>
                                                <td>
                                                    <?=date('d-m-Y',strtotime($t->fecha));?>
                                                </td>
                                            </tr>                      
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <a href="<?=base_url('reportes/pdf_empaquetado/?desde='.$desde.'&hasta='.$hasta);?>" class="btn btn-primary" >Imprimir</a>
                                </div>
                                <br><br>
                                <?php
                                    else:?>
                                        <h5>No hay operaciones para este producto en este período</h5>                                                                    
                                <?php endif;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>                           
            </div>
      </div>