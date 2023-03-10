<?php
require_once('basic_m.php');
class Public_registro_m extends Basic_m{
   

    public function get_registro(){

    /* Genero la consulta */
	$consulta = "INSERT INTO usuarios (nombre,apellidos,rol,email,password) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','2','".$_POST['email']."','".$_POST['password']."')";
    return $this->get_result($consulta); 

    }
}
?>