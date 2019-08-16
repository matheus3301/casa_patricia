<?php
    include '../includes/conexao.php';
    $id = $_GET['id'];

    
    $conexao->query("UPDATE tb_idoso SET status = 'ATIVO' WHERE idtb_idoso = $id");


    header('location:../index.php?op=vincular');

?>