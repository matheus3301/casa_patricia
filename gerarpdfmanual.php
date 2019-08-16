<?php	

	include 'includes/conexao.php';

	include 'gerarmanualestatica.php';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("includes/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	

	$dompdf->load_html(file_get_contents('includes/manual.html'));

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Ficha de Frequência - Casa de Patrícia", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>