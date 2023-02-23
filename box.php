<?php
require("./scripts/conecta.php");
$result1 = "SELECT * FROM `dataCesta` ";

$con = $conexao->query($result1) or die($conexao->error);
?> 
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="imagens/logop.png">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Cesta Básica</title>
        <?php

        //Verificador de sessão
        require __DIR__."/check.php";
        
        // Imprime mensagem de boas vindas 
        $logado= $_SESSION['nome'];
        $registration= $_SESSION['login'];  

        //Seta a localidade e coloca a data em português
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        ?>
        <style>
            .borda {
                border: solid black;
            }
        </style>
    </head>
    <body>
        <div class="col-lg-12">
            <div>
                <table class="borda">
                    <tr>
                        <th><img  style="float: left;" src="imagens/logo.jpg" width="75px" height="50px" /></th>
                        <th><span style="float: right;"> REF: <?php echo ucfirst(strftime('%B/%Y'));?></span></th>
                    </tr>
                    <tr><td colspan="2">SERVICO DE SAUDE DR CANDIDO FERREIRA</td></tr>
                    <tr>
                        <td colspan="2">C E S T A &nbsp; B Á S I C A</td>
                    </tr>
                    <tr>
                        <td colspan="2">Nome: <?php echo "{$logado}";?></td>
                    </tr>
                    <tr><?php while ($dado = $con->fetch_array()) { ?>
                        <td colspan="2">Período de retirada da cesta básica é de <?php echo $dado['inicio']; ?> a <?php echo $dado['fim']; ?><br>      
                        Local de Retirada: Rua Maria Soares, 225 - Vila Industrial-Campinas -SP.<br>     
                     <b>Para a retirada da cesta básica será obrigatório a apresentação deste vale e documento com foto.</b></td><?php } ?>
                    </tr>
                    <tr>
                        <td colspan="2"><b>HORÁRIO DE RETIRADA<b></td>
                    </tr>
                    <tr>
                        <td colspan="2">SEGUNDA A SEXTA-FEIRA   -  08:00 AS 18:00 HORAS<br>
                                        SÁBADO DAS 08h00 ÁS 12h00 <br>
                            <b>Telefones para entregas:</b> (19) 3365-1577 / (19) 3365-1477<br>                                      
                    </tr>
                    <tr>
                        <td colspan="2"> A cesta básica não será entregue fora do prazo determinado acima.<br> </td>
                    </tr>
                    <tr style="width: 100%;">
                    <td colspan="2" style="width: 100%;"><center><img src="imagens/assinatura.jpg" width="300px" height="200px"/></center></td>
                    </tr>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
//    ob_start();
    require __DIR__."/generatePdf.php";
    $dompdf->loadHtml(ob_get_clean());

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("file.pdf",array("Attachment"=>false));

?>
