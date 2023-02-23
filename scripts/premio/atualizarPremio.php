<?php
require("../conecta.php");

if ((isset($_POST['iduser'])) and (!empty($_POST['premio']))) {
    $premio = $_POST['premio'];
    $iduser = $_POST['iduser'];
    for ($i = 0; $i < count($iduser); $i++) {
        $comando = "UPDATE `usuarios` SET `premio`='{$premio}' WHERE `userid` = '{$iduser[$i]}'";
        mysqli_query($conexao, $comando);
    } 
    $page = $_SERVER['PHP_SELF']; 
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}elseif ((isset($_POST['todos'])) and (!empty($_POST['premio']))) {
    $premio = $_POST['premio'];
    $iduser = $_POST['todos'];
    $todos = explode("\n", $iduser);
    for ($i = 0; $i < count($todos); $i++) {
        $comando = "UPDATE `usuarios` SET `premio`='{$premio}' WHERE `userid` = '{$todos[$i]}'";
        mysqli_query($conexao, $comando);
    }
    echo"<script>alert('Cadastrado com sucesso!');</script>";
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}else{
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?> 