<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Alimentos Rongrat</title>
<style>
    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    html * {
   
        margin:10px;
        font-family: Arial, Helvetica, sans-serif;
        font-size:11pt;

}
</style>


</head>
<body>

  <table width="100%">
    <tr>
    <td valign="top"><img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/img/logo.png';?>" width="110" style="margin-top:20px"/></td>
        <td align="right">
            <h3>Alimentos Rongrat C.A.</h3>
            <p> RIF: J-40892210-0<br>Teléfono: xxxx-xxxxxxx<br>Zaraza, estado Guárico         
        </td>
        
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>Fecha de impesión:</strong> <?=date('d/m/Y H:i:s');?> </td>        
    </tr>
    <tr>
        <td style="background-color: white"><strong>Usuario:</strong> <?=$this->session->userdata('usuario');?> </td>        
    </tr>
  </table>

  <br/>
    <h3 style="text-align:center">Reporte de inventario de productos</h3><hr>
  <table width="100%" class="table table-striped">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Costo/Precio</th>
        <th>Stock</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p):?>
            <tr>
                <td><?=$p->codigo;?></td>
                <td><?=$p->nombre;?></td>
                <td><?=number_format($p->costo,2,',','.').' / '.number_format($p->precio,2,',','.');?></td>
                <td><?=number_format($p->stock,2,',','.')?></td>
                <td><?=number_format($p->valor,2,',','.')?></td>
            </tr>
        <?php endforeach;?>      
    </tbody>    
  </table>
</body>
</html> 