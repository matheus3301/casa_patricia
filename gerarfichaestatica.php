<?php
		function abreArquivo($nome){
			$arquivo = $nome;
			$obj = fopen($arquivo, 'r');
			$tamanho = filesize($arquivo);
			$dados = fread($obj, $tamanho);
			echo $dados;
			
			fclose($obj);
		}
	
		function gravaArquivo($nome,$texto,$tipo){
			$arquivo = $nome;
			$dados = $texto;
			$obj = fopen($arquivo, $tipo);
			fwrite($obj, $dados);
			
			fclose($obj);
		}
		
		include 'includes/conexao.php';

		$id = $_GET['id'];
		
		$sth = $conexao->prepare("SELECT * FROM tb_idoso WHERE idtb_idoso = $id ORDER BY idtb_idoso ASC");
		$sth->execute();
		
		$result = $sth->fetch();
		

		$doencasExtenso = "";

		$query = $conexao->query("SELECT tb_doenca.nome FROM tb_doente INNER JOIN tb_doenca ON tb_doente.tb_doenca_idtb_doenca = tb_doenca.idtb_doenca WHERE tb_doente.tb_idoso_idtb_idoso = $id"
	);
		
		
		$resultado = $query->fetchAll();
		$numDoencas = count($resultado);

		$numDoencaAtual=0;
		foreach($resultado as $doenca){
			if($numDoencaAtual == $numDoencas-1){
				$doencasExtenso = $doencasExtenso . $doenca[0].". ";

			}else{
				$doencasExtenso = $doencasExtenso . $doenca[0].", ";
			}
			$numDoencaAtual++;
		}
		
		?>


<?php
	

	$sql = "SELECT * FROM tb_idoso WHERE idtb_idoso = $id";
	$query = $conexao->query($sql);
	$return = $query->fetch();

	if($result['data_nasc'] != '0000-00-00' ){
		$dataNascBr = date_format(date_create($result['data_nasc']), 'd/m/Y');

	}else{
		$dataNascBr = '(n. informado)';
	}

	if($result['data_expedicao']){
		$dataExpBr = date_format(date_create($result['data_expedicao']), 'd/m/Y');

	}else{
		$dataExpBr = "(n. informado)";
	}

	if(!$result['rua'] || !$result['bairro']){
		$enderecoExtenso = "(n. informado)";
	}else{
		$enderecoExtenso = $result['rua'].', Nº'.$result['numero'].' , '.$result['bairro'];

	}

	//VERIFICANDO SE NAO E NULO
	if(!$result['complemento']){
		$result['complemento'] = '(n. informado)';
	}

	if(!$result['municipio']){
		$result['municipio'] = '(n. informado)';
	}

	if(!$result['cep']){
		$result['cep'] = '(n. informado)';
	}

	if(!$result['ponto_referencia']){
		$result['ponto_referencia'] = '(n. informado)';
	}

	if(!$result['rg']){
		$result['rg'] = '(n. informado)';
	}

	if(!$result['orgao_expedidor']){
		$result['orgao_expedidor'] = '(n. informado)';
	}

	if(!$result['contato']){
		$result['contato'] = '(n. informado)';
	}

	if(!$result['cpf']){
		$result['cpf'] = '(n. informado)';
	}

	if(!$result['nis']){
		$result['nis'] = '(n. informado)';
	}
	if(!$result['nome_familiar']){
		$result['nome_familiar'] = '(n. informado)';
	}
	if(!$result['contato_familiar']){
		$result['contato_familiar'] = '(n. informado)';
	}
	
	if($result['tipo'] == 'Deficiente'){
		$result['tipo'] = "Pessoa com Deficiência";
	}

	
	if($return['profile_src'] != null){
		$src = $return['profile_src'];
	}else{
		
		$src = 'includes/default/fotoficha.png';

	}

	gravaArquivo('includes/ficha.html',
		'<!DOCTYPE html>
		<html>
		<head>
			<title>Ficha</title>
		</head>
		<style>
			*{
				margin:0;
				padding:0;
				margin-top:5px;
				margin-left:5px;
				margin-right:5px;
				
			}
			.logo{
				height:100px;width:150px;
				position:absolute;
				left:0;
				top:0;
			}
			nav{
				height:100px;
			}	
			.img-profile{
					height:250px;
					
					object-fit: cover;
					border-radius:5px;
					border: 3px solid #666;					
			}
			table{
				margin-top: 25px;
				width: 100%;
			}
			footer{
				position:absolute;
				bottom:5px
			}
			table tr td{
				padding-left:5px;
			}
		</style>
		<body>
			<nav style="width:100%">
				<img src="assets/img/logo.png" class="logo"><center>
				<span style="vertical-align: middle;">ASSOCIAÇÃO SALÃO DE LEITURA ANTÔNIO SALES<br> -SALAS- <br>SÃO GONÇALO DO AMARANTE - CEARÁ</span>
			</center></nav>
			<br><br>
			<center><h1>Ficha de '.$result['tipo'].'</h1></center>
			<section><br>
			<center>	
				<img src="'.$src.'" class="img-profile">
			</center><br>
			<table border="1" cellspacing="0" class="table">
							<tr>
								<td colspan="3">Nome:'.$result['nome'].'</td>
								
								<td colspan="1">D.N.:'.$dataNascBr.'</td>
							</tr>
							<tr>
								
								<td colspan="4">Endereço: '.$enderecoExtenso.'</td>
							</tr>
							<tr>
								<td> Complemento:'.$result['complemento'].'</td>
								<td colspan="2"> Município:'.$result['municipio'].'</td>
								<td> CEP:'.$result['cep'].'</td>
							</tr>
							<tr>	
								<td colspan="4">Ponto de Referência: '.$result['ponto_referencia'].'</td>
							</tr>
							<tr>
								
								<td>RG:'.$result['rg'].'</td>
								<td colspan="2">D. Exp:'.$dataExpBr.'</td>
								<td >Org. Exp.:'.$result['orgao_expedidor'].'</td>
							</tr>
							
							<tr>
								<td colspan="2">Cel.:'.$result['contato'].'</td>
								<td>CPF:'.$result['cpf'].'</td>
								<td>NIS:'.$result['nis'].'</td>
								
							</tr>
							<tr>
								<td colspan="2">Responsável Familiar:'.$result['nome_familiar'].'</td>
								
								<td colspan="2">Contato Familiar:'.$result['contato_familiar'].'</td>
								
							</tr>
							<tr>
								<td colspan="4">Doenças: '.$doencasExtenso.'</td>
							</tr>
							<tr>
								<td colspan="4">
								Medicações:
									'.$result['medicacoes'].'
								</td>
								
							</tr>
							<tr>
								<td colspan="2">
								Alergias:
									'.$result['alergias'].'
								</td>
								<td colspan="2">
								Intolerâncias:
									'.$result['intolerancia'].'
								</td>
							</tr>
						</table>
						<br><br><br>
						<center>
							<span>___________________________________</span><br>
							<span>Assinatura</span>
						</center>
			</section>
			<footer style="font-size:12px">
						<center>
						_______________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62.670-0000 - CONTATO: (85) 99159-1577
						
						</center>
						</footer>
		</body>
		</html>'

	,'w');
?>

		
		
		

	