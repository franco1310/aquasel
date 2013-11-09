<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Tipo_Usuario.php';
class Tipo_UsuarioController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new Tipo_Usuario();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Tipo_Usuario&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Usuario/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() {
        $obj = new Tipo_Usuario();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Usuario/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save(){
        $obj = new Tipo_Usuario();
        if ($_POST['idtipousuario']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Tipo_Usuario');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Tipo_Usuario';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Tipo_Usuario');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Tipo_Usuario';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new Tipo_Usuario();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Tipo_Usuario&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Tipo_Usuario';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Usuario/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new Tipo_Usuario();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Usuario/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>