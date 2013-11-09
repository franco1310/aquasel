<script type="text/javascript" src="js/app/evt_clientes.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Datos de Clientes</h6>
<form id="frm" action="index.php" method="POST">
    <center>
    <input type="hidden" name="controller" value="clientes" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px; ">

                <!--<label for="idtiponoticia" class="labels">Codigo:</label>-->
                <input type="hidden" id="idc" name="idc" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idc; ?>" readonly />
                <br/>
                <label for="nombre_razon" class="labels">NOMBRE/RAZON SOCIAL:</label>
                <input id="nombre_razon" maxlength="100" name="nombre_razon" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre_razon; ?>" />
                <br/>
                 <label for="zona" class="labels" style="margin-left:-52px">ZONA:</label>
                <?php echo $zona; ?> 
                <br/>
                <label for="estado" class="labels" style="margin-left:-52px">BIDON:</label>
                <?php echo $estado; ?> 
                <br/>
                <label for="dni_ruc" class="labels">DNI/RUC:</label>
                <input id="dni_ruc" maxlength="100" name="dni_ruc" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->dni_ruc; ?>" />
                <br/>
                <label for="direccion" class="labels">DIRECCION:</label>
                <input id="direccion" maxlength="100" name="direccion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->direccion; ?>" />
                <br>
                <label for="telefono" class="labels">TELEFONO:</label>
                <input id="telefono" maxlength="100" name="telefono" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->telefono; ?>" />

             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=clientes" class="button">ATRAS</a>
             </div>

        </div>
    </div>
    </center>
</form>
</div>