<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });
    
    function get(id,titulo)
    {
        opener.document.getElementById('idcomentario').value=id;
        opener.document.getElementById('titulo').value=titulo;
        window.close();
    }
</script>
<style type="text/css">
body{ background:#2B5621;}
.nav1{ background:#2B5621; color:#FFFFFF}
.nav2{ background:#99CC66; color:#000000}
</style>
<!--<h6 class="ui-widget-header">Usuarios Registrados</h6>-->
<div class="div_container" style="background: #fff; padding: 10px; padding-top: 5px; border-bottom: 1px solid #dadada;"  >
<div class="contain">
<div style="margin: 0 auto; width: 760px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="Noticia" />
        <input type="hidden" name="action" value="search" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 560px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; border:1px solid #003333; color:#003300 " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 900px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header " style="background:#99CC66; color:#000000">
            <th>CODIGO</th>
            <th >TITULO</th>
            <th >DESCRIPCION</th>
            <th >FECHA PUBLICACION</th>            
            <th >Seleccionar</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
		     $c=1; 
		     foreach ($data['rows'] as $key => $value) { 
		        if($c%2==0){echo "<tr class='nav2'>";}
				else{echo "<tr class='nav1'>";}
		?>
        
            <td align="center"><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo utf8_encode(substr($value[2],0,80))."..."; ?></td>
            <td align="center"><?php  echo $value[3]; ?></td>                  
            <td align="center"><a href="javascript:get(<?php echo $value[0] ?>,'<?php echo $value[1]; ?>')" title="Seleccionar"><img src="../web/images/select.png" border="0" width="40" height="40" /></a></td>            
        </tr>
        <?php $c +=1; } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>

</div>