<?php
    class retornaAniversario{
        function aniversariantes($i, $f){
            require("conecta.php");
            $mes = date('m');
            $result = "SELECT registro, nome, mes, dia FROM aniversariantes WHERE mes = {$mes} ORDER BY dia ASC";
            $con5 = $conexao->query($result) or die($conexao->error);
            while($row = mysqli_fetch_array($con5)){
                if ($row['dia'] > $i && $row['dia'] <= $f) {
                echo '<b><div class="mt-3">'.$row["nome"].', &nbsp; dia &nbsp;  <span style="color: red;">'.$row['dia'].'</span></div></b>';
            }}
        }  
        
        function parabens($R_atual) {
            require("conecta.php");
            $mes = date('m');
            $result = "SELECT registro, nome, mes, dia FROM aniversariantes WHERE mes = {$mes} AND registro = {$R_atual}";
            $con5 = $conexao->query($result) or die($conexao->error);
            while($R_banco = mysqli_fetch_array($con5)){
                if ($R_atual == $R_banco['registro']) {
                echo '<img src="./imagens/parabens.gif" width="100%" height="300" alt="Parabéns">';
            }}
        }
    }
?> 

