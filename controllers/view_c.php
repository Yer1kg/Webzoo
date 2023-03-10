<?php 
	include_once "libs/dompdf/vendor/autoload.php";
	use Dompdf\Dompdf;
class View_c {
	public $page_title;
	public $header;
	public $footer;
	public $active;
	public $view_message = NULL;

	function __construct() {
		$this->test_message();
	}

	public function show_view($vista){

		if(file_exists('../views/'.$vista.'.php')){

			require_once '../views/template/'.$this->header.'.php';
			require_once '../views/'.$vista.'.php';
			require_once '../views/template/'.$this->footer.'.php';

		} else {

			$this->show_error('vista');

		}

	}


	/**
	* 	Permite acceso a usuario con rol determinado
	*
	*	Permite pasar al usuario que tiene el rol correcto.
	*	
	*	@access protected
	*	@param string $user_type tipo de usuario que quiere acceder
	*	@return redirecciona
	*/

	protected function test_access($user_type){
		if(!isset($_SESSION) OR $_SESSION['user_type'] !== $user_type){

			header("Location: index.php?controller=auth&action=login");

		}
	}


	/**
	* 	Permite configurar un mensaje
	*
	*	Permite configurar un mensaje de sesion para el usuario.
	*	
	*	@access public
	*	@param string $type tipo de mensaje
	*   @param string $text texto del mensaje
	*/

	public function set_message($type,$text){
		$_SESSION['message_type'] = $type;
		$_SESSION['message_text'] = $text;
	}


	/**
	* 	Comprueba que hay un mensaje
	*
	*	Comprueba que hay un mensaje de sesión para el usuario y lo añade a las variables de la vista.
	*	
	*	@access public
	*/

	public function test_message(){
		if (isset($_SESSION['message_text']) && isset($_SESSION['message_type'])){

			/* Guardo los valores de sesión */
			$text = $_SESSION['message_text'];
			$type = $_SESSION['message_type'];

			/* Guardo el mensaje para la vista */
			$this->view_message = '<div class="container"><div class="row"><div class="alert alert-dismissible alert-'.$type.'">'.$text.'</div></div></div>';

			/* Borro las variables de sesión */
			unset($_SESSION['message_type']);
			unset($_SESSION['message_text']);

		}
	}

	/**
	* 	Muestra un mensaje
	*
	*	Muestra el mensaje de sesión, si existe,  para el usuario.
	*	
	*	@access public
	*	@return	html mensaje de sesión para el usuario.
	*/
	public function get_message(){
		return $this->view_message ? $this->view_message : '';
	}



	/**
	* 	Muestra una vista de error
	*
	*	Muestra una vista de error en función del problema.
	*	
	*	@access public
	*	@return	html error_view.
	*/
	protected function show_error($error_type){

		$error_controller_path = '../controllers/'.constant("ERROR_CONTROLLER").'_c.php';
		require_once $error_controller_path;
		$error_controller_class = constant("ERROR_CONTROLLER").'_c';
		$error_controller = new $error_controller_class();
		$error_controller->error_by_type($error_type);

	}

	public function load_model($model)
	{
		require_once('../models/'.$model.'.php');
		return new $model();
	}

	public function show_pdf($file_name="sin titulo", $content="Sin contendio")
	{

		$dompdf = new Dompdf();
		$dompdf->loadHtml($content);
		$dompdf->render();
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=".$file_name."pdf");
		echo $dompdf->output();
	}

	public function download_pdf()
	{

		$file_name="sin titulo";
		$content="Sin contendio";
		$dompdf = new Dompdf();
		$dompdf->loadHtml($content);
		$dompdf->render();
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=".$file_name."pdf");
		$dompdf->stream();
	}


}


?>