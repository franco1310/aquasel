<script type="text/javascript" src="js/app/evt_ingresos.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#fecharegistro").datepicker({ dateFormat:'yy-mm-dd' });
	})
</script>
<div class="div_container">
<h6 class="ui-widget-header">DATOS DE LA COMPRA</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="ingresos" />
    <input type="hidden" name="action" value="anular" />
     <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 900px; ">
                <!--<label for="idtipousuario" class="labels">Codigo:</label>-->
                <center>
                  
              <fieldset class='ui-corner-all' style='border-radius:10px'>
                <input type="hidden" id="idmov" name="idmov" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmov; ?>" />
                <br/>
                <label for="idtm"  class="labels">Usuario:</label>                                 
                <?php echo $_SESSION['name'];?>
                <input id="idusuario" type="hidden" maxlength="100" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $_SESSION['id']; ?>" />
                <label class="labels">Fecha:</label> 
                <?php echo date('d/m/Y');?>
                <input id="fechamov" type="hidden" maxlength="100" name="fechamov" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo date('Y-m-d'); ?>" />
                <br><br>
                
               <div id='ingreso'>
                
                <label for="razon_social" class="labels">Proveedor:</label>
                <input id="razon_social" maxlength="100" name="razon_social" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->razon_social; ?>" readonly />
                <input type="hidden" id="idp" name="idp" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idp; ?>" />

                <label for="resp_compra" class="labels" style='margin-left:20px;width:150px'>Responsable Compra:</label>
                <input id="resp_compra" maxlength="100" name="resp_compra" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->resp_compra; ?>" readonly />
              
                <br><br>
                <label class="labels" style='margin-left:-400px'>Documento:</label>
                <?php if($obj->serie){echo $obj->descripcion;}else{echo $documento;} ?> 
                <input id="serie" maxlength="100" name="serie" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->serie; ?>"readonly />
                <input id="num" maxlength="100" name="num" class="text ui-widget-content ui-corner-all" style=" width: 80px; text-align: left;" value="<?php echo $obj->num; ?>" readonly />
               
                               
                <br/><br>

                
             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="anular" class="button">ANULAR</a>
                    <a href="index.php?controller=ingresos" class="button">ATRAS</a>
             </div>

        </div>
    </div>
</form>
</div>