<?php
require_once('basic_m.php');
class Admin_usuarios_m extends Basic_m{
    public
    function get_usuarios (){
        /* Genero la consulta */
		$consulta = "SELECT *,usuarios.id AS id,usuarios.nombre AS nombre, roles.nombre AS rol FROM usuarios JOIN roles ON roles.id=usuarios.rol WHERE usuarios.rol='2'";
		
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function delete_usuarios_by_id (){
        /* Genero la consulta */
		$consulta = "DELETE FROM usuarios WHERE usuarios.id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function create_usuarios (){
        		/* Genero la consulta */
				$consulta = "INSERT INTO usuarios (nombre,apellidos,rol,email,password) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','2','".$_POST['email']."','".$_POST['password']."')";
				
				/* Realizo la consulta a la DB */
				return $this->get_result($consulta);
    }

    public function get_usuariosdata_by_id(){
        /* Comprobar que existe el usuario */
		/* Genero la consulta */
		$consulta = "SELECT * FROM usuarios WHERE id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_single_result($consulta);
    }

    public function edit_usuarios (){
        		/* Genero la consulta */
				$consulta = "UPDATE usuarios SET nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."',email = '".$_POST['email']."' WHERE usuarios.id='".$_GET['id']."'";
				
				/* Guardo el resultado */
				return $this->get_result($consulta);
    }
    
    public function get_usuariosid_by_name(){
        	/* Genero la consulta */
			$consulta = "SELECT id FROM usuarios WHERE email='".$_POST['email']."' ";
			
			/* Guardo el resultado */
			return $this->get_single_result($consulta);
    }

}
?>