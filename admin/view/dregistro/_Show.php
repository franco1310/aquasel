<script type="text/javascript" src="js/app/evt_cliente.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#fecharegistro").datepicker({ dateFormat:'yy-mm-dd' });
	})
</script>
<div class="div_container">
<h6 class="ui-widget-header">Datos del Cliente</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="cliente" />
    <input type="hidden" name="action" value="delete" />
     <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 610px; ">
                <!--<label for="idcliente" class="labels">Codigo:</label>-->
                <input type="hidden" id="idcliente" name="idcliente" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idcliente; ?>" readonly />
                <br/>
                <label for="nombres" class="labels">Nombres:</label>
                <input id="nombres" maxlength="100" name="nombres" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombres; ?>" />
			<label for="apellidos" class="labels">Apellidos:</label>
                <input id="apellidos" maxlength="100" name="apellidos" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->apellidos; ?>" />
                <br/>
				<label for="dni" class="labels">Dni:</label>
                <input id="dni" maxlength="100" name="dni" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->dni; ?>" />
				<label for="telefono" class="labels">Telefono:</label>
                <input id="telefono" maxlength="100" name="telefono" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->telefono; ?>" />
				<br />
					<label for="direccion" class="labels">Direccion:</label>
                <input id="direccion" maxlength="100" name="direccion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->direccion; ?>" />
							<label for="email" class="labels">E-mail:</label>
                <input id="email" maxlength="100" name="email" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->email; ?>" />
				<br />
				<label for="fecharegistro" class="labels">Fecha Registro:</label>
                <input id="fecharegistro" maxlength="100" name="fecharegistro" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->fecharegistro; ?>" />
             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=cliente" class="button">ATRAS</a>
             </div>

        </div>
    </div>
</form>
</div>