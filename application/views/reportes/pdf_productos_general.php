<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inversiones Rongrat</title>
<style>
    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    html * {
   
        margin:10px;
        font-family: Arial, Helvetica, sans-serif;
        font-size:10pt;

}
.fechas{

    font-size:7pt;
}
</style>


</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/img/logo.png';?>" width="110" style="margin-top:20px"/></td>
        <td align="right">
            <h3>Inversiones Rongrat C.A.</h3>
            <p> RIF: J-1111111-1<br>Teléfono: xxxx-xxxxxxx<br>Zaraza, estado Guárico         
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
    <h3 style="text-align:center">Reporte individual de productos: <?=$desde. ' - '.$hasta?></h3><hr>
  <table width="100%" class="table table-striped">
    <thead style="background-color: lightgray;">
      <tr>        
        <th>Código</th>
        <th>Nombre</th>
        <th>Cantidad Entrada</th>
        <th>Monto Entrada</th>
        <th>Cantidad Salida</th>
        <th>Monto Salida</th>        
      </tr>
    </thead>
    <tbody>
        <?php foreach ($totales as $t):?>
        <tr>
            <td>
                <?=$t['codigo']?>
            </td>
            <td>
                <?=$t['nombre'];?>
            </td>                                                                                                
            <td>                          
                <?=number_format($t['cantidad_entrada'],2,',','.')?>
            </td>
            <td>                          
                <?=number_format($t['monto_entrada'],2,',','.')?>
            </td>                                                
            <td>                          
                <?=number_format($t['cantidad_salida'],2,',','.')?>
            </td>
            <td>                          
                <?=number_format($t['monto_salida'],2,',','.')?>
            </td>
        </tr>                      
        <?php endforeach;?>              
    </tbody>    
  </table>

  <br><hr>
  
</body>
</html> 