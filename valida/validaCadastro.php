<?php

    include '../includes/conexao.php';


       $cadastro = array(
            0 => $_POST['nome'],
            1 => $_POST['data_nasc'],
            2 => $_POST['contato'],
            3 => $_POST['sexo'],
            4 => $_POST['rua'],
            5 => $_POST['bairro'],
            6 => $_POST['numero'],
            7 => $_POST['rg'],
            8 => $_POST['cpf'],
            9 => $_POST['nis'],
            10 => $_POST['informacoes_medicas'],
            11 => $_POST['nome_familiar'],
            12 => $_POST['contato_familiar'],
        );

        $imagem = $_FILES['imagem']['tmp_name'];
        $tamanho = $_FILES['imagem']['size'];
        $tipo = $_FILES['imagem']['type'];
        $nome = $_FILES['imagem']['name'];

        if ( $imagem != "none" ){
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);

            //cadastrar junto com a imagem
            $sql = "INSERT INTO tb_idoso
            (nome, data_nasc, sexo, rua, bairro, numero, nis, rg, cpf, contato, informacoes_medicas,
             contato_familiar, nome_familiar, img, tamanho_img, nome_img, tipo_img ) 
            VALUES('$cadastro[0]','$cadastro[1]', '$cadastro[3]', '$cadastro[4]','$cadastro[5]',
            '$cadastro[6]','$cadastro[9]','$cadastro[7]','$cadastro[8]','$cadastro[2]','$cadastro[10]',
            '$cadastro[12]','$cadastro[11]','$conteudo','$tamanho', '$nome', '$tipo')";

            $conexao->query($sql);

        }

        header('location:../index.php?op=cadastro');

?>