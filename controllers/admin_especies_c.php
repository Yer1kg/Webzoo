<?php 
require_once "admin_c.php";

class Admin_especies_c extends admin_c{

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
		
	}


	/**
	* 	Vista animales
	*
	*	Nos muestra la lista de especies de los animales de la app.
	*	
	*	@access public
	*	@return listado de animales
	*/

	public function index(){
		
		$this->page_title = 'Listado de especies';
		$this->active = 'especies';

		$model=$this->load_model('admin_especies_m');
		$this->especies = $model->get_especies();
		

		$this->show_view('admin/especies');

	}



}

?>