<?php 
require_once "user_c.php";

class User_animales_c extends user_c{

	public $footer = "footer";
	public $header = "user_header";
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
	*	Nos muestra la lista de animales de la app.
	*	
	*	@access public
	*	@return listado de animales
	*/

	public function index(){
		
		$this->page_title = 'Listado de animales';
		$this->active = 'animales';

		$model=$this->load_model('public_animales_m');
		$this->animales = $model->get_animals();

		$this->show_view('animales');

	}



}

?>