<?php 
require_once "view_c.php";
class Auth_c extends View_c{

	public $footer = "footer";
	public $header = "header";
	public $password_length_min = 8;
	public $password_length_max = 12;
	public $validation_errors = '';

	function __construct() {
		parent::__construct();
	}

	public function login(){
		$this->page_title = 'Login';
		$this->active = 'login';

		/* Comprobar que se reciben los datos */
		if (isset($_POST['email']) && isset($_POST['password'])){

			/*	Validar los datos (mostrar errores) */			
			if(strpos($_POST['email'], '@') == 0 OR strpos($_POST['email'], '.') == 0){
				$this->validation_errors = $this->validation_errors.'Email con formato no válido.<br>';
			}

			if(strlen($_POST['password']) < $this->password_length_min){
				$this->validation_errors = $this->validation_errors.'Longitud de password insuficiente (mínimo '.$this->password_length_min.')<br>';
			}

			if(strlen($_POST['password']) > $this->password_length_max){
				$this->validation_errors = $this->validation_errors.'Longitud de password demasiado grande (máximo '.$this->password_length_max.')<br>';
			}
		
		/* Consultar si existe el usuario (base de datos) */

		/* Código para acceder a la base de datos
	
		/* Si existe, redireccionar en función de su rol */
			
			if(empty($this->validation_errors)) {
				$model= $this->load_model('auth_m');

				/* Guardo el resultado */
				$resultado =  $model->get_user_data();
				
				if ($resultado == FALSE){

					$this->validation_errors = $this->validation_errors.'Error de identificación<br>Compruebe credenciales';

				}
				else 
				{
					
					/* Guardo el tipo de usuario como variable de sesión */
					$_SESSION['user_type'] = $resultado['rol'];
					$_SESSION['user_id'] = $resultado['id'];

					/* Guardo el mensaje para el usuario */
					$this->set_message('warning','Bienvenido');

					/* Necesito el rol del usuario */
					header("Location: index.php?controller=".$_SESSION['user_type']);


				}

			}
		}

		$this->show_view('login');

	}

	public function logout(){
		
		/* Se borran las variables de sesión */
		$_SESSION = [];

		$this->set_message('success','Sesión cerrada');
		
		header("Location: index.php?controller=auth&action=login");

	}

	public function registro(){
		
		$this->page_title = 'Registro';
		$this->active = 'registro';

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {

			//Validar los datos (mostrar errores)
			$this->create_validations();

			if(empty($this->validation_errors)) {

				$model=$this->load_model('public_registro_m');
				$this->registro = $model->get_registro();

				if ($this->registro == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al crear nuevo usuario';

				}
				else 
				{

					$this->set_message('success','Exito al crear el nuevo usuario');
					header("Location: index.php?controller=auth&action=login");

				}

			}
		}

		$this->show_view('registro');


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


}

?>