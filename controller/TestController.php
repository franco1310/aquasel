<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author sophie
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Test.php';

class TestController extends Controller {
    //put your code here
    public function ListTest() {
        $Test = new Test();

        $data = array();
        $data['Test'] = $Test->findAll();
        $data['otro'] = "chau";

        $view = new View();

        $view->setData( $data );

        $view->setTemplate( '../view/_List.php' );
        $view->setLayout( '../template/Layout.php' );

        $view->render();
    }
    public function Partial() {
        $Test = new Test();

        $data = array();
        $data['Test'] = $Test->findAll();

        $view = new View();

        $view->setData( $data );

//        $view->setTemplate( '../view/_List.php' );
//        //$view->setLayout( '../template/Layout.php');
//        $content = $view->renderPartial();
//        header('NOT_AUTHORIZED: 499');
//        exit();
        if(is_array($_SERVER['HTTP_ACCEPT'])){
            $data['a']= 'YES';
        }else {
            $data['b']= $_SERVER['HTTP_ACCEPT'];
        }
        print_r(json_encode($data));
        //echo $content;
    }
}
?>
