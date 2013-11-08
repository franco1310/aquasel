<script type="text/javascript" src="js/app/evt_materiales.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#fecha").datepicker({ dateFormat:'yy-mm-dd' });
});
</script>
<div class="div_container">
<h6 class="ui-widget-header">Mantenimiento - Materiales</h6>
<center>
<form id="frm" action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="materiales"/>
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px;">
                <!--<label for="idtiponoticia" class="labels">Codigo:</label>-->
                <input type="hidden" id="idmat" name="idmat" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idmat; ?>" readonly />
                <br/>
                <label for="descripcion" class="labels">MATERIAL:</label>
                 <input type="text" id="descripcion" maxlength="250" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <br/>
                <label for="modelos" class="labels">MODELO:</label>
                <input type="text" id="modelos" maxlength="250" name="modelos" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->modelos; ?>" />
                <br/>
                <label for="marca" class="labels" >MARCA:</label>
                <input type="text" id="marca" maxlength="100" name="marca" class="text ui-widget-content ui-corner-all" style=" width:150px; text-align: left;" value="<?php echo $obj->marca; ?>" />      
                <br>
                <label for="stock" class="labels">STOCK:</label>
                <input type="text" id="stock" maxlength="250" name="stock" class="text ui-widget-content ui-corner-all" style=" width:100px; text-align: left;" value="<?php echo $obj->stock; ?>" />
                <br>
                <label for="stockm" class="labels" >STOCK MINIMO:</label>
                <input type="text" id="stockm" maxlength="250" name="stockm" class="text ui-widget-content ui-corner-all" style=" width:100px; text-align: left;" value="<?php echo $obj->stockm; ?>" />
                <br>
                <label for="idm" class="labels" >MEDIDAS:</label>
                
                 <?php echo $medidas; ?> 

                <br/>
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="delete" class="button">GRABAR</a>
            <a href="index.php?controller=materiales" class="button">ATRAS</a>
          </div>
        </div>
    </div>
</form>
</center>
</div>