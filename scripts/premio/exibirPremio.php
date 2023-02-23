<?php
$premioS = "SELECT count(premio) FROM usuarios WHERE premio = 'S'";
$premioN = "SELECT count(premio) FROM usuarios WHERE premio = 'N'";
$totalG = "SELECT count(premio) FROM usuarios";
$sPremio = $conexao->query($premioS) or die($conexao->error);
$row1 = mysqli_fetch_row($sPremio);
$nPremio = $conexao->query($premioN) or die($conexao->error);
$row2 = mysqli_fetch_row($nPremio);
$gTotal = $conexao->query($totalG) or die($conexao->error);
$row3 = mysqli_fetch_row($gTotal);
?>
