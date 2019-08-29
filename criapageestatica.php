<?php
		
		$tipo = $_GET['tipo'];

		if($tipo == 'Idosos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Idoso' ORDER BY idtb_idoso ASC";
		}

		if($tipo == 'Deficientes'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Deficiente' ORDER BY idtb_idoso ASC";
		}

		if($tipo == 'Todos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' ORDER BY idtb_idoso ASC";
		}

		
		$sth = $conexao->prepare($sql);
		$sth->execute();
		
		$result = $sth->fetchAll();

		$dadosConsulta = "";

		foreach($result as  $cadastro){

			$dadosConsulta = $dadosConsulta."
					<tr>
							<td><center>".$cadastro['nome']."</center></td>
							<td><center>".$cadastro['sexo']."</center></td>
							<td><center>".$cadastro['tipo']."</center></td>
							<td><center>".$cadastro['contato']."</center></td>
							<td><center>".date_format(date_create($cadastro['data_nasc']), 'd/m/Y')."</center></td>
							<td><center>".$cadastro['rg']."</center></td>
							<td><center>".$cadastro['cpf']."</center></td>
							<td><center>".$cadastro['nis']."</center></td>
							<td><center>".$cadastro['nome_familiar']."</center></td>
							<td><center>".$cadastro['contato_familiar']."</center></td>
                        
                    </tr>" ;
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

	gravaArquivo('includes/relatorio.html',
		'<!doctype html>
		<html lang="en">
		<head>
			<title>Relatório Cadastros</title>
			
		</head>
		
		<body>
			<style>
			.header{
				margin-bottom:40px;
				width:100%;
		
				height:80px;
			}
			
			.header-text{
				font-size: 1em;
				text-align: center;
				
				position:absolute;
				top:0;
				left:100px;
				right:100px;
				
			}
	
			.logo{
				height: 100px;
				width:140px;
			}
			.table{
				width:100%;
			}
			footer{
				position:absolute;
				bottom:0;
			}
			
			
		</style>
		<div class="header">
		<img src="assets/img/logo.png" class="logo">
		<center><span class="header-text" >ASSOCIAÇÃO SALÃO DE LEITURA ANTONIO SALES <br> -SALAS- <br> SÃO GONÇALO DO AMARANTE - CEARÁ</span></center>
			
		</div>
		<h2>Relatório de '.$tipo.' Cadastrados</h2>
		<table border="1" cellspacing="0" class="table">
			<thead >
				<tr>
					<th>Nome</th>
					<th>Sexo</th>
					<th>Tipo</th>
					<th>Contato</th>
					<th>Data de Nasc.</th>
					<th>RG</th>
					<th>CPF</th>
					<th>NIS</th>
					<th>Responsável Familiar</th>
					<th>Contato Familiar</th>
				</tr>
			</thead>
			<tbody>'.$dadosConsulta.'</tbody>
			</table>
			<footer>
						<center>
						_______________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62670-0000 - CONTATOS: (85) 99159-1577
						
						</center>
						</footer>
			
			</body>
			</html>'

	,'w');
?>

		
		
		

	