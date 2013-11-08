<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/contado.php';
class contadoController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new contado();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=contado&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/contado/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new contado();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/contado/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }

    public function save()
    { //var_dump($_POST);die();
        $obj = new contado();
        if ($_POST['idmov']=='') 
        {   
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=contado');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=contado';
              $view->setData($data);
              $view->setTemplate( '../view/_Error_App.php' );
              $view->setLayout( '../template/Layout.php' );
              $view->render();
            }
        } 
        else 
        {
            $p = $obj->update($_POST);
            if ($p[0])
                {
                  header('Location: index.php?controller=contado');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=contado';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
   /* public function anular(){
        $obj = new contado();
        $p = $obj->anular($_POST);
        if ($p[0]){
            header('Location: index.php?controller=contado&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=contado';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }
*/
    public function create() {
        $data = array();
        $view = new View();
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $view->setData($data);
        $view->setTemplate( '../view/contado/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new contado();
        $data = array();
        $view = new View();
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/contado/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
    public function anular() {//var_dump($_GET);die();
        $obj = new contado();
        $data = array();
        $view = new View();
        $obj = $obj->anular($_GET['id']);
       }
    public function ver() {
        $obj = new contado();
        $data = array();
        $view = new View();
        $obj = $obj->ver_detalle($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/contado/_Ver.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>