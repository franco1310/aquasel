<?php //include('../lib/helpers.php'); ?>
<div id="head-kardex" style="padding: 10px; ">
    <h2>REPORTE DE VENTAS</h2><br/>
</div>
<div class="contain" style="width:100%;  ">
<table class=" ui-widget ui-widget-content" style="width:100%" >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header" style="height: 23px">
            <th >CANTIDAD</th>
            <th >BIDONES</th>
            <th >PRECIO</th>            
            <th >TOTAL</th>
            
         </tr>
   </thead>
   <tbody>
       <?php         
       foreach($rowsi as $r)
       {
           $i += 1;
            ?>
            <tr>
                <td align="center"><?php echo $r['cantidad']; ?></td>
                <td align="center"><?php echo $r['bidones']; ?></td>
                <td align="center"><?php echo $r['precio']; ?></td>
                <td align="center"><?php echo $r['total']; ?></td>
                
            </tr>
             <?php
            }
           ?>
   </tbody>
</table>      
<div style="clear: both"></div>    
</div>    