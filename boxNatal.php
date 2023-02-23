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
        <!-- <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"/> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Cesta de Natal</title>
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
       
        </style>
    </head>
    <body>
        <div class="col-lg-12">
            <div>
                <table>
                    <tr>
                        <th><img  src="imagens/logo.jpg"  width="75px" height="50px"/> SERVICO DE SAUDE DR CANDIDO FERREIRA</th>
                        <th>REF: <?php echo ucfirst(strftime('%B/%Y'));?></th>
                    </tr>
                    <tr>
                        <td colspan="2">C E S T A &nbsp; D E &nbsp; N A T A L</td>
                    </tr>
                    <tr>
                        <td colspan="2">Nome: <?php echo "{$logado}";?></td>
                    </tr>
                    <tr><?php while ($dado = $con->fetch_array()) { ?>
                        <td colspan="2">Período de retirada da cesta de natal é de <?php echo $dado['inicio']; ?> a <?php echo $dado['fim']; ?><br>      
                           Local de Retirada: Rua Maria Soares, 225 - Vila Industrial-Campinas -SP.<br>     
                        <b>Para a retirada da cesta de natal será obrigatório a apresentação deste vale e documento com foto.</b></td><?php } ?>
                    </tr>
                    <tr>
                        <td colspan="2"><b>HORÁRIO DE RETIRADA<b></td>
                    </tr>
                    <tr>
                        <td colspan="2">SEGUNDA A SEXTA-FEIRA   -  08:00 AS 18:00 HORAS<br>
                                        SÁBADO DAS 08h00 ÁS 12h00 <br>
                                        Fechado dias 24, 25,31/12/2021 e 01/01/2022 <br>
                            <b>Telefones para entregas:</b> (19) 3365-1577 / (19) 3365-1477<br>                                      
                    </tr>
                    <tr>
                        <td colspan="2"> A cesta de natal não será entregue fora do prazo determinado acima.<br>  </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="ass"><img  src="imagens/assinatura.jpg" width="300px" height="200px"/></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    </html>
<?php
   //ob_start();
    require __DIR__."/generatePdf.php";
    $dompdf->load_html(ob_get_clean());

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("file.pdf",["Attachment"=>false]);

?>
