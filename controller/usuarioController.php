<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/usuario.php';
class usuarioController extends Controller
{
  
   function login() {
          
        $obj = new usuario();
        $_p = $obj->Start();
        if ($_p['flag'] == 1) {
            $obj = $_p['obj'];
            $_SESSION['user'] = $obj->login;
            $_SESSION['name'] = $obj->nombre;
            $_SESSION['tipo'] = $obj->tipo;
            $_SESSION['id'] = $obj->id;
		    $_SESSION['idtipo'] = $obj->idtipo;
            $_SESSION['sexo'] = $obj->sexo;
            //$_SESSION['id_perfil'] = $obj->idperfil;
            //$_SESSION['perfil'] = $obj->perfil;
            header('Location: index.php');           
        }
        else
        {
            header('Location: Login.php?error=1');           
        }
    }

    function logout(){
        session_destroy();
        header('Location: Login.php');
    }
  
  
   public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new usuario();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=usuario&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/usuario/_Index.php' );
        $view->setLayout('../template/Layout.php');

        $view->render();
    }
    public function edit() {
        $obj = new usuario();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipousuario'] = $this->Select(array('id'=>'idtipousuario','name'=>'idtipousuario','table'=>'tipousuario','code'=>$obj->idtipousuario));
        $view->setData($data);
        $view->setTemplate( '../view/usuario/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function save(){
	//var_dump($_POST);die();
        $obj = new usuario();
        if ($_POST['idusuario']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=usuario');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=usuario';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=usuario');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=usuario';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    
    public function delete(){
        $obj = new usuario();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=usuario&');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=usuario';
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
        $data['tipousuario'] = $this->Select(array('id'=>'idtipousuario','name'=>'idtipousuario','table'=>'tipousuario','code'=>$obj->idtipousuario));
        $view->setData($data);
        $view->setTemplate( '../view/usuario/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show() 
    {
        $obj = new usuario();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['tipousuario'] = $this->Select(array('id'=>'idtipousuario','name'=>'idtipousuario','table'=>'tipousuario','code'=>$obj->idtipousuario));
        $data['obj'] = $obj;
        $view->setData($data);
        $view->setTemplate( '../view/usuario/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function search()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new usuario();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=usuario&action=search','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/usuario/_Lista.php' );
        $view->setLayout('../template/List.php');
        $view->render();
    }
}
?>