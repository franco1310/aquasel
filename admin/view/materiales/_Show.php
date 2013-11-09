<script type="text/javascript" src="js/app/evt_materiales.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#fecha").datepicker({ dateFormat:'yy-mm-dd' });
});
</script>
<div class="div_container">
<h6 class="ui-widget-header">Mantenimiento - Materiales</h6>
<form id="frm" action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="materiales"/>
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px;">
                <!--<label for="idtiponoticia" class="labels">Codigo:</label>-->
                <input type="hidden" id="idm" name="idm" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idm; ?>" readonly />
                <br/>
                <label for="descripcion" class="labels">MATERIAL:</label>
                 <input type="text" id="descripcion" maxlength="250" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width:350px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <br/>
				<label for="cantidad" class="labels" style="margin-left:-252px">CANTIDAD:</label>
                 <input type="text" id="cantidad" maxlength="100" name="cantidad" class="text ui-widget-content ui-corner-all" style=" width:100px; text-align: left;" value="<?php echo $obj->cantidad; ?>" />          
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="delete" class="button">GRABAR</a>
            <a href="index.php?controller=materiales" class="button">ATRAS</a>
          </div>
        </div>
    </div>
</form>
</div>