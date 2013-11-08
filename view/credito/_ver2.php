<?php include("../lib/functions.php");?>
<script type="text/javascript" src="js/app/evt_credito.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/funciones.js" ></script>
<link rel="STYLESHEET" type="text/css" href="css/imprimir.css" media="print"> 

<div class="div_container">
<h6 class="ui-widget-header">DETALLE DE CREDITO</h6>
<center>
  <?php 
    foreach ($obj as $key => $value)
     { 
          $cliente=$value[4];
          $fecha=$value[3];
          $c=$value[1];
      }
    ?>

  <br><br>
<table width='500'>
<tr style='text-align:center'>
<td><label><b>CLIENTE:</b></label></td>

<td><label><b>FECHA ACTUAL:</b></label></td>
<td><input type="button" id="imprimir" name="imprimir" value="Imprimir" onclick="window.print();"></td>

</tr>
<tr style='text-align:center'>
<td><?php echo $cliente;?></td>
<td><?php echo ffecha(date('Y-m-d'));?></td>
</tr>
</table>
<br><br>
<table class="ui-widget ui-widget-content" style="width: 100%; margin: 0 auto; ">
<thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >FECHA</th>
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
            <td ><?php  echo ffecha($value[3]); ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo 'S/.'.$value[5]; ?></td>
            <td ><?php  echo 'S/.'.$value[6]; ?></td>
    </tr>
<?php $s=$s+$value[6];}?>
    <tr style='text-align:center'>
      <td>&nbsp;</td><td>&nbsp;</td>
      <td>&nbsp;</td><td><b>TOTAL</b></td>
      <td><?php echo '<b>S/.'.number_format($s,2).'</b>';?></td>
    </tr>
</table>  
<br>

<BR><BR>            
<a href="index.php?controller=clientes" class="button" id="back">ATRAS</a>
</center>
</div>