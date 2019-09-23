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
    <h3 style="text-align:center">Reporte individual de productos: <?=$producto->codigo. ' - '.$producto->nombre?></h3><hr>
  <table width="100%" class="table table-striped">
    <thead style="background-color: lightgray;">
      <tr>        
        <th>Nº Doc</th>
        <th>Tipo</th>
        <th>Cantidad</th>
        <th>Monto</th>
        <th>Total</th>
        <th>Fecha</th>
        <!--<th>Stock</th>
        <th>Valor</th>-->
      </tr>
    </thead>
    <tbody>
        <?php foreach ($operaciones as $p):?>
            <tr>
                
                <td><?=$p->nro_documento;?></td>
                <td>
                    <?php switch($p->tipo_operacion){
                        case 'e':
                            echo 'Entrada';
                        break;
                        case 's':
                            echo 'Salida';
                        break;
                    }
                ?>
                </td>
                <td><?=number_format($p->cantidad,2,',','.')?></td>
                <td><?=number_format($p->monto,2,',','.')?></td>
                <td><?=number_format($p->total,2,',','.')?></td>
                <td class="fechas"><?=date('d/m/Y H:i:s',strtotime($p->fecha));?></td>
               <!-- <td><?=number_format($p->stock,2,',','.')?></td>
                <td><?=number_format($p->valor,2,',','.')?></td>-->
            </tr>
        <?php endforeach;?>              
    </tbody>    
  </table>

  <hr><br><br>
  <h3 style="text-align:center">Resumen totalizado de operaciones</h3><hr>
  <table width="100%" class="table table-striped">
    <thead style="background-color: lightgray;">
      <tr>        
        <th>Desde</th>
        <th>Hasta</th>
        <th>Cantidad Entrada</th>
        <th>Monto Entrada</th>
        <th>Cantidad Salida</th>
        <th>Monto Salida</th>        
      </tr>
    </thead>
    <tbody>        
            <tr>                
                <td class="fechas"><?=date('d/m/Y H:i:s',strtotime($desde));?></td>
                <td class="fechas"><?=date('d/m/Y H:i:s',strtotime($hasta));?></td>
                <td><?=number_format($cantidad_entrada,2,',','.')?></td>
                <td><?=number_format($monto_entrada,2,',','.')?></td>
                <td><?=number_format($cantidad_salida,2,',','.')?></td>
                <td><?=number_format($monto_salida,2,',','.')?></td>
                
            </tr>        
    </tbody>    
  </table>
  
</body>
</html> 