<!DOCTYPE html>
<html lang="pt-b">

<head>
	<title>Portal Colaborador</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
	<title>Portal Colaborador</title>
	<link rel="icon" href="imagens/logop.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/cssLogin.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter"> 
		<div class="container-login100">
			<div class="wrap-login100" style="width: 30rem; background-color: #F4F5F8;">
				<form class="login100-form validate-form" action="connection.php" method="post">
					<center><img src="../imagens/logo.jpg" width="200" height="170" /></center>

					<div class="row d-flex justify-content-center mt-2">
						<b><label for="Login" class="form-label">Login</label></b>
					</div>
					<div class="wrap-input100 validate-input ">
						<input class="input100" type="text" name="login" placeholder="Matricula">
					</div>

					<div class="row d-flex justify-content-center">
						<b><label for="Password" class="form-label">Password</label></b>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="senha" placeholder="senha">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
