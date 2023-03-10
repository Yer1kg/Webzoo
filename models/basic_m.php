<?php
class Basic_m{
    	/**
	* 	Realiza una consulta a la base de datos.
	*
	*	Realiza una consulta a la base de datos según una query y devuelve un sólo resultado.
	*	
	*	@access public
	*	@param	string $query pregunta a la base de datos en formato sql 
	*	@return	object resultado único de la query a la database.
	*/
	public function get_single_result($query){

		/* Importar el archivo del la clase */
		require_once "../controllers/db_c.php";

		/* Instancio la clase */
		$con_db = new db_c();

		
		/* Realizo y devuelvo la consulta a la DB */
		return $con_db->sql_query($query)->fetch_array();

	}

	/**
	* 	Realiza una consulta a la base de datos.
	*
	*	Realiza una consulta a la base de datos según una query y devuelve los resultados.
	*	
	*	@access public
	*	@param	string $query pregunta a la base de datos en formato sql 
	*	@return	object resultadosde la query a la database.
	*/
	public function get_result($query){

		/* Importar el archivo del la clase */
		require_once "../controllers/db_c.php";

		/* Instancio la clase */
		$con_db = new db_c();

		
		/* Realizo y devuelvo la consulta a la DB */
		return $con_db->sql_query($query);

	}
}
?>