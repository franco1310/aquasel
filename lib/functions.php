<script type="text/javascript" src="../web/editor/scripts/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
	mode : "textareas",
	});
</script>
<?php
function printRadios($n,$items,$select="")
{
  $radios =  '<div style="display:inline" id="div_'.$n.'" >';
  $check = "";  
  foreach($items as $key => $val)
  {
      if(($key+1)==(int)$select){$check="checked";}
        else {$check="";}
      $radios .= '<input type="radio" id="r'.$n.($key+1).'" name="'.$n.'" value="'.($key+1).'" '.$check.' /><label for="r'.$n.($key+1).'">'.$val.'</label>';
  }
  $radios .= '</div>';
  echo $radios;
}

function printRadios_($n,$items,$checked,$d=false)
{
    $radios = "";
    if($d){$disabled="disabled";}
        else {$disabled="";}
    foreach($items as $key=> $val)
    {
        if($val == $checked) {$radios .= '<td align="center" title="'.$val.'"><input class="radproblems" type="radio" name="'.$n.'" id="'.$n.'" value="'.$val.'" checked="checked" '.$disabled.' /></td>';}
            else {$radios .= '<td align="center" title="'.$val.'"><input class="radproblems" type="radio" name="'.$n.'" id="'.$n.'" value="'.$val.'" '.$disabled.' /></td>';}
    }
    echo $radios;
}
function printCheck($n,$items,$checked,$d=false)
{
  if(strlen($n)==4){$zero = "00";}
    else {$zero="0";}
  $radios =  '<div id="cc'.$zero.$n.'" class="checks" >';
  $check = "";
  foreach($items as $key => $val)
  {
      if(count($checked)>0){
          foreach($checked as $keys)
          {
              if($keys == ($key+1))
                  {
                    $radios .= '<input type="checkbox" id="c'.$zero.$n.'_'.($key+1).'" name="c'.$zero.$n.'_'.($key+1).'" checked="checked" value="'.($key+1).'" '.$check.' class="check'.$zero.$n.'" /><label for="c'.$zero.$n.'_'.($key+1).'">'.$val.'</label><br>';
                  }
              else {
                  $radios .= '<input type="checkbox" id="c'.$zero.$n.'_'.($key+1).'" name="c'.$zero.$n.'_'.($key+1).'" value="'.($key+1).'" '.$check.' class="check'.$zero.$n.'" /><label for="c'.$zero.$n.'_'.($key+1).'">'.$val.'</label><br>';
                }
          }
      }
        else {$radios .= '<input type="checkbox" id="c'.$zero.$n.'_'.($key+1).'" name="c'.$zero.$n.'_'.($key+1).'" value="'.($key+1).'" '.$check.' class="check'.$zero.$n.'" /><label for="c'.$zero.$n.'_'.($key+1).'">'.$val.'</label><br>';}
      
  }
  $radios .= '</div>';
  echo $radios;
}
function principales($pregunta,$principales)
{
    $band = false;
    if(count($principales)>0){
    foreach($principales as $val)
    {
        if($pregunta==$val){$band = true;}
    }
    if(!$band){echo '<td align="center" title="Principal"><div class="ui-state-default prin24" style="border:0"><span class="ui-icon ui-icon-circle-plus"></span></div></td>';}
        else {echo '<td align="center" title="Principal"><div class="ui-state-default prin24" style="border:0"><span class="ui-icon ui-icon-check"></span></div></td>';}
    }
    else {
        echo '<td align="center" title="Principal"><div class="ui-state-default prin24" style="border:0"><span class="ui-icon ui-icon-circle-plus"></span></div></td>';
    }
}
function activo($n,$select="")
{  
  $check = ""; 
  $items = array("Si","No");
  $radios =  '<div style="display:inline" id="div_'.$n.'" >';
  foreach($items as $key => $val)
  {
      if((1-$key)==$select){$check="checked";}
        else {$check="";}
      $radios .= '<input type="radio" id="r'.$n.(1-$key).'" name="'.$n.'" value="'.(1-$key).'" '.$check.' /><label for="r'.$n.(1-$key).'">'.$val.'</label>';
  }
  $radios .= '</div>';
  echo $radios;
}

function sexo($n,$select="")
{  
  $check = ""; 
  $items = array("M","F");
  $radios =  '<div style="display:inline" id="div_'.$n.'" >';
  foreach($items as $key => $val)
  {
      if((1-$key)==$select){$check="checked";}
        else {$check="";}
      $radios .= '<input type="radio" id="r'.$n.(1-$key).'" name="'.$n.'" value="'.(1-$key).'" '.$check.' />&nbsp;<label for="r'.$n.(1-$key).'">'.$val.'</label>&nbsp;';
  }
  $radios .= '</div>';
  echo $radios;
}



function combo($n,$items,$select="")
{
    $zero="";
    $combo = '<select name="'.$zero.$n.'" id="'.$zero.$n.'" class="input_text" '.$disabled.' >';
    $combo .= '<option value="">::Seleccione::</option>';
   
    foreach($items as $key => $val)
    {
        if(($key+1)==$select){$combo .= '<option value="'.($key+1).'" selected="selected">'.$val.'</option>';}
           // else {$combo .= '<option value="'.$val.'">'.$val.'</option>';}
            else {$combo .= '<option value="'.($key+1).'">'.$val.'</option>';}
    }
    $combo .= '</select>';
    echo $combo;
}

//Para items con keys
function combo_key($n,$items,$select="",$d=false)
{
    $disabled = "";
    if($d){$disabled="disabled";}
        else {$disabled="";}
    if(strlen($n)==4){$zero = "00";}
    else {$zero="0";}
    $combo = '<select name="'.$zero.$n.'" id="'.$zero.$n.'" class="input_text" '.$disabled.' >';
    $combo .= '<option value="">::Seleccione::</option>';
    foreach($items as $key => $val)
    {
        if($key==$select){$combo .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';}
            else {$combo .= '<option value="'.$key.'">'.$val.'</option>';}
    }
    $combo .= '</select>';
    echo $combo;
}

function igual($respuesta,$dato)
{
    if($respuesta==$dato) {echo 'style="display:none;"';}       
}
function diferente($resp,$dato)
{
  
    if($resp!=$dato && $resp!="") {echo 'style="display:none;"';}
}

function dif_two($rep1,$rep2,$dato)
{
   if($rep1!="" && $rep2!=""){
    if($rep1!=$dato || $rep2!=$dato)
    {
        echo 'style="display:none"';
    }
   }
}

function ffecha($fecha)
{
    $nfecha = explode("-",$fecha);
    return $nfecha[2]."/".$nfecha[1]."/".$nfecha[0];
}
?>
