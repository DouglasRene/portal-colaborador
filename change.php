<?php 
require("./scripts/conecta.php");
$login= $_POST['login'];
$senha = $_POST['senha'];
$senhaNew = $_POST['senha2'];
$confsenha = $_POST['senha3'];
$encryptasenha = md5($senhaNew);
$encyptasenahantiga = md5($senha); // isso para confirmanualmente

$result =mysqli_query($conexao,"SELECT * FROM `usuarios` WHERE `login` = $login") or die("Sem conexão com o servidor");

	
if (($linha = mysqli_fetch_array($result))){ 	
    $senhadobanco =$linha["senha"]; 

}

if (empty($senhaNew) && ($confsenha) == ""){
    echo "<script>
        alert('Insira a nova senha!');
        window.location='changepwd.php';
     </script>"; 
}else{
if ($encyptasenahantiga<>$senhadobanco){
    echo "<script>
        alert('Senha Atual Não Confere!');
        window.location='changepwd.php';
     </script>"; 
	}else{
    if ($senhaNew<>$confsenha){
        echo "<script>
        alert('Campos da nova senha não conferem!');
        window.location='changepwd.php';
     </script>"; 
        }else{	
            $update = mysqli_query($conexao,"UPDATE `usuarios` SET senha='$encryptasenha' WHERE `login`=$login" );
            if ($update){
                echo "<script>
                        alert('Senha alterada com sucesso!');
                        window.location='login.php';
                    </script>";  
                    exit; 
            }
            else {
                echo "<script>
                        alert('Ocorreu um erro para alterar a senha, tente novamente!');
                        window.location='login.php';
                </script>";
            }
        }
    }
}

?>
