<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    //Inicia o layout da pagina
    require __DIR__ . "/template/theme.php";
    ?>
    <script src='jquery.js'></script>
    <link rel="stylesheet" href="/css/magnific-popup.css">
</head>

<body>
    <section class="home-section">
        <div class="text w-100">
            <div class="container w-100">
                <div class="parent-container img w-100">
                    <h3>Processos seletivos internos</h3>
                    <a class="id1" href="./scripts/vagas/imagens.php?id=1">
                        <img src="./scripts/vagas/imagens.php?id=1">
                    </a>
                    <a class="id2" href="./scripts/vagas/imagens.php?id=2">
                        <img src="./scripts/vagas/imagens.php?id=2">
                    </a>
                    <a class="id3" href="./scripts/vagas/imagens.php?id=3">
                        <img src="./scripts/vagas/imagens.php?id=3">
                    </a>
                    <a class="id4" href="./scripts/vagas/imagens.php?id=4">
                        <img src="./scripts/vagas/imagens.php?id=4">
                    </a>
                    <a class="id5" href="./scripts/vagas/imagens.php?id=5">
                        <img src="./scripts/vagas/imagens.php?id=5">
                    </a>
                    <a class="id6" href="./scripts/vagas/imagens.php?id=6">
                        <img src="./scripts/vagas/imagens.php?id=6">
                    </a>
                </div>
                <?php
                $usuario = $_SESSION['usuario'];
                if ($usuario == "adm1" || $usuario == "adm") { ?>
                    <form action="scripts/vagas/vagas.php" method="POST" enctype="multipart/form-data">
                            
                            <label for="vagas">Vaga:</label>
                            <select name="vga">
                                <option selected></option>
                                <option value="1">vaga 1</option>
                                <option value="2">vaga 2</option>
                                <option value="3">vaga 3</option>
                                <option value="4">vaga 4</option>
                                <option value="5">vaga 5</option>
                                <option value="6">vaga 6</option> 
                            </select>
                            <input style="display:none" type="file" name="userfile" id="arquivo"/>
                            <button onclick="escolherArquivo()" type="button" class="btn btn-primary mb-4">Selecionar vaga</button>
                            <br>
                            <button type="submit" name="cadastrar" class="btn btn-success btn-sm mt-1 mb-3">Cadastrar</button>
                            <br>
                            </form>
                            <form action="scripts/vagas/vagas.php" method="POST">
                            <label for="vagas">Excluir vaga:</label>
                            <select name="vga1">
                                <option selected></option>
                                <option value="1">vaga 1</option>
                                <option value="2">vaga 2</option>
                                <option value="3">vaga 3</option>
                                <option value="4">vaga 4</option>
                                <option value="5">vaga 5</option>
                                <option value="6">vaga 6</option>
                            </select>
                            
                            <button type="submit" class="btn btn-danger btn-sm mb-2 mt-2">Excluir</button>
                            </form>'
                            <?php }?>
            </div>
        </div>  
    </section>
    <script src="/css/jquery.magnific-popup.js"></script>
</body>

<script type="text/javascript">
    $('.parent-container').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
        // other options 
    });

    function escolherArquivo() {
        // vamos obter uma referência ao elemento file
        var arquivo = document.getElementById("arquivo");
        // vamos disparar seu evento onclick()
        arquivo.click();
    }
</script>
<?php
require("./scripts/conecta.php");

$result1 = "SELECT `imagens` FROM `vagas` WHERE `status` = 'excluido'";
$con = $conexao->query($result1) or die($conexao->error);
while ($dado = $con->fetch_array()) {
    $imagens[] = $dado["imagens"];
}
$qtd = count($imagens);
for ($i = 0; $i < $qtd; $i++) {
    echo ("<script type='text/javascript'>$('." . $imagens[$i] . "').remove() </script>");
}
?>

</html>