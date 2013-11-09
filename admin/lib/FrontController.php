<?php
class FrontControllerException extends Exception {}
class FrontController {
    public static function Main() {   
    $controllerDir = "../controller/";
    // Obtenemos el controlador y la accion
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
                $controller = $_POST['controller'];
                $action = $_POST['action'];
            break;
        default:
                $controller = $_GET['controller'];
                $action = $_GET['action'];
            break;
    }

    if( empty( $controller ) ) { // Comprobamos si esta vacia, si asi es definimos que por defecto cargue Index
        $controller = "Index";
    }
    if( empty( $action ) ) { // Comprobamos tambien..
        $action = "Index";
    }
	
	
    

     // Iniciar Sesion
    /*if (!isset($_SESSION['user']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
         strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'  ) {
        header('Location: Login.php');
    }

    if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
         strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&
         !isset ($_SESSION['user'])   ) {
         header('NOT_AUTHORIZED: 499');
         die();
    }*





   /* if (!isset($_SESSION['user']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'  ) {
        header('Location: cartelera.php');
    }*/
//    if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' &&  !isset ($_SESSION['user'])   ) {
//         header('NOT_AUTHORIZED: 499');
//         die();
//    }
    $controllerFile = $controllerDir . $controller . "Controller.php";
    if( !file_exists( $controllerFile ) ) { // Si no existe el archivo lanzamos una excepcion        
        throw new FrontControllerException( "No se encontro el archivo especificado" );
    }else{
        require_once $controllerFile;
    }    
    $controllerClass = $controller . "Controller";

    if( !class_exists( $controllerClass,false) ) { // Si existe el archivo pero no esta la clase lanzamos otra excepcion
        throw new FrontControllerException( "El controlador fue cargado pero no se encontro la clase" );
    }

    $controllerInst = new $controllerClass();

    if( !is_callable( array( $controllerInst, $action ) ) ) { // Comprobamos si la accion es posible llamarla
        throw new FrontControllerException( "El controlador no tiene definida la accion $accion" );
        } else {
            $controllerInst->$action(); // Llamamos a la accion y dejamos el proceso al controlador
        }
    }
}

?>
