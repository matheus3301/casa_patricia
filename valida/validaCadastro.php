<?php


include 'correcaoImagem.php';

include '../includes/conexao.php';

include '../vendor/autoload.php';

$src_profile = NULL;
$src_xerox = NULL;

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
        

        echo "Sucesso";
    } else {
        echo "Erro";
    }
}

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

        echo "Sucesso";
    } else {
        echo "Erro";
    }
}









$sql = "INSERT INTO tb_idoso(nome, tipo, data_nasc, sexo, rua, bairro, numero, ponto_referencia, complemento, municipio, cep, nis, rg, cpf, contato, medicacoes, alergias, contato_familiar, nome_familiar, profile_src , xerox_src,  status, orgao_expedidor, data_expedicao, intolerancia, outras_doencas,ja_saiu,pai,mae) VALUES(
        '$nome', '$tipo', '$data_nasc','$sexo','$rua','$bairro','$numero','$ponto_referencia','$complemento','$municipio','$cep','$nis','$rg','$cpf','$contato','$medicacoes','$alergias','$contato_familiar','$nome_familiar', '$src_profile', '$src_xerox' ,'ATIVO', '$orgao_expedidor','$data_expedicao', '$intolerancia', '$outras_doencas','','$pai','$mae')";

$conexao->query($sql);


$sql = "SELECT * FROM tb_idoso WHERE nome = '$nome'";
$query = $conexao->query($sql);
$return = $query->fetch();


foreach ($_POST['doenca'] as $doenca) {
    $sql = "INSERT INTO tb_doente VALUES(0,$doenca,$return[0])";

    $conexao->query($sql);
}
$data = date('Y-m-d');
$conexao->query("INSERT INTO tb_historico VALUES(0, $return[0], '$data', 'Foi Cadastrado no Sistema','ENTRADA')");

header('location:../index.php?op=cadastro');
