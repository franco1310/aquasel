<?php
    include("../lib/functions.php");
    date_default_timezone_set('America/Lima');
?>
<script type="text/javascript" src="js/app/evt_dregistro.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>


<script type="text/javascript" src="js/autocomplete/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/autocomplete/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/autocomplete/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="js/autocomplete/ui/jquery.ui.autocomplete.js"></script>
<link type="text/css" href="js/autocomplete/themes/base/jquery.ui.all.css" rel="stylesheet"/>

<script type="text/javascript">
$(document).ready(function(){
	$("#fsalida,#fretorno").datepicker({ dateFormat:'yy-mm-dd' });
    $("#descripcion").autocomplete({ source: "_lmaterial.php" });
    //$("#idusuario").autocomplete({ source: "_lresponsable.php" });
	});
</script>
<div class="div_container">
<h6 class="ui-widget-header">Nuevo Registro de Salidas</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="dregistro" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 1000px; ">
                <!--<label for="idcliente" class="labels">Codigo:</label>-->
                <input type="hidden" id="idr" name="idr" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idr; ?>" readonly />
                <br/>
                <label for="descripcion" class="labels">MATERIAL:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                
			    <label for="id[usuario]" class="labels">RESPONSABLE:</label>
                <input id="nombre" maxlength="100" name="nombre" class="text ui-widget-content ui-corner-all" style=" width: 250px; text-align: left;" value="<?php echo $_SESSION['name'] ?>" readonly/>
                <input id="idusuario" type="hidden" maxlength="100" name="idusuario" style=" width: 50px; text-align: left;" value="<?php echo $_SESSION['id'] ?>"/>
				<label for="lugar" class="labels">LUGAR:</label>
                <input id="lugar" maxlength="100" name="lugar" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->lugar; ?>" />
				<br/>
                <label for="fsalida" class="labels">FECHA SALIDA:</label>
                <input id="fsalida" maxlength="100" name="fsalida" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->fsalida; ?>" />
				<label for="fretorno" class="labels">FECHA RETORNO:</label>
                <input id="fretorno" maxlength="100" name="fretorno" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->fretorno; ?>" />
                <label for="hsalida" class="labels">HORA SALIDA:</label>
                <input id="hsalida" maxlength="100" name="hsalida" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->hsalida; ?>" />
				<label for="hretorno" class="labels">HORA RETORNO:</label>
                <input id="hretorno" maxlength="100" name="hretorno" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->hretorno; ?>" />

                <label for="estado" style="margin-left: 40px" class="labels">ENTREGADO:</label>
                <?php                   
                    if($obj->estado==true || $obj->estado==false)
                            {
                             if($obj->estado==true){$rep=1;}
                                else {$rep=0;}
                            }
                     else {$rep = 1;}                    
                     activo('activo',$rep);
                ?>
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="save" class="button">GRABAR</a>
            <a href="index.php?controller=dregistro" class="button">ATRAS</a>
          </div>
        </div>
    </div>
</form>
</div>