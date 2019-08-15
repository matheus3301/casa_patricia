<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Início - Casa de Patrícia</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="shortcut icon" href="assets/img/logo.png" />

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">

    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Header-Blue.css"> 
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Tables.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<style>
.box-img{
    
    vertical-align: middle;
    height: 50%;
    
    align-self: center;
}

.box-txt{
    flex:1;
    
    font-size:30px;
}

.box-content{
    display: flex;
    flex-direction: column;
    

}

.header-img{
    width:100px;
}
</style>

<body>
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img">
                    <a class="navbar-brand" href="#">Sistema de Controle</a>
                    
                    
                </div>
            </nav>
            <div class="container hero">


                <?php
                // CONFIGURAÇÃO DOS ALERTS

                if(isset($_GET['op']) && $_GET['op'] == 'cadastro'){?>

                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Sucesso!</strong> Paciente cadastrado com sucesso no sistema! :)
                        </div>


                        <div id="#RESULTADO">
                            
                        
                        </div>


                <?php
                }
                ?>




                <div class="row">
                    <div class="col">
                        <section class="pricing-table" style="padding: -15px;">
                            <div class="container">
                                <div class="pricing-area text-center">
                                    <div class="row">
                                        <div class="col-sm-4 plan price red wow fadeInDown">
                                            <a href="cadastro.php">
                                                <ul class="list-group">
                                                    <li class="list-group-item heading box-content" data-bs-hover-animate="pulse" style="height: 257px;">
                                                        <img src="assets/img/man.png" alt="Idosos" class="box-img">
                                                        <br><br>
                                                        <h1 class="box-txt">Cadastrar</h1>
                                                    </li>
                                                </ul>
                                                
                                                
                                            </a>
                                        </div>
                                        <div class="col-sm-4 plan price green wow fadeInDown">
                                            <a href="consulta.php">
                                                <ul class="list-group">
                                                    <li class="list-group-item heading box-content" data-bs-hover-animate="pulse" style="height: 257px;">
                                                        <img src="assets/img/idosos.png" alt="Idosos" class="box-img">
                                                        <br><br>
                                                        <h1 class="box-txt">Consultar</h1>
                                                    </li>
                                                </ul>
                                            </a>
                                        </div>
                                        <div class="col-sm-4 plan price yellow wow fadeInDown" style="cursor:pointer">
                                        <a data-toggle="modal" data-target="#modal-frequencia">
                                                <ul class="list-group">
                                                    <li class="list-group-item heading box-content" data-bs-hover-animate="pulse" style="height: 257px;">
                                                        <img src="assets/img/test.png" alt="Idosos" class="box-img">
                                                        <br><br>
                                                        <h1 class="box-txt">Frequência do Dia</h1>
                                                    </li>
                                                </ul>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-3 plan price default wow fadeInDown">
                                            <a href="gerarpdfcadastros.php">
                                                <ul class="list-group">
                                                    <li class="list-group-item heading" data-bs-hover-animate="pulse" style="height: 245px;">
                                                        <img src="assets/img/pdf.png" alt="Idosos" class="box-img">
                                                        <h1 class="box-txt">Relatório</h1><span class="price">Idosos Cadastrados</span>
                                                    </li>
                                                </ul>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-3 plan price default wow fadeInDown">
                                            <?php 
                                                $fuso = new DateTimeZone('America/Fortaleza');
                                                $data = new DateTime();
                                                $data->setTimezone($fuso);
                                                $mesAtual =  $data->format('m');
                                            
                                            ?>
                                            <a href="consultafrequencia.php?mes=<?php echo $mesAtual;?>">
                                            <ul class="list-group">
                                                <li class="list-group-item heading" data-bs-hover-animate="pulse" style="height: 245px;">
                                                    <img src="assets/img/calendar.png" alt="Idosos" class="box-img">
                                                    <h1 class="box-txt">Relatório</h1><span class="price">Frequência no Mês</span>
                                                </ul>
                                                </a>
                                            </div>

                                            <div class="col-sm-6 col-md-3 plan price default wow fadeInDown" style="cursor:pointer">
                                                <a data-toggle="modal" data-target="#modal-ficha">
                                                    <ul class="list-group">
                                                        <li class="list-group-item heading" data-bs-hover-animate="pulse" style="height: 245px;">
                                                            <img src="assets/img/resume.png" alt="Idosos" class="box-img">
                                                            <h1 class="box-txt">Imprimir</h1><span class="price">Ficha Individual</span>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 col-md-3 plan price default wow fadeInDown" style="cursor:not-allowed">
                                                    <ul class="list-group">
                                                        <li class="list-group-item heading" data-bs-hover-animate="pulse" style="height: 245px;">
                                                            <img src="assets/img/plus.png" alt="Idosos" class="box-img">
                                                            <h1 class="box-txt">Mais...</h1><span class="price">Em breve</span>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-ficha">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Selecione...
                                </h4>
                                <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                            </div>
                            <form>
                            <div class="modal-body"> 

                                <?php
                                    include 'includes/conexao.php';

                                    $sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY nome ASC");
                                    $sth->execute();
                        
                                    $result = $sth->fetchAll();

                                ?>
                                    
                                        <div class="form-group">
                                          <label for="">Selecione o Paciente:</label>
                                          <select class="form-control" id="paciente">
                                            <option value="vazio">selecione...</option>
                                            <?php
                                                foreach($result as $cadastro){ ?>

                                                    <option value="<?php echo $cadastro[0];?>"><?php echo $cadastro[1];?></option>
                                            <?php
                                                }
                                            ?>

                                            
                                          </select>
                                        </div>

                                       

                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="gerarFicha()">Gerar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal-frequencia">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Fazer Frequência
                                </h4>
                                <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                            </div>
                            <form>
                            <div class="modal-body"> 
                            <?php
                                    include 'includes/conexao.php';

                                    $sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY nome ASC");
                                    $sth->execute();
                        
                                    $result = $sth->fetchAll();

                                ?>
                                    
                                        <div class="form-group">
                                          <label for="">Presença em:</label>
                                          <select class="form-control" id="pacienteFreq">
                                            <option value="vazio">selecione...</option>
                                            <?php
                                                foreach($result as $cadastro){ ?>

                                                    <option value="<?php echo $cadastro[0];?>"><?php echo $cadastro[1];?></option>
                                            <?php
                                                }
                                            ?>

                                            
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label for="date">Data:</label>
                                          <input type="date"
                                            class="form-control" name="date" id="dataFreq" aria-describedby="helpId" placeholder="Selecione">
                                          <small id="helpId" class="form-text text-muted">OBS: Caso não coloque a data, será definida a data atual.</small>
                                        </div>
                                                                    
                                
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="darPresenca()">Presença</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="assets/js/bs-animation.js"></script>
                <script src="assets/js/Pricing-Tables-1.js"></script>
                <script src="assets/js/Pricing-Tables.js"></script>

                <script>
                    function gerarFicha(){
                        const idPaciente = $('#paciente').val();

                        window.open("gerarpdfficha.php?id="+idPaciente);
                       
                    }

                    function darPresenca(){
                        
                        var data = new Date();
                        const idPaciente = $('#pacienteFreq').val();

                        if(idPaciente != "vazio"){

                            var iptData = $('#dataFreq').val();

                            

                            if(iptData == ""){
                                iptData = "atual"
                            }

                            

                            $.ajax({
                            url : "valida/validaFrequencia.php",
                            type : 'post',
                            data : {
                                id : idPaciente,
                                hora: data.getHours(),
                                minutos: data.getMinutes(),
                                data:iptData,

                                
                            },
                            beforeSend : function(){
                                //alert('Enviando');
                                $("#resultado").html("ENVIANDO...");
                            }
                            })
                            .done(function(msg){
                                alert(msg);
                                $("#resultado").html(msg);
                            })
                            .fail(function(jqXHR, textStatus, msg){
                                alert(msg);
                            });        
                        }else{
                            alert("Selecione um paciente para dar presença");
                        }


                       
                    }
                
                </script>
            </body>

            </html>