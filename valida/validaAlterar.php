<?php

    include '../includes/conexao.php';
    $id = $_GET['id'];

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

        if ( $nome != "" ){
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);

            //cadastrar junto com a imagem
            $sql = "UPDATE tb_idoso SET nome = '$cadastro[0]', data_nasc = '$cadastro[1]', contato = '$cadastro[2]', 
            sexo = '$cadastro[3]', rua = '$cadastro[4]', bairro = '$cadastro[5]', numero = '$cadastro[6]', rg = '$cadastro[7]',
            cpf = '$cadastro[8]',nis = '$cadastro[9]',informacoes_medicas = '$cadastro[10]',nome_familiar = '$cadastro[11]',contato_familiar = '$cadastro[12]',
            img = '$conteudo', tipo_img = '$tipo', tamanho_img = '$tamanho', nome_img = '$nome' WHERE idtb_idoso = $id";

            $conexao->query($sql);

        }else{
            $sql = "UPDATE tb_idoso SET nome = '$cadastro[0]', data_nasc = '$cadastro[1]', contato = '$cadastro[2]', 
            sexo = '$cadastro[3]', rua = '$cadastro[4]', bairro = '$cadastro[5]', numero = '$cadastro[6]', rg = '$cadastro[7]',
            cpf = '$cadastro[8]',nis = '$cadastro[9]',informacoes_medicas = '$cadastro[10]',nome_familiar = '$cadastro[11]',contato_familiar = '$cadastro[12]'
            WHERE idtb_idoso = $id";

            $conexao->query($sql);

            echo "Comemora Brasileirinho";
        }

        header('location:../index.php?op=alterar');

?>