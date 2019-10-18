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

    <link rel="stylesheet" type="text/css" href="assets/datatables.min.css" />

</head>


<style>
    .modal-backdrop {
        display: none;
    }

    .box-img {

        vertical-align: middle;
        height: 50%;

        align-self: center;
    }

    .box-txt {
        flex: 1;

        font-size: 20px;
    }

    .box-content {
        display: flex;
        flex-direction: column;


    }

    .header-img {
        width: 70px;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;

        min-height: 100%;
        width: 100%;
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;

    }

    .img-perfil {
        border-radius: 100%;
        border: 2px solid #009afa;
        object-fit: cover;
        height: 50px;
        width: 50px;


    }

    .btn-file {
        width: 100%;
    }
</style>


<body style="/*background-color: rgb(238,241,247);*/">
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a href="index.php"  class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br><center><strong> INÍCIO </strong></center></a>

                    <span class="navbar-brand"> <a href="index.php" class="text-white">Início </a> / Consulta</span>


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

        <table class="table table-striped table-inverse table-responsive text-nowrap" id="tabela">
            <thead class="thead-inverse">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Tipo</th>
                    <th scope="col" class="text-center">Sexo</th>
                    <th scope="col" class="text-center">RG</th>
                    <th scope="col" class="text-center">CPF</th>
                    <th scope="col" class="text-center">NIS</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Ações</th>

                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($result as $cadastro) {


                    ?>
                    <tr>
                        <?php if ($cadastro['profile_src'] != null) { ?> <td scope="row"><img class="img-perfil" src="<?php echo $cadastro['profile_src']; ?>" alt="Imagem"></td> <?php } else { ?> <td scope="row"><img class="img-perfil" src="assets/img/man.png" alt="Imagem"></td> <?php } ?>
                        <td><?php echo $cadastro['nome']; ?></td>
                        <td><?php echo $cadastro['tipo']; ?></td>
                        <td><?php echo $cadastro['sexo']; ?></td>
                        
                        <td><?php if ($cadastro['rg']) {
                                    echo $cadastro['rg'];
                                } else {
                                    echo "(n. informado)";
                                } ?></td>
                        <td><?php if ($cadastro['cpf']) {
                                    echo $cadastro['cpf'];
                                } else {
                                    echo "(n. informado)";
                                } ?></td>
                        <td><?php if ($cadastro['nis']) {
                                    echo $cadastro['nis'];
                                } else {
                                    echo "(n. informado)";
                                } ?></td>
                       
                        <td>
                            <center><?php echo $cadastro['status'];
                                        if ($cadastro['status'] == "ATIVO") {
                                            echo $cadastro['ja_saiu'];
                                        } ?>
                                <br><button class="btn btn-primary text-white" data-toggle="modal" data-target="#modal-obs<?php echo $cadastro[0] ?>" role="button">Histórico</button>
                            </center>
                        </td>
                        <td>
                            <?php
                                if ($cadastro['status'] == 'ATIVO') { ?>
                                <button class="btn btn-success text-white" data-toggle="modal" data-target="#modal-documento<?php echo $cadastro[0] ?>" role="button">Documentos</button>
                                <a class="btn btn-warning text-white" href="alterar.php?id=<?php echo $cadastro[0] ?>" role="button">Alterar</a>
                                <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modal-excluir<?php echo $cadastro[0] ?>" role="button">Inativar</a>

                            <?php } else { ?>

                                <a class="btn btn-primary text-white" data-toggle="modal" data-target="#modal-vincular<?php echo $cadastro[0] ?>" role="button">Reativar</a>



                            <?php
                                }
                                ?>



                        </td>
                    </tr>

                    <div class="modal fade" id="modal-excluir<?php echo $cadastro[0]; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        Tem certeza?
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                                </div>
                                <form action="valida/validaExcluir.php?id=<?php echo $cadastro[0] ?>" method="POST">
                                    <div class="modal-body">

                                        <p>Tem certeza que deseja desvincular <?php echo $cadastro[1] ?>?</p>


                                        <div class="form-group">
                                            <label for="motivo"> <strong> Motivo:</strong></label>
                                            <textarea class="form-control" name="motivo" id="motivo" rows="3" required=""></textarea>
                                        </div>
                                        <strong>O Associado não será aparecerá nos relatórios</strong>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger text-white">Inativar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="modal-vincular<?php echo $cadastro[0]; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        Tem certeza?
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                                </div>
                                <form action="valida/validaVincular.php?id=<?php echo $cadastro[0] ?>" method="POST">
                                    <div class="modal-body">

                                        <p>Tem certeza que deseja revincular <?php echo $cadastro[1] ?>?</p>


                                        <div class="form-group">
                                            <label for="motivo"> <strong> Motivo:</strong></label>
                                            <textarea class="form-control" name="motivo" id="motivo" rows="3" required=""></textarea>
                                        </div>
                                        <strong>O Associado tornará a aparecer nos relatórios</strong>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger text-white">Reativar</button>
                                    </div>
                                </form>
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
        <?php
        $fuso = new DateTimeZone('America/Fortaleza');
        $data = new DateTime();
        $data->setTimezone($fuso);
        $mesAtual =  $data->format('m');
        $anoAtual =  $data->format('Y');

        ?>

        <a name="" id="" class="btn btn-primary" href="aniversariantes.php?mes=<?php echo $mesAtual; ?>" role="button">Aniversariantes do Mês</a>

    </div>


    <?php
    foreach ($result as $cadastro) { ?>

        <div class="modal fade" id="modal-documento<?php echo $cadastro[0]; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Documentos
                        </h4>
                        <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                    </div>
                    <div class="modal-body">

                        <img src="<?php echo $cadastro['xerox_src']; ?>" alt="" style="width:100%">


                    </div>
                    <div class="modal-footer">
                        <button name="" id="" class="btn btn-primary" data-dismiss="modal" role="button">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-obs<?php echo $cadastro[0]; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Histórico do Associado
                        </h4>
                        <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            $resultHist = $conexao->query("SELECT * FROM tb_historico WHERE tb_idoso_idtb_idoso = $cadastro[0] ORDER BY idtb_historico DESC");
                            $historicoAssociado = $resultHist->fetchAll();

                            foreach ($historicoAssociado as $historicoAtual) { ?>
                            <strong><?php echo $historicoAtual['tipo']; ?>:</strong><br>
                            <strong>Data:</strong><?php echo $historicoAtual['data']; ?><br>
                            <strong>Motivo:</strong><?php echo $historicoAtual['motivo']; ?><br>


                            <hr>
                        <?php

                            }

                            ?>


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
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/colResizable-1.6.min.js"></script>
    <script type="text/javascript" src="assets/datatables.min.js"></script>



    <script>
        var $campoCPF = $("#CPF");
        $campoCPF.mask('000.000.000-00', {
            reverse: true
        });

        var $campoRG = $("#RG");
        $campoRG.mask('00.000.000-0');

        var $campoTELEFONE = $('.telefone');
        $campoTELEFONE.mask('(00) 00000-0000');
    </script>
    <script>
        $(document).ready(function() {
            $('#tabela').DataTable({
                language:{
                    url:'assets/Portuguese-Brasil.json'
                }
            });
        });
    </script>
</body>

</html>