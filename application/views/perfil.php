            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata('msg')):?>
                            <div class="alert alert-<?=$this->session->flashdata('type')?> alert-dismissible fade show" role="alert">
                                <strong>Aviso</strong> <?=$this->session->flashdata('msg');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif;?>
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Perfil de usuario</h4>
                            </div>
                            <div class="card-body ">
                                <form method="post" action="<?=base_url('perfil/actualizar');?>"  autocomplet="off">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Nombre</label>
                                            <div class="form-group">
                                                <input type="text"  name="nombre" class="form-control" value="<?=$usuario->nombre;?>" placeholder="Nombres" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Usuario</label>
                                            <div class="form-group">
                                                <input type="usuario" name="usuario" class="form-control" placeholder="Usuario" required value="<?=$usuario->usuario;?>" readonly>
                                            </div>
                                        </div>                                        
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Correo</label>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"  placeholder="Correo" required value="<?=$usuario->email;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Teléfono</label>
                                            <div class="form-group">
                                                <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required value="<?=$usuario->telefono;?>">
                                            </div>
                                        </div>                                        
                                    </div>           
                                    <hr><br>
                                    Si desea cambiar la contraseña, introduzca una nueva       
                                    <div class="row">                                    
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Password</label>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label>Confirmación de password</label>
                                            <div class="form-group">
                                                <input type="password" name="password2" class="form-control" placeholder="Confirmación de password" >
                                            </div>
                                        </div>
                                    </div>                                                 
                                    <input type="hidden" name="id" value="<?=$usuario->id?>">
                                    <button type="submit" class="btn btn-info btn-round">Enviar</button>
                                </form>
                            </div>                                                                                                                                
                        </div>
                    </div>
                </div>
            </div>  