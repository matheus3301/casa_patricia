<?php

include '../includes/conexao.php';
include 'correcaoImagem.php';

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
$intolerancia = $_POST['intolerancia'];
$outras_doencas = $_POST['outras_doencas'];

$pai = $_POST['pai'];
$mae = $_POST['mae'];




//atualização das informações básicas
$sql = "UPDATE tb_idoso SET tipo = '$tipo',nome = '$nome', data_nasc = '$data_nasc', contato = '$contato', 
    sexo = '$sexo', rua = '$rua', bairro = '$bairro', numero = '$numero', rg = '$rg',
    cpf = '$cpf',nis = '$nis',medicacoes = '$medicacoes',alergias = '$alergias', nome_familiar = '$nome_familiar',contato_familiar = '$contato_familiar',
    cep = '$cep', municipio = '$municipio',complemento = '$complemento', ponto_referencia = '$ponto_referencia', orgao_expedidor = '$orgao_expedidor', data_expedicao = '$data_expedicao',
    intolerancia = '$intolerancia', outras_doencas = '$outras_doencas',pai = '$pai',mae = '$mae'
    WHERE idtb_idoso = $id";

$conexao->query($sql);


//atualização das doenças

if (isset($_POST['doenca'])) {
    $conexao->query("DELETE FROM tb_doente WHERE tb_idoso_idtb_idoso = $id");
    foreach ($_POST['doenca'] as $doenca) {
        $sql = "INSERT INTO tb_doente VALUES(0,$doenca,$id)";

        $conexao->query($sql);
    }
}





//atualização da xerox


if (is_uploaded_file($_FILES['xerox']['tmp_name'])) {
    $file_name = random_bytes(30);
    $arquivo = $_FILES['xerox'];
    $file_exploded = explode('.', $arquivo['xerox']);
    $file_ext = $file_exploded[count($file_exploded) - 1];
    $src_xerox = "uploads/xerox/" . bin2hex($file_name) . "." . $file_ext;
    echo $src_xerox;
    if (!is_dir('../uploads/xerox')) {
        mkdir('../uploads/xerox');
    }
    if (move_uploaded_file($arquivo['tmp_name'], "../" . $src_xerox)) {
        correctImageOrientation("../" . $src_xerox);
        $sql = "UPDATE tb_idoso SET xerox_src = '$src_xerox' WHERE idtb_idoso = $id";

        $conexao->query($sql);

        echo "Sucesso";
    } else {
        echo "Erro Xerox";
    }
}



//atualização da foto de perfil
if (is_uploaded_file($_FILES['imagem']['tmp_name'])) {
    $file_name = random_bytes(30);
    $arquivo = $_FILES['imagem'];
    $file_exploded = explode('.', $arquivo['name']);
    $file_ext = $file_exploded[count($file_exploded) - 1];
    $src_profile = "uploads/profile/" . bin2hex($file_name) . "." . $file_ext;
    echo $src_profile;
    if (!is_dir('../uploads/profile')) {
        mkdir('../uploads/profile');
    }
    if (move_uploaded_file($arquivo['tmp_name'], "../" . $src_profile)) {
        correctImageOrientation("../" . $src_profile);
        $sql = "UPDATE tb_idoso SET profile_src = '$src_profile' WHERE idtb_idoso = $id";

        $conexao->query($sql);


        echo "Sucesso";
    } else {
        echo "Erro Foto Perfil";
    }
}



header('location:../index.php?op=alterar');
