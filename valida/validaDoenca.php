<?php
    include '../includes/conexao.php';
    $nome = $_POST['doenca'];
    $conexao->query("INSERT INTO tb_doenca VALUES(0,'$nome')");

    header('location:../configs/cadastrodoenca.php');

?>