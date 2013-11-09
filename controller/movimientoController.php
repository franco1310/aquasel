<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/movimiento.php';
class movimientoController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new movimiento();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=movimiento&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/movimiento/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() {
        $obj = new movimiento();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['tipomov'] = $this->Select(array('id'=>'idtm','name'=>'idtm','table'=>'tipomov','code'=>$obj->idtm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/movimiento/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save(){
        $obj = new movimiento();
        if ($_POST['idm']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=movimiento');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=movimiento';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=movimiento');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=movimiento';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new movimiento();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=movimiento&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=movimiento';
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
        $data['tipomov'] = $this->Select(array('id'=>'idtm','name'=>'idtm','table'=>'tipomov','code'=>$obj->idtm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $view->setData($data);
        $view->setTemplate( '../view/movimiento/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new movimiento();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['tipomov'] = $this->Select(array('id'=>'idtm','name'=>'idtm','table'=>'tipomov','code'=>$obj->idtm));
        $data['documento'] = $this->Select(array('id'=>'idd','name'=>'idd','table'=>'documento','code'=>$obj->idd));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/movimiento/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>