<?php 
   
    // require("../conecta.php");

    $total_reg = 4;
    $selecionaId = "SELECT `id`, `data`, `conteudo`, `imagem` FROM historico ORDER BY `id` DESC";
    
    $selec = "SELECT * FROM historico";


    $pagina = $_GET['pagina'];
    if (!$pagina) {
    $pc = "1";
    } else {
    $pc = $pagina;
    }

    $inicio = $pc - 1;
    $inicio = $inicio * $total_reg;

    $seleciona = "{$selecionaId} LIMIT {$inicio},{$total_reg}";
    $limite = mysqli_query($conexao , $seleciona);
    $todos = mysqli_query($conexao ,$selec);

    $tr = mysqli_num_rows($todos); // verifica o número total de registros
    $tp = $tr / $total_reg; // verifica o número total de páginas


    // agora vamos criar os botões "Anterior e próximo"
    $anterior = $pc -1;
    $proximo = $pc +1;
    if ($pc>1) {
    $btnAnterior = $anterior;
    }

    if ($pc<$tp) {
    $btnProximo =  $proximo;
    }

?>









