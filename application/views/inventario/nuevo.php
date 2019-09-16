            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Registro nuevo producto</h4>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="<?=base_url('inventario/nuevo_guardar');?>"  autocomplet="off">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Código</label>
                                            <div class="form-group">
                                                <input type="text"  name="codigo" class="form-control" placeholder="Código de producto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Nombre</label>
                                            <div class="form-group">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required>
                                            </div>
                                        </div>                                        
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Costo</label>
                                            <div class="form-group">
                                                <input type="number" name="costo" class="form-control" min="0.0" step="0.01" placeholder="Costo del producto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Precio</label>
                                            <div class="form-group">
                                                <input type="number" name="precio" class="form-control" min="0.0" step="0.01" placeholder="Precio del producto" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Cantidad en stock</label>
                                            <div class="form-group">
                                                <input type="number" name="stock" class="form-control" min="0.0" step="0.01" placeholder="Cantidad en stock" required>
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