<?php
require_once('basic_m.php');
class Perfil_m extends Basic_m{
   

    public function get_user_data_by_id(){

				/* Genero la consulta */
				$consulta = "SELECT * FROM usuarios WHERE id='".$_SESSION['user_id']."'";
		
				/* Retorno el resultado */
				return $this->get_single_result($consulta);
    }

	public function update_data(){
		/* Genero la consulta */
		$consulta = "UPDATE usuarios SET nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."',email = '".$_POST['email']."' WHERE usuarios.id='".$_SESSION['user_id']."'";
		/* Retorno el resultado */
		return $this->get_result($consulta);
	}

	public function update_data_with_pass(){
		/* Genero la consulta */
		$consulta = "UPDATE usuarios SET nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."',email = '".$_POST['email']."',password = '".$_POST['password']."' WHERE id='".$_SESSION['user_id']."'";
		/* Retorno el resultado */
		return $this->get_result($consulta);
	}

	public function get_user_data_by_email(){
				/* Genero la consulta */
				$consulta = "SELECT id FROM usuarios WHERE email='".$_POST['email']."'";
				/* Realizo la consulta a la DB */
				return $this->get_single_result($consulta);
	}
}
?>