<?php 
require_once "user_c.php";
class User_card_c extends User_c{

	/**
	* 	Constructor
	*
	*	Función constructor.
	*	
	*	@access public
	*/
	function __construct() {
		parent::__construct();
		$this->test_access('user');
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
		
		$this->page_title = 'Método de pago';
		$this->active = 'crear tarjeta';
		$this->show_view('user/tarjetas');

	}

		/**
	* 	Borrar tarjeta
	*
	*	Borra tarjeta según id.
	*	
	*	@access public
	*/

	public function borrar_tarjeta(){

		$model=$this->load_model('user_card_m');
		$this->tarjetas = $model->delete_card_by_id();

		$this->set_message('success','Exito al eliminar la tarjeta de crédito');
		header("Location: index.php?controller=user_view_card");

	}

	public function crear_tarjeta(){
		
		$this->page_title = 'Método de pago';
		$this->active = 'crear tarjeta';
		

		/* Comprobar que se reciben los datos */
		if (isset($_POST['tipo']) && isset($_POST['numero']) && isset($_POST['fecha_exp']) && isset($_POST['cvv'])) {

			//Validar los datos (mostrar errores)
			$this->create_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('user_card_m');
				$this->tarjetas = $model->create_card();
				
				if ($this->tarjetas == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al crear una nueva tarjeta';

				}
				else 
				{

					$this->set_message('success','Exito al crear la nueva tarjeta de crédito');
					header("Location: index.php?controller=user_view_card");

				}

			}

		}

		$this->show_view('user/tarjetas');

	}

		/**
	* 	Editar tarjeta
	*
	*	Editar tarjeta por id.
	*	
	*	@access public
	*
	*/

	public function editar_tarjeta(){
		
		$this->page_title = 'Editar tarjeta';
		$this->active = 'editar_tarjeta';

		$model=$this->load_model('user_card_m');
		$this->tarjetas = $model->get_carddata_by_id();


		if (!isset($this->tarjetas['id'])){

			/* Mensaje de tarjeta no encontrado */
			$this->set_message('warning','tarjeta no encontrado!');

			header("Location: index.php?controller=user_card");

		}

		/* Comprobar que se reciben los datos */
		if (isset($_POST['tipo']) && isset($_POST['numero']) && isset($_POST['fecha_exp']) && isset($_POST['cvv'])) {

			//Validar los datos (mostrar errores)
			$this->edit_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('user_card_m');
				$this->tarjeta = $model->edit_card();
		
				
				if ( $this->tarjeta == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al editar nuevo tarjeta';

				}
				else 
				{

					
					$this->set_message('success','Exito al editar la tarjeta');
					header("Location: index.php?controller=user_view_card");


				}

			}
		}

		$this->show_view('user/editar_tarjetas');

	}

	private function create_validations(){

		if (empty($_POST['tipo'])) {

			$this->validation_errors = $this->validation_errors.'Campo tipo requerido.<br>';

		}

		if (empty($_POST['numero'])) {

			$this->validation_errors = $this->validation_errors.'Campo numero requerido.<br>';

		}

		if (empty($_POST['fecha_exp'])) {

			$this->validation_errors = $this->validation_errors.'Campo fecha_exp requerido.<br>';

		}

		if (empty($_POST['cvv'])) {

			$this->validation_errors = $this->validation_errors.'Campo cvv requerido.<br>';

		}


		$model=$this->load_model('user_card_m');
		$this->tarjetas = $model->get_cardid_by_numero();

		if (isset($this->tarjetas['id'])){

			$this->validation_errors = $this->validation_errors.'Ya existe una tarjeta con ese numero, intente otro por favor.<br>';

		}  

		if (strlen($_POST['numero']) < 16){

			$this->validation_errors = $this->validation_errors.'Longitud de numero insuficiente (mínimo 16 caracteres).<br>';

		} 

		if (strlen($_POST['cvv']) > 4) {

			$this->validation_errors = $this->validation_errors.'Longitud de cvv incorrecta (máximo 4 caracteres).<br>';

		}


	}

	private function edit_validations(){

		if (empty($_POST['tipo'])) {

			$this->validation_errors = $this->validation_errors.'Campo tipo requerido.<br>';

		}

		if (empty($_POST['numero'])) {

			$this->validation_errors = $this->validation_errors.'Campo numero requerido.<br>';

		}

		if (empty($_POST['fecha_exp'])) {

			$this->validation_errors = $this->validation_errors.'Campo fecha_exp requerido.<br>';

		}

		if (empty($_POST['cvv'])) {

			$this->validation_errors = $this->validation_errors.'Campo cvv requerido.<br>';

		}


		$model=$this->load_model('user_card_m');
		$this->tarjetasval = $model->get_cardid_by_numero();

		if (isset($this->tarjetasval['id'])){

			$this->validation_errors = $this->validation_errors.'Ya existe una tarjeta con ese numero, intente otro por favor.<br>';

		}  

		if (strlen($_POST['numero']) < 16){

			$this->validation_errors = $this->validation_errors.'Longitud de numero insuficiente (mínimo 16 caracteres).<br>';

		} 

		if (strlen($_POST['cvv']) > 4) {

			$this->validation_errors = $this->validation_errors.'Longitud de cvv incorrecta (máximo 4 caracteres).<br>';

		}



	}

}

?>