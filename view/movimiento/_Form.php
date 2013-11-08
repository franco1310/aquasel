<script type="text/javascript" src="js/app/evt_movimiento.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/funciones.js" ></script>

<style type="text/css">
#ingreso{display: none;}
#egreso{display: none;}
#salida{display: none;}
</style>
<script type="text/javascript">
$(document).ready(function(){

$("#fechamov").datepicker({ dateFormat:'yy-mm-dd' });   




});

</script>

<div class="div_container">
<h6 class="ui-widget-header">MANTENIMIENTO DE ALMACEN</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="movimiento" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 900px; ">
                <!--<label for="idtipousuario" class="labels">Codigo:</label>-->
				<center>
              <fieldset class='ui-corner-all' style='border-radius:10px'>
                <input type="hidden" id="idmov" name="idmov" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmov; ?>" readonly />
                <br/>
                <label for="idtm"  class="labels">Usuario:</label>                                 
                <?php echo $_SESSION['name'];?>
                <input id="idusuario" type="hidden" maxlength="100" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $_SESSION['id']; ?>" />
                <label class="labels">Fecha:</label> 
                <?php echo date('d/m/Y');?>
                <input id="fechamov" type="hidden" maxlength="100" name="fechamov" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo date('d/m/Y'); ?>" />
                <br><br>
                <label class="labels">Ingreso/Salida:</label>
                <!--<input id="idtm" type="hidden" maxlength="100" name="idtm" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php //echo $obj->idtm; ?>" />
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php //echo $obj->descripcion; ?>" />
                <a href="javascript:popup('index.php?controller=tipomov&action=search',950,500);" class="button" > Buscar </a>-->
                 <?php echo $tipomov; ?> 
                <br/><br>
                

               <div id='ingreso'>
                
                <label for="razon_social" class="labels">Proveedor:</label>
                <input id="razon_social" maxlength="100" name="razon_social" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->razon_social; ?>" />
                <input type="hidden" id="idp" name="idp" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idp; ?>" />

                <label class="labels">Documento:</label>
                <?php echo $documento; ?> 
                <input id="serie" maxlength="100" name="serie" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->serie; ?>" />
                <input id="num" maxlength="100" name="num" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo $obj->num; ?>" />
               
                               
                <br/><br>

                

                <fieldset class='ui-corner-all ui-widget-content' style='width:880px'>
                  <legend>
                   DETALLE
                  </legend>
               <label for="descripcion" class="labels">Material:</label>
               <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
               <input type="hidden" id="idmat" name="idmat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmat; ?>" />

               <label for="medida" class="labels">Medida:</label>
               <?php echo $medidas; ?>

               <label for="cantidad" class="labels">Cantidad:</label>
               <input id="cantidad" maxlength="100" name="cantidad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->cantidad; ?>" />
              
              <label for="precio" class="labels">Precio:</label>
              <input id="precio" maxlength="100" name="precio" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->precio; ?>" />
              
             <table border=0 style='float:right;' >
              <tr>
                <td><a href='#' onClick="fn_add()" id='fn_add'><img src="../web/images/add.png" width='30' height='30'></a></td>
             </tr>
             </table>
             
             </fieldset>
             <br><br>
             
             <!-- GRILLA INGRESO ********************************************************************** -->
             <table border='1' width='800' id='grilla' class='ui-widget-header'>
              <thead>
               <tr align='center'>
                <td>ITEM</td>
                <td>MATERIAL</td>
                <td>MEDIDA</td>
                <td>CANTIDAD</td>
                <td id='pu'>P.U</td>
                <td id='st'>SUB-TOTAL</td>
                
               </tr>
              </thead>
              <tbody class='ui-widget-grilla'>
              </tbody>
             
             </table>
               <br>
              </div>


               <div id='egreso'>
               <label for="area" class="labels">AREA:</label>
                <input id="area" maxlength="100" name="area" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->area; ?>" />
                <input type="hidden" id="ida" name="ida" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->ida; ?>" />
              
                <label for="entregado" class="labels">ENTREGADO:</label>
                <input id="entregado" maxlength="100" name="entregado" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->entregado; ?>" />
                <br><br> 
                <label for="descripcion" class="labels">Material:</label>
               <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
               <input type="hidden" id="idmat" name="idmat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmat; ?>" />
                
              <label for="medida" class="labels">Medida:</label>
               <?php echo $medidas; ?>

               <label for="cantidad" class="labels">Cantidad:</label>
               <input id="cantidad" maxlength="100" name="cantidad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->cantidad; ?>" />

               <table border=0 style='float:right;' id='fadd' >
              <tr>
                <td><a href='#' onClick="fn_add()"><img src="../web/images/add.png" width='30' height='30'></a></td>
             </tr>
             </table>
             <br><br>

             <!-- GRILLA INGRESO ********************************************************************** -->
             <table border='1' width='800' id='grilla' class='ui-widget-header'>
              <thead>
               <tr align='center'>
                <td>ITEM</td>
                <td>MATERIAL</td>
                <td>MEDIDA</td>
                <td>CANTIDAD</td>             
               </tr>
              </thead>
              <tbody class='ui-widget-grilla'>
              </tbody>
             
             </table>


              </div>  

            

              </fieldset>
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <!--<a href="#" id="save" class="button">GRABAR</a>-->
            <a href="index.php?controller=movimiento" class="button">ATRAS</a>
          </div>
		  </center>
        </div>
    </div>
</form>
</div>