<?php 
require_once "admin_c.php";

class Admin_animales_c extends Admin_c{

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
	*	Nos muestra la lista de animales de la app.
	*	
	*	@access public
	*	@return listado de animales
	*/

	public function index(){
		
		$this->page_title = 'Listado de animales';
		$this->active = 'animales';

		$model=$this->load_model('admin_animales_m');
		$this->animales = $model->get_animales();

		$this->show_view('admin/animales');

	}





	/**
	* 	Borrar animal
	*
	*	Borra animal según id.
	*	
	*	@access public
	*/

	public function borrar_animal(){

		$model=$this->load_model('admin_animales_m');
		$this->animales = $model->delete_animales_by_id();

		header("Location: index.php?controller=admin_animales");

	}

	/**
	* 	Crear animal
	*
	*	Crear nuevo animal.
	*	
	*	@access public
	*/

	public function crear_animal(){
		
		$this->page_title = 'Crear animal';
		$this->active = 'crear_animal';

		$modelzoo = $this->load_model('admin_zoos_m');
		$this->zoo_data = $modelzoo->get_zoos();
		

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['especie']) && isset($_POST['descripcion']) && isset($_POST['zoo']) && isset($_POST['imagen'])) {

			//Validar los datos (mostrar errores)
			$this->create_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_animales_m');
				$this->animales = $model->create_animales();
				
				if ($this->animales == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al crear nuevo animal';

				}
				else 
				{

					$this->set_message('success','Exito al crear el nuevo animal');
					header("Location: index.php?controller=admin_animales");

				}

			}
		}

		$this->show_view('admin/crear_animal');

	}

	/**
	* 	Editar animal
	*
	*	Editar animal por id.
	*	
	*	@access public
	*
	*/

	public function editar_animal(){
		
		$this->page_title = 'Editar animal';
		$this->active = 'editar_animal';

		$modelzoo = $this->load_model('admin_zoos_m');
		$this->zoo_data = $modelzoo->get_zoos();
		$model=$this->load_model('admin_animales_m');
		$this->animales = $model->get_animalesdata_by_id();

		if (!isset($this->animales['id'])){

			/* Mensaje de animal no encontrado */
			$this->set_message('warning','Animal no encontrado!');

			header("Location: index.php?controller=admin_animales");

		}

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['especie']) && isset($_POST['descripcion'])) {

			//Validar los datos (mostrar errores)
			$this->edit_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_animales_m');
				$this->animales = $model->edit_animales();
				
				if ($this->animales == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al editar nuevo animal';

				}
				else 
				{

					/* Necesito el rol del admin */
					$this->set_message('success','Exito al editar el animal');
					header("Location: index.php?controller=admin_animales"); 


				}

			}
		}

		$this->show_view('admin/editar_animales');

	}

	private function create_validations(){

		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['especie'])) {

			$this->validation_errors = $this->validation_errors.'Campo especie requerido.<br>';

		}

		if (empty($_POST['descripcion'])) {

			$this->validation_errors = $this->validation_errors.'Campo descripcion requerido.<br>';

		}

		if (empty($_POST['zoo'])) {

			$this->validation_errors = $this->validation_errors.'Campo zoo requerido.<br>';

		}

		if (empty($_POST['imagen'])) {

			$this->validation_errors = $this->validation_errors.'Campo imagen requerido.<br>';

		}


		$model=$this->load_model('admin_animales_m');
		$this->animales = $model->get_animalesid_by_name();

		if (isset($this->animales['id'])){

			$this->validation_errors = $this->validation_errors.'Ya existe un animal con ese nombre, intente otro por favor.<br>';

		} 



	}

	private function edit_validations(){
		
		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['especie'])) {

			$this->validation_errors = $this->validation_errors.'Campo especie requerido.<br>';

		}

		if (empty($_POST['descripcion'])) {

			$this->validation_errors = $this->validation_errors.'Campo descripcion requerido.<br>';

		}

		if (empty($_POST['zoo'])) {

			$this->validation_errors = $this->validation_errors.'Campo zoo requerido.<br>';

		}

		if (empty($_POST['imagen'])) {

			$this->validation_errors = $this->validation_errors.'Campo imagen requerido.<br>';

		}


		$model=$this->load_model('admin_animales_m');
		$this->animales = $model->get_animalesid_by_name();

		if (isset($this->animales['id'])){

			$this->validation_errors = $this->validation_errors.'Ya existe un animal con ese nombre, intente otro por favor.<br>';

		} 

	}

}

?>