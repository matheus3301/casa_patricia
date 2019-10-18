<?php
    $meses = array(
        '01' => 'Janeiro',
        '02' =>'Fevereiro',
        '03' =>'Março',
        '04' =>'Abril',
        '05' =>'Maio',
        '06' =>'Junho',
        '07' =>'Julho',
        '08' =>'Agosto',
        '09' =>'Setembro',
        '10' =>'Outubro',
        '11' =>'Novembro',
        '12' =>'Dezembro'
    );

    $mesSelected = $meses[$_GET['mes']];


    $fuso = new DateTimeZone('America/Fortaleza');
    $data = new DateTime();
    $data->setTimezone($fuso);
    $mesAtual =  $data->format('m');
    $anoAtual =  $data->format('Y');

    

?>


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
</style>


<body style="/*background-color: rgb(238,241,247);*/">
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                <a href="index.php"  class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br><center><strong> INÍCIO </strong></center></a>
                    
                    <span class="navbar-brand" > <a href="index.php" class="text-white">Início </a> / <a href="consulta.php" class="text-white">Consulta </a>/ Aniversariantes </span>
                    
                    
                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view" data-aos="zoom-in" data-aos-once="true" id="profile">
        <h1>Aniversariantes do Mês de <?php echo $mesSelected; ?></h1>
    
        <form class="form-inline">
        <div class="form-group sm-6">    
        <label for="" style="margin-right:15px">Mês:</label>
                <select class="form-control" id="meses" style="margin-right:15px" >
                    <option>selecione...</option>
                    <option value="01" <?php if($_GET['mes'] == '01'){ echo 'selected';} ?>>Janeiro</option>
                    <option value="02" <?php if($_GET['mes'] == '02'){ echo 'selected';} ?>>Fevereiro</option>
                    <option value="03" <?php if($_GET['mes'] == '03'){ echo 'selected';} ?>>Março</option>
                    <option value="04" <?php if($_GET['mes'] == '04'){ echo 'selected';} ?>>Abril</option>
                    <option value="05" <?php if($_GET['mes'] == '05'){ echo 'selected';} ?>>Maio</option>
                    <option value="06" <?php if($_GET['mes'] == '06'){ echo 'selected';} ?>>Junho</option>
                    <option value="07" <?php if($_GET['mes'] == '07'){ echo 'selected';} ?>>Julho</option>
                    <option value="08" <?php if($_GET['mes'] == '08'){ echo 'selected';} ?>>Agosto</option>
                    <option value="09" <?php if($_GET['mes'] == '09'){ echo 'selected';} ?>>Setembro</option>
                    <option value="10" <?php if($_GET['mes'] == '10'){ echo 'selected';} ?>>Outubro</option>
                    <option value="11" <?php if($_GET['mes'] == '11'){ echo 'selected';} ?>>Novembro</option>
                    <option value="12" <?php if($_GET['mes'] == '12'){ echo 'selected';} ?>>Dezembro</option>
                </select>
        
        
          
         </div> 
        <div class="form-group sm-4">
            <button name="" onClick="trocaMes()" class="btn btn-primary" role="button">Consultar</button>
        </div>
        <div class="form-group sm-2">
            <button style="margin-left:25px" name="" onClick="window.print()" class="btn btn-gray" role="button"><img style="width:15px;" src="assets/img/printer.png" alt="">Imprimir</button>
        </div>
        </form>
        <br><br>
        <script>
            function trocaMes(){
               const mes = $('#meses').val();
               

               window.location.href = "aniversariantes.php?mes="+mes;
            }
        </script>

        <?php
            include 'includes/conexao.php';

            $sth = $conexao->prepare("SELECT * FROM tb_idoso WHERE status = 'ATIVO' ORDER BY idtb_idoso ASC");
			$sth->execute();

			$result = $sth->fetchAll();
        ?>

        <table class="table table-striped table-inverse table-responsive w-auto">
            <thead class="thead-inverse">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Data Nasc.</th>
                    

                </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($result as $cadastro){

                            $dataAniversario = explode("-",$cadastro['data_nasc']);
                            
                            if($dataAniversario[1] == $_GET['mes']){
                        
                    ?>
                    <tr>
                        <?php if($cadastro['profile_src'] != null){?> <td scope="row"><img class="img-perfil" src="<?php echo $cadastro['profile_src'];?>" alt="Imagem"></td> <?php }else{ ?> <td scope="row"><img class="img-perfil" src="assets/img/man.png" alt="Imagem"></td> <?php } ?>
                        <td><?php echo $cadastro['nome']; ?></td>
                        <td><?php echo $cadastro['tipo']; ?></td>
                        <td><?php echo $cadastro['sexo']; ?></td>
                        <td><?php echo $cadastro['contato']; ?></td>
                        <td><?php echo $cadastro['data_nasc']; ?></td>
                        



                    

                            
                    <?php
                         } }
                    ?>
                    
                </tbody>
        </table>

    </div>


    <?php
         foreach($result as $cadastro){?>

                <div class="modal fade" id="modal-documento<?php echo $cadastro[0];?>">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">
                                Documentos
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                            </div>
                            <div class="modal-body"> 

                            <img src="includes/verxerox.php?id=<?php echo $cadastro[0]?>" alt="" style="width:100%">


                            </div>
                            <div class="modal-footer">
                                <button name="" id="" class="btn btn-primary" data-dismiss="modal" role="button">Fechar</button>
                            </div>
                            </div>
                        </div>
                    </div>




    <?php
         }
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>


    <script>
        var $campoCPF = $("#CPF");
        $campoCPF.mask('000.000.000-00', {reverse: true});

        var $campoRG = $("#RG");
        $campoRG.mask('00.000.000-0');

        var $campoTELEFONE = $('.telefone');
        $campoTELEFONE.mask('(00) 00000-0000');
    </script>
</body>

</html>