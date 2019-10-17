<?php
    include 'conexao.php';

    $fuso = new DateTimeZone('America/Fortaleza');
    $data = new DateTime();
    $data->setTimezone($fuso);
    $dataAtual =  $data->format('Y-m-d');


    

    $sth = $conexao->prepare("SELECT idtb_idoso, nome FROM `tb_idoso` WHERE (SELECT tb_idoso_idtb_idoso FROM tb_frequencia WHERE data = '$dataAtual') <> idtb_idoso
    ");
	$sth->execute();

    $result = $sth->fetchAll();
            
    print_r($result);
    if($result == null){
        echo 'vazio';
    }

           
?>