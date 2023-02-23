<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha =$_POST['senha'];

require("./scripts/conecta.php");

// Recupera o login 
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 
 
// Usuário não forneceu a senha ou o login 
if(!$login || !$senha) 
{ 
    echo "<script>
        alert('Você deve digitar sua senha e login!');
        window.location='login.php';
    </script>";
    exit; 
}

/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/
// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($conexao,"SELECT * FROM `usuarios` WHERE `login` = $login");

if(@mysqli_num_rows($result)) 
{ 
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = @mysqli_fetch_array($result); 
 
    // Agora verifica a senha 
    if(!strcmp($senha, $dados["senha"])) 
    { 
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
        $_SESSION["userid"]= $dados["userid"];
        $_SESSION["login"]= $dados["login"];  
        $_SESSION["nome"] = stripslashes($dados["nome"]); 
        $_SESSION["premio"]= $dados["premio"]; 
        $_SESSION["usuario"] = $dados["usuario"];
        header("Location: index.php"); 
        exit; 
    } 
    // Senha inválida 
    else{ 
     echo "<script>
        alert('Senha inválida!');
        window.location='login.php';
     </script>"; 
    exit; 
    } 
} 
    // Login inválido 
else
{ 
    echo "<script>
        alert('O login fornecido por você é inexistente!');
        window.location='login.php';
     </script>"; 
    exit; 
} 
?>
