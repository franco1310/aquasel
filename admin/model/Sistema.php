<?php
require_once 'Main.php';
class Sistema extends Main
{
   function index($query , $p ) 
    {
        //Code
    }

    function menu()
    {
        if($_SESSION['idtipo']==1){
         $menu[0] = array('texto'=>'REGISTRO DE SALIDA','url'=>'index.php?controller=dregistro','enlaces'=>array());
        $menu[1] = array('texto'=>'MATERIALES','url'=>'index.php?controller=materiales','enlaces'=>array());
        $menu[2] = array('texto'=>'TIPO USUARIO','url'=>'index.php?controller=Tipo_Usuario','enlaces'=>array());        
        $menu[3] = array('texto'=>'USUARIO','url'=>'index.php?controller=usuario','enlaces'=>array());   
        }
        else{$menu[0] = array('texto'=>'REGISTRO DE SALIDA','url'=>'index.php?controller=dregistro','enlaces'=>array());}
              
        return $menu;
        
   }
}
?>