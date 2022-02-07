<main>
<?php 
	$mensagem = '';
			if (isset($_GET['status'])) {
				switch ($_GET['status']) {
					case 'success':
						$mensagem= '<div class="alert alert-success">Ação executada com sucesso!</div>';
						break;
					
					case 'error':
						$mensagem= '<div class="alert alert-danger">Ação não executada!</div>';
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
			
			<div class="card mb-3 mt-3">
			  <img src="<?= $noticias->imagem ;?>" class="card-img-top">
			  <div class="card-body text-dark">
			    <h5 class="card-title">
			    	<?= $noticias->id ;?> - <?= $noticias->titulo ;?>
			    </h5>
			    <p class="card-text"><?= $noticias->descricao ;?></p>
			    <p class="card-text"><small class="text-muted"><?= date('d/m/Y à\s H:i:s',strtotime($noticias->data)) ;?></small></p>
			  </div>
			  <div class="card-body text-dark">
			  	<a href="editar.php?id='<?= $noticias->id ;?>'">
			  		<button type="button" class="btn btn-primary">Editar</button>
			  	</a>
			  	<a href="excluir.php?id='<?= $noticias->id ;?>'">
			  		<button type="button" class="btn btn-danger">Excluir</button>
			  	</a>
			  </div>
			</div>
		<?php 
			endforeach;
			
 		?>	
	</section>
</main>