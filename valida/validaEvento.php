<?php
    include '../includes/conexao.php';

    $nome=$_POST['nome_evento'];
    $data=$_POST['data'];
    $descricao=$_POST['descricao'];
    $tipo=$_POST['tipo'];

    echo $nome;
    echo $data;
    echo $descricao;
    echo $tipo;

    $conexao->query("INSERT INTO tb_evento VALUES(0,'$data','$nome','$descricao','$tipo' )");

    header("location:../eventos.php?op=success");

?>