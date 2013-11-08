<script type="text/javascript" src="js/app/evt_proveedores.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Mantenimiento de Proveedores</h6>
<form id="frm" action="index.php" method="POST">
<center>
    <input type="hidden" name="controller" value="proveedores" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px; ">
                <!--<label for="idtiponoticia" class="labels">Codigo:</label>-->
                <input type="hidden" id="idp" name="idp" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idp; ?>" readonly />
                <br/>
                <label for="razon_social" class="labels">RAZON SOCIAL:</label>
                <input id="razon_social" maxlength="100" name="razon_social" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->razon_social; ?>" />
                <br/>
                <label for="ruc" class="labels">RUC:</label>
                <input id="ruc" maxlength="100" name="ruc" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->ruc; ?>" />
                <br/>
                <label for="jiron" class="labels">JIRON:</label>
                <input id="jiron" maxlength="100" name="jiron" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->jiron; ?>" />
                <br>
                <label for="telefono" class="labels">TELEFONO:</label>
                <input id="telefono" maxlength="100" name="telefono" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->telefono; ?>" />
          
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="save" class="button">GRABAR</a>
            <a href="index.php?controller=proveedores" class="button">ATRAS</a>
          </div>
        </div>
    </div>
    </center>
</form>
</div>