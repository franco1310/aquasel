<script type="text/javascript" src="js/app/evt_medidas.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Datos de Tipo de Usuario</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="medidas" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px; ">

                <!--<label for="idtipousuario" class="labels">Codigo:</label>-->
                <input type="hidden" id="idm" name="idm" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idm; ?>" readonly="readonly" />
                <br/>
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>" readonly="readonly"/>
                <br/>

             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=medidas" class="button">ATRAS</a>
             </div>
        </div>
    </div>
</form>
</div>