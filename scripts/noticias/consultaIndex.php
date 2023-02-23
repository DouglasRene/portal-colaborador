<?php

    require("./scripts/conecta.php");
    $result1 = "SELECT * FROM `dataCesta` ";
    $con1 = $conexao->query($result1) or die($conexao->error);
    
    $dataAtual = date('d/m/Y');
    $separaDataAtual = explode('/', $dataAtual);
    $mesDataAtual = $separaDataAtual[1];

    function diasDatas($data_inicial, $data_final) {
        $separaDataInicio = explode('/', $data_inicial);
        $separaDataFinal = explode('/', $data_final);
        $dataInicio = $separaDataInicio[2].'-'.$separaDataInicio[1].'-'.$separaDataInicio[0];
        $dataFinal = $separaDataFinal[2].'-'.$separaDataFinal[1].'-'.$separaDataFinal[0];
        $diferenca = strtotime($dataFinal) - strtotime($dataInicio);
        $dias = floor($diferenca / (60 * 60 * 24)); 
        $dataArray = [];
        $separaData = str_replace('/', '-', $data_inicial);
        for($i=0;$i<=$dias;$i++) {
            $dataArray[$i] =  date('d/m/Y', strtotime('+'.$i.'days', strtotime($separaData)));
        }
        return $dataArray;
    }

    function dataFinal($data_final) {
        $separaData = str_replace('/', '-', $data_final);
        $dataFinal =  date('d/m/Y', strtotime('+ 1 days', strtotime($separaData)));
        return $dataFinal;
    }

    function mesDataFimFormatado($data) {
        $separaDataFim = str_replace('/', '-', $data); 
        $data = date('d/m/Y', strtotime('+1 days', strtotime($separaDataFim)));
        return $data;
    }

    function mesDataInicioFormatado($data) {
        $separaDataFim = str_replace('/', '-', $data); 
        $data = date('d/m/Y', strtotime('+1 days', strtotime($separaDataFim)));
        return $data;
    }

    function mesDataFim($data) {
        $separaDataFim = explode('/', $data); 
        $dataFim = $separaDataFim[1];
        return $dataFim;
    }
    
    function remove(){
        require("./scripts/conecta.php");
        $noticia = "SELECT `visivel` FROM `conteudo` WHERE `status` = 'nao'";
        $conNoticia = $conexao->query($noticia) or die($conexao->error);
        while ($dadoNoticia = $conNoticia->fetch_array()) {
            $qtdNoticia[] = $dadoNoticia["visivel"];
        }
        $qtd = count($qtdNoticia);
        for ($i = 0; $i < $qtd; $i++) {
            echo ("<script type='text/javascript'>$('#" . $qtdNoticia[$i] . "').remove() </script>");
        }
    }

    function setaN(){
        require("./scripts/conecta.php");
        $comando = "UPDATE `usuarios` SET `premio`= 'N' WHERE `premio` = 'S'";
        mysqli_query($conexao, $comando);
    }

?> 