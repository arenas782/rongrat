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
    <h3 style="text-align:center">Reporte general de empaquetado: <?=$desde. ' - '.$hasta?></h3><hr>
  <table width="100%" class="table table-striped">
    <thead style="background-color: lightgray;">
      <tr>        
        <th>Pernil</th>
        <th>Paleta</th>
        <th>Peine</th>
        <th>Costilla</th>
        <th>Nº piezas</th>
        <th>Nº cerdos</th>        
        <th>Fecha</th>        
      </tr>
    </thead>
    <tbody>
        <?php foreach ($totales as $t):?>
            <tr>
                <td>
                    <?=number_format($t->pernil,2,',','.')?>
                </td>
                <td>
                    <?=number_format($t->paleta,2,',','.')?>
                </td>                                                                                                
                <td>                          
                    <?=number_format($t->peine,2,',','.')?>
                </td>
                <td>                          
                    <?=number_format($t->costilla,2,',','.')?>
                </td>                                                
                <td>                          
                    <?=number_format($t->nro_piezas,2,',','.')?>
                </td>
                <td>
                    <?=number_format($t->nro_cerdos,2,',','.')?>
                </td>
                <td>
                    <?=date('d-m-Y',strtotime($t->fecha));?>
                </td>
            </tr>                      
        <?php endforeach;?>
    </tbody>    
  </table>

  <br><hr>
  
</body>
</html> 