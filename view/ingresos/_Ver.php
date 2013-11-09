<?php include("../lib/functions.php");?>
<script type="text/javascript" src="js/app/evt_ingresos.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/funciones.js" ></script>

<style type="text/css">
/*#ingreso{display: none;}
#egreso{display: none;}
#salida{display: none;}
*/
#fn_add{cursor: pointer;}
</style>

<div class="div_container">
<h6 class="ui-widget-header">DETALLE DE LA COMPRA</h6>
<center>
	<?php 
    foreach ($obj as $key => $value)
     { 
          $prov=$value[1];
          $fecha=$value[6];
          $doc=$value[7].'-'.$value[8];
          $rc=$value[9];
      }
    ?>

	<br><br>
<table width='500'>
<tr style='text-align:center'>
<td><label><b>PROVEEDOR:</b></label></td>

<td><label><b>FECHA COMPRA:</b></label></td>

<td><label><b>COMPROBANTE:</b></label></td>

<td><label><b>RESPONSABLE COMPRA:</b></label></td>
</tr>
<tr style='text-align:center'>
<td><?php echo $prov;?></td>
<td><?php echo ffecha($fecha);?></td>
<td><?php echo $doc;?></td>
<td><?php echo $rc;?></td>
</tr>
</table>
<br><br>
<table class="ui-widget ui-widget-content" style="width: 860px; margin: 0 auto; ">
<thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >MATERIAL</th>
            <th >CANTIDAD</th>
            <th >PRECIO</th>
            <th >SUB-TOTAL</th>
        </tr>
    </thead>
<?php 
 $s=0;
foreach ($obj as $key => $value) { ?>
	<tr style='text-align:center'>
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo 'S/.'.$value[4]; ?></td>
            <td ><?php  echo 'S/.'.$value[5]; ?></td>
    </tr>
<?php $s=$s+$value[5];}?>
    <tr style='text-align:center'>
      <td>&nbsp;</td><td>&nbsp;</td>
      <td>&nbsp;</td><td><b>TOTAL</b></td>
      <td><?php echo '<b>S/.'.number_format($s,2).'</b>';?></td>
    </tr>
</table>	
<br>

<BR><BR>            
<a href="index.php?controller=ingresos" class="button">ATRAS</a>
</center>
</div>