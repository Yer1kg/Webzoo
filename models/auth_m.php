<?php
require_once('basic_m.php');
class Auth_m extends Basic_m{
   

    public function get_user_data(){

				/* Genero la consulta */
				$consulta = "SELECT usuarios.id AS id,usuarios.nombre AS nombre,roles.nombre AS rol FROM usuarios LEFT JOIN roles ON roles.id=usuarios.rol WHERE email= '".$_POST['email']."' AND password= '".$_POST['password']."'";
				 
				/* Retorno el resultado */
				return $this->get_single_result($consulta);
    }
}
?>