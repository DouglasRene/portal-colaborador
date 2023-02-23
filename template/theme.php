<?php
session_start();
require("./scripts/conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Portal Colaborador</title>
  <link rel="icon" href="imagens/logop.png">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <meta charset="UTF-8">
  <!-- Boxicons CDN Link https://boxicons.com-->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
  <div class="sidebar open" style="overflow: auto; ">
    <div class="logo-details">
      <img src="logo_horizontal.fw_.png" alt="Logo Candido Ferreira" class="logo-candido">

      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='bx bx-search'></i>
        <input type="text" placeholder="Pesquisa">
        <span class="tooltip">Pesquisa</span>
      </li>
      <li>
        <a href="index.php">
          <i class='bx bx-basket'></i>
          <span class="links_name">Cesta</span>
        </a>
        <span class="tooltip">Cesta</span>
      </li>
      <li>
        <a href="vagas.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Vagas</span>
        </a>
        <span class="tooltip">Vagas</span>
      </li>
      <li>
        <a href="noticias.php">
          <i class='bx bx-news'></i>
          <span class="links_name">Noticias</span>
        </a>
        <span class="tooltip">Noticias</span>
      </li>
      <li>
        <a href="aniversariantes.php">
          <i class='bx bxs-party'></i>
          <span class="links_name">Aniversários</span>
        </a>
        <span class="tooltip">Aniversários</span>
      </li>
      <?php
      $usuario = $_SESSION['usuario'];
      if ($usuario == "adm1" || $usuario == "adm") { ?>
        <li>
          <a href="premio.php">
            <i class="bx bxs-award"></i>
            <span class="links_name">Cadastro</span>
          </a>
          <span class="tooltip">Cadastro</span>
        </li>
      <?php } ?>

      <li class="profile">
        <div class="profile-details">
          <div class="name_job">
            <div class="name">TI Candido Ferreira</div>
            <div class="job">Web designer</div>
          </div>
        </div>
        <i class='bx bx-log-out' id="log_out" onclick="location.href = 'sair.php'"></i>
      </li>
    </ul>
  </div>
  <section>
    <div>
      <form class="form-inline w-100 navbar-custom">
        <input name="mudar" type="button" class="btn-portal btn-custom" onclick="location.href = 'changepwd.php'" value="Mudar Senha" />
        <input name="sair" type="button" class="btn-portal btn-custom" onclick="location.href = 'sair.php'" value="Sair" />
      </form>
    </div>
  </section>
  <div class="modal fade" id="resetSenha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Resetar senha</h5>
        </div>
        <div class="modal-body">
        <h5 class="modal-title mb-4" id="exampleModalLabel">Registro</h5>
          <input type="number" class="resetSenha">
        </div>
        <div class="modal-footer d-flex flex-col bd-highlight">
          <div class="msg"></div>
          <div>
            <button type="button" class="btn btn-success w-100" id="reset">Resetar</button>
          </div>
          <div>
            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>