<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/credito.php';
class creditoController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new credito();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=credito&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/credito/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['area'] = $this->Select(array('id'=>'ida','name'=>'ida','table'=>'area','code'=>$obj->ida));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/credito/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save()
    {
        $obj = new credito();
        if ($_POST['idmov']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=credito');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=credito';
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
                  header('Location: index.php?controller=credito');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=credito';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
    public function delete(){
        $obj = new credito();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=credito&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=credito';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['area'] = $this->Select(array('id'=>'ida','name'=>'ida','table'=>'area','code'=>$obj->ida));
        $view->setData($data);
        $view->setTemplate( '../view/credito/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new credito();
        $data = array();
        $view = new View();
        /*$data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['area'] = $this->Select(array('id'=>'ida','name'=>'ida','table'=>'area','code'=>$obj->ida));
        */
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/credito/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
       public function pago() 
       {
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->pago($_POST);
        $data['obj'] = $obj;
        $view->setData($data);
        header('Location: index.php?controller=credito&action=ver3&id='.$_POST['idc']);
       }

    public function anular() {//var_dump($_GET);die();
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->anular($_GET['id']);
       }
      public function ver() {
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->ver_detalle($_GET['id']);
        $data['obj'] = $obj; //var_dump($obj);die();
        $view->setData($data);
        $view->setTemplate( '../view/credito/_ver.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
       public function ver2() {
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->ver_detalle2($_GET['id']);
        $data['obj'] = $obj; //var_dump($obj);die();
        $view->setData($data);
        $view->setTemplate( '../view/credito/_ver2.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
       public function ver3() {
        $obj = new credito();
        $data = array();
        $view = new View();
        $obj = $obj->ver_detalle2($_GET['id']);
        $data['obj'] = $obj; //var_dump($obj);die();
        $view->setData($data);
        $view->setTemplate( '../view/credito/_show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>