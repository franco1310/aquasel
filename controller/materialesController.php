<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/materiales.php';
class materialesController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new materiales();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=materiales&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/materiales/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
	
    public function edit() {
        $obj = new materiales();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $view->setData($data);
        $view->setTemplate( '../view/materiales/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
         public function lista() {
        $obj = new materiales();
        $data = array();

        $view = new View();
        $data = $obj->Search_u($_GET["term"]);
        print_r(json_encode($data));
        // $view->setData($data);
        // $view->setTemplate( '../view/_Json.php' );

        // echo $view->renderPartial();
    }
    
    public function save(){ //var_dump($_POST);die;
        $obj = new materiales();//var_dump($_POST);die;
        if ($_POST['idmat']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=materiales');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=materiales';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=materiales');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=materiales';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new materiales();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=materiales&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=materiales';
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
        $view->setData($data);
        $view->setTemplate( '../view/materiales/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new materiales();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['medidas'] = $this->Select(array('id'=>'idm','name'=>'idm','table'=>'medidas','code'=>$obj->idm));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/materiales/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>