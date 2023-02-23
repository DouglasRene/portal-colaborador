<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
	<title>Portal Colaborador</title>
	<link rel="icon" href="imagens/logop.png">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="top_login">
	<a href="./index.php"><button type="button" class="btn btn-dark">Voltar</button></a>
	<div id="logon" class="bradius">
		<div class="message"></div>
		<div>
		</div>
		<div class="acomodar">
			<form action="change.php" method="post">
				<label for="login">Login </label><input id="login" type="text" class="txt bradius" name="login" value="<?php echo $_SESSION["userid"]; ?>" placeholder="Matricula" readonly />
				<label for="senha">Senha Atual </label><input type="password" class="txt bradius" name="senha" placeholder="Senha Atual" />
				<label for="senha">Nova Senha </label><input type="password" class="txt bradius" name="senha2" placeholder="Nova Senha" />
				<label for="senha">Confirmar Senha </label><input type="password" class="txt bradius" name="senha3" placeholder="Confirmar Nova Senha" />
				<input type="submit" class="btn btn-dark" value="Confirmar" id="entrar" name="entrar">
			</form>
		</div>
		<!--Fim Acomodar-->
	</div>
	<!--Fim login-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>