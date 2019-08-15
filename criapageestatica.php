<?php
		
		
		
		$sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY idtb_idoso ASC");
		$sth->execute();
		
		$result = $sth->fetchAll();

		$dadosConsulta = "";

		foreach($result as  $cadastro){

			$dadosConsulta = $dadosConsulta."
					<tr>
							<td>".$cadastro[1]."</td>
							<td>".$cadastro[3]."</td>
							<td>".$cadastro[10]."</td>
							<td>".$cadastro[2]."</td>
							<td>".$cadastro[8]."</td>
							<td>".$cadastro[9]."</td>
							<td>".$cadastro[7]."</td>
							<td>".$cadastro[13]."</td>
							<td>".$cadastro[12]."</td>
                        
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
				height: 80px;
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
		
		<table border="1" cellspacing="0" class="table">
			<thead >
				<tr>
					<th>Nome</th>
					<th>Sexo</th>
					<th>Contato</th>
					<th>Data de Nasc.</th>
					<th>RG</th>
					<th>CPF</th>
					<th>NIS</th>
					<th>Nome Familiar</th>
					<th>Contato Familiar</th>
				</tr>
			</thead>
			<tbody>'.$dadosConsulta.'</tbody>
			</table>
			<footer>
						<center>
						_________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62670-0000 - CONTATOS: (85) 999616816 - 989225141
						
						</center>
						</footer>
			
			</body>
			</html>'

	,'w');
?>

		
		
		

	