<?php
require_once('basic_m.php');
class User_card_m extends Basic_m{
    public function get_card(){
		/* Genero la consulta */
		$consulta = "SELECT * FROM tarjetas";
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function delete_card_by_id(){
		/* Genero la consulta */
		$consulta = "DELETE FROM tarjetas WHERE tarjetas.id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_result($consulta);
    }

    public function create_card(){
				/* Genero la consulta */
				$consulta = "INSERT INTO tarjetas (tipo,numero,fecha_exp,cvv,usuario) VALUES ('".$_POST['tipo']."','".$_POST['numero']."','".$_POST['fecha_exp']."','".$_POST['cvv']."','".$_SESSION['user_id']."')";

		
				/* Realizo la consulta a la DB */
				return $this->get_result($consulta);
    }

    public function get_carddata_by_id(){
		/* Comprobar que existe el animal */
		/* Genero la consulta */
		$consulta = "SELECT * FROM tarjetas WHERE id='".$_GET['id']."'";
		
		/* Guardo el resultado */
		return $this->get_single_result($consulta);
    }

    public function edit_card(){
				/* Genero la consulta */
				$consulta = "UPDATE tarjetas SET tipo = '".$_POST['tipo']."', numero = '".$_POST['numero']."', fecha_exp = '".$_POST['fecha_exp']."',cvv = '".$_POST['cvv']."' WHERE tarjetas.id='".$_GET['id']."'";
				
				/* Guardo el resultado */
				return $this->get_result($consulta);
    }
    
    public function get_cardid_by_numero(){
		   /* Genero la consulta */
		   $consulta = "SELECT id FROM tarjetas WHERE numero='".$_POST['numero']."'";
		
			/* Guardo el resultado */
			return $this->get_single_result($consulta);
    }

}
?>