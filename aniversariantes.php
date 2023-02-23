<?php
session_start();
?>
<?php
require("./scripts/aniversariantes.php");
$aniversario = new retornaAniversario();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  //Verificador de sessão 
  require __DIR__ . "/check.php";

  //Inicia o layout da pagina
  require __DIR__ . "/template/theme.php";
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  ?>

  <style>
    .ani1 {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .ani {
      display: flex;
      width: 40%;
      height: 100px;
      padding: 10px;
      justify-content: center;
      text-align: center;
      align-items: center;
      border-radius: 50px 0px;
      box-shadow: red 0px -2px 3px 2px ;
    }
    
    @media screen and (max-width: 700px) { 
      .ani {
      display: flex;
      width: 85%;
      height: 100px;
      padding: 10px;
      justify-content: center;
      text-align: center;
      align-items: center;
      border-radius: 50px 0px;
      box-shadow: red 0px -2px 3px 2px ;
    }
    }
  </style>
</head>

<body>
  <section class="home-section aniversario">
    <h2 class="mt-3 px-2">Desejamos a todos um feliz Aniversário,</h2>
    <h2 class="px-2">agradecemos pela sua dedicação!!</h2>
    <h3 class="px-2" style="color: red;">Aniversariantes do mês de <?php echo ucfirst(strftime('%B/%Y')); ?></h3>
    <div class="ani1">
      <?php
      require("./scripts/conecta.php");
      $mes = date('m');
      $result = "SELECT registro, nome, mes, dia FROM aniversariantes WHERE mes = {$mes} ORDER BY dia ASC";
      $con5 = $conexao->query($result) or die($conexao->error);
      while ($row = mysqli_fetch_array($con5)) {
          echo '<div class="m-3 ani"><b>' . $row["nome"] . ', &nbsp; dia &nbsp;  <span style="color: red;">' . $row['dia'] . '</span></b></div>';
      }
      ?>
    </div>
  </section>

</body>

</html>