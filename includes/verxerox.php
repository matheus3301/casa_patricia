<?php 
include '../includes/conexao.php';



if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql = "SELECT * FROM tb_idoso WHERE idtb_idoso = $id";
$query = $conexao->query($sql);
$return = $query->fetch();


header("Content-type:".$return['tipo_xerox']);

echo $return['xerox'];

 ?>