<?php
    include '../includes/conexao.php';
    $id = $_GET['id'];
    $motivo = $_POST['motivo'];
    $data = date('Y-m-d');
    
    $conexao->query("UPDATE tb_idoso SET status = 'INATIVO', observacao = '$motivo', data_inativo = '$data' WHERE idtb_idoso = $id");


    header('location:../index.php?op=excluir');

?>