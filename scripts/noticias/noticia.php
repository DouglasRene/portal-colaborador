<?php
require("../conecta.php"); 

$visivel = $_POST['visivel'];
$status = $_POST['status'];

if($status == 'adicionado') {
    $comando = "UPDATE `conteudo` SET `status` = 'sim' WHERE `visivel`='{$visivel}'";
    mysqli_query($conexao, $comando);
    echo "<script>alert('Texto editado');</script>";
}

if($status == 'excluido') {
    $comando = "UPDATE `conteudo` SET `status` = 'nao' WHERE `visivel`='{$visivel}'";
    mysqli_query($conexao, $comando);
    echo "<script>alert('Texto editado');</script>";
}

$page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
    window.location='{$_SERVER['HTTP_REFERER']}';
    </script>";
?> 
