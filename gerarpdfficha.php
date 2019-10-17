<?php	

	include 'includes/conexao.php';

	include 'gerarfichaestatica.php';

	


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("vendor/autoload.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	

	$dompdf->load_html(file_get_contents('includes/ficha.html'));

	$dompdf->setPaper('A4', 'portrait');


	//Renderizar o html
	$dompdf->render();


	//Exibibir a página
	$dompdf->stream(
		"Ficha - Casa de Patrícia", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>