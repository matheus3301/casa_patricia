<?php

    include '../includes/conexao.php';
    $id = $_GET['id'];

    
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
    $data_expedicao = $_POST['data_expedicao'];
    $orgao_expedidor = $_POST['orgao_expedidor'];


    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanhoImg = $_FILES['imagem']['size'];
    $tipoImg = $_FILES['imagem']['type'];
    $nomeImg = $_FILES['imagem']['name'];

    $xerox = $_FILES['xerox']['tmp_name'];
    $tamanhoXerox = $_FILES['xerox']['size'];
    $tipoXerox = $_FILES['xerox']['type'];
    $nomeXerox = $_FILES['xerox']['name'];

   

    
    
    //atualização das informações básicas
    $sql = "UPDATE tb_idoso SET nome = '$nome', data_nasc = '$data_nasc', contato = '$contato', 
    sexo = '$sexo', rua = '$rua', bairro = '$bairro', numero = '$numero', rg = '$rg',
    cpf = '$cpf',nis = '$nis',medicacoes = '$medicacoes',alergias = '$alergias', nome_familiar = '$nome_familiar',contato_familiar = '$contato_familiar',
    cep = '$cep', municipio = '$municipio',complemento = '$complemento', ponto_referencia = '$ponto_referencia', orgao_expedidor = '$orgao_expedidor', data_expedicao = '$data_expedicao'
    WHERE idtb_idoso = $id";

    $conexao->query($sql);


    //atualização das doenças

    if(isset($_POST['doenca'])){
        $conexao->query("DELETE FROM tb_doente WHERE tb_idoso_idtb_idoso = $id");
        foreach($_POST['doenca'] as $doenca){
            $sql = "INSERT INTO tb_doente VALUES(0,$doenca,$id)";
                
            $conexao->query($sql);

        }
    }

    



    //atualização da xerox
    if($nomeXerox != ""){
        $fpXerox = fopen($xerox, "rb");
        $conteudoXerox = fread($fpXerox, $tamanhoXerox);
        $conteudoXerox = addslashes($conteudoXerox);

        $sql = "UPDATE tb_idoso SET nome_xerox = '$nomeXerox', tamanho_xerox = '$tamanhoXerox', tipo_xerox = '$tipoXerox', xerox = '$conteudoXerox' WHERE idtb_idoso = $id";
    
        $conexao->query($sql);
    }


    //atualização da foto de perfil
    if($nomeImg != ""){
        $fpImg = fopen($imagem, "rb");
        $conteudoImg = fread($fpImg, $tamanhoImg);
        $conteudoImg = addslashes($conteudoImg);

        $sql = "UPDATE tb_idoso SET nome_img = '$nomeImg', tamanho_img = '$tamanhoImg', tipo_img = '$tipoImg', img = '$conteudoImg' WHERE idtb_idoso = $id";
    
        $conexao->query($sql);
    }

    

    header('location:../index.php?op=alterar');



?>