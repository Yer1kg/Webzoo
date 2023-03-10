<?php
require_once('basic_m.php');
class Admin_zoos_m extends Basic_m{
   

    public function get_zoos(){

		/* Genero la consulta */
		$consulta = "SELECT * FROM zoos";
		
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

	public function delete_zoos_by_id(){

		/* Genero la consulta */
		$consulta = "DELETE FROM zoos WHERE zoos.id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return  $this->get_result($consulta);
    }

	public function create_zoos(){
				/* Genero la consulta */
				$consulta = "INSERT INTO zoos (nombre,ciudad) VALUES ('".$_POST['nombre']."','".$_POST['ciudad']."')";
				
				/* Realizo la consulta a la DB */
				return  $this->get_result($consulta);
	}

	public function get_zoosdata_by_id(){

		/* Comprobar que existe el zoo */
		/* Genero la consulta */
		$consulta = "SELECT * FROM zoos WHERE id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return  $this->get_single_result($consulta);
	}

	public function edit_zoos(){
				/* Genero la consulta */
				$consulta = "UPDATE zoos SET nombre = '".$_POST['nombre']."', ciudad = '".$_POST['ciudad']."' WHERE zoos.id='".$_GET['id']."'";
				
				/* Guardo el resultado */
				return $this->get_result($consulta);
	}

	public function get_zoosid_by_name(){

				/* Genero la consulta */
				$consulta = "SELECT id FROM zoos WHERE nombre='".$_POST['nombre']."'";
		
				/* Realizo la consulta a la DB */
				return $this->get_single_result($consulta);
	}



}
?>