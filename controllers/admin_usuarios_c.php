<?php 
require_once "admin_c.php";

class Admin_usuarios_c extends Admin_c{

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
	* 	Vista usuarios
	*
	*	Nos muestra la lista de usuarios de la app.
	*	
	*	@access public
	*	@return listado de usuarios
	*/

	public function index(){
		
		$this->page_title = 'Listado de usuarios';
		$this->active = 'usuarios';

		$model=$this->load_model('admin_usuarios_m');
		$this->usuarios = $model->get_usuarios();

		$this->show_view('admin/usuarios');

	}

	/**
	* 	Borrar usuario
	*
	*	Borra usuario según id.
	*	
	*	@access public
	*/

	public function borrar_usuario(){

		$model=$this->load_model('admin_usuarios_m');
		$this->usuarios = $model->delete_usuarios_by_id();

		header("Location: index.php?controller=admin_usuarios");

	}

	/**
	* 	Crear usuario
	*
	*	Crear nuevo usuario.
	*	
	*	@access public
	*/

	public function crear_usuario(){
		
		$this->page_title = 'Crear usuario';
		$this->active = 'crear_usuario';
		

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

			//Validar los datos (mostrar errores)
			$this->create_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_usuarios_m');
				$this->usuarios = $model->create_usuarios();
				
				if ($this->usuarios == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al crear nuevo usuario';

				}
				else 
				{

					/* Necesito el rol del usuario */
					$this->set_message('success','Exito al crear el nuevo usuario');
					header("Location: index.php?controller=admin_usuarios");

				}

			}
		}

		$this->show_view('admin/crear_usuario');

	}

	/**
	* 	Editar usuario
	*
	*	Editar usuario por id.
	*	
	*	@access public
	*
	*/

	public function editar_usuario(){
		
		$this->page_title = 'Editar usuario';
		$this->active = 'editar_usuario';

		$model=$this->load_model('admin_usuarios_m');
		$this->usuarios = $model->get_usuariosdata_by_id();

		if (!isset($this->usuarios['id'])){

			/* Mensaje de usuario no encontrado */
			$this->set_message('warning','Usuario no encontrado!');

			header("Location: index.php?controller=admin_usuarios");

		}

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email'])) {

			//Validar los datos (mostrar errores)
			$this->edit_validations();
			
			if(empty($this->validation_errors)) {

				$model=$this->load_model('admin_usuarios_m');
				$this->usuario = $model->edit_usuarios();
				
				if ($this->usuario == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al editar nuevo usuario';

				}
				else 
				{

					/* Necesito el rol del usuario */
					$this->set_message('success','Exito al editar el nuevo usuario');
					header("Location: index.php?controller=admin_usuarios");


				}

			}
		}

		$this->show_view('admin/editar_usuario');

	}

	private function create_validations(){

		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['apellidos'])) {

			$this->validation_errors = $this->validation_errors.'Campo apellidos requerido.<br>';

		}

		if (strpos($_POST['email'], '@') == 0 OR strpos($_POST['email'], '.') == 0 ) {

			$this->validation_errors = $this->validation_errors.'Email con formato no válido.<br>';

		}

		$model=$this->load_model('admin_usuarios_m');
		$this->usuarios = $model->get_usuariosid_by_name();

		if (isset($this->usuarios['id'])){

			$this->validation_errors = $this->validation_errors.'Email de usuario ya registrado.<br>';

		} 

		if (strlen($_POST['password']) < 8){

			$this->validation_errors = $this->validation_errors.'Longitud de password insuficiente (mínimo 8 caracteres).<br>';

		} 

		if (strlen($_POST['password']) > 12) {

			$this->validation_errors = $this->validation_errors.'Longitud de password incorrecta (máximo 12 caracteres).<br>';

		}

		if ($_POST['password2'] !== $_POST['password'] ) {

			$this->validation_errors = $this->validation_errors.'La repetición de tu contraseña no coincide.<br>';

		} 

	}

	private function edit_validations(){
		
		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['apellidos'])) {

			$this->validation_errors = $this->validation_errors.'Campo apellidos requerido.<br>';

		}

		if (strpos($_POST['email'], '@') == 0 OR strpos($_POST['email'], '.') == 0 ) {

			$this->validation_errors = $this->validation_errors.'Email con formato no válido.<br>';

		}


		/* Comprobar que no se repite el email */
		if($_POST['email'] !== $this->usuariosval['email']){

			$model=$this->load_model('admin_usuarios_m');
			$this->usuariosval = $model->get_usuariosid_by_name();

			if (isset($this->usuariosval['id'])){

				$this->validation_errors = $this->validation_errors.'Email de usuario ya registrado.<br>';

			} 
		}

	}

}

?>