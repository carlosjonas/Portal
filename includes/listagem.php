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
 
	<section>
		<?= $mensagem; ?>
		<a href="cadastrar.php">
			<button class="btn btn-success">Nova Notícia</button>
		</a>
	</section>

	<section>
		<?php 
			$resultados = '';
			$resultados = strlen($resultados) ? $resultados : '<p>Nenhuma Nótícia publicada!</p>';
			foreach ($noticia as $noticias):
		?>	

			<div class="card mb-3 mt-4" style="width: 100%;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="<?= $noticias->imagem ;?>" id="imagem" class="img-fluid rounded-start" alt="">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body text-dark" id="info_noticia">
			        <h5 class="card-title"><?= $noticias->id ;?> - <?= $noticias->titulo ;?></h5>
			        <p class="card-text"><?= $noticias->descricao ;?></p>
			        <p class="card-text"><small class="text-muted"><?= date('d/m/Y à\s H:i:s',strtotime($noticias->data)) ;?></small></p>
			      </div>
			      <div class="card-body">
			      	<a href="editar.php?id='<?= $noticias->id ;?>'">
			  			<button type="button" class="btn btn-primary">Editar</button>
				  	</a>
				  	<a href="excluir.php?id='<?= $noticias->id ;?>'">
				  		<button type="button" class="btn btn-danger">Excluir</button>
				  	</a>
			      </div>
			    </div>
			  </div>
			</div>
		<?php 
			endforeach;
			
 		?>	
	</section>

</main>