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
    <title>Alteração - Casa de Patrícia</title>

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
    
    .lbl-xerox::after{
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

    .custom-file-label{
        content:"Buscar";
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
                <a href="index.php"  class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br><center><strong> INÍCIO </strong></center></a>
                    
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
                                if($return['profile_src'] == null){ ?>
                                    <img id="output" src="assets/img/family.png" alt="Foto de Perfil" class="img-perfil" style="width:100%;">

                                <?php }else{ ?>

                                    <img id="output" src="<?php echo $return['profile_src']; ?>" alt="Foto de Perfil" class="img-perfil" style="width:100%;">

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
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome</label><input class="form-control form-control-lg" type="text" value="<?php echo $return['nome']; ?>" name="nome"></div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            
                            <div class="form-group"><label style="color: #0a0a0a;">Tipo</label>
                                
                                
                                <select class="form-control form-control-lg" name="tipo_pessoa">
                                <option value="">Selecione...</option>
                                <option value="Idoso" <?php if($return['tipo'] == "Idoso"){ echo 'selected';}?>>Idoso</option>
                                <option value="Idoso e Associado" <?php if($return['tipo'] == "Idoso e Associado"){ echo 'selected';}?>>Idoso e Associado</option>
                                <option value="Deficiente" <?php if($return['tipo'] == "Deficiente"){ echo 'selected';}?>>Deficiente</option>
                                <option value="Associado" <?php if($return['tipo'] == "Associado"){ echo 'selected';}?>>Associado</option>
                                
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">Foto</label><br>
                            <span class="btn btn-primary btn-lg form-btn btn-file" ></i>Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
                            </span>
                        </div>
                        </div>
                    </div>
                    <?php
                                
                            
                            ?>


                    <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Data de Nascimento</label>
                            <input class="form-control form-control-lg dataMASK" type="date" name="data_nasc" value="<?php echo $return['data_nasc']; ?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                        <div class="form-group">
                            <label style="color: #0a0a0a;">Contato</label>
                            <input value="<?php echo $return['contato']; ?>" placeholder="(00) 00000-0000 (00) 00000-0000"  class="form-control form-control-lg telefone" type="text" inputmode="numeric" name="contato">
                        
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                        <div class="form-group"><label style="color: #0a0a0a;">Sexo</label>
                                <input class="form-control form-control-lg" name="sexo" list="sexos" value="<?php echo $return['sexo']; ?>">
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
                            <div class="form-group"><label style="color: #0a0a0a;">Nome do Pai</label><input value="<?php echo $return['pai']; ?>"class="form-control form-control-lg" type="text"  name="pai" ></div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome da Mãe</label>
                            <input value="<?php echo $return['mae']; ?>" class="form-control form-control-lg" type="text"  name="mae" >
                        </div>
                    </div>
                    
                    </div>

                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Rua</label><input value="<?php echo $return['rua']; ?>" class="form-control form-control-lg" type="text"  name="rua"></div>
                        </div>
                        
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group"><label style="color: #0a0a0a;">Número</label>
                            <input value="<?php echo $return['numero']; ?>" class="form-control form-control-lg" type="text" inputmode="numeric" name="numero">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Bairro/Localidade</label><input value="<?php echo $return['bairro']; ?>" class="form-control form-control-lg" type="text"  name="bairro"></div>
                        </div>
                    </div>
                     <!-- ENDEREÇO -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Município</label><input value="<?php echo $return['municipio']; ?>" class="form-control form-control-lg" type="text"  name="municipio"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">CEP</label><input value="<?php echo $return['cep']; ?>" class="form-control form-control-lg cep" type="text"  name="cep"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Complemento</label>
                            <input value="<?php echo $return['complemento']; ?>" class="form-control form-control-lg" type="text"  name="complemento">
                        </div>
                    </div>
                    </div>
                     <!-- ENDEREÇO -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group"><label style="color: #0a0a0a;">Ponto de Referência</label><input value="<?php echo $return['ponto_referencia']; ?>" class="form-control form-control-lg" type="text"  name="ponto_referencia"></div>
                        </div>
                        
                    </div>

                     <!-- DOCUMENTAÇÃO -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">RG</label>
                            <input value="<?php echo $return['rg']; ?>" class="form-control form-control-lg" type="text" id="RG" name="rg"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Data de Expedição</label>
                            <input value="<?php echo $return['data_expedicao']; ?>" class="form-control form-control-lg" type="date" name="data_expedicao"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Orgão Expedidor</label>
                            <input value="<?php echo $return['orgao_expedidor']; ?>" class="form-control form-control-lg" type="text" name="orgao_expedidor">
                        </div>
                    </div>
                    </div>
                    <!-- DOCUMENTAÇÃO -->
                    <div class="form-row">
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">CPF</label>
                            <input value="<?php echo $return['cpf']; ?>" class="form-control form-control-lg" type="text" id="CPF" name="cpf"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">NIS</label>
                            <input value="<?php echo $return['nis']; ?>" class="form-control form-control-lg" type="text" inputmode="numeric" name="nis">
                        </div>
                    </div>
                    </div>
                     <!-- XEROX -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                           
                        <div class="form-group">
                        <div class="custom-file form-control" >
                            <input type="file" class="custom-file-input "  id="xerox" name="xerox"  >
                            <label class="custom-file-label"  for="xerox">Xerox dos Documentos</label>
                            
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

                                    $resultDoenca = $sth->fetchAll();

                                    foreach($resultDoenca as $doenca){

                                        $sthDoente = $conexao->prepare("SELECT * FROM tb_doente WHERE tb_doenca_idtb_doenca = $doenca[0] AND tb_idoso_idtb_idoso = $return[0]");
                                        $sthDoente->execute();

                                        $resultDoente = $sthDoente->fetchAll();

                                ?>

                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input <?php if($resultDoente != null){echo 'checked';} ?> type="checkbox" class="form-check-input" name="doenca[]" id="doenca" value="<?php echo $doenca[0];?>">
                                    <?php echo $doenca['nome'];?>
                                  </label>
                                </div>


                                <?php
                                    }
                                ?>

                                

                            </div>
                            <div class="form-group">
                                <label for="">Outras Doenças? Quais?</label>
                                <input type="text" value="<?php echo $return['outras_doencas'] ?>"
                                  class="form-control" name="outras_doencas" id="" aria-describedby="helpId" placeholder="" >
                                
                              </div>

                              <div class="form-group">
                                <label for="">Toma alguma medicação? Qual?</label>
                                <input value="<?php echo $return['medicacoes']; ?>" type="text"
                                  class="form-control" name="medicacoes" id="" aria-describedby="helpId" placeholder="">
                                
                              </div>

                              <div class="form-group">
                                <label for="">É alergico a alguma coisa? O quê?</label>
                                <input type="text" value="<?php echo $return['alergias']; ?>"
                                  class="form-control" name="alergias" id="" aria-describedby="helpId" placeholder="">
                                
                              </div>

                              <div class="form-group">
                                <label for="">Tem intolerância a algum alimento? Qual?</label>
                                <input type="text" value="<?php echo $return['intolerancia']; ?>"
                                  class="form-control" name="intolerancia" id="" aria-describedby="helpId" placeholder="">
                                
                              </div>


                              <hr>
                            </div>
                        </div>
                    
                    </div>

                    <div class="form-row">
                        
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Responsável Familiar</label>
                            <input value="<?php echo $return['nome_familiar']; ?>" class="form-control form-control-lg" type="text"  name="nome_familiar"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Contato Familiar</label><br>
                            <input value="<?php echo $return['contato_familiar']; ?>" placeholder="(00) 00000-0000" class="form-control form-control-lg telefone" type="text" name="contato_familiar"></div>
                        
                        </div>
                    </div>


                    
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit" >SALVAR</button>
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
        function verificarCampos(){

            //if()
            //document.formCad.submit();
        }

        var $campoCPF = $("#CPF");
        $campoCPF.mask('000.000.000-00', {reverse: true});

        var $campoCPF = $(".cep");
        $campoCPF.mask('00.000-000', {reverse: true});

        

        var $campoTELEFONE = $('.telefone');
        $campoTELEFONE.mask('(00) 00000-0000 (00) 00000-0000');


        //var $campoDATA = $(".dataMASK");
        //$campoDATA.mask('00-00-0000', {reverse: true});

    </script>
</body>

</html>