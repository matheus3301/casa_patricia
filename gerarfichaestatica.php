<?php
		
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

	$sql = "SELECT * FROM tb_idoso WHERE idtb_idoso = $id";
	$query = $conexao->query($sql);
	$return = $query->fetch();


	$dataNascBr = date_format(date_create($result['data_nasc']), 'd/m/Y');
	$dataExpBr = date_format(date_create($result['data_expedicao']), 'd/m/Y');

	$formato = explode('/',$return['tipo_img']);
	
	if($return['img'] != null){
		gravaArquivo('includes/fotoficha.'.$formato[1],$return['img'],'w');
	}else{
		copy('includes/default/fotoficha.png','includes/fotoficha.png');
		$formato[1] = "png";

	}

	gravaArquivo('includes/ficha.html',
		'<!DOCTYPE html>
		<html>
		<head>
			<title>Ficha</title>
		</head>
		<body>
			<style type="text/css">
				.container{
					width: 100%;
					height: 100%;
				}
				.logo{
					height: 100px;
					width:140px;
				}
		
		
				.header{
					width: 100%;
				}
		
		
				.header-text{
					font-size: 1.2em;
					text-align: center;
					
					position:absolute;
					top:0;
					left:100px;
					right:100px;
					
				}
		
		
				.content{
					width: 100%;
				}
		
				.left{
					width: 100%;
					margin-top: 40px;
		
				}
				.right{
					width: 50%;
					margin-top: 40px;
		
				}
		
				.img-profile{
					height:250px;
					width:250px;
					object-fit: cover;
					border-radius:125px;
					border: 3px solid #666;
					
				}
		
		
				.table{
					margin-top: 50px;
					width: 100%;
				}
		
				.table tr td {
					font-size: 20px;
				}
				footer{
					position:absolute;
					bottom:0;
				}
			</style>
			<div class="container">
				<div class="header">
		
					<img src="assets/img/logo.png" class="logo">
					<center><span class="header-text" style="float:right" >ASSOCIAÇÃO SALÃO DE LEITURA ANTÔNIO SALES <br> -SALAS- <br> SÃO GONÇALO DO AMARANTE - CEARÁ</span></center>
				
				
		
				
					<div class="left">
						<center>	
							<img src="includes/fotoficha.'.$formato[1].'" class="img-profile">
						</center>
						
						<table border="1" cellspacing="0" class="table">
							<tr>
								<td colspan="3">Nome:'.$result['nome'].'</td>
								
								<td colspan="1">D.N.:'.$dataNascBr.'</td>
							</tr>
							<tr>
								
								<td colspan="4">Endereço: '.$result['rua'].', Nº'.$result['numero'].' , '.$result['bairro'].'</td>
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
						<br><br><br><br>
						<center>
							<span>___________________________________</span><br>
							<span>Assinatura</span>
						</center>
						
						<footer style="font-size:12px">
						<center>
						_______________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62670-0000 - CONTATOS: (85) 999616816 - 989225141
						
						</center>
						</footer>
					</div>
					<div class="right">
						
					</div>
					
		
				
		
				</div>	
				</div>
		</body>
		</html>'

	,'w');
?>

		
		
		

	