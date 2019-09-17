
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
        <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
          
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
          Rongrat      
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">          
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                Administrador
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#">
                  <i class="material-icons">face</i>
                    <span class="sidebar-normal">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">S</span>
                    <span class="sidebar-normal">Settings</span>
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
              <p>Dashboard</p>
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
          <!--li>
            <a data-toggle="collapse" href="#componentsExamples">
            <i class="material-icons">view_list</i>
              <p>
                Insumos
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="componentsExamples">
              <ul class="nav">
                <li>
                  <a href="components/buttons.html">
                    <span class="sidebar-mini-icon">B</span>
                    <span class="sidebar-normal"> Buttons </span>
                  </a>
                </li>                
              </ul>
            </div>
          </li>-->
          <li <?php if($pagina=="reportes") echo 'class="active"';?>>
            <a data-toggle="collapse" href="#formsExamples">
              <i class="material-icons">bar_chart</i>
              <p>
                Reportes
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php if($pagina=="reportes") echo 'show';?> " id="formsExamples">
              <ul class="nav">
              <li <?php if($pagina=="reportes") echo 'class="active"';?>>
                  <a href="<?=base_url('reportes/productos');?>">
                  <i class="material-icons">compare_arrows</i>
                    <span class="sidebar-normal"> Reporte producción </span>
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