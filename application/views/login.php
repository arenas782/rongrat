
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Inicio de sesión
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />    
  <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/login.css');?>" rel="stylesheet" />  
</head>


<body>
    
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <br>
          <?php if($this->session->flashdata('msg')):?>
            <div class="alert alert-<?=$this->session->flashdata('type');?> alert-dismissible fade show" role="alert">
                <strong>Aviso</strong> <?=$this->session->flashdata('msg');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif;?>
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="text-center">
              <img src="<?=base_url('assets/img/logo.png');?>" width="120" class="text-center">
            </div><hr>
            
            <h4 class="text-center">SISTEMA WEB DE INVENTARIO</h4><hr>
            <h5 class="card-title text-center">Iniciar sesión</h5>
            <form class="form-signin" method="post" action="<?=base_url('check_login');?>">
              <div class="form-label-group">
                <input type="text" id="inputEmail"  name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <label for="inputEmail">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              
              
              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
