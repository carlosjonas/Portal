<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Bootstrap CSS and ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styleLogin.css">

    <title>Login</title>

</head>

<body class="bg-dark text-light">
    
        <div class="justify-content-center" style="margin-top: 150px;">
            
            <form name="formindex2" class="form-signin" role="form" method="post" action="acesso.php">
                <div class="row justify-content-center text-center mb-3">
					<div class="col-6 "> 
                        <h2>Portal de Notícias</h2>
                    </div>
			    </div>
				<div class="row">
					<div class="col-6 verticalLine align-self-end">
						<div>
							<img class="img-responsive" src="assets/img/logo.png" alt="logotipo.png" title="logotipo.png"/>
						</div>
					</div>
					<div class="col-3 colunaInput">
						<br>
						<div class="divInputs">
							<input id='email' name='email' type="text" class="form-control" placeholder="Email" required>		
						</div>
						<div class="divInputs">
							<input id='senha' name='senha' type="password" maxlength="8" class="form-control" placeholder="Senha" required>
						</div>
						<div class="col-xs-12 text-left divBtnSuccess">
							<button class="btn btn-primary btnSuccess" type="submit">Entrar</button>
						</div>
                        <div class="col-xs-12 text-left divBtnSuccess">
							<a class="btn btn-primary btnSuccess" href="cadastrarUsuarios.php">Cadastre-se</a>
						</div>
					</div>
				</div>
                    
            </form>
        </div>
	</body>

</html>