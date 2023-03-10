<?php 
require_once "admin_c.php";

class Admin_zoos_c extends Admin_c{

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
	* 	Vista zoos
	*
	*	Nos muestra la lista de zoos de la app.
	*	
	*	@access public
	*	@return listado de zoos
	*/

	public function index(){
		
		$this->page_title = 'Listado de zoos';
		$this->active = 'zoos';

		$model=$this->load_model('admin_zoos_m');
		$this->zoos = $model->get_zoos();


		$this->show_view('admin/zoos');

	}

	/**
	* 	Borrar zoos
	*
	*	Borra zoos según id.
	*	
	*	@access public
	*/

	public function borrar_zoo(){

		$model=$this->load_model('admin_zoos_m');
		$this->zoos = $model->delete_zoos_by_id();

		header("Location: index.php?controller=admin_zoos");

	}

	/**
	* 	Crear zoo
	*
	*	Crear nuevo zoo.
	*	
	*	@access public
	*/

	public function crear_zoo(){
		
		$this->page_title = 'Crear zoos';
		$this->active = 'crear_zoos';


		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['ciudad'])) {

			//Validar los datos (mostrar errores)
			$this->create_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_zoos_m');
				$this->zoos = $model->create_zoos();
		
				
				if ($this->zoos == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al crear nuevo zoo';

				}
				else 
				{

					/* Necesito el rol del admin */
					$this->set_message('success','Exito al crear el nuevo zoo');
					header("Location: index.php?controller=admin_zoos");

				}

			}
		}

		$this->show_view('admin/crear_zoos');

	}

	/**
	* 	Editar zoo
	*
	*	Editar zoo por id.
	*	
	*	@access public
	*
	*/

	public function editar_zoo(){
		
		$this->page_title = 'Editar zoo';
		$this->active = 'editar_zoo';

		$model=$this->load_model('admin_zoos_m');
		$this->zoos = $model->get_zoosdata_by_id();


		if (!isset($this->zoos['id'])){

			/* Mensaje de zoo no encontrado */
			$this->set_message('warning','Zoo no encontrado!');

			header("Location: index.php?controller=admin_zoos");

		}

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['ciudad'])) {

			//Validar los datos (mostrar errores)
			$this->edit_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_zoos_m');
				$this->zoos = $model->edit_zoos();
		
				
				if ( $this->zoos == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al editar nuevo zoo';

				}
				else 
				{

					/* Necesito el rol del admin */
					$this->set_message('success','Exito al editar el zoo');
					header("Location: index.php?controller=admin_zoos");


				}

			}
		}

		$this->show_view('admin/editar_zoos');

	}

	private function create_validations(){

		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['ciudad'])) {

			$this->validation_errors = $this->validation_errors.'Campo ciudad requerido.<br>';

		}


		$model=$this->load_model('admin_zoos_m');
		$this->zoos = $model->get_zoosid_by_name();

		if (isset($this->zoos['id'])){

			$this->validation_errors = $this->validation_errors.'El nombre del zoo ya esta registrado.<br>';

		} 



	}

	private function edit_validations(){
		
		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['ciudad'])) {

			$this->validation_errors = $this->validation_errors.'Campo ciudad requerido.<br>';

		}



		$model=$this->load_model('admin_zoos_m');
		$this->zoos = $model->get_zoosid_by_name();

		if (isset($this->zoos['id'])){

			$this->validation_errors = $this->validation_errors.'El nombre del zoo ya esta registrado.<br>';

		} 
	}

}

?>