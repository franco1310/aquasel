<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/dregistro.php';
class dregistroController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new dregistro();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=dregistro&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/dregistro/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new dregistro();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/dregistro/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save()
    {
        $obj = new dregistro();
        if ($_POST['idr']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=dregistro');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=dregistro';
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
                  header('Location: index.php?controller=dregistro');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=dregistro';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
    public function delete(){
        $obj = new dregistro();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=dregistro&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=dregistro';
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
        $view->setTemplate( '../view/dregistro/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new dregistro();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/dregistro/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>