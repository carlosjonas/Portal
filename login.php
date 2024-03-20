<?php
	include_once 'includes/header.php';
?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<?php 
					// Verificando o status da url para mandar a mensagem de sucesso
					$mensagem = '';
							if (isset($_GET['status'])) {
								switch ($_GET['status']) {
									case 'success':
										$mensagem= '<div class="alert alert-success text-center justify-content-center">
														Usuário cadastrado com sucesso!
														<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>';
										break;
									case 'error':
										$mensagem= '<div class="alert alert-danger text-center">Erro ao cadastrar!
														<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">
													</div>';
										break;
								}
							}

					echo $mensagem;
				?>	
			</div>
		</div>
    </div>
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

	<script>
		window.onload = function () {
			modal = document.querySelector(".alert")
			if(modal){
				setTimeout(function() {
				  modal.style.display = 'none';
				}, 2000);
			}
		}
	</script>

<?php
	include_once 'includes/footer.php';
?>