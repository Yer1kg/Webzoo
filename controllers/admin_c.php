<?php 
require_once "private_c.php";

class Admin_c extends Private_c{

	public $footer = "footer";
	public $header = "admin_header";
	public $resultado;
	public $validation_errors = '';


	/**
	* 	Constructor
	*
	*	Función constructor.
	*	
	*	@access public
	*/

	function __construct() {
		parent::__construct();
		$this->test_access('admin');
	}

	/**
	* 	Vista index
	*
	*	Nos pmuestra la vista index de este controlador.
	*	
	*	@access public
	*	@return vista de la página index
	*/

	public function index(){
		
		$this->page_title = 'Inicio';
		$this->active = 'inicio';
		$this->show_view('admin/inicio');

	}


}

?>