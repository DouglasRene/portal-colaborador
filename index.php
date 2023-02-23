<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  //Verificador de sessão 
  require __DIR__ . "/check.php"; 

  //Inicia o layout da pagina
  require __DIR__ . "/template/theme.php";
  require("./scripts/noticias/consultaIndex.php");
  require("./scripts/obterConteudo.php");
  $texto = new retornaTexto();
  require("./scripts/aniversariantes.php");
  $aniversario = new retornaAniversario();
  ?>
  <link rel="stylesheet" href="/css/magnific-popup.css">
</head>
<style>
  .Natal {
    background-image: url("imagens/natal.gif");
    background-repeat: no-repeat;
  }
</style>

<body>
  <section class="home-section">
    <div class="text w-100">
      <?php $aniversario->parabens($_SESSION['userid']); ?>
      <div class="container1">
        <?php
        // Imprime mensagem de boas vindas 
        $usuario = $_SESSION['usuario'];
        $logado = $_SESSION["nome"];
        $premium = $_SESSION["premio"];
        echo "</br><h2>Bem vindo(a), {$logado}!</h2>";
        ?>
        <!-- <a href="boxNatal.php" class="btn btn-lg btn-info Natal" target="_blank">Cesta de Natal</a> -->
        <!-- <a href="box.php" class="btn btn-lg btn-info" target="_blank">Cesta Básica</a> -->
        <?php
        while ($dado1 = $con1->fetch_array()) {
          if (!in_array(date('d/m/Y'), diasDatas($dado1['inicio'], $dado1['fim']))) {
            if(date('d/m/Y') === dataFinal($dado1['fim'])) {
              setaN();
            }
            echo "<a href=\"indcesta.php\" class=\"btn btn-lg btn-info\" target=\"_blank\">Cesta Básica</a>";
            echo "<a href=\"indpremium.php\" class=\"btn btn-lg btn-info\" target=\"_blank\">Cesta Prêmio</a>";
          } elseif ($_SESSION["premio"] == "N") {
            echo "<a href=\"box.php\" class=\"btn btn-lg btn-info\" target=\"_blank\">Cesta Básica</a>";
            echo "<a href=\"notboxpremium.php\" class=\"btn btn-lg btn-info\" target=\"_blank\">Cesta Prêmio</a>";
          } else {
            echo "<a href=\"box.php\" class=\"btn btn-lg btn-info\" target=\"_blank\">Cesta Básica</a>";
            echo "<a href=\"boxpremium.php\" class=\"btn btn-lg btn-info \" target=\"_blank\">Cesta Prêmio</a>";
          }
        }
        ?>
        <div class="d-flex justify-content-center mt-5" id="visivel1">
          <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
            <a href="./scripts/noticias/imagemNoticia.php?id=1">
              <img src="./scripts/noticias/imagemNoticia.php?id=1" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <p class="card-text" id="conteudoP1" style="word-break: break-word;"><?php $texto->obterTexto(1); ?></p>
              <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                <button type="button" id="conteudoT" value="1" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 150px;">
                  Editar noticía
                </button>
              <?php } ?>
            </div>
          </div>
        </div>
        <a href="./noticias.php" class="btn btn-primary mb-4" style="color: #FFF;">Veja Mais</a>
      </div>
    </div>
  </section>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar texto</h5>
        </div>
        <div class="modal-body">
          <textarea rows="5" style="width: 100%;" maxlength="1000" id="texto"></textarea>
        </div>
        <div class="modal-footer d-flex flex-col bd-highlight">
          <!-- Form -->
          <form method='post' class="ml-0 w-100" action='' enctype="multipart/form-data">
            <input type='file' name='file' id='file' class='form-control'><br>
          </form>
          <div>
            <button type="button" class="btn btn-success w-100" id="conteudo">Savar</button>
          </div>
          <div>
            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="/css/jquery.magnific-popup.js"></script>
  <script src="./scripts/noticias/noticia.js"></script>
  <script>
    $('.rounded').magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'image'
      // other options 
    });
  </script>
</body>

</html>