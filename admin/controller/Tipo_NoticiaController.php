<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Tipo_Noticia.php';
class Tipo_NoticiaController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new Tipo_Noticia();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Tipo_Noticia&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Noticia/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new Tipo_Noticia();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Noticia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save()
    {
        $obj = new Tipo_Noticia();
        if ($_POST['idtiponoticia']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=Tipo_Noticia');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=Tipo_Noticia';
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
                  header('Location: index.php?controller=Tipo_Noticia');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=Tipo_Noticia';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
    public function delete(){
        $obj = new Tipo_Noticia();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Tipo_Noticia&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Tipo_Noticia';
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
        $view->setTemplate( '../view/Tipo_Noticia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new Tipo_Noticia();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/Tipo_Noticia/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>