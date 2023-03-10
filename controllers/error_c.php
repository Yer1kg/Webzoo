<?php

require_once "view_c.php";
class Error_c extends View_c{
	
	public $footer = "footer";
	public $header = "header";

	function __construct() {
		parent::__construct();
	}

	/* Maneja errores */
	public function error_by_type($error_view){

		switch ($error_view) {
			case 'metodo':
				$this->page_title = 'Error Método no encontrado';
				break;

			case 'controlador':
				$this->page_title = 'Error 404 - Página no encontrada';
				break;

			case 'vista':
				$this->page_title = 'Vista no encontrada';
				break;
			
			default:
				$this->page_title = 'Error Indeterminado';
				break;
		}

		$this->show_view('error');

	}

}

?>