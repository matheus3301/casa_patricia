<?php
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $observacao = $_POST['observacao'];

    include '../includes/conexao.php';

    $conexao->query("INSERT INTO tb_observacao VALUES(0,'$observacao','$mes','$ano')");

    header('location:../consultafrequencia.php?ano='.$ano.'&mes='.$mes.'&op=obs');

?>