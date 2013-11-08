<?php
    include("../lib/functions.php");
?>
<script type="text/javascript" src="js/app/evt_Noticia.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Datos del Mensaje</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Noticia" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 780px; ">
                 <!--  <label for="idmensaje" class="labels">Codigo:</label>-->
                <input type="hidden" id="idnoticia" name="idnoticia" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idnoticia; ?>" readonly />
                
				<label for="titulo" class="labels">Titulo:</label>
                <input id="titulo" maxlength="100" name="titulo" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->titulo; ?>" />
				
				<br />
				 <label for="fechapubli" class="labels">Fecha Publicacion:</label>
                <input id="fechapubli" maxlength="100" name="fechapubli" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->fechapubli; ?>" />
				<input id="horapublicacion" maxlength="100" name="horapublicacion" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->horapublicacion; ?>" />
				
				<label for="idusuario" class="labels">Usuario:</label>
                <input type="hidden" id="idusuario" maxlength="100" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 130px; text-align: left;" value="<?php echo $obj->idusuario; ?>" />
                <input id="nombre" maxlength="200" name="nombre" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre; ?>" />
                <a href="javascript:popup('index.php?controller=usuario&action=search',720,400);" class="button" > Buscar </a>
    <br/>
                
               <label for="idtiponoticia" class="labels">Tipo Noticia:</label>
                <?php echo $tiponoticia; ?> 
                    

          <label for="archivo" class="labels">Archivo:</label>
                <input type="file" id="archivo" maxlength="100" name="ruta" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->archivo; ?>" />
                <br />
                <label for="descripcion" class="labels"><b>Descripcion:</b></label><br />
		  <textarea id="descripcion"  name="descripcion" rows="12"  class="text ui-widget-content ui-corner-all" style=" margin-left:85px; width: 700px; text-align: left;"><?php echo $obj->descripcion; ?></textarea>
				<br />
				
             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=Noticia" class="button">ATRAS</a>
             </div>

        </div>
    </div>
</form>
</div>