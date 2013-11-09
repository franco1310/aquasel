<?php require("../lib/functions.php");?>
<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
    });
</script>
<h6 class="ui-widget-header">REGISTRO DE SALIDA</h6>
<div class="div_container" style="background: #fff; padding: 10px; padding-top: 5px; border-bottom: 1px solid #dadada;"  >
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="dregistro" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=dregistro&action=create" class="button" > Nuevo </a>
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 1200px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >KARDEX</th>
            <th >MATERIAL</th>
			<th >RESPONSABLE</th>
			<th >LUGAR</th>
			<th colspan='2' style='text-align:center'>SALIDA</th>
            <th colspan='2' style='text-align:center'>RETORNO</th>
            <th>ESTADO</th>
            <th colspan="2">OPCIONES</th>
            
        </tr>
        <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th style='font-size:8px;text-align:center'>Fecha Salida</th>
        <th style='font-size:8px;text-align:center'>Hora Salida</th>
        <th style='font-size:8px;text-align:center'>Fecha Retorno</th>
        <th style='font-size:8px;text-align:center'>Hora Retorno</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
			<td ><?php  echo $value[3]; ?></td>
			<td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo ffecha($value[4]); ?></td>
            <td ><?php  echo $value[6]; ?></td>
            <td ><?php  echo ffecha($value[5]); ?></td>
			<td ><?php  echo $value[7]; ?></td>
            
            

            <?php 

               if($value[8]=='ENTREGADO'){echo '<td style="color:green">'.$value[8].'</td>'; }
                else{echo '<td style="color:red">'.$value[8].'</td>';}
            ?>         
            
            <?php 
               
               if($value[8]=='ENTREGADO')
               {
                echo '<td colspan="2" style="text-align:center"><img alt="" title="ENTREGADO" src="images/check.png" /></td>';
                      
               } 
               else{
                if($_SESSION['name']==$value[3] or $_SESSION['id']==1){
                    echo '<td style="text-align:center"><a href="index.php?controller=dregistro&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            
                      <td style="text-align:center"><a href="index.php?controller=dregistro&action=show&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/view.png" /></a></td>';
                }
                else{
                echo '<td colspan="2" style="text-align:center"><img alt="" title="NO ES TU USUARIO" src="images/x.png" /></td>';
            
                    }
            
                 }
            ?>


            
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>

</div>
