<?php
    include '../includes/conexao.php';


   $id =  $_GET['id'];
   $mes = $_GET['mes'];
   $ano = $_GET['ano'];



   $conexao->query("DELETE FROM tb_observacao WHERE idtb_observacao = $id");

    header("location:../consultafrequencia.php?mes=$mes&ano=$ano&op=delete");
    
?>