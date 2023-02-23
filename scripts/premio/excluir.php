<?php
require("../conecta.php");

if(isset($_GET['exclregistro'])){
    $exclregistro = $_GET['exclregistro'];
    $comando = "DELETE FROM `usuarios` WHERE `userid` = {$exclregistro}";
    $comando1 = "DELETE FROM `aniversariantes` WHERE `registro` = {$exclregistro}";
    mysqli_query($conexao, $comando);
    mysqli_query($conexao, $comando1);
    echo"<script>alert('Excluído com sucesso!');</script>";
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
            window.location='{$_SERVER['HTTP_REFERER']}';
          </script>";
}else{
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>