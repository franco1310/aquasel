<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });
</script>
<h6 class="ui-widget-header">Mantenimiento - Materiales</h6>
<div class="div_container" style="background: #fff; padding: 10px; padding-top: 5px; border-bottom: 1px solid #dadada;"  >
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="materiales" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=materiales&action=create" class="button" > Nuevo </a>
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 660px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >MATERIAL</th>
            <th >MODELO</th>
            <th >MARCA</th>
            <th >STOCK</th>
            <th >Editar</th>
            <th >Eliminar</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        
        <?php if($value[4]<=$value[5]){echo "<tr style='color:#fff;background:#FE2E2E'>"; }
        else{"<tr style='color:#FFF'>";}?>

            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo $value[4]; ?></td>
      
            <td ><a href="index.php?controller=materiales&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <td ><a href="index.php?controller=materiales&action=show&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/delete.png" width='16' height='16' /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>
