<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastro - Casa de Patrícia</title>

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
        cursor: pointer;
        display: block;

    }

    .img-perfil {
        border-radius: 100%;
        border: 6px solid #009afa;
        object-fit: cover;
        width: 200px;
        height: 200px;

    }

    .btn-file {
        width: 100%;
    }

    .lbl-xerox::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        padding: .375rem .75rem;
        line-height: 1.5;
        color: #495057;
        content: "Browse";
        background-color: #e9ecef;
        border-left: 1px solid #ced4da;
        border-radius: 0 .25rem .25rem 0;
        box-sizing: border-box;
    }

    .custom-file-label {
        content: "Buscar";
    }
</style>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<body style="/*background-color: rgb(238,241,247);*/">
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a href="index.php" class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br>
                        <center><strong> INÍCIO </strong></center>
                    </a>

                    <span class="navbar-brand"> <a href="index.php" class="text-white">Início </a> / Cadastro</span>

                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view" data-aos="zoom-in" data-aos-once="true" id="profile">

        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Pedido salvo com sucesso</span></div>
            </div>
        </div>
        <form action="valida/validaCadastro.php" enctype="multipart/form-data" name="formCad" method="post">
            <div class="form-row profile-row">
                <div class="col-md-4 align-items-center align-content-center relative">
                    <div class="avatar">
                        <div class="avatar-bg center">
                            <img id="output" src="assets/img/family.png" alt="Foto de Perfil" class="img-perfil" style="width:100%;">
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <h1 style="color: #070707;">Informações</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome*</label><input required="" class="form-control form-control-lg" type="text" autofocus="" name="nome"></div>
                        </div>
                        <div class="col-sm-12 col-md-3">

                            <div class="form-group"><label style="color: #0a0a0a;">Tipo*</label>


                                <select class="form-control form-control-lg" name="tipo_pessoa" required="">
                                    <option value="">Selecione...</option>
                                    <option value="Idoso">Idoso</option>
                                    <option value="Idoso e Associado">Idoso e Associado</option>
                                    <option value="Deficiente">Deficiente</option>
                                    <option value="Associado">Associado</option>



                                </select>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">Foto</label><br>
                                <span class="btn btn-primary btn-lg form-btn btn-file"></i>Buscar Foto <input type="file" name="imagem" accept="image/*" onchange="loadFile(event)">
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Data de Nascimento</label>
                                <input class="form-control form-control-lg" type="date" name="data_nasc"></div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group">
                                <label style="color: #0a0a0a;">Contato</label>
                                <input placeholder="(00) 00000-0000 (00) 00000-0000" class="form-control form-control-lg telefone" type="text" inputmode="numeric" name="contato">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">Sexo</label>
                                <input class="form-control form-control-lg" name="sexo" list="sexos">
                                <datalist id="sexos">
                                    <option value="Masculino">
                                    <option value="Feminino">
                                    <option value="Não Binário">

                                    
                                </datalist>

                            </div>

                        </div>
                    </div>
                    <!-- NOME PAI E MAE -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome do Pai</label><input class="form-control form-control-lg" type="text" name="pai"></div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome da Mãe</label>
                                <input class="form-control form-control-lg" type="text" name="mae">
                            </div>
                        </div>

                    </div>

                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Rua</label><input class="form-control form-control-lg" type="text" name="rua"></div>
                        </div>

                        <div class="col-sm-12 col-md-2">
                            <div class="form-group"><label style="color: #0a0a0a;">Número</label>
                                <input class="form-control form-control-lg" type="text" inputmode="numeric" name="numero">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Bairro/Localidade</label><input class="form-control form-control-lg" type="text" name="bairro"></div>
                        </div>
                    </div>
                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Município</label><input class="form-control form-control-lg" type="text" name="municipio"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">CEP</label><input class="form-control form-control-lg cep" type="text" name="cep"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Complemento</label>
                                <input class="form-control form-control-lg" type="text" name="complemento">
                            </div>
                        </div>
                    </div>
                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group"><label style="color: #0a0a0a;">Ponto de Referência</label><input class="form-control form-control-lg" type="text" name="ponto_referencia"></div>
                        </div>

                    </div>

                    <!-- DOCUMENTAÇÃO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">RG</label>
                                <input class="form-control form-control-lg" type="text" id="RG" name="rg"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Data de Expedição</label>
                                <input class="form-control form-control-lg" type="date" name="data_expedicao"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Orgão Expedidor</label>
                                <input class="form-control form-control-lg" type="text" name="orgao_expedidor">
                            </div>
                        </div>
                    </div>
                    <!-- DOCUMENTAÇÃO -->
                    <div class="form-row">

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">CPF</label>
                                <input class="form-control form-control-lg" type="text" id="CPF" name="cpf"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">NIS</label>
                                <input class="form-control form-control-lg" type="text" inputmode="numeric" name="nis">
                            </div>
                        </div>
                    </div>
                    <!-- XEROX -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group">
                                <div class="custom-file form-control">
                                    <input type="file" class="custom-file-input " id="xerox" name="xerox">
                                    <label class="custom-file-label" for="xerox">Xerox dos Documentos</label>

                                </div>
                            </div>
                        </div>


                    </div>


                    <!-- INFORMAÇÕES MÉDICAS -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group">
                                <label style="color: #0a0a0a;" for=""><strong>Informações Médicas</strong></label>


                                <div class="form-group">
                                    <label style="color: #0a0a0a;" for="">Tem alguma doença?</label>

                                    <?php

                                    include 'includes/conexao.php';

                                    $sth = $conexao->prepare("SELECT * FROM tb_doenca");
                                    $sth->execute();

                                    $result = $sth->fetchAll();

                                    foreach ($result as $doenca) {

                                        ?>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="doenca[]" id="doenca" value="<?php echo $doenca[0]; ?>">
                                                <?php echo $doenca['nome']; ?>
                                            </label>
                                        </div>


                                    <?php
                                    }
                                    ?>



                                </div>

                                <div class="form-group">
                                    <label for="">Outras Doenças? Quais?</label>
                                    <input type="text" class="form-control" name="outras_doencas" id="" aria-describedby="helpId" placeholder="">

                                </div>

                                <div class="form-group">
                                    <label for="">Toma alguma medicação? Qual?</label>
                                    <input type="text" class="form-control" name="medicacoes" id="" aria-describedby="helpId" placeholder="">

                                </div>

                                <div class="form-group">
                                    <label for="">É alergico a alguma coisa? A quê?</label>
                                    <input type="text" class="form-control" name="alergias" id="" aria-describedby="helpId" placeholder="">

                                </div>

                                <div class="form-group">
                                    <label for="">Tem intolerância? A quê?</label>
                                    <input type="text" class="form-control" name="intolerancia" id="" aria-describedby="helpId" placeholder="">

                                </div>


                                <hr>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">


                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Responsável Familiar</label>
                                <input class="form-control form-control-lg" type="text" name="nome_familiar"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Contato Familiar</label><br>
                                <input placeholder="(00) 00000-0000" class="form-control form-control-lg telefone" type="text" name="contato_familiar"></div>

                        </div>
                    </div>





                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit">CADASTRAR</button>
                            <br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>

    <script src="assets/js/jquery.mask.min.js"></script>


    <script>
        function verificarCampos() {

            //if()
            //document.formCad.submit();
        }

        var $campoCPF = $("#CPF");
        $campoCPF.mask('000.000.000-00', {
            reverse: true
        });

        var $campoCPF = $(".cep");
        $campoCPF.mask('00.000-000', {
            reverse: true
        });



        var $campoTELEFONE = $('.telefone');
        $campoTELEFONE.mask('(00) 00000-0000 (00) 00000-0000');
    </script>
</body>

</html>