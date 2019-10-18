<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Eventos - Casa de Patrícia</title>

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
  <link href='assets/fullcalendar/core/main.css' rel='stylesheet' />
  <link href='assets/fullcalendar/daygrid/main.css' rel='stylesheet' />
  <script src='assets/fullcalendar/core/locales/pt-br.js'></script>

  <script src='assets/fullcalendar/core/main.js'></script>
  <script src='assets/fullcalendar/daygrid/main.js'></script>

  <link href='assets/fullcalendar/list/main.css' rel='stylesheet' />
  <script src='assets/fullcalendar/list/main.js'></script>

  <link href='assets/fullcalendar/timegrid/main.css' rel='stylesheet' />
  <script src='assets/fullcalendar/timegrid/main.js'></script>

<body style="/*background-color: rgb(238,241,247);*/">
    <section class="pricing-table" style="padding: 0px;"></section>
    <div>
        <div class="header-blue" style="height: 92px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                <a href="index.php"  class="text-white"><img src="assets/img/logo.png" alt="Casa de Patrícia" class="header-img"><br><center><strong> INÍCIO </strong></center></a>
                    
                    <span class="navbar-brand" > <a href="index.php" class="text-white">Início </a> / Eventos</span>
                    
                    
                </div>
            </nav>
        </div>
    </div>
    <div class="container profile profile-view mb-5" data-aos="zoom-in" data-aos-once="true" id="profile">
        <h1>Eventos</h1>
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <div id='calendar' ></div>

            </div>
            <div class="col-sm-12 col-md-5 ">

            
                <h3 class="">Todos Eventos <button type="button" class="btn btn-primary text-center btn-circle-content " data-toggle="modal" data-target="#modal-add">+</button></h3>
                
                <?php 
                    if(isset($_GET['op']) && $_GET['op'] == 'success'){?>

                <center><div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Successo!</strong> Evento cadastrado.
                </div>
                </center>            


                <?php    
                    }
                ?>

                <?php 
                    if(isset($_GET['op']) && $_GET['op'] == 'delete'){?>

                <center><div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Successo!</strong> Evento deletado.
                </div>
                </center>            


                <?php    
                    }
                ?>
                
                <table class="table table-striped table-responsive" id="tabela">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ações </th>



                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'includes/conexao.php';

                        $query = $conexao->query("SELECT * FROM tb_evento");

                        $eventos = $query->fetchAll();

                        $cores = array(
                            "I" => '#FFFF00',
                            "E" => "#00FFFF"
                        );
                    ?>
                        

                        <?php
                            foreach($eventos as $eventoAtual){  
                                $dataBr = date_format(date_create($eventoAtual['data']), 'd/m/Y');
                                
                                ?>

                                <tr>
                                    <th ><?php echo $eventoAtual['nome']; ?></th>
                                    <td><?php echo $eventoAtual['descricao']; ?></td>
                                    <td><?php echo $dataBr; ?></td>
                                    <td><?php if($eventoAtual['tipo'] == 'I'){ echo "Interno";}else{echo "Externo";}
                                        ?></td>
                                    <td><button data-toggle="modal" data-target="#modal-delete<?php echo $eventoAtual['idtb_evento']; ?>" name="botaoExcluir" id="botaoExcluir" class="btn btn-danger"  role="button">Excluir</button></td>
                                </tr>


                                <div class="modal fade" id="modal-delete<?php echo $eventoAtual['idtb_evento']; ?>">
                                    <div class="modal-dialog" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                Tem certeza?
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
                                            </div>
                                            <form action="valida/validaEvento.php" method="POST">
                                            <div class="modal-body"> 
                                                <p>Tem certeza que deseja excluir o evento: <?php echo $eventoAtual['nome']; ?>?</p>
                                                
                                                    
                                            

                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="valida/validaExcluirEvento.php?id=<?php echo $eventoAtual['idtb_evento']; ?>" role="button">Excluir</a>
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

            </div>
        </div>



     </div>   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Pricing-Tables.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/colResizable-1.6.min.js"></script>
    <script type="text/javascript" src="assets/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tabela').DataTable({
                language:{
                    url:'assets/Portuguese-Brasil.json'
                }
            });
        });
    </script>


    
    <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ],
      locale: 'pt-br',
      timeZone: 'UTC',
      defaultView: 'dayGridMonth',
      events: [<?php foreach($eventos as $eventoAtual){?>
        {
          title:"<?php echo $eventoAtual['nome']; ?>",
          start:"<?php echo $eventoAtual['data']; ?>",
          color:"<?php echo $cores[$eventoAtual['tipo']]; ?>",
          
          
        },   
      <?php } ?>]

  });

    calendar.render();
  });

</script>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                   Novo Evento
                </h4>
                <button type="button" class="close" data-dismiss="modal"><b>x</b></button>
            </div>
            <form action="valida/validaEvento.php" method="POST">
            <div class="modal-body"> 
                
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="nome_evento" id="" class="form-control" placeholder="nome do evento" aria-describedby="helpId" required="">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="2"></textarea>
                    </div>

                    <div class="form-row">
                        
                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data" class="form-control" aria-describedby="helpId" required="">
                        </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                        <label for="tipo">Tipo</label>
                            <select class="form-control" name="tipo" id="tipo" required="">
                                <option value="">selecione...</option>
                                <option value="I">Interno</option>
                                <option value="E">Externo</option>
                            </select>
                            </div>
                        
                        </div>
                    </div>
                    
                   
               

            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-primary" >Adicionar</button>
            </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>