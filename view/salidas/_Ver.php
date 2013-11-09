<?php include("../lib/functions.php");?>
<script type="text/javascript" src="js/app/evt_salidas.js" ></script>
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
<h6 class="ui-widget-header">DETALLE DE SALIDA DE MATERIAL</h6>
<center>
	<?php 
    foreach ($obj as $key => $value)
     { 
          $entregado=$value[1];
          $fecha=$value[4];
      }
    ?>

	<br><br>
<table width='500'>
<tr style='text-align:center'>
<td><label><b>ENTREGADO:</b></label></td>

<td><label><b>FECHA ENTREGA:</b></label></td>

</tr>
<tr style='text-align:center'>
<td><?php echo $entregado;?></td>
<td><?php echo ffecha($fecha);?></td>
</tr>
</table>
<br><br>
<table class="ui-widget ui-widget-content" style="width: 860px; margin: 0 auto; ">
<thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >MATERIAL</th>
            <th >CANTIDAD</th>
        </tr>
    </thead>
<?php 
 $s=0;
foreach ($obj as $key => $value) { ?>
	<tr style='text-align:center'>
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
    </tr>
    <?php }?>
</table>	
<br>

<BR><BR>            
<a href="index.php?controller=salidas" class="button">ATRAS</a>
</center>
</div>