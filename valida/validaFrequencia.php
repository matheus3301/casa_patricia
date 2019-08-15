<?php

    include '../includes/conexao.php';

    $id = $_POST['id'];
    $data = date('Y-m-d');
    $hora = $_POST['hora'].":".$_POST['minutos'];

    
    
        
    try {
        $conexao->query("INSERT INTO tb_frequencia VALUES(0, $id, '$data', '$hora') ");
        echo '"Presença Marcada com Sucesso"';

    } catch (Exception $ex) {
        echo "Erro ao Preencher Frequência";
    }


?>