<?php	

	include 'includes/conexao.php';

	include 'criapageestatica.php';



	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("vendor/autoload.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	

	$dompdf->load_html(file_get_contents('includes/relatorio.html'));

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		$tipo." Cadastrados - Casa de Patrícia", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>