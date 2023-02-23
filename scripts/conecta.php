<?php
$conexao = mysqli_connect(parse_ini_file('.env')['mysql_host'], parse_ini_file('.env')['mysql_login'], parse_ini_file('.env')['mysql_pass']);

if($conexao){
$baseSelecionada = mysqli_select_db($conexao, parse_ini_file('.env')['mysql_db']);
if (!$baseSelecionada) {
    die ('Não foi possível conectar a base de dados: ' . mysqli_error($conexao));
} } else {
    die('Não conectado : ' . mysqli_error($baseSelecionada));
}
?>
