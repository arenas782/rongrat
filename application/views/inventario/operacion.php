            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Registrar operación</h4>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="<?=base_url('inventario/operacion_guardar');?>"  autocomplet="off">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Producto</label>
                                            <div class="form-group">
                                               <select class="js-example-basic-single" id="producto" name="id_producto" style="width:100%" required>
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
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Tipo de operación</label>
                                            <div class="form-group">
                                                <select class="js-example-basic-single" id="tipo_operacion" name="tipo_operacion" style="width:100%" required>
                                                    <option value=""></option>        
                                                    <option value="e">Entrada</option>        
                                                    <option value="s">Salida</option>        
                                                </select>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Nro documento</label>
                                            <div class="form-group">
                                                <input type="text" name="nro_documento" id="nro_documento" class="form-control"  >
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Cantidad</label>
                                            <div class="form-group">
                                                <input type="text" name="cantidad" id="cantidad" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Monto</label>
                                            <div class="form-group">
                                                <input type="text" name="monto" id="monto" class="form-control"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Total</label>
                                            <div class="form-group">
                                                <input type="text" name="total" id="total" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>                                                                   
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Stock actual</label>
                                            <div class="form-group">
                                                <input type="text" name="stock_actual" id="stock_actual" class="form-control" min="0.0" step="0.01" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Stock restante</label>
                                            <div class="form-group">
                                                <input type="text" name="stock_restante" id="stock_restante" class="form-control"  placeholder="Stock restante en almacén"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Fecha operación</label>
                                            <div class="form-group">
                                                <input type="text" name="fecha" id="fecha" class="form-control datetimepicker" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="a" value="5" id="a">
                                    <button type="submit" class="btn btn-info btn-round">Enviar</button>
                                </form>
                            </div>                                                                                                                                
                        </div>
                    </div>
                </div>
            </div>