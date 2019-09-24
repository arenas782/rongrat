<div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Registro de empaquetado</h4>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="<?=base_url('empaquetado/nuevo_guardar');?>"  autocomplet="off">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Pernil</label>
                                            <div class="form-group">
                                                <input type="number" name="pernil" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de pernil" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Paleta</label>
                                            <div class="form-group">
                                                <input type="number" name="paleta" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de paleta" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Peine</label>
                                            <div class="form-group">
                                                <input type="number" name="peine" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de peine" required>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Costilla</label>
                                            <div class="form-group">
                                                <input type="number" name="costilla" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de costilla" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Cantidad de piezas</label>
                                            <div class="form-group">
                                                <input type="number" name="nro_piezas" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de piezas" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Cantidad de cerdos</label>
                                            <div class="form-group">
                                                <input type="number" name="nro_cerdos" class="form-control" min="0.0" step="0.01" placeholder="Cantidad de cerdos" required>
                                            </div>
                                        </div>
                                    </div>                  
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Fecha operación</label>
                                            <div class="form-group">
                                                <input type="text" name="fecha" id="fecha" class="form-control datetimepicker2"  required>
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