<?php
		
		include 'includes/conexao.php';
		$sql;
		if($tipo == "Deficiente"){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = '$tipo' ORDER BY idtb_idoso ASC";
		}
		if($tipo == "Idoso"){
			$sql = "SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND (tipo = 'Idoso' OR tipo = 'Idoso e Associado') ORDER BY idtb_idoso ASC";
			
		}
		
		$sth = $conexao->prepare($sql);
		$sth->execute();
		
        $result = $sth->fetchAll();

        $tableCells = '';

        for($i = 1; $i <= 31; $i++ ){
            $tableCells = $tableCells."<td> </td>";
        }

		$dadosConsulta = "";

		foreach($result as  $cadastro){
            $nomeReduzido = explode(" ", $cadastro[1]);
            $nomeFinal = $nomeReduzido[0];

            if(count($nomeReduzido) > 1){
                  $nomeFinal = $nomeFinal." ".$nomeReduzido[1];
            }

            

            

			$dadosConsulta = $dadosConsulta."
					<tr>
							<td>".$nomeFinal."</td>".$tableCells."
							
                        
                    </tr>" ;
        }
        
        $tableHeader = '';

        for($i = 1; $i <= 31; $i++ ){
            $tableHeader = $tableHeader."<th>".str_pad($i, 2, '0', STR_PAD_LEFT)."</th>";
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

	gravaArquivo('includes/manual.html',
	'<!doctype html>
	<html lang="en">
	<head>
		<title>Ficha Manual</title>
		
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
	<h2>Ficha Frequência dos '.$tipo.'s</h2>
	<center style="font-size:20px">FICHA DO MÊS:__________________________</center>
	<table border="1" cellspacing="0" class="table">
			<thead >
				<tr>
					<th>Nome</th>'.$tableHeader.'
					
				</tr>
			</thead>
			<tbody>'.$dadosConsulta.'</tbody>
			</table>
			<br><br>
			
			<h3>Eventos do Mês</h3>
			<table border="1" cellspacing="0" class="table" style="width:50%">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Data</th>
					</tr>


				</thead>
				<tbody>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
					<tr>
						<td><br></td>
						<td><br></td>
						<td><br></td>

					</tr>
				</tbody>

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

		
		
		

	