<?php
		
		include 'includes/conexao.php';
		
		$sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY idtb_idoso ASC");
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
        <center>FICHA DO MÊS: ___________________________________________</center><br><br>
		
		<table border="1" cellspacing="0" class="table">
			<thead >
				<tr>
					<th>Nome</th>'.$tableHeader.'
					
				</tr>
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

		
		
		

	