<?php 
    class retornaTexto {
        function obterTexto($id){
            require("conecta.php");
            $result5 = "SELECT `conteudo` FROM `conteudo` WHERE `id` = {$id} ";
            $con5 = $conexao->query($result5) or die($conexao->error);
            while($row = mysqli_fetch_array($con5)){
            echo $row['conteudo'];
            }
        }
        function obterData($id){
            require("conecta.php");
            $result5 = "SELECT `data` FROM `conteudo` WHERE `id` = {$id} ";
            $con5 = $conexao->query($result5) or die($conexao->error);
            while($row = mysqli_fetch_array($con5)){
            echo $row['data'];
            }
        }          
    }
?>