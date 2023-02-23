<?php
require("../conecta.php");

$id_imagem = $_GET["id"];
$querySelecionaPorCodigo = "SELECT codigo,
imagem FROM tabela_imagens WHERE codigo = $id_imagem";
$resultado = mysqli_query($conexao, $querySelecionaPorCodigo);
$imagem = mysqli_fetch_object($resultado);
Header( "Content-type: image/gif"); 
echo $imagem->imagem;
?>