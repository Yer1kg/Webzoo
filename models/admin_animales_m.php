<?php
require_once('basic_m.php');
class Admin_animales_m extends Basic_m{
    public
    function get_animales(){
		/* Genero la consulta */
		$consulta = "SELECT * FROM animales";
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function delete_animales_by_id(){
		/* Genero la consulta */
		$consulta = "DELETE FROM animales WHERE animales.id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function create_animales(){
				/* Genero la consulta */
				$consulta = "INSERT INTO animales (nombre,especie,descripcion,zoo,imagen) VALUES ('".$_POST['nombre']."','".$_POST['especie']."','".$_POST['descripcion']."','".$_POST['zoo']."','".$_POST['imagen']."')";

		
				/* Realizo la consulta a la DB */
				return $this->get_result($consulta);
    }

    public function get_animalesdata_by_id(){
		/* Comprobar que existe el animal */
		/* Genero la consulta */
		$consulta = "SELECT * FROM animales WHERE id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_single_result($consulta);
    }

    public function edit_animales(){
				/* Genero la consulta */
				$consulta = "UPDATE animales SET nombre = '".$_POST['nombre']."', especie = '".$_POST['especie']."',descripcion = '".$_POST['descripcion']."' WHERE animales.id='".$_GET['id']."'";
				
				/* Guardo el resultado */
				return $this->get_result($consulta);
    }
    
    public function get_animalesid_by_name(){
		   /* Genero la consulta */
		   $consulta = "SELECT id FROM animales WHERE nombre='".$_POST['nombre']."'";
		
			/* Guardo el resultado */
			return $this->get_single_result($consulta);
    }

}
?>