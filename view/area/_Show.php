<script type="text/javascript" src="js/app/evt_area.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">DATOS DE AREA</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="area" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 600px; ">

               <input type="hidden" id="ida" name="ida" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->ida; ?>" readonly />
                <br/>
                <label for="area" class="labels">AREA:</label>
                <input id="area" maxlength="100" name="area" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->area; ?>" />
                <br/>
                <label for="responsable" class="labels" style='margin-left:-25px;'>RESPONSABLE:</label>
                <input id="responsable" maxlength="100" name="responsable" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;margin-left:20px;" value="<?php echo $obj->responsable; ?>" />
             
             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=area" class="button">ATRAS</a>
             </div>
        </div>
    </div>
</form>
</div>