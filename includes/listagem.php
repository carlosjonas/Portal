<main>

<?php 
	// Verificando o status da url para mandar a mensagem de sucesso
	$mensagem = '';
	
		if (isset($_GET['status'])) {
			switch ($_GET['status']) {
				case 'success':
					$mensagem= '<div class="alert alert-success text-center" id="alert">Ação executada com sucesso!
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
					break;
				case 'error':
					$mensagem= '<div class="alert alert-danger text-center">Ação não executada!<
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
								/div>';
					break;
			}
		}
 ?>	
 
	<section class="mt-3">
		<?= $mensagem; ?>
		<?php if($tipo != "l"){ ?>
			<a href="cadastrar.php">
				<button class="btn corSite text-light" title="Nova Notícia"><i class="bi bi-plus-lg"></i></button>
			</a>
		<?php } ?>
	</section>

	<section>
		<div class="row justify-content-evenly">
			<?php 
				$resultados = '';
				$resultados = strlen($resultados) ? $resultados : '<p>Nenhuma Nótícia publicada!</p>';
				foreach ($noticia as $noticias):
					if($noticias->ativo != "n"){
			?>	
			
			<div class="card mt-4 col-5" style="max-width: 540px;">
				<a class="linkCardNoticia" href="visualizadorDeNoticias.php?id='<?= $noticias->id ;?>'">
					<div class="row">
						<div class="col-md-4 p-0">
							<img src="<?= $noticias->imagem ;?>" id="imagem" class="img-fluid rounded-start" alt="imagem da notícia">
						</div>
						<div class="col-md-8">
							<div class="card-body text-dark" id="info_noticia">
								<h5 class="card-title row" style="min-height:80px"><?= $noticias->titulo ;?></h5>
								<p class="card-text row"><small class="text-muted p-0"><?= date('d/m/Y',strtotime($noticias->data)) ;?></small></p>
								<?php if(isset($tipo)){ 
										if($tipo != "l"){
								?>
									<a href="editar.php?id='<?= $noticias->id ;?>'">
										<button type="button" class="btn btn-primary">Editar</button>
									</a>
									<a href="excluir.php?id='<?= $noticias->id ;?>'">
										<button type="button" class="btn btn-danger">Excluir</button>
									</a>
								<?php }
										} 
								?>
							</div>
						</div>
					</div>
			  	</a>
			</div>
			
			<?php 
					}
				endforeach;
				
			?>	
		</div>
	</section>

</main>