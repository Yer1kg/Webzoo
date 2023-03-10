<?php
require_once('basic_m.php');
class Public_especies_m extends Basic_m{
   

    public function get_especies(){

				/* Genero la consulta */
				$consulta = "SELECT DISTINCT especie FROM animales ORDER BY especie ASC";
				/* Retorno el resultado */
				return $this->get_result($consulta);
    }
}
?>