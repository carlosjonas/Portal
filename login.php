<?php
	include_once 'includes/header.php';
?>

		<div class="container">
			<div class="justify-content-center" style="margin-top: 150px;">
				<form name="formindex2" class="form-signin" role="form" method="post" action="acesso.php">
					
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
								<input id='senha' name='senha' type="password" class="form-control" placeholder="Senha" required>
							</div>

							<p class="text-end mb-2"><a href="recuperarSenha.php">Esqueci a senha!</a></p>

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
		</div>
	</body>

<?php
	include_once 'includes/footer.php';
?>