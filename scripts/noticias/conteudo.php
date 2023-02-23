<?php
require("../conecta.php");
$id = $_POST['id'];
$conteudo = $_POST['conteudo'];
$historico = $_POST['historico'];
$file = $_FILES['imagem']['name'];
$imgBanco = $_POST['imgBanco'];
$data = date('d/m/Y');

if (isset($id) && isset($conteudo) ){
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $fp = fopen($imagem, "rb");
    $conteudoImg = fread($fp, $tamanho);
    $conteudoImg = addslashes($conteudoImg);
    fclose($fp);
    //verifica se tem imagem para adicionar
    if(isset($_FILES['imagem']['name']) || !empty($_FILES['imagem']['name'])) {
        $queryInsercaoN = "UPDATE `conteudo` SET `imagem`='{$conteudoImg}', `data`='{$data}' WHERE `id` = {$id}";
        mysqli_query($conexao, $queryInsercaoN);
        //adiciona ao historico
        if($historico == "sim") {
            $data = date('d/m/Y'); 
            $queryInsercaoH = "INSERT INTO `historico` (`data`, `conteudo`,`imagem`) VALUES ('{$data}', '{$conteudo}', '{$conteudoImg}')";
            mysqli_query($conexao, $queryInsercaoH);
        }
    }
    if(isset($imgBanco)) {
        $data = date('d/m/Y');
        $queryInsercaoH = "INSERT INTO `historico` (`data`, `conteudo`,`imagem`) VALUES ('{$data}', '{$conteudo}', (SELECT imagem FROM conteudo WHERE id = $imgBanco))";
        mysqli_query($conexao, $queryInsercaoH);
        //zerar histórico id
        //ALTER TABLE historico DROP id;
        //ALTER TABLE historico ADD id INT(255) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);
    }
    $comando = "UPDATE `conteudo` SET `conteudo`='{$conteudo}', `data`='{$data}' WHERE `id` = {$id}";
    mysqli_query($conexao, $comando);
}

?> 
