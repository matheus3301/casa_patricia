<?php

    include '../includes/conexao.php';

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo_pessoa'];    
    $data_nasc = $_POST['data_nasc'];
    $contato = $_POST['contato'];
    $sexo = $_POST['sexo'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $municipio = $_POST['municipio'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];
    $ponto_referencia = $_POST['ponto_referencia'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $nis = $_POST['nis'];
    $medicacoes = $_POST['medicacoes'];
    $alergias = $_POST['alergias'];
    $nome_familiar = $_POST['nome_familiar'];
    $contato_familiar = $_POST['contato_familiar'];


    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanhoImg = $_FILES['imagem']['size'];
    $tipoImg = $_FILES['imagem']['type'];
    $nomeImg = $_FILES['imagem']['name'];

    $xerox = $_FILES['xerox']['tmp_name'];
    $tamanhoXerox = $_FILES['xerox']['size'];
    $tipoXerox = $_FILES['xerox']['type'];
    $nomeXerox = $_FILES['xerox']['name'];

    $fpImg = fopen($imagem, "rb");
    $conteudoImg = fread($fpImg, $tamanhoImg);
    $conteudoImg = addslashes($conteudoImg);

    $fpXerox = fopen($xerox, "rb");
    $conteudoXerox = fread($fpXerox, $tamanhoXerox);
    $conteudoXerox = addslashes($conteudoXerox);

    $sql = "INSERT INTO tb_idoso(nome, tipo, data_nasc, sexo, rua, bairro, numero, ponto_referencia, complemento, municipio, cep, nis, rg, cpf, contato, medicacoes, alergias, contato_familiar, nome_familiar, img, tamanho_img, nome_img, tipo_img, xerox, tamanho_xerox, nome_xerox, tipo_xerox, status) VALUES(
        '$nome', '$tipo', '$data_nasc','$sexo','$rua','$bairro','$numero','$ponto_referencia','$complemento','$municipio','$cep','$nis','$rg','$cpf','$contato','$medicacoes','$alergias','$contato_familiar','$nome_familiar','$conteudoImg','$tamanhoImg','$nomeImg','$tipoImg','$conteudoXerox','$tamanhoXerox','$nomeXerox','$tipoXerox', 'ATIVO')";
        
    $conexao->query($sql);


    $sql = "SELECT * FROM tb_idoso WHERE nome = '$nome'";
	$query = $conexao->query($sql);
    $return = $query->fetch();
    

    foreach($_POST['doenca'] as $doenca){
        $sql = "INSERT INTO tb_doente VALUES(0,$doenca,$return[0])";
            
        $conexao->query($sql);

    }









       

   

    header('location:../index.php?op=cadastro');

?>