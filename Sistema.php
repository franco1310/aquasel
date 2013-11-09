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
        if($_SESSION['tipo']=='ADMINISTRADOR'){
         
         $menu[0] = array('texto'=>'<img src=images/prov.png>MANTENIMIENTOS','url'=>'javascript:','enlaces'=>array());
         $menu[1] = array('texto'=>'<img src=images/medida.png>VENTAS','url'=>'javascript:','enlaces'=>array());
         $menu[2] = array('texto'=>'<img src=images/medida.png>GASTOS','url'=>'index.php?controller=gastos','enlaces'=>array());
         $menu[3] = array('texto'=>'<img src=images/tuser.png>REPORTES','url'=>'javascript','enlaces'=>array());
         $menu[4] = array('texto'=>'<img src=images/tuser.png>TIPO USUARIO','url'=>'index.php?controller=Tipo_Usuario','enlaces'=>array());        
         $menu[5] = array('texto'=>'<img src=images/user.png>USUARIO','url'=>'index.php?controller=usuario','enlaces'=>array());   

         $menu[0]['enlaces'][0] = array('idmodulo'=>'id1','texto'=>'CLIENTES','url'=>'index.php?controller=clientes');
         $menu[0]['enlaces'][1] = array('idmodulo'=>'id1','texto'=>'PROVEEDORES','url'=>'index.php?controller=proveedores');
         $menu[0]['enlaces'][2] = array('idmodulo'=>'id1','texto'=>'TIPO DOCUMENTO','url'=>'index.php?controller=documento');
         
         $menu[1]['enlaces'][0] = array('idmodulo'=>'id1','texto'=>'CONTADO','url'=>'index.php?controller=contado');
         $menu[1]['enlaces'][1] = array('idmodulo'=>'id2','texto'=>'CREDITO','url'=>'index.php?controller=credito');

         $menu[3]['enlaces'][0] = array('idmodulo'=>'id3','texto'=>'CLIENTES POR ZONA','url'=>'index.php?controller=reportes&action=clientes');
         $menu[3]['enlaces'][1] = array('idmodulo'=>'id4','texto'=>'VENTAS','url'=>'index.php?controller=reportes&action=ventas');
         $menu[3]['enlaces'][2] = array('idmodulo'=>'id5','texto'=>'CREDITOS','url'=>'index.php?controller=reportes&action=credito');
        }
        else{$menu[0] = array('texto'=>'<img src=images/shop.png>MATERIALES','url'=>'index.php?controller=materiales','enlaces'=>array());}
              
        return $menu;
        
   }
}
?>