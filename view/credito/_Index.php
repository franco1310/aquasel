<?php include("../lib/functions.php");?>
<script type="text/javascript" src="js/app/evt_credito.js" ></script>
<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });
</script>
<h6 class="ui-widget-header">REGISTRO DE CREDITOS</h6>
<div class="div_container" style="background: #fff; padding: 10px; padding-top: 5px; border-bottom: 1px solid #dadada;"  >
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="credito" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=credito&action=create" class="button" > Nuevo </a>
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 100%; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >CLIENTE</th>
            <th >DOCUMENTO</th>
            <th >FECHA VENTA</th>
            <th >TOTAL</th>
            <th style='text-align:center'>VER CREDITO</th>
        
            <th style='text-align:center'>ANULAR</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>

        <?php if($value[4]==1){echo "<tr style='color:#999;font-style:italic;background:#F3E2A9'>"; }
        else{"<tr style='color:#FFF'>";}?>


        
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo ffecha($value[3]); ?></td>
            <td ><?php  echo 'S/.'.$value['total']; ?></td>
                  
            <td style='text-align:center'><a href="index.php?controller=credito&action=ver&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/shop.png" /></a></td>
           
            
        <?php if($value[4]==1){echo '<td style="text-align:center">-</td>';}
            else{echo "<td style='text-align:center'><a href='#' title='Anular' class='anula' id='".$value[0]."'><img alt='' src='images/minus.png' height='16' width='16' /></a></td>";}
        ?>
        
            
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>