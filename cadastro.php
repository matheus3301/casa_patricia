<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cadastro - Casa de Patrícia</title>
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
                    
                    <a class="navbar-brand" href="#">Cadastro</a>
                    
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
        <form method="POST" action="validaPedido.php">
            <div class="form-row profile-row">
                <div class="col-md-4 align-items-center align-content-center relative">
                    <div class="avatar">
                        <div class="avatar-bg center">
                            <img id="output" src="assets/img/man.png" alt="Foto de Perfil" class="img-perfil" style="width:100%;">
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <h1 style="color: #070707;">Informações</h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome</label><input class="form-control form-control-lg" type="text" autofocus="" name="cliente"></div>
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
                            <div class="form-group"><label style="color: #0a0a0a;">Data de Nascimento</label><input class="form-control form-control-lg" type="date" name="data_nasc"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label style="color: #0a0a0a;">Contato</label>
                            <input class="form-control form-control-lg" type="text" inputmode="numeric" name="contato">
                        
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Sexo</label>
                            
                              
                              <select class="form-control form-control-lg" name="sexo" id="">
                                <option value="">Selecione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                              </select>
                            </div>
                        
                        </div>
                    </div>

                    <!-- ENDEREÇO -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Rua</label><input class="form-control form-control-lg" type="text" autofocus="" name="produto"></div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group"><label style="color: #0a0a0a;">Bairro</label><input class="form-control form-control-lg" type="text" inputmode="numeric" name="quantidade"></div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group"><label style="color: #0a0a0a;">Número</label>
                            <input class="form-control form-control-lg" type="text" inputmode="numeric" name="numero">
                        </div>
                    </div>
                    </div>

                     <!-- DOCUMENTAÇÃO -->
                     <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">RG</label>
                            <input class="form-control form-control-lg" type="text"  name="rg"></div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">CPF</label>
                            <input class="form-control form-control-lg" type="text"  name="cpf"></div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group"><label style="color: #0a0a0a;">NIS</label>
                            <input class="form-control form-control-lg" type="text" inputmode="numeric" name="nis">
                        </div>
                    </div>
                    </div>

                    <!-- INFORMAÇÕES MÉDICAS -->
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                              <label style="color: #0a0a0a;" for="">Informações Médicas</label>
                              <textarea class="form-control" name="" id="" rows="3">ALERGIAS:
MEDICAÇÕES:
                              </textarea>
                            </div>
                        </div>
                    
                    </div>

                    <div class="form-row">
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Nome Familiar</label><input class="form-control form-control-lg" type="text" autofocus="" name="cliente"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group"><label style="color: #0a0a0a;">Foto</label><br>
                            <span class="btn btn-primary btn-lg form-btn btn-file" ></i>Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
                            </span>
                        </div>
                        </div>
                    </div>


                    
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit">CADASTRAR</button>
                            <button class="btn btn-warning text-white form-btn" type="reset">LIMPAR TUDO</button>
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
</body>

</html>