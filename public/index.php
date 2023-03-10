<?php 
/* Configuración global */
require_once '../config/config.php';

/*Iniciamos la gestión de sesiones */
session_start();

/* Variable para controlar los errores */
$error_view = FALSE;

/* Controlador por defecto */

$controlador = constant("DEFAULT_CONTROLLER").'_c';
if(isset($_GET["controller"]))
{ $controlador = $_GET["controller"].'_c';}

/* Vista por defecto */
$metodo = constant("DEFAULT_ACTION");
if(isset($_GET["action"])) 
{ $metodo = $_GET["action"]; }

/* Ruta del controllador */
$ruta_controlador = '../controllers/'.$controlador.'.php';

/* Comprueba que existe el controlador (404) */
if(file_exists($ruta_controlador)) 
{ 
    /* Cargamos el controlador existente */
    require_once $ruta_controlador;
    $controller = new $controlador();

    /* Comprueba si existe el método */
    if(method_exists($controller,$metodo)) 
    {
        /* Comprueba si existe el id */
        if(isset($_GET["id"]))
        {
            /* Llamada al método con parámetros */
            $controller->{$metodo}($_GET["id"]);
        }
        else
        {
            /* Llamada al método sin parámetros */
            $controller->{$metodo}();
        }
    }
    else
    {
        $error_view = 'metodo';
        
    }
}
else
{ 
    $error_view = 'controlador';
}

if ($error_view){
    $error_controller_path = '../controllers/'.constant("ERROR_CONTROLLER").'_c.php';
    require_once $error_controller_path;
    $error_controller_class = constant("ERROR_CONTROLLER").'_c';
    $error_controller = new $error_controller_class();

    $error_controller->error_by_type($error_view);

}

?>