<?php
    include("../lib/functions.php");
?>
<script type="text/javascript" src="js/app/evt_Usuario.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Datos de usuario</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="usuario" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 910px">
                              <input type="hidden" id="idusuario" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->idusuario; ?>"  <?php echo $readonly; ?> />
             
                <label for="nombre" class="labels">Nombres:</label>
                <input id="nombre" maxlength="100" name="nombre" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre; ?>" />
                
                <label for="appat" class="labels">Apellido Paterno:</label>
                <input id="appat" maxlength="100" name="appat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->appat; ?>" />
                
                <label for="apmat" class="labels">Apellido Materno:</label>
                <input id="apmat" maxlength="100" name="apmat" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->apmat; ?>" />
                <br>
                <label for="direccion" class="labels">Direccion:</label>
                <input id="direccion" maxlength="100" name="direccion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->direccion; ?>" />
                
                <label for="telefono" class="labels">Telefono:</label>
                <input id="telefono" maxlength="100" name="telefono" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->telefono; ?>" />
                <label for="edad" class="labels">Edad:</label>
                <input id="edad" maxlength="100" name="edad" class="text ui-widget-content ui-corner-all" style=" width: 50px; text-align: left;" value="<?php echo $obj->edad; ?>" />
                <br>
                <label for="correo" class="labels">e-mail:</label>
                <input id="correo" maxlength="100" name="correo" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->correo; ?>" />
                
                
                
                <label for="idtipousuario" class="labels">Tipo de usuario:</label>
                <?php echo $tipousuario; ?>
          
                <label for="dni" class="labels">DNI:</label>
                <input id="dni" maxlength="100" name="dni" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->dni; ?>" />
                
                <br>
                             

                <?php if($_SESSION['idtipousuario']!=2){?>
                
                
                
                <label for="login" class="labels">Login:</label>
                <input id="login" maxlength="100" name="login" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->login; ?>" />
                
                <label for="contrasena" class="labels">Password:</label>
                <input type="password" id="contrasena" maxlength="100" name="contrasena" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->contrasena; ?>" />
                
               
                
                <?php }?>

                <label for="estado" style="margin-left: 40px" class="labels">Sexo:</label>
                <?php                   
                    if($obj->estado==true || $obj->estado==false)
                            {
                             if($obj->estado==true){$rep=1;}
                                else {$rep=0;}
                            }
                     else {$rep = 1;}                    
                     sexo('sexo',$rep);
                ?>

             <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="button">ELIMINAR</a>
                    <a href="index.php?controller=usuario" class="button">ATRAS</a>
             </div>

        </div>
    </div>
</form>
</div>