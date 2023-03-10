<?php 

/* Configuración global */
require_once '../config/config.php';

class Db_c {

	function __construct() {
	}

	public function sql_query($query){

		// Crear conexión

		$conn = new mysqli(constant("DB_HOST"), constant("DB_USER"), constant("DB_PASS"), constant("DB"));

		// Test conexión

		if (!$conn) {

			die("Conexión fallida: " . mysqli_connect_error());

			}

		$result = mysqli_query($conn, $query);

		mysqli_close($conn);

		return $result;

		}

	}

?>
	