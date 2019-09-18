<?php 
    include '../includes/conexao.php';

    $mes = $_GET['mes'];
    $ano = $_GET['ano'];

    //DELETAR TODAS AS FREQUENCIAS DO MÊS ESPECÍFICO
    $conexao->query("DELETE tb_frequencia.* FROM tb_frequencia INNER JOIN tb_idoso ON tb_idoso_idtb_idoso = tb_idoso.idtb_idoso WHERE data BETWEEN '$ano-$mes-01' AND '$ano-$mes-31' AND tb_idoso.status = 'ATIVO'");

    //COLETAR TODOS OS IDS DE ASSOCIADOS ATIVOS
    $query = $conexao->query("SELECT idtb_idoso FROM tb_idoso WHERE status = 'ATIVO'");

    $res = $query->fetchAll();

    $ids = [];

    foreach($res as $atual){
        $ids[] = $atual[0];
    }

    var_dump($ids);


    //COLETAR TODOS OS POSTS COM BASE NOS IDS ATIVOS
    $frequenciaIndividual = [];
    foreach($ids as $idAtual){
        $frequenciaIndividual[$idAtual] = $_POST["idoso$idAtual"];
    }

    var_dump($frequenciaIndividual);

    foreach($frequenciaIndividual as $idIdoso => $frequenciaIdoso){
        foreach($frequenciaIdoso as $frequenciaAtual ){
            $conexao->query("INSERT INTO tb_frequencia VALUES(0, $idIdoso, '$frequenciaAtual')");
        }
    }
    
    header("location:../consultafrequencia.php?mes=$mes&ano=$ano&op=sucess");


    //REINSERIR AS NOVAS FREQUENCIAS PRA CADA 



?>