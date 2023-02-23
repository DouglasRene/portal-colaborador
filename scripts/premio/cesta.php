<?php
require("../conecta.php"); 

if ((!empty($_GET["inicio"])) and (!empty($_GET["fim"]))) {
    $inicio = $_GET["inicio"];
    $fim = $_GET["fim"];
    $comando  = "UPDATE `dataCesta` SET `inicio`='{$inicio}' ";
    $comando1 = "UPDATE `dataCesta` SET `fim`='{$fim}' ";
    mysqli_query($conexao, $comando);
    mysqli_query($conexao, $comando1);
    echo"<script>alert('Data atualizada!');</script>";
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
            window.location='{$_SERVER['HTTP_REFERER']}';
          </script>";
}
else {
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>
