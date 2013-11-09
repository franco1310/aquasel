<script type="text/javascript" src="js/app/evt_credito.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/funciones.js" ></script>

<style type="text/css">
/*#ingreso{display: none;}
#egreso{display: none;}
#salida{display: none;}
*/
#fn_add{cursor: pointer;}
</style>
<script type="text/javascript">
$(document).ready(function(){

$("#fechamov").datepicker({ dateFormat:'yy-mm-dd' });   

});

</script>

<div class="div_container">
<h6 class="ui-widget-header">MANTENIMIENTO DE CREDITOS</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="credito" />
    <input type="hidden" name="action" value="save" />
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
                <input id="nombre_razon" maxlength="100" name="nombre_razon" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre_razon; ?>" />
                <input type="hidden" id="idc" name="idc" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idc; ?>" />
                               
                <br/><br>

                <fieldset class='ui-corner-all ui-widget-content' style='width:90%'>
                  <legend>
                   DETALLE
                  </legend>
               <input type="hidden" id="idmat" name="idmat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="1" />
               
               <label for="cantidad" class="labels">Cantidad:</label>
               <input id="cantidad" maxlength="100" name="cantidad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->cantidad; ?>" />
               <input type="hidden" id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="Agua" />
              
              <label for="precio" class="labels">Precio:</label>
              <input id="precio" maxlength="100" name="precio" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->precio; ?>" />
              
             <table border=0 style='float:right;' >
              <tr>
                <td><a onClick="fn_add(5)" id='fn_add'><img src="../web/images/add.png" width='30' height='30'></a></td>
             </tr>
             </table>
             
             </fieldset>
             <br><br>
             
             <!-- GRILLA INGRESO ********************************************************************** -->
             <table border='0' width='100%' id='grilla' class='ui-widget-header'>
              <thead>
               <tr align='center'>
                <th>ITEM</th>
                <th>CONCEPTO</th>
                <th>FECHA VENTA </th>
                <th>CANTIDAD</th>
                <th>P.U</th>
                <th>SUB-TOTAL</th>
                
               </tr>
              </thead>
              <tbody class='ui-widget-grilla'>

                <tfoot>
                 <tr align='center'>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>TOTAL</td>
                  <td>0.00</td>
                  </tr>
                </tfoot>
              </tbody>
             
             </table>
               <br>
              </div>

              </fieldset>
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="save" class="button">GRABAR</a>
            <a href="index.php?controller=credito" class="button">ATRAS</a>
          </div>
          </center>
        </div>
    </div>
</form>
</div>