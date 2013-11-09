<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/proveedores.php';
class proveedoresController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new proveedores();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=proveedores&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/proveedores/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new proveedores();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/proveedores/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function lista() {
        $obj = new proveedores();
        $data = array();

        $view = new View();
        $data['value'] = $obj->Search_u($_GET["term"]);
        $view->setData($data);
        $view->setTemplate( '../view/_Json.php' );

        echo $view->renderPartial();
    }
    
    public function save()
    {
        $obj = new proveedores();
        if ($_POST['idp']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=proveedores');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=proveedores';
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
                  header('Location: index.php?controller=proveedores');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=proveedores';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
    public function delete(){
        $obj = new proveedores();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=proveedores&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=proveedores';
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
        $view->setTemplate( '../view/proveedores/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new proveedores();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/proveedores/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>