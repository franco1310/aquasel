<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Noticia.php';
class NoticiaController extends Controller
{
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new Noticia();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Noticia&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Noticia/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() {
        $obj = new Noticia();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
$data['tiponoticia'] = $this->Select(array('id'=>'idtiponoticia','name'=>'idtiponoticia','table'=>'tiponoticia','code'=>$obj->idtiponoticia));
$data['idprocedencia'] = $this->Select(array('id'=>'idprocedencia','name'=>'idprocedencia','table'=>'procedencia','code'=>$obj->idprocedencia));
        $view->setData($data);
        $view->setTemplate( '../view/Noticia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save(){
        $obj = new Noticia();
        if ($_POST['idnoticia']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Noticia');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Noticia';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Noticia');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Noticia';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new Noticia();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Noticia&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Noticia';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }

    public function create() 
    {
        $data = array();
        $view = new View();
        $data['tiponoticia'] = $this->Select(array('id'=>'idtiponoticia','name'=>'idtiponoticia','table'=>'tiponoticia','code'=>$obj->idtiponoticia));
        $data['idprocedencia'] = $this->Select(array('id'=>'idprocedencia','name'=>'idprocedencia','table'=>'procedencia','code'=>$obj->idprocedencia												   
));
		
        $view->setData($data);
        $view->setTemplate( '../view/Noticia/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() 
    {
        $obj = new Noticia();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);

        $data['tiponoticia'] = $this->Select(array('id'=>'idtiponoticia','name'=>'idtiponoticia','table'=>'tiponoticia','code'=>$obj->idtiponoticia));
	$data['idprocedencia'] = $this->Select(array('id'=>'idprocedencia','name'=>'idprocedencia','table'=>'procedencia','code'=>$obj->idprocedencia												   
));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/Noticia/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
		    public function search()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new Noticia();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Noticia&action=search','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Noticia/_Lista.php' );
        $view->setLayout('../template/List.php');
        $view->render();
    }
}
?>