<?php
        $opcoes = $_POST['campos'];

		
		$tipo = $_POST['tipo'];

		if($tipo == 'Idosos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND (tipo = 'Idoso' OR tipo = 'Idoso e Associado') ORDER BY nome ASC";
		}

		if($tipo == 'Deficientes'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Deficiente' ORDER BY nome ASC";
		}

		if($tipo == 'Todos Ativos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' ORDER BY nome ASC";
		}

		if($tipo == 'Todos Inativos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'INATIVO' ORDER BY nome ASC";
		}
		if($tipo == 'Deficientes Inativos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'INATIVO' AND tipo = 'Deficiente' ORDER BY nome ASC";
		}
		if($tipo == 'Idosos Inativos'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'INATIVO' AND (tipo = 'Idoso' OR  tipo = 'Idoso e Associado' ) ORDER BY nome ASC";
		}

		if($tipo == 'Associados'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Associado' ORDER BY nome ASC";

		}

		if($tipo == 'Idosos Associados'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Idoso e Associado' ORDER BY nome ASC";

		}

		if($tipo == 'Todos Associados'){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND (tipo = 'Associado' OR tipo = 'Idoso e Associado')  ORDER BY nome ASC";

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
			'contato_familiar' => 'Contato Familiar',
			'pai' => 'Nome do Pai',
			'mae' => 'Nome da Mãe',

 
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
				$dadosConsulta = $dadosConsulta."<td><center>";
				if($campo != 'data_nasc'){
					if($linhaAtual[$campo]){$dadosConsulta = $dadosConsulta.$linhaAtual[$campo];}else{$dadosConsulta = $dadosConsulta."(n. informado)";}
					

				}else{
					if($linhaAtual[$campo] != "0000-00-00"){$dadosConsulta = $dadosConsulta.date_format(date_create($linhaAtual['data_nasc']), 'd/m/Y');}else{$dadosConsulta = $dadosConsulta."(n. informado)";}

					
				}
				$dadosConsulta = $dadosConsulta."</center></td>";

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
					width:250px;
					object-fit: cover;
					border-radius:125px;
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
		</style>
		<body>
			<nav style="width:100%">
				<img src="assets/img/logo.png" class="logo"><center>
				<span style="vertical-align: middle;">ASSOCIAÇÃO SALÃO DE LEITURA ANTÔNIO SALES<br> -SALAS- <br>SÃO GONÇALO DO AMARANTE - CEARÁ</span>
			</center></nav>
			<section><br>			
		<h2>Relatório de '.$tipo.' Cadastrados</h2>
		<table border="1" cellspacing="0" class="table">
			<thead >
				'.$tableHeader.'
			</thead>
			<tbody>'.$dadosConsulta.'</tbody>
			</table>
			<footer style="font-size:12px">
						<center>
						_______________________________________________________________________________<br>
						RUA SANTOS DUMONT, S/N CENTRO - SÃO GONÇALO DO AMARANTE - CEARÁ <br>
						CEP:62.670-0000 - CONTATO: (85) 99159-1577
						
						</center>
						</footer>
		</body>
		</html>
			'

	,'w');
?>

		
		
		

	