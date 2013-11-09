<?php //include('../lib/helpers.php'); ?>
<div id="head-kardex" style="padding: 10px; ">
    <h2>REPORTE DE CLIENTES POR ZONA</h2><br/>
</div>
<div class="contain" style="width:100%;  ">
<table class=" ui-widget ui-widget-content" style="width:100%" >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header" style="height: 23px">
            <th >ITEM</th>
            <th >NOMBRES</th>
            <th >DNI</th>            
            <th >DIRECCION</th>
            <th >ZONA</th>
         </tr>
   </thead>
   <tbody>
       <?php         
       foreach($rowsi as $r)
       {
           $i += 1;
            ?>
            <tr>
                <td align="center"><?php echo $r['idc']; ?></td>
                <td align="center"><?php echo $r['nombres']; ?></td>
                <td align="center"><?php echo $r['dni']; ?></td>
                <td align="center"><?php echo $r['direccion']; ?></td>
                <td align="center"><?php echo $r['zona']; ?></td>
            </tr>
             <?php
            }
           ?>
   </tbody>
</table>      
<div style="clear: both"></div>    
</div>    