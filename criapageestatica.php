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
			
			.text-header{
				font-weight:bold;
				font-size:30px;
				width:80%;
				height: 100%;
				vertical-align: middle;
				align-self:center;
				margin-left:50px;
				
			}
			.img-header{
				height:80%;
				
				
				
			}
			.table{
				width:100%;
			}
			
			
		</style>
		<div class="header">
			<img class="img-header" src="assets/img/logo.png"> 
			<span class="text-header">CADASTROS</span>
			
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
			
			
			</body>
			</html>'

	,'w');
?>

		
		
		

	