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
                    <a href="index.php"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"></a>
                    
                    <span class="navbar-brand" > <a href="index.php" class="text-white">Início </a> / Consulta</span>
                    
                    
                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view" data-aos="zoom-in" data-aos-once="true" id="profile">
        <h1>Cadastros</h1>


        <?php
            include 'includes/conexao.php';

            $sth = $conexao->prepare("SELECT * FROM tb_idoso ORDER BY idtb_idoso ASC");
			$sth->execute();

			$result = $sth->fetchAll();
        ?>

        <table class="table table-striped table-inverse table-responsive text-nowrap">
            <thead class="thead-inverse">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Tipo</th>
                    <th scope="col" class="text-center">Sexo</th>
                    <th scope="col" class="text-center">Contato</th>
                    <th scope="col" class="text-center">Data Nasc.</th>
                    <th scope="col" class="text-center">RG</th>
                    <th scope="col" class="text-center">CPF</th>
                    <th scope="col" class="text-center">NIS</th>
                    <th scope="col" class="text-center">Nome Familiar</th>
                    <th scope="col" class="text-center">Contato Familiar</th>                    
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Ações</th>

                </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($result as $cadastro){

                        
                    ?>
                    <tr>
                        <?php if($cadastro['img'] != null){?> <td scope="row"><img class="img-perfil" src="includes/verimagem.php?id=<?php echo $cadastro[0];?>" alt="Imagem"></td> <?php }else{ ?> <td scope="row"><img class="img-perfil" src="assets/img/man.png" alt="Imagem"></td> <?php } ?>
                        <td><?php echo $cadastro['nome']; ?></td>
                        <td><?php echo $cadastro['tipo']; ?></td>
                        <td><?php echo $cadastro['sexo']; ?></td>
                        <td><?php echo $cadastro['contato']; ?></td>
                        <td><?php echo $cadastro['data_nasc']; ?></td>
                        <td><?php echo $cadastro['rg']; ?></td>
                        <td><?php echo $cadastro['cpf']; ?></td>
                        <td><?php echo $cadastro['nis']; ?></td>
                        <td><?php echo $cadastro['nome_familiar']; ?></td>
                        <td><?php echo $cadastro['contato_familiar']; ?></td>
                        <td><?php echo $cadastro['status']; ?></td>
                        <td>
                            <button  class="btn btn-success text-white"data-toggle="modal" data-target="#modal-documento<?php echo $cadastro[0]?>" role="button">Documentos</button>
                            <a  class="btn btn-warning text-white" href="alterar.php?id=<?php echo $cadastro[0]?>" role="button">Alterar</a>
                            <?php
                                if($cadastro['status'] == 'ATIVO'){?>
                                    <a  class="btn btn-danger text-white"data-toggle="modal" data-target="#modal-excluir<?php echo $cadastro[0]?>" role="button">Inativar</a>
                                <?php }else{ ?>

                                    <a  class="btn btn-primary text-white"data-toggle="modal" data-target="#modal-vincular<?php echo $cadastro[0]?>" role="button">Reativar</a>

                                    
                            <?php    }

                            ?>
                            
                            
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-excluir<?php echo $cadastro[0];?>">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">
                                Tem certeza?
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                            </div>
                            <div class="modal-body"> 

                            <p>Tem certeza que deseja desvincular <?php echo $cadastro[1]?>?</p>
                            <strong>O Associado não será aparecerá nos relatórios</strong>


                            </div>
                            <div class="modal-footer">
                                <a href="valida/validaExcluir.php?id=<?php echo $cadastro[0]?>" class="btn btn btn-primary text-white ml-3">Inativar</a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-vincular<?php echo $cadastro[0];?>">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">
                                Tem certeza?
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                            </div>
                            <div class="modal-body"> 

                            <p>Tem certeza que deseja revincular <?php echo $cadastro[1]?>?</p>
                            <strong>O Associado tornará a aparecer nos relatórios</strong>


                            </div>
                            <div class="modal-footer">
                                <a href="valida/validaVincular.php?id=<?php echo $cadastro[0]?>" class="btn btn btn-primary text-white ml-3">Reativar</a>
                            </div>
                            </div>
                        </div>
                    </div>



                    

                            
                    <?php
                        }
                    ?>
                    
                </tbody>
        </table>
        <br><br>
        <h2>Consultas Avançadas</h2>
        <hr>

        <a name="" id="" class="btn btn-primary" href="aniversariantes.php?mes=08" role="button">Aniversariantes do Mês</a>

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
    <script src="assets/js/colResizable-1.6.min.js"></script>



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