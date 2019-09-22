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
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 col-sm-12 col-xs-12 ">
                                    <label>Producto</label>
                                    <div class="form-group">
                                        <select class="js-example-basic-single" id="producto" name="producto" style="width:100%" required>
                                            <option value=""></option>        
                                            <?php 
                                            if(isset($productos)):
                                                foreach($productos as $p):?>
                                                    <option value="<?=$p->id?>"><?=$p->nombre?></option>        
                                                <?php endforeach;
                                            endif;?>
                                        </select>
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
                            <h4 class="card-title">Resultados</h4>
                        </div>
                        <div class="card-body ">                            
                            <?php if (isset($operaciones)):?>                            
                                <?php if (count($operaciones)>0):?>                                  
                                <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                            <th>
                                                Stock
                                            </th>
                                            <th>
                                                Valor
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
                                                <td>
                                                    <?=number_format($p->stock,2,',','.')?>
                                                </td>
                                                <td>
                                                    <?=number_format($p->valor,2,',','.')?>
                                                </td>
                                                
                                            </tr>                      
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Resumen de operaciones:</h5> <br>
                                        <h5>Producto: <?=$this->producto->getProducto($p->id_producto)->nombre;?></h5><br>
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <th>
                                                    Desde
                                                </th>
                                                <th>
                                                    Hasta
                                                </th>
                                                <th>
                                                    C/Entrada
                                                </th>
                                                <th>
                                                    M/Entrada
                                                </th>
                                                <th>
                                                   C/Salida
                                                </th>
                                                <th>
                                                    M/Salida
                                                </th>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?=$desde?>
                                                    </td>
                                                    <td>
                                                        <?=$hasta?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($cantidad_entrada,2,',','.')?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($monto_entrada,2,',','.')?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($cantidad_salida,2,',','.')?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($monto_salida,2,',','.')?>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="<?=base_url('reportes/pdf_productos_individual/?desde='.$desde.'&hasta='.$hasta.'&id_producto='.$id_producto);?>" class="btn btn-primary" download>Imprimir</a>
                                    </div>
                                </div>                                
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