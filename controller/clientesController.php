<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/clientes.php';
class clientesController extends Controller
{
   public function index() 
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new clientes();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=clientes&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/clientes/_Index.php' );
        $view->setLayout('../template/Layout.php');
        $view->render();
    }
    public function edit() 
    {
        $obj = new clientes();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));
        $data['estado'] = $this->Select(array('id'=>'ide','name'=>'ide','table'=>'estado','code'=>$obj->ide));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/clientes/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function lista() {
        $obj = new clientes();
        $data = array();

        $view = new View();
        $data['value'] = $obj->Search_u($_GET["term"]);
        $view->setData($data);
        $view->setTemplate( '../view/_Json.php' );

        echo $view->renderPartial();
    }
    
    public function save()
    {
        $obj = new clientes();
        if ($_POST['idc']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
              header('Location: index.php?controller=clientes');
            } 
            else 
            {
              $data = array();
              $view = new View();
              $data['msg'] = $p[1];
              $data['url'] =  'index.php?controller=clientes';
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
                  header('Location: index.php?controller=clientes');
                } 
            else 
                {
                  $data = array();
                  $view = new View();
                  $data['msg'] = $p[1];
                  $data['url'] =  'index.php?controller=clientes';
                  $view->setData($data);
                  $view->setTemplate( '../view/_Error_App.php' );
                  $view->setLayout( '../template/Layout.php' );
                  $view->render();
                }
        }
    }
    
    public function delete(){
        $obj = new clientes();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=clientes&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=clientes';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
    }

    public function create() {
        $data = array();
        $view = new View();
        $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));
        $data['estado'] = $this->Select(array('id'=>'ide','name'=>'ide','table'=>'estado','code'=>$obj->ide));
        $view->setData($data);
        $view->setTemplate( '../view/clientes/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() {
        $obj = new clientes();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['zona'] = $this->Select(array('id'=>'idz','name'=>'idz','table'=>'zona','code'=>$obj->idz));
        $data['estado'] = $this->Select(array('id'=>'ide','name'=>'ide','table'=>'estado','code'=>$obj->ide));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/clientes/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
       }
}
?>