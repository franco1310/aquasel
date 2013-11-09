<?php include("../lib/functions.php");?>
<script type="text/javascript" src="js/app/evt_credito.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#fecharegistro").datepicker({ dateFormat:'yy-mm-dd' });
  $("#pago").click(function(){
      $("#frm").submit();
  });
  $('#pall').toggle(
    function() {
       $('.ckk').each(function(i,j)
      {
          $(j).attr("checked",true);
      }
      );
    },
    function() {
      $('.ckk').each(function(i,j)
      {
          $(j).attr("checked",false);
      }
      );
    }
    );
  
	})
</script>
<?php 
    foreach ($obj as $key => $value)
     { 
          $cliente=$value[4];
          $fecha=$value[3];
          $c=$value[1];
      }
    ?>
<div class="div_container">
<h6 class="ui-widget-header">Datos del credito</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="credito" />
    <input type="hidden" name="action" value="pago" />
     <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 100%; ">
                <!--<label for="idtipousuario" class="labels">Codigo:</label>-->
                <center>
                  
              <fieldset class='ui-corner-all' style='border-radius:10px'>
                <input type="hidden" id="idmov" name="idmov" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmov; ?>" />
                <br/>
                <label for="idtm"  class="labels">Usuario:</label>                                 
                <?php echo $_SESSION['name'];?>
                <input id="idusuario" type="hidden" maxlength="100" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $_SESSION['id']; ?>" />
                <label class="labels">Fecha:</label> 
                <?php echo date('d/m/Y');?>
                <input id="fechamov" type="hidden" maxlength="100" name="fechamov" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo date('Y-m-d'); ?>" />
                <br><br>
                
               <div id='ingreso'>

                <label for="nombre_razon" class="labels">Cliente:</label>
                <input id="nombre_razon" maxlength="100" name="nombre_razon" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $cliente; ?>" readonly="readonly";/>
                <input type="hidden" id="idc" name="idc" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $_GET['id']; ?>" />
                               
                <br/><br>

                <fieldset class='ui-corner-all ui-widget-content' style='width:90%'>
                  <legend>
                   DETALLE
                  </legend>
               <input type="hidden" id="idmat" name="idmat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="1" />
               <!--
               <label for="cantidad" class="labels">Cantidad:</label>
               <input id="cantidad" maxlength="100" name="cantidad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php //echo $obj->cantidad; ?>" />
               <input type="hidden" id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="Agua" />
              
              <label for="precio" class="labels">Precio:</label>
              <input id="precio" maxlength="100" name="precio" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php //echo $obj->precio; ?>" />
             --> 
             <table border=0 style='float:right;' >
             <!-- <tr>
                <td><a onClick="fn_add(5)" id='fn_add'><img src="../web/images/add.png" width='30' height='30'></a></td>
             </tr>
            -->
             </table>
             
             </fieldset>
             <br><br>
             
             <!-- GRILLA INGRESO ********************************************************************** -->
             <table class="ui-widget ui-widget-content" style="width: 100%; margin: 0 auto; ">
<thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >FECHA</th>
            <th >CANTIDAD</th>
            <th >PRECIO</th>
            <th >SUB-TOTAL</th>
            <th >PAGO <a href="#" id="pall">Pay All</a></th>
        </tr>
    </thead>
<?php 
 $s=0;
foreach ($obj as $key => $value) { ?>
  <tr style='text-align:center'>
            <td ><input type="hidden" name="iddetmov" value="<?php  echo $value[0]; ?>"><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo 'S/.'.$value[5]; ?></td>
            <td ><?php  echo 'S/.'.$value[6]; ?></td>
            <td ><input class="ckk" type="checkbox" name="ck[]" value="<?php  echo $value[0]; ?>"></td>
    </tr>
<?php $s=$s+$value[6];}?>
    <tr style='text-align:center'>
      <td>&nbsp;</td><td>&nbsp;</td>
      <td>&nbsp;</td><td><b>TOTAL</b></td>
      <td><?php echo '<b>S/.'.number_format($s,2).'</b>';?></td>
    </tr>
</table>  
               <br>
              </div>

              </fieldset>
             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="pago" class="button">GUARDAR PAGO</a>
                    <a href="index.php?controller=clientes" class="button">ATRAS</a>
             </div>

        </div>
    </div>
</form>
</div>