<?php 
require_once "user_c.php";

class User_view_card_c extends user_c{


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
		
		$this->page_title = 'Listado de Tarjetas';
		$this->active = 'tarjetas';

		$model=$this->load_model('user_card_m');
		$this->tarjeta = $model->get_card();

		$this->show_view('user/ver_tarjeta');

	}

	public function ver_tarjeta(){
		
		$this->page_title = 'Listado de tarjetas';
		$this->active = 'listado de tarjetas';

		$model=$this->load_model('user_card_m');
		$this->tarjeta = $model->get_card();

		$this->show_view('user/ver_tarjeta');

	}



}

?>