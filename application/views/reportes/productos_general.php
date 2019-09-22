    <div class="content">
        <div class="row">          
          <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Reporte de producción</h4>                
                    </div>
                    <div class="card-body ">
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  autocomplet="off"> 
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12 offset-md-3" id="desdeinput">
                                    <label>Desde</label>
                                    <div class="form-group">
                                        <input type="text" name="desde" id="desde" class="form-control datetimepicker" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12" id="hastainput">
                                    <label>Hasta</label>
                                    <div class="form-group">
                                        <input type="text" name="hasta" id="hasta" class="form-control datetimepicker" required>
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
                                                Código
                                            </th>
                                            <th>
                                                Nombre
                                            </th>                                            
                                            <th>
                                                Cantidad entrada
                                            </th>
                                            <th>
                                                Monto entrada
                                            </th>                                            
                                            <th>
                                                Cantidad salida
                                            </th>
                                            <th>
                                                Monto salida
                                            </th>                                                                  
                                        </thead>
                                        <tbody>
                                            <?php foreach ($totales as $t):?>
                                            <tr>
                                                <td>
                                                <?=$t['codigo']?>
                                                </td>
                                                <td>
                                                <?=$t['nombre'];?>
                                                </td>                                                                                                
                                                <td>                          
                                                    <?=number_format($t['cantidad_entrada'],2,',','.')?>
                                                </td>
                                                <td>                          
                                                    <?=number_format($t['monto_entrada'],2,',','.')?>
                                                </td>                                                
                                                <td>                          
                                                    <?=number_format($t['cantidad_salida'],2,',','.')?>
                                                </td>
                                                <td>                          
                                                    <?=number_format($t['monto_salida'],2,',','.')?>
                                                </td>
                                            </tr>                      
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <a href="<?=base_url('reportes/pdf_productos_general/?desde='.$desde.'&hasta='.$hasta);?>" class="btn btn-primary" >Imprimir</a>
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