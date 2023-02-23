<?php
require("./scripts/conecta.php");
$premioT = "SELECT `userid`, `nome`, `premio` FROM `usuarios` ";
$cestaT = "SELECT * FROM `dataCesta` ";

$con = $conexao->query($premioT) or die($conexao->error);
$con4 = $conexao->query($cestaT) or die($conexao->error);
while ($dado4 = $con4->fetch_array()) {
    $Ini = $dado4['inicio'];
    $fim = $dado4['fim'];
}
$Inic = explode('/', $Ini);
$inicio = $Inic[2]."-".$Inic[1]."-".$Inic[0];
$fimm = explode('/', $fim);
$Fim = $fimm[2]."-".$fimm[1]."-".$fimm[0];
?>