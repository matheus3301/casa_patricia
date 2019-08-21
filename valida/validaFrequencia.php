<?php

    include '../includes/conexao.php';

    $id = $_POST['id'];
   
    $hora = $_POST['hora'].":".$_POST['minutos'];

    if($_POST['data'] == 'atual'){
        $data = date('Y-m-d');
    }else{
        $data = $_POST['data'];
    } 
    
        
    try {
        $conexao->query("INSERT INTO tb_frequencia VALUES(0, $id, '$data', '$hora') ");
        echo "Presença marcada em: ".$data;

    } catch (Exception $ex) {
        echo "Erro ao dar presença";
    }


?>