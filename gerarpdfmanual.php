<?php	

	include 'includes/conexao.php';
	$tipo = $_GET['tipo'];
	include 'gerarmanualestatica.php';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("vendor/autoload.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	

	$dompdf->load_html(file_get_contents('includes/manual.html'));
	$dompdf->setPaper('A4', 'landscape');


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Ficha de Frequência - Casa de Patrícia", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>