<script type="text/javascript" src="js/app/evt_tipo_Noticia.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Mantenimiento de Tipo de Noticia</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Tipo_Noticia" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px; ">
                <!--<label for="idtiponoticia" class="labels">Codigo:</label>-->
                <input type="hidden" id="idtiponoticia" name="idtiponoticia" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idtiponoticia; ?>" readonly />
                <br/>
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <br/>
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="save" class="button">GRABAR</a>
            <a href="index.php?controller=Tipo_Noticia" class="button">ATRAS</a>
          </div>
        </div>
    </div>
</form>
</div>