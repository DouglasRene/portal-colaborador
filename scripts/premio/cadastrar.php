<?php
require("../conecta.php");

if(isset($_POST['resetSenha'])){
    $reset = "UPDATE usuarios SET senha = 'e7d80ffeefa212b7c5c55700e4f7193e' WHERE userid = {$_POST['resetSenha']}";
    // $conexao->query($reset) or die($conexao->error);
    if(!mysqli_query($conexao, $reset)){
        echo "Registro inexistente";
    }else{
        echo "Senha resetada \t 'senha123'";
    }
}

if(isset($_GET['nome']) && isset($_GET['registro']) && (isset($_GET['nascimento']))){
    $erro = 0;
    $data = $_GET['nascimento'];
    $nascimento = explode("/", $_GET['nascimento']);
    $nome = $_GET['nome'];
    $registro = $_GET['registro'];
    // echo"<script>alert('dia".$nascimento[0]."mes".$nascimento[1]."ano".$nascimento[2]."');</script>";
        $aniversario = "INSERT INTO `aniversariantes` VALUES ('{$registro}', '{$nome}', '{$data}', '{$nascimento[0]}', '{$nascimento[1]}');";
        $comando = "INSERT INTO `usuarios` VALUES ('{$registro}', '{$nome}', '{$registro}', 'e7d80ffeefa212b7c5c55700e4f7193e', 'N', 'user');";
        
        if(!mysqli_query($conexao, $comando)){
        $erro = 1;
        echo"<script>alert('Error: Número de registro já cadastrado');</script>";
        $page = $_SERVER['PHP_SELF'];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        echo "<script>
                window.location='{$_SERVER['HTTP_REFERER']}';
              </script>";
    }else{
        if($erro == 0){
            mysqli_query($conexao, $aniversario);
        }
        echo"<script>alert('Cadastrado com sucesso!');</script>";
        $page = $_SERVER['PHP_SELF'];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        echo "<script>
                window.location='{$_SERVER['HTTP_REFERER']}';
              </script>";
    }
}
?>