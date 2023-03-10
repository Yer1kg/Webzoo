<?php 
/* Importo la clase view_v */
require_once "view_c.php";

/**
* 	Controlador de vistas estáticas
*
*	Controlador de las vistas estáticas de la aplicación
*	que no usa métodos de comunicaciones.
*
*/

class Home_c extends View_c{

	public $footer = "footer";
	public $header = "header";

	function __construct() {
		parent::__construct();
	}


	/**
	* 	Vista index
	*
	*	Realiza las funciones y muestra la vista index.
	*	
	*	@access public
	*	@return vista de la página index
	*/

	public function index(){
		
		$this->page_title = 'Inicio';
		$this->active = 'inicio';
		$this->show_view('portada');

	}

	/**
	* 	Vista contacto
	*
	*	Nos permite enviar un formulario de contacto al dueño de la web.
	*	
	*	@access public
	*	@return vista de la página contacto
	*/

	public function contacto(){
		
		$this->page_title = 'Contacto';
		$this->active = 'contacto';
		$this->show_view('contacto');

	}

	public function animales(){
		
		$this->page_title = 'Animales';
		$this->active = 'animales';

		$model=$this->load_model('public_animales_m');
		$this->animales = $model->get_animals();	

		$this->show_view('animales');

	}

	public function imprimir()
	{
		$this->page_title = 'Animales';
		$this->active = 'animales';

		$vista = '<!DOCTYPE html>

        <html lang="es">

        <head>

            <!-- Etiquetas META -->

            <meta charset="utf-8">

            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Título de la web -->

            <title>'.$this->page_title.'</title>

            <!-- Favicon web -->

            <link rel="apple-touch-icon" sizes="180x180" href="assets/fav/apple-touch-icon.png">

              <link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">

              <link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">

        

            <!-- Bootstrap CSS Externo -->

            <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        

            <!-- Font Awesome -->

            <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">

            <link href="assets/fontawesome/css/brands.css" rel="stylesheet">

            <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
			<style>
				h1{color:red}
			</style>

        </head>

        <body>

        <h1>'.$this->page_title.'</h1> <p class="alert alert-success text-red">Mi pdf</p>

        </body>

        </html>';
		$this->show_pdf('Listado de animales', $vista);
	}

	public function especies(){
		
		$this->page_title = 'Listado de especies';
		$this->active = 'especies';

		$model=$this->load_model('public_especies_m');
		$this->especies = $model->get_especies();	

		$this->show_view('especies');

	}


}

?>