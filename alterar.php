<?php
    include 'includes/conexao.php';


    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_idoso WHERE idtb_idoso = $id";
	$query = $conexao->query($sql);
	$return = $query->fetch();

?>








<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alterar - Casa de Patrícia</title>

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
        border: 6px solid #009afa;
        object-fit: cover;
        width:200px;
        height:200px;
        
    }

    .btn-file{
        width:100%;
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
                    <a href="index.php"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"></a>
                    
                    <span class="navbar-brand" > <a href="consulta.php" class="text-white">Consulta </a> / Alteração</span>
                    
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
        <form action="valida/validaAlterar.php?id=<?php echo $return[0]; ?>" enctype="multipart/form-data" name="formCad" method="post">
            <div class="form-row profile-row">
                <div class="col-md-4 align-items-center align-content-center relative">
                    <div class="avatar">
                        <div class="avatar-bg center">
                            <?php
                                if($return['img'] == null){ ?>
                                    <img id="output" src="assets/img/man.png" alt="Foto de Perfil" class="img-perfil" style="width:100%;">

                                <?php }else{ ?>

                                    <img id="output" src="includes/verimagem.php?id=<?php echo $return[0]; ?>" alt="Foto de Perfil" class="img-perfil" style="width:100%;">

                             <?php             
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <h1 style="color: #070707;">Informações</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome</label><input class="form-control form-control-lg" type="text" autofocus="" name="nome" required="" value="<?php echo $return['nome'] ?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Foto</label><br>
                            <span class="btn btn-primary btn-lg form-btn btn-file" ></i>Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
                            </span>
                        </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">

                            <?php
                                $date = new DateTime($return['data_nasc']);
                            
                            ?>


                            <div class="form-group"><label style="color: #0a0a0a;">Data de Nascimento</label>
                            <input class="form-control form-control-lg dataMASK" type="text" name="data_nasc" required="" value="<?php echo $date->format('m/d/Y') ?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label style="color: #0a0a0a;">Contato</label>
                            <input value="<?php echo $return['contato'] ?>" placeholder="(00) 00000-0000" class="form-control form-control-lg telefone" type="text" inputmode="numeric" name="contato" required="">
                        
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Sexo</label>
                            
                              
                              <select class="form-control form-control-lg" name="sexo" required="">
                                <option value="">Selecione...</option>
                                <option value="M" <?php if($return['sexo'] == "M"){ echo 'selected';} ?>>Masculino</option>
                                <option value="F" <?php if($return['sexo'] == "F"){ echo 'selected';} ?>>Feminino</option>
                              </select>
                            </div>
                        
                        </div>
                    </div>

                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Rua</label><input value="<?php echo $return['rua'] ?>" class="form-control form-control-lg" type="text"  name="rua" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Bairro</label><input value="<?php echo $return['bairro'] ?>" class="form-control form-control-lg" type="text"  name="bairro" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group"><label style="color: #0a0a0a;">Número</label>
                            <input class="form-control form-control-lg" type="text" inputmode="numeric" name="numero" required="" value="<?php echo $return['numero'] ?>">
                        </div>
                    </div>
                    </div>

                     <!-- DOCUMENTAÇÃO -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">RG</label>
                            <input value="<?php echo $return['rg'] ?>" class="form-control form-control-lg" type="text" id="RG" name="rg" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">CPF</label>
                            <input value="<?php echo $return['cpf'] ?>" class="form-control form-control-lg" type="text" id="CPF" name="cpf" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">NIS</label>
                            <input value="<?php echo $return['nis'] ?>" class="form-control form-control-lg" type="text" inputmode="numeric" name="nis" required="">
                        </div>
                    </div>
                    </div>

                    <!-- INFORMAÇÕES MÉDICAS -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                              <label style="color: #0a0a0a;" for="">Informações Médicas</label>
                              <textarea class="form-control" name="informacoes_medicas" rows="3" required=""><?php echo $return['informacoes_medicas'] ?></textarea>
                            </div>
                        </div>
                    
                    </div>

                    <div class="form-row">
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome Familiar</label>
                            <input value="<?php echo $return['nome_familiar'] ?>" class="form-control form-control-lg" required="" type="text"  name="nome_familiar"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Contato Familiar</label><br>
                            <input value="<?php echo $return['contato_familiar'] ?>" placeholder="(00) 00000-0000" class="form-control form-control-lg telefone" type="text" required="" name="contato_familiar"></div>
                        
                        </div>
                    </div>


                    
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit" onClick="document.formCad.submit()">ALTERAR</button>
                            <input class="btn btn-warning text-white form-btn" type="reset" value="LIMPAR TUDO"><br><br><br><br>
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
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>


    <script>
        var $campoCPF = $("#CPF");
        $campoCPF.mask('000.000.000-00', {reverse: true});

        var $campoDATA = $(".dataMASK");
        $campoDATA.mask('00/00/0000', {reverse: true});

        

        var $campoTELEFONE = $('.telefone');
        $campoTELEFONE.mask('(00) 00000-0000');
    </script>
</body>

</html>