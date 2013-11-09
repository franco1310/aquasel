<?php
require_once '../model/Main.php';
class ControllerException extends Exception{}
class Controller  {
    public function  __call($name, $arguments) {
        throw new ControllerException("Error! El método {$name}  no está definido.");
    }
    public function Select($p) {
        $obj = new Main();
        $obj->table =  $p['table'];
        $data = array();

        $data['rows'] = $obj->getList();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        
        $view = new View();

        $view->setData( $data );

        $view->setTemplate( '../view/_Select.php' );

        return $view->renderPartial();
    }

    public function Pagination( $p ) {

        $data = array();
        $data['rows'] = $p['rows'];
        $data['query'] = $p['query'];
        $data['url'] = $p['url'];

        $view = new View();

        $view->setData( $data );

        $view->setTemplate( '../view/_Pagination.php' );

        return $view->renderPartial();
    }
}
?>
