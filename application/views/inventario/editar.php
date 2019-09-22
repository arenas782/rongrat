            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Detalles de producto</h4>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="<?=base_url('inventario/update_producto');?>"  autocomplet="off">
                                <input type="hidden" name="id" value="<?=$producto->id?>">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Código</label>
                                            <div class="form-group">
                                                <input type="text"  name="codigo" class="form-control" placeholder="Código de producto" value="<?=$producto->codigo?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Nombre</label>
                                            <div class="form-group">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required value="<?=$producto->nombre?>">
                                            </div>
                                        </div>                                        
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Costo</label>
                                            <div class="form-group">
                                                <input type="number" name="costo" class="form-control" min="0.0" step="0.01" placeholder="Costo del producto" required value="<?=$producto->costo?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Precio</label>
                                            <div class="form-group">
                                                <input type="number" name="precio" class="form-control" min="0.0" step="0.01" placeholder="Precio del producto" required value="<?=$producto->precio?>">
                                            </div>
                                        </div>                                        
                                    </div>                  
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Cantidad en stock</label>
                                            <div class="form-group">
                                                <input type="number" name="stock" class="form-control" min="0.0" step="0.01" placeholder="Cantidad en stock" required value="<?=$producto->stock?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Valor total </label>
                                            <div class="form-group">
                                                <input type="number" name="valor" class="form-control" min="0.0" step="0.01" placeholder="Valor total del producto" required value="<?=$producto->valor?>">
                                            </div>
                                        </div>
                                    </div>                                                 
                                    <button type="submit" class="btn btn-info btn-round">Enviar</button>
                                </form>
                            </div>                                                                                                                                
                        </div>
                    </div>
                </div>
            </div>  