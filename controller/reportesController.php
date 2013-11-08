<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/reportes.php';
class reportesController extends Controller
{
  public function clientes()
    {

        $data = array();
        $view = new View();  
        $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));      
        $view->setData($data);
        $view->setTemplate( '../view/reportes/_clientes.php' );        
        $view->setlayout( '../template/Layout.php' );
        $view->render();
    }    
    public function html_clientes()
    {
                
        $obj = new reportes();
        $data = array();//var_dump($_GET['idz']);die();
        $result = $obj->data_clientes($_GET['idz']); 
        $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));
        $data['rowsi'] = $result[0];
        $data['rows'] = $result[1];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/reportes/_html_clientes.php');
        echo $view->renderPartial();
    }    
    public function pdf_clientes()
    {
    
        $obj = new reportes();
        $data = array();
        $result = $obj->data_clientes($_GET['idz']);
        $data['rowsi'] = $result[0];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/reportes/_pdf_clientes.php');
        $view->setlayout('../template/empty.php');
        $view->render();
    }

public function ventas()
    {

        $data = array();
        $view = new View();  
       // $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));      
        $view->setData($data);
        $view->setTemplate( '../view/reportes/_ventas.php' );        
        $view->setlayout( '../template/Layout.php' );
        $view->render();
    }    
    public function html_ventas()
    {
                
        $obj = new reportes();
        $data = array(); //var_dump($_GET);die();
        $result = $obj->data_ventas($_GET);
        //$data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));
        $data['rowsi'] = $result[0]; 
        $data['rows'] = $result[1];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/reportes/_html_ventas.php');
        echo $view->renderPartial();
    }    
    public function pdf_ventas()
    {
    
        $obj = new reportes();
        $data = array();
        $result = $obj->data_ventas($_GET);
        $data['rowsi'] = $result[0];
        $data['fechai'] = $_GET['fechai'];
        $data['fechaf'] = $_GET['fechaf'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/reportes/_pdf_ventas.php');
        $view->setlayout('../template/empty.php');
        $view->render();
    }
    
    
}
?>