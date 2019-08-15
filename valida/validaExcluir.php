<?php
    include '../includes/conexao.php';
    $id = $_GET['id'];

    $conexao->query("DELETE FROM tb_frequencia WHERE tb_idoso_idtb_idoso = $id");
    $conexao->query("DELETE FROM tb_idoso WHERE idtb_idoso = $id");


    header('location:../index.php?op=excluir');

?>