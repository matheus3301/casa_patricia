<?php
		
		include 'includes/conexao.php';

		$id = $_GET['id'];
		
		$sth = $conexao->prepare("SELECT * FROM tb_idoso WHERE idtb_idoso = $id ORDER BY idtb_idoso ASC");
		$sth->execute();
		
		$result = $sth->fetch();
		

		

		
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


	

	$formato = explode('/',$return[17]);
	

	gravaArquivo('includes/fotoficha.'.$formato[1],$return[14],'w');

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
					height: 80px;
				}
		
		
				.header{
					width: 100%;
				}
		
		
				.header-text{
					font-size: 2em;
					text-align: right;
					margin-left: 25%;
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
			</style>
			<div class="container">
				<div class="header">
		
					<img src="assets/img/logo.png" class="logo">	
					<span class="header-text" >Ficha de Paciente</span>
				
				
		
				
					<div class="left">
						<center>	
							<img src="includes/fotoficha.'.$formato[1].'" class="img-profile">
						</center>
						
						<table border="1" cellspacing="0" class="table">
							<tr>
								<td>Nome:</td>
								<td>'.$result['nome'].'</td>
								<td>Data de Nasc:</td>
								<td>'.$result['data_nasc'].'</td>
							</tr>
							<tr>
								<td>Endereço:</td>
								<td colspan="3">'.$result['rua'].', Nº'.$result['numero'].' , '.$result['bairro'].'</td>
							</tr>
							<tr>
								<td>RG:'.$result['rg'].'</td>
								<td>CPF:'.$result['cpf'].'</td>
								<td>NIS:'.$result['nis'].'</td>
								<td>Contato:'.$result['contato'].'</td>
							</tr>
							<tr>
								<td>Nome Familiar:</td>
								<td>'.$result['nome_familiar'].'</td>
								<td>Contato Familiar:</td>
								<td>'.$result['contato_familiar'].'</td>
							</tr>
							<tr>
								<td colspan="4">
									'.$result['informacoes_medicas'].'
								</td>
							</tr>
						</table>
						<br><br><br><br>
						<center>
							<span>___________________________________</span><br>
							<span>Assinatura</span>
						</center>
					</div>
					<div class="right">
						
					</div>
					
		
				
		
				</div>	
				</div>
		</body>
		</html>'

	,'w');
?>

		
		
		

	