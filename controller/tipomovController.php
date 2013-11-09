<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/tipomov.php';
class tipomovController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new tipomov();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipomov&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipomov/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() {
        $obj = new tipomov();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/tipomov/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
        public function lista() {
        $obj = new tipomov();
        $data = array();

        $view = new View();
        $data['value'] = $obj->Search_u($_GET["term"]);
        $view->setData($data);
        $view->setTemplate( '../view/_Json.php' );

        echo $view->renderPartial();
    }
    
    public function save(){
        $obj = new tipomov();
        if ($_POST['idtm']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=tipomov');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipomov';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {//var_dump($_POST);die();
            $p = $obj->update($_POST);
            if ($p[0]){ 
                header('Location: index.php?controller=tipomov');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=tipomov';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new tipomov();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=tipomov&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=tipomov';
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
        $view->setTemplate( '../view/tipomov/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new tipomov();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/tipomov/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
        public function search()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new tipomov();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=tipomov&action=search','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/tipomov/_Lista.php' );
        $view->setLayout('../template/List.php');
        $view->render();
    }
}
?>