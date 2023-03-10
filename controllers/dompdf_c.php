<?php 
use libs\Dompdf\lib\CPDF;
use libs\Dompdf\src\Exception;
use public\libs\dompdf\;

class Dompdf_c{


	/**
	* 	Constructor
	*
	*	Función constructor.
	*	
	*	@access public
	*/

	function __construct() {

	}

	/**
	* 	Vista index
	*
	*	Nos pmuestra la vista index de este controlador.
	*	
	*	@access public
	*	@return vista de la página index
	*/

	public function test($paper = "letter", $orientation = "portrait", Dompdf $dompdf){
		
		 // Creamos y usamos una instancia de la clase Dompdf
		$dompdf = new Dompdf();
		$dompdf->loadHtml('hello world');

		// Declaramos la configuración de inicio (opcional)
		 $dompdf->setPaper('A4', 'landscape');

		// Renderizamos el documento
		$dompdf->render();
		// Lo expulsamos a través del navegador.
		$dompdf->stream();


	}

	


}

?>