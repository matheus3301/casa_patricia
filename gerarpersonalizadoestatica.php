<?php
        $opcoes = $_POST['campos'];

		
		$tipo = $_POST['tipo'];

		if($tipo == 'Idosos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Idoso' ORDER BY idtb_idoso ASC";
		}

		if($tipo == 'Deficientes'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Deficiente' ORDER BY idtb_idoso ASC";
		}

		if($tipo == 'Todos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' ORDER BY idtb_idoso ASC";
		}

		$table_titles = array(
			'nome' => 'Nome',
			'tipo' => 'Tipo',
			'data_nasc' => 'D. Nasc.',
			'sexo' => 'Sexo',
			'rua' => 'Rua',
			'numero' => 'Nº',
			'bairro' => 'Bairro',
			'ponto_referencia' => 'P. de Referencia',
			'complemento' => 'Complemento',
			'municipio' => 'Município',
			'cep' => 'CEP',
			'nis' => 'NIS',
			'rg' => 'RG',
			'data_expedicao' => 'D. Expedição',
			'orgao_emissor' => 'Org. Emissor',
			'cpf' => 'CPF',
			'contato' => 'Contato',
			'nome_familiar' => 'Responsável Familiar',
			'contato_familiar' => 'Contato Familiar'
 
		);
		
		$sth = $conexao->prepare($sql);
		$sth->execute();
		
		$result = $sth->fetchAll();

		$dadosConsulta = "";

        $tableHeader = "<tr>";

            foreach($opcoes as $campo){
                $tableHeader = $tableHeader."<th>".$table_titles[$campo]."</th>";        
            }

        $tableHeader = $tableHeader."</tr>";
		

		foreach($result as $linhaAtual){
			$dadosConsulta = $dadosConsulta."<tr>";
			foreach($opcoes as $campo){
				$dadosConsulta = $dadosConsulta."<td>";
				$dadosConsulta = $dadosConsulta.$linhaAtual[$campo];
				$dadosConsulta = $dadosConsulta."</td>";

			}
			$dadosConsulta = $dadosConsulta."</tr>";
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

	gravaArquivo('includes/personalizado.html',
		'<!doctype html>
		<html lang="en">
		<head>
			<title>Relatório Personalizado</title>
			
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
				'.$tableHeader.'
			</thead>
			<tbody>'.$dadosConsulta.'</tbody>
			</table>
			<footer>
						<center>
						_______________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62670-0000 - CONTATOS: (85) 999616816 - 989225141
						
						</center>
						</footer>
			
			</body>
			</html>'

	,'w');
?>

		
		
		

	