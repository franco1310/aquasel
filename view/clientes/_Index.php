<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });
</script>
<h6 class="ui-widget-header">clientes Registrados</h6>
<div class="div_container" style="background: #fff; padding: 10px; padding-top: 5px; border-bottom: 1px solid #dadada;"  >
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="clientes" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=clientes&action=create" class="button" > Nuevo </a>
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 660px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >NOMBRE/RAZON SOCIAL</th>
            <th >DNI/RUC</th>
            <th >BIDON</th>
            <th >ZONA</th>
            <th style='text-align:center'>Editar</th>
            <th style='text-align:center'>Ver Creditos</th>
            <th style='text-align:center'>Pagos</th>
            <th style='text-align:center'>Eliminar</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo $value['bidon']; ?></td>
            <td ><?php  echo $value[1]; ?></td>
      
            <td style='text-align:center'><a href="index.php?controller=clientes&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <td style='text-align:center'><a href="index.php?controller=credito&action=ver2&id=<?php  echo $value[0]; ?>" title="+ credito"><img alt="" src="images/shop.png" /></a></td>
            <td style='text-align:center'><a href="index.php?controller=credito&action=ver3&id=<?php  echo $value[0]; ?>" title="Pagos"><img alt="" src="images/shop.png" /></a></td>
            <td style='text-align:center'><a href="index.php?controller=clientes&action=show&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/delete.png" height='16' width='16' /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>

</div>
