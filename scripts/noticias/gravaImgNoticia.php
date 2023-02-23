<?php  
require("../conecta.php");

$id = $_POST['id'];
$file = $_FILES['imagem']['name'];


if($file != "none") {
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $fp = fopen($imagem, "rb");
    $conteudoImg = fread($fp, $tamanho);
    $conteudoImg = addslashes($conteudoImg);
    fclose($fp);
    
    $queryInsercao = "UPDATE `conteudo` SET `imagem`='{$conteudoImg}' WHERE `id` = {$id}";
    mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.<br>".$conexao->error);
    exit;
}

?>