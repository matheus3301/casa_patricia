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

    .presenca {
        width: 25px;
    }

    input[type=checkbox] {
        display: none;
    }

    input[type=checkbox]+label {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 25px;
        width: 25px;
        display: inline-block;
    }

    input[type=checkbox]+label {
        background-image: url('assets/img/smalltimes.png');
    }

    input[type=checkbox]:checked+label {
        background-image: url('assets/img/smallcheck.png');
    }

    .btn-circle-content {
        width: 45px;
        height: 45px;
        text-align: center;
        padding: 6px 0;
        line-height: 1.1;
        border-radius: 40px;
        vertical-align: middle;
        font-size: 30px;
        font-weight: bold;
    }
</style>

<?php
$meses = array(
    '01' => 'Janeiro',
    '02' => 'Fevereiro',
    '03' => 'Março',
    '04' => 'Abril',
    '05' => 'Maio',
    '06' => 'Junho',
    '07' => 'Julho',
    '08' => 'Agosto',
    '09' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro'
);
?>


<body>
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a href="index.php" class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br>
                        <center><strong> INÍCIO </strong></center>
                    </a>

                    <span class="navbar-brand"> <a href="index.php" class="text-white">Início </a> / Frequência</span>


                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view mb-5" data-aos="zoom-in" data-aos-once="true" id="profile">
        <h1>Frequência no Mês</h1>

        <?php
        include 'includes/conexao.php';

        $sth = $conexao->prepare("SELECT * FROM tb_idoso WHERE status = 'ATIVO' AND tipo = 'Deficiente' OR tipo = 'Idoso' OR tipo = 'Idoso e Associado' ORDER BY idtb_idoso ASC");
        $sth->execute();

        $result = $sth->fetchAll();
        ?>
        <?php
        $fuso = new DateTimeZone('America/Fortaleza');
        $data = new DateTime();
        $data->setTimezone($fuso);

        ?>

        <?php
        if (isset($_GET['mes'])) {
            $mesAtual = $_GET['mes'];
            $mesNOFORMAT = $_GET['mes'];
        }

        if (isset($_GET['ano'])) {
            $anoAtual = $_GET['ano'];
        }
        ?>

        <form class="form-inline mb-2">
            <div class="form-group sm-6">
                <label for="" style="margin-right:15px">Ano:</label>
                <input style="margin-right:25px" type="number" class="form-control" name="" id="ano" value="<?php echo $anoAtual; ?>">

                <label for="" style="margin-right:15px">Mês:</label>
                <select class="form-control" id="meses" style="margin-right:15px">
                    <option>selecione...</option>
                    <option value="01" <?php if ($mesAtual == '01') {
                                            echo 'selected';
                                        } ?>>Janeiro</option>
                    <option value="02" <?php if ($mesAtual == '02') {
                                            echo 'selected';
                                        } ?>>Fevereiro</option>
                    <option value="03" <?php if ($mesAtual == '03') {
                                            echo 'selected';
                                        } ?>>Março</option>
                    <option value="04" <?php if ($mesAtual == '04') {
                                            echo 'selected';
                                        } ?>>Abril</option>
                    <option value="05" <?php if ($mesAtual == '05') {
                                            echo 'selected';
                                        } ?>>Maio</option>
                    <option value="06" <?php if ($mesAtual == '06') {
                                            echo 'selected';
                                        } ?>>Junho</option>
                    <option value="07" <?php if ($mesAtual == '07') {
                                            echo 'selected';
                                        } ?>>Julho</option>
                    <option value="08" <?php if ($mesAtual == '08') {
                                            echo 'selected';
                                        } ?>>Agosto</option>
                    <option value="09" <?php if ($mesAtual == '09') {
                                            echo 'selected';
                                        } ?>>Setembro</option>
                    <option value="10" <?php if ($mesAtual == '10') {
                                            echo 'selected';
                                        } ?>>Outubro</option>
                    <option value="11" <?php if ($mesAtual == '11') {
                                            echo 'selected';
                                        } ?>>Novembro</option>
                    <option value="12" <?php if ($mesAtual == '12') {
                                            echo 'selected';
                                        } ?>>Dezembro</option>
                </select>
            </div>



            <div class="form-group sm-4">
                <button name="" type="button" onClick="trocaMes()" class="btn btn-primary" role="button">Consultar</button>
            </div>


            <script>
                function trocaMes() {

                    let mes = $('#meses').val();
                    let ano = $('#ano').val();

                    window.location.href = "consultafrequencia.php?mes=" + mes + "&ano=" + ano;


                }
            </script>

        </form>






        <form action="valida/validaTabelaFrequencia.php?mes=<?php echo $mesAtual; ?>&ano=<?php echo $anoAtual; ?>" method="post">
            <?php if (isset($_GET['op']) && $_GET['op'] == 'sucess') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Sucesso!</strong> a frequência foi atualizada com sucesso.
                </div>

            <?php } ?>
            <?php if (isset($_GET['op']) && $_GET['op'] == 'obs') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Sucesso!</strong> observação acrescentada ao mês.
                </div>

            <?php } ?>
            <?php if (isset($_GET['op']) && $_GET['op'] == 'delete') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Sucesso!</strong> observação foi deletada.
                </div>

            <?php } ?>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th colspan="2" clas="text-center">Associado</th>
                        <th colspan="31" class="text-center">
                            <?php echo $meses[$mesNOFORMAT] . "/" . $anoAtual ?>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo ("<th>$i</th>");
                        }
                        ?>
                        <th>
                            <center>Total de Presenças</center>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($result as $cadastro) {
                        $idIdoso = $cadastro[0];

                        $nomeReduzido = explode(" ", $cadastro[1]);
                        ?>
                        <tr>
                            <td scope="row">
                                <?php echo $cadastro[0]; ?>
                            </td>
                            <td>
                                <?php echo $nomeReduzido[0] . " ";
                                    if (count($nomeReduzido) > 1) {
                                        echo $nomeReduzido[1];
                                    } ?>
                            </td>


                            <?php
                                $totalPresenca = 0;
                                for ($i = 1; $i <= 31; $i++) {
                                    $dataIterada =  $anoAtual;
                                    $dataIterada = $dataIterada . "-" . $mesAtual;
                                    $dataIterada = $dataIterada . "-" . $i;

                                    $sth = $conexao->prepare("SELECT tb_idoso_idtb_idoso FROM tb_frequencia WHERE data = '$dataIterada' AND tb_idoso_idtb_idoso = $cadastro[0]");
                                    $sth->execute();

                                    $result = $sth->fetch();

                                    if ($result == null) {
                                        echo "<td><input value='$dataIterada' type='checkbox' name='idoso$idIdoso" . "[]' id='$cadastro[1]" . '-' . "$i '/>
                                    <label for='$cadastro[1]" . '-' . "$i ' ></label></td>";
                                    } else {
                                        echo "<td><input value='$dataIterada'  checked type='checkbox' name='idoso$idIdoso" . "[]' id='$cadastro[1]" . '-' . "$i '/>
                                    <label for='$cadastro[1]" . '-' . "$i '></label></td>";
                                        $totalPresenca++;
                                    }
                                }

                                echo "<td><center>$totalPresenca</center></td>";

                                ?>

                        </tr>






                    <?php

                    }
                    ?>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" style="float:right">Salvar</button>
        </form>
        <hr>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2>Eventos do Mês</h2>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data</th>
                            <th scope="col">Tipo</th>




                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'includes/conexao.php';

                        $query = $conexao->query("SELECT * FROM tb_evento WHERE data BETWEEN '$anoAtual-$mesAtual-01' AND '$anoAtual-$mesAtual-31'");

                        $eventos = $query->fetchAll();

                        $cores = array(
                            "I" => '#FFFF00',
                            "E" => "#00FFFF"
                        );
                        ?>


                        <?php
                        foreach ($eventos as $eventoAtual) {
                            $dataBr = date_format(date_create($eventoAtual['data']), 'd/m/Y');

                            ?>

                            <tr>
                                <th><?php echo $eventoAtual['nome']; ?></th>
                                <td><?php echo $eventoAtual['descricao']; ?></td>
                                <td><?php echo $dataBr; ?></td>
                                <td><?php if ($eventoAtual['tipo'] == 'I') {
                                            echo "Interno";
                                        } else {
                                            echo "Externo";
                                        } ?></td>
                            </tr>




                        <?php
                        }


                        ?>


                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h2>Observações no Mês <button type="button" class="btn btn-primary text-center btn-circle-content " data-toggle="modal" data-target="#modal-add">+</button></h2>
                <?php
                $query = $conexao->query("SELECT * FROM tb_observacao WHERE mes = '$mesAtual' AND ano = '$anoAtual'");
                $observacoes = $query->fetchAll();
                ?>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Observação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <style>
                        .mod {
                            position: absolute;
                            top: 10px;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            z-index: 10040;
                            overflow: auto;
                            overflow-y: auto;
                        }
                    </style>
                    <tbody>
                        <?php
                        foreach ($observacoes as $observacao) { ?>
                            <tr>
                                <td><?php echo $observacao['observacao']; ?></td>

                                <td><a data-toggle="modal" data-target="#modal-delete<?php echo $observacao['idtb_observacao']; ?>" name="botaoExcluir" id="botaoExcluir" class="btn btn-danger text-white" role="button">Excluir</a></td>
                            </tr>



                            <div class="modal fade mod" id="modal-delete<?php echo $observacao['idtb_observacao']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Tem certeza?
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Tem certeza que deseja excluir a observação?</p>




                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="valida/validaExcluirObservacao.php?mes=<?php echo $mesAtual;?>&ano=<?php echo $anoAtual;?>&id=<?php echo $observacao['idtb_observacao']; ?>" role="button">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }


                        ?>
                    </tbody>
                </table>
            </div>


        </div>



    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Nova Observação no Mês de <?php echo $meses[$mesAtual]; ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                </div>
                <form action="valida/validaObservacao.php?mes=<?php echo $mesAtual; ?>&ano=<?php echo $anoAtual; ?>" method="POST">
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <textarea required="" class="form-control" name="observacao" id="observacao" rows="4"></textarea>
                        </div>


                    </div>





                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>