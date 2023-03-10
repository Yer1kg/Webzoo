<?php 
require_once "view_c.php";
class Private_c extends View_c{

	public $model;
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
	* 	Vista perfil
	*
	*	Nos pmuestra la vista perfil de este controlador.
	*	
	*	@access public
	*	@return vista de la página perfil
	*/
	public function perfil(){
		
		$this->page_title = 'Perfil';
		$this->active = 'perfil';

		$model=$this->load_model('perfil_m');
		$this->resultado=$model->get_user_data_by_id();
	

		/* Comprobar que se reciben los datos */
		if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email'])) {

			$this->basic_perfil_validations();

			$password=FALSE;


			if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['password2']) && !empty($_POST['password2'])){

				$this->password_perfil_validations();
				$password=TRUE;

			}
			
			if(empty($this->validation_errors)) {

				if($password){
					$resultado=$model->update_data_with_pass();
				}else{
					$resultado=$model->update_data();
				}
			
				
				if ($resultado == FALSE){

					$this->validation_errors = $this->validation_errors.'Error al editar nuevo usuario';

				}
				else 
				{

					/* Necesito el rol del usuario */
					header("Location: index.php?controller=".$_SESSION['user_type']."&action=perfil");


				}

			}
		}

		$this->show_view('template/perfil');

	}

	private function basic_perfil_validations(){

		if (empty($_POST['nombre'])) {

			$this->validation_errors = $this->validation_errors.'Campo nombre requerido.<br>';

		}

		if (empty($_POST['apellidos'])) {

			$this->validation_errors = $this->validation_errors.'Campo apellidos requerido.<br>';

		}

		if (strpos($_POST['email'], '@') == 0 OR strpos($_POST['email'], '.') == 0 ) {

			$this->validation_errors = $this->validation_errors.'Email con formato no válido.<br>';

		}

		$model=$this->load_model('perfil_m');
		$this->resultado=$model->get_user_data_by_email();

		if (isset($resultado['id']) && ($resultado['id'] !== $_SESSION['user_id'])){

			$this->validation_errors = $this->validation_errors.'Email de usuario ya registrado.<br>';

		}  

	}

	private function password_perfil_validations(){
		

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