<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Consulta - Casa de Patrícia</title>

    <link rel="shortcut icon" href="assets/img/logo.png" />

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<style>
.modal-backdrop{
    display:none;
}
.box-img{
        
        vertical-align: middle;
        height: 50%;
        
        align-self: center;
    }

    .box-txt{
        flex:1;
        
        font-size:20px;
    }

    .box-content{
        display: flex;
        flex-direction: column;
        

    }

    .header-img{
        width:70px;
    }
    
    .btn-file input[type=file]{
        position: absolute;
        top: 0;
        right: 0;
        
        min-height: 100%;
        width:100%;
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;

    }

    .img-perfil{
        border-radius: 100%;
        border: 2px solid #009afa;
        object-fit: cover;
        height:50px;
        width:50px;
        
        
    }

    .btn-file{
        width:100%;
    }

    .presenca{
        width:25px;
    }
</style>


<body style="/*background-color: rgb(238,241,247);*/">
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a href="index.php"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"></a>
                    
                    <span class="navbar-brand" > <a href="index.php" class="text-white">Início </a> / Frequência</span>
                    
                    
                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view" data-aos="zoom-in" data-aos-once="true" id="profile">
        <h1>Frequência no Mês</h1>

        <?php
            include 'includes/conexao.php';

            $sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY idtb_idoso ASC");
			$sth->execute();

			$result = $sth->fetchAll();
        ?>
        <?php
            $fuso = new DateTimeZone('America/Fortaleza');
            $data = new DateTime();
            $data->setTimezone($fuso); 
            
        ?>

        <?php
            if(isset($_GET['mes'])){
                $mesAtual = $_GET['mes'];
            }

            if(isset($_GET['ano'])){
                $anoAtual = $_GET['ano'];
            }
        ?>

        <form class="form-inline">
        <div class="form-group sm-6">
        <label for="">Ano:</label>
        <input type="number" class="form-control" name="" id="ano" value="<?php echo $anoAtual; ?>">
        
        <label for="">Mês:</label>
                <select class="form-control" id="meses" >
                    <option>selecione...</option>
                    <option value="01" <?php if($mesAtual == '01'){ echo 'selected';} ?>>Janeiro</option>
                    <option value="02" <?php if($mesAtual == '02'){ echo 'selected';} ?>>Fevereiro</option>
                    <option value="03" <?php if($mesAtual == '03'){ echo 'selected';} ?>>Março</option>
                    <option value="04" <?php if($mesAtual == '04'){ echo 'selected';} ?>>Abril</option>
                    <option value="05" <?php if($mesAtual == '05'){ echo 'selected';} ?>>Maio</option>
                    <option value="06" <?php if($mesAtual == '06'){ echo 'selected';} ?>>Junho</option>
                    <option value="07" <?php if($mesAtual == '07'){ echo 'selected';} ?>>Julho</option>
                    <option value="08" <?php if($mesAtual == '08'){ echo 'selected';} ?>>Agosto</option>
                    <option value="09" <?php if($mesAtual == '09'){ echo 'selected';} ?>>Setembro</option>
                    <option value="10" <?php if($mesAtual == '10'){ echo 'selected';} ?>>Outubro</option>
                    <option value="11" <?php if($mesAtual == '11'){ echo 'selected';} ?>>Novembro</option>
                    <option value="12" <?php if($mesAtual == '12'){ echo 'selected';} ?>>Dezembro</option>
                </select>
        </div>
        
          
          
        <div class="form-group sm-6">
            <button name="" onClick="trocaMes()" class="btn btn-primary" role="button">Consultar</button>
        </div>
        
        <script>
            function trocaMes(){
               const mes = $('#meses').val();
               const ano = $('#ano').val();

               window.location.href = "consultafrequencia.php?mes="+mes+"&ano="+ano;
            }
        </script>
        
        </form><hr>


       
        

        
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th colspan="2" clas="text-center">Paciente</th>
                    <th colspan="31" class="text-center"> <?php echo $mesAtual."/".$anoAtual ?> - Dias do Mês </th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <?php
                        for($i = 1; $i <= 31; $i++ ){
                            echo("<th>$i</th>");
                        }
                    ?>
                </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($result as $cadastro){
                          $nomeReduzido = explode(" ", $cadastro[1]);                           
                    ?>
                    <tr>
                        <td scope="row"><?php echo $cadastro[0]; ?></td>
                        <td><?php echo $nomeReduzido[0]." ";if(count($nomeReduzido) > 1){ echo $nomeReduzido[1];} ?></td>              
                       
                                  
                        <?php
                            for($i = 1; $i <= 31; $i++ ){
                                $dataIterada =  $anoAtual;
                                $dataIterada = $dataIterada."-".$mesAtual;
                                $dataIterada = $dataIterada."-".$i;

                                $sth = $conexao->prepare("SELECT tb_idoso_idtb_idoso, hora FROM tb_frequencia WHERE data = '$dataIterada' AND tb_idoso_idtb_idoso = $cadastro[0]");
                                $sth->execute();

                                $result = $sth->fetch();

                                if($result == null){
                                    echo '<td><img src="assets/img/smalltimes.png"class="presenca"/></td>';
                                }else{
                                    echo '<td><img src="assets/img/smallcheck.png"class="presenca" alt="'.$result['hora'].'"/></td>';
                                }

                            
                            }
                        ?>        

                        </tr>  


                            
                    <?php
                        }
                    ?>
                    
                </tbody>
        </table>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>


    
</body>

</html>