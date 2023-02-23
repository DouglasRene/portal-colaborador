    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="imagens/logop.png">
        <!-- <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"/> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Cesta Básica Prêmio</title>
        <?php

        //Verificador de sessão
        require __DIR__ . "/check.php";

        // Imprime mensagem de boas vindas 
        $logado = $_SESSION['nome'];
        $registration = $_SESSION['login'];

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
            <div class="container card-header text-center card mb-3">
                <table class="borda">
                    <tr>
                        <th><img style="float: left;" src="imagens/logo.jpg" width="75px" height="50px" /><br><br><br>SERVICO DE SAUDE DR CANDIDO FERREIRA</th>
                        <th>REF: <?php echo ucfirst(strftime('%B/%Y')); ?></th>
                    </tr>
                    <tr>
                        <td colspan="2">P R Ê M I O &nbsp; A S S I D U I D A D E</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Olá! <?php echo "{$logado}"; ?></b><br><br>
                            <b>Neste mês não foram preenchidos os requisitos para o recebimento do prêmio assiduidade.<b><br><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    </html>
    <?php
    //ob_start();
    require __DIR__ . "/generatePdf.php";
    $dompdf->load_html(ob_get_clean());

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("file.pdf", ["Attachment" => false]);

    ?>