
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link rel="icon" href="<?=base_url('assets/img/logo.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?=$titulo?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.css"/>
  
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/paper-dashboard.min790f.css?v=2.0.1');?>" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  
  
  <link href="<?=base_url('assets/demo/demo.css');?>" rel="stylesheet" />
  
</head>

<body class="">
  
  <div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="<?=base_url();?>" class="simple-text logo-mini">
          
        </a>
        <a href="<?=base_url();?>" class="simple-text logo-normal">
          <img src="<?=base_url('assets/img/logo.png');?>" width="110">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">          
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                <?=$this->session->userdata('nombre');?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse <?php if($pagina=="perfil") echo 'show';?>" id="collapseExample">
              <ul class="nav">                
                <li class="<?php if($pagina=="perfil") echo 'active';?>">
                  <a href="<?=base_url('perfil');?>">
                    <i class="material-icons">account_circle</i>
                    <span class="sidebar-normal">Perfil</span>
                  </a>
                </li>
                <li>
                  <a href="<?=base_url('logout');?>">
                    <i class="material-icons">power_settings_new</i>
                    <span class="sidebar-normal">Cerrar sesión</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li <?php if($pagina=="inicio") echo 'class="active"';?>>
            <a href="<?=base_url();?>">
            <i class="material-icons">home</i>
              <p>Inicio</p>
            </a>
          </li>
          <li <?php if(($pagina=="inventario") || ($pagina=="operacion_producto") || ($pagina=="nuevo_producto") || ($pagina=="operaciones_productos")) echo 'class="active"';?>>
            <a data-toggle="collapse" href="#pagesExamples">
            <i class="material-icons">storefront</i>
              <p>
                Inventario
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php if(($pagina=="inventario") || ($pagina=="nuevo_producto") || ($pagina=="operacion_producto") || ($pagina=="operaciones_productos"))  echo "show";?> " id="pagesExamples">
              <ul class="nav">
                <li <?php if($pagina=="inventario") echo 'class="active"';?>>
                  <a href="<?=base_url('inventario');?>">
                  <i class="material-icons">list_alt</i>
                    <span class="sidebar-normal"> Listado productos</span>
                  </a>
                </li>
                <li <?php if($pagina=="nuevo_producto") echo 'class="active"';?>>
                  <a href="<?=base_url('inventario/nuevo');?>">
                  <i class="material-icons">add_box</i>
                    <span class="sidebar-normal"> Registrar producto </span>
                  </a>
                </li>
                <li <?php if($pagina=="operacion_producto") echo 'class="active"';?>>
                  <a href="<?=base_url('inventario/operacion');?>">
                  <i class="material-icons">compare_arrows</i>
                    <span class="sidebar-normal"> Entrada/Salida </span>
                  </a>
                </li>                
                <li <?php if($pagina=="operaciones_productos") echo 'class="active"';?>>
                  <a href="<?=base_url('inventario/listado');?>">
                  <i class="material-icons">compare_arrows</i>
                    <span class="sidebar-normal"> Listado de operaciones </span>
                  </a>
                </li> 
              </ul>
            </div>
          </li>
          
          <li <?php if(($pagina=="reporte_individual") || ($pagina=="reporte_general")) echo 'class="active"';?>>
            <a data-toggle="collapse" href="#formsExamples">
              <i class="material-icons">bar_chart</i>
              <p>
                Reportes
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php if(($pagina=="reporte_individual")||($pagina=="reporte_general")) echo 'show';?> " id="formsExamples">
              <ul class="nav">
                <li <?php if($pagina=="reporte_individual") echo 'class="active"';?>>
                  <a href="<?=base_url('reportes/productos/individual');?>">
                  <i class="material-icons">list_alt</i>
                    <span class="sidebar-normal"> Reporte individual </span>
                  </a>
                </li> 
                <li <?php if($pagina=="reporte_general") echo 'class="active"';?>>
                  <a href="<?=base_url('reportes/productos/general');?>">
                  <i class="material-icons">view_list</i>
                    <span class="sidebar-normal"> Reporte general </span>
                  </a>
                </li> 
                <li>
                  <a href="<?=base_url('reportes/productos/stock');?>" download>
                  <i class="material-icons">list</i>
                    <span class="sidebar-normal"> Stock de productos</span>
                  </a>
                </li> 
              </ul>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Inversiones Rongrat</a>            
          </div>            
        </div>
      </nav>