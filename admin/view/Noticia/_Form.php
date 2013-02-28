<?php
    include("../lib/functions.php");
	date_default_timezone_set('America/Lima');
?>
<script type="text/javascript" src="js/app/evt_Noticia.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="../../web/js/utiles.js"></script>
<script type="text/javascript" src="../web/js/jquery.clockpick.js"></script>

<link rel="stylesheet" type="text/css" href="../web/css/clockpick.css" />

<script type="text/javascript">
$(document).ready(function(){
	$("#fechapubli").datepicker({ dateFormat:'yy-mm-dd' });
	$("#fechafinal").datepicker({dateFormat:'yy-mm-dd'});
	/*$("#horapublicacion").clockpick();*/
	
/*$("#idtiponoticia").change(function(){
  var tipo=$("#idtiponoticia").find(":selected").val();
  if(tipo==9){$("#images").css("display","none");}
  else{$("#images").css("display","block");}
  });*/	
	
});
</script>

<div class="div_container">
<h6 class="ui-widget-header">Mantenimiento Noticia</h6>
<form id="frm" action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="Noticia" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 850px; ">
              <!--  <label for="idmensaje" class="labels">Codigo:</label>-->
                <input type="hidden" id="idnoticia" name="idnoticia" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idnoticia; ?>" readonly />
                
				<label for="titulo" class="labels">Titulo:</label>
                <input id="titulo" maxlength="500" name="titulo" class="text ui-widget-content ui-corner-all" style=" width: 600px; text-align: left;" value="<?php echo $obj->titulo; ?>" />
				<br />
						
				 <label for="fechapubli" class="labels">Fecha Publicacion:</label>
                <input id="fechapubli" maxlength="100" name="fechapubli" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php echo $obj->fechapubli; ?>" />
				
				<label for="horapublicacion" class="labels">Hora Publicacion:</label>
				
                <input id="horapublicacion" maxlength="8" name="horapublicacion" class="text ui-widget-content ui-corner-all" style=" width: 100px; text-align: left;" value="<?php if($obj->horapublicacion!=""){ echo $obj->horapublicacion;} else { echo date('h:i:s:a');} ?>" />
				<input type="hidden" name="hora" id="hora" value="<?php echo date('h:i:s:a');?>" />
				
				
				<label for="idusuario" class="labels">Usuario:</label>
                <input type="hidden" id="idusuario" maxlength="100" name="idusuario" class="text ui-widget-content ui-corner-all" style=" width: 130px; text-align: left;" value="<?php echo $obj->idusuario; ?>" />
                <input id="nombre" maxlength="200" name="nombre" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->nombre; ?>" />
                <a href="javascript:popup('index.php?controller=usuario&action=search',720,400);" class="button" > Buscar </a>
    <br/>
                

       &nbsp;&nbsp;&nbsp; <label for="idtiponoticia" class="labels">Tipo Noticia:</label>
                <?php echo $tiponoticia; ?> 
                    
       
		  
		  <?php
		      if($obj->idnoticia){
			        if($obj->archivo){echo "<center><img src='".$obj->archivo."' width='180' height='150'/></center><br>";}
					else{echo "<center><img src='images/no_foto.gif' width='180' height='150'/></center><br>";}
					 }
		  ?>
		  <!--<div id="images" style="margin-left:260px; margin-top:-30px">-->
          <label for="archivo" class="labels" style="margin-left: 120px">Archivo:</label>
          <input type="file" id="archivo" maxlength="100" name="archivo" class="text ui-widget-content ui-corner-all" style=" width:200px; text-align: left;margin-left:22px"/>
		  <input type="hidden" name="imagen" id="imagen" value="<?php echo $obj->archivo; ?>"/>
		  <!--</div>-->
          <br>      
          
          <label for="procedencia" class="labels">PROCEDENCIA:</label> 
          &nbsp;&nbsp;&nbsp;<?php echo $idprocedencia; ?>
          <label for="estado" style="margin-left: 40px" class="labels">ESTADO:</label>
                <?php                   
                    if($obj->estado==true || $obj->estado==false)
                            {
                             if($obj->estado==true){$rep=1;}
                                else {$rep=0;}
                            }
                     else {$rep = 1;}                    
                     activo('activo',$rep);
                ?>
          <br />
		  	<label for="descripcion" class="labels"><b>Descripcion:</b></label><br />
		  <textarea id="descripcion"  name="descripcion" rows="12"  class="text ui-widget-content ui-corner-all" style=" margin-left:85px; width: 700px; text-align: left;"><?php echo $obj->descripcion; ?></textarea>
				<br />
          <div  style="clear: both; padding: 10px; width: auto;text-align: center">
            <a href="#" id="save" class="button">GRABAR</a>
            <a href="index.php?controller=Noticia" class="button">ATRAS</a>
          </div>
        </div>
    </div>
 </form>
</div>