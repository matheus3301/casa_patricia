<?php
    include '../includes/conexao.php';
    $id = $_GET['id'];
    $motivo = $_POST['motivo'];
    $data = date('Y-m-d');
    
    $conexao->query("UPDATE tb_idoso SET status = 'INATIVO', ja_saiu='*' WHERE idtb_idoso = $id");
   
    $conexao->query("INSERT INTO tb_historico VALUES(0, $id, '$data', '$motivo','SAÍDA')");


    header('location:../index.php?op=excluir');

?>