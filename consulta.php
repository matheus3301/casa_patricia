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
                    
                    <a class="navbar-brand" href="#">Consulta</a>
                    
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

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Contato</th>
                    <th>Data de Nasc.</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>NIS</th>
                    <th>Nome Familiar</th>
                    <th>Contato Familiar</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($result as $cadastro){

                        
                    ?>
                    <tr>
                        <td scope="row"><img class="img-perfil" src="includes/verimagem.php?id=<?php echo $cadastro[0];?>" alt="Imagem"></td>
                        <td><?php echo $cadastro[1]; ?></td>
                        <td><?php echo $cadastro[3]; ?></td>
                        <td><?php echo $cadastro[10]; ?></td>
                        <td><?php echo $cadastro[2]; ?></td>
                        <td><?php echo $cadastro[8]; ?></td>
                        <td><?php echo $cadastro[9]; ?></td>
                        <td><?php echo $cadastro[7]; ?></td>
                        <td><?php echo $cadastro[13]; ?></td>
                        <td><?php echo $cadastro[12]; ?></td>
                        <td>
                            <a  class="btn btn-warning text-white" href="alterar.php?id=<?php echo $cadastro[0]?>" role="button">Alterar</a>
                            <a  class="btn btn-danger text-white"data-toggle="modal" data-target="#modal-excluir<?php echo $cadastro[0]?>" role="button">Excluir</a>
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

                            <p>Tem certeza que deseja excluir <?php echo $cadastro[1]?>?</p>



                            </div>
                            <div class="modal-footer">
                                <a href="excluir.php?id=<?php echo $cadastro[0]?>" class="btn btn btn-primary text-white ml-3">Excluir</a>
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