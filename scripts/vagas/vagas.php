<?php
require("../conecta.php");
if (isset($_POST['vga']) and !empty($_POST['vga'])) { 
    $codigo = $_POST['vga'];
    $imagem = $_FILES['userfile']['tmp_name'];
    $tamanho = $_FILES['userfile']['size'];

    $comando2 = "SELECT * FROM `vagas` WHERE `imagens` = 'id{$codigo}'";
    $verifica = mysqli_query($conexao, $comando2);
    $dado = @mysqli_fetch_array($verifica);
    $img = $dado['status'];
    if($img == 'adicionado') { 
        echo "<script>alert('Vaga{$codigo} já adicionada');</script>"; 
    }else{
        if ( $imagem != "none" ) {
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);

            $queryInsercao = "INSERT INTO tabela_imagens (codigo, imagem) VALUES ('$codigo','$conteudo')";
            mysqli_query($conexao, $queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.<br>".$conexao->error);

            $comando = "UPDATE `vagas` SET `status`='adicionado' WHERE `imagens` = 'id{$codigo}'";
            mysqli_query($conexao, $comando); 
        }
    }
    $page = $_SERVER['PHP_SELF']; 
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
           window.location='{$_SERVER['HTTP_REFERER']}';
          </script>";

}
elseif (isset($_POST['vga1']) and !empty($_POST['vga1'])) {
    $novo_nome = $_POST['vga1'];
    $comando = "UPDATE `vagas` SET `status`='excluido' WHERE `imagens` = 'id{$novo_nome}'";
    $comando1 = "DELETE FROM `tabela_imagens` WHERE `codigo` = '{$novo_nome}'";
    mysqli_query($conexao, $comando);
    mysqli_query($conexao, $comando1);
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
else {
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
            window.location='{$_SERVER['HTTP_REFERER']}';
          </script>";
}
?>

