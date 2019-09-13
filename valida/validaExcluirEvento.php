<?php
    include '../includes/conexao.php';

    $idEvento = $_GET['id'];

    $conexao->query("DELETE FROM tb_evento WHERE idtb_evento = $idEvento");

    header("location:../eventos.php?op=delete");

?>