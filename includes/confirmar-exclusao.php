<main>
	
	<h2 class="mt-3">Excluir Vaga</h2>

	<form method="POST" enctype="multipart/form-data">
		
		<div class="form-group">
			<p>Você deseja excluir a notícia <strong><?= $noticia->titulo ;?></strong>?</p>
		</div>

		<div class="form-group">
			<a href="index.php">
				<button type="button" class="btn btn-success">Cancelar</button>
			</a>
			<button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
		</div>
	</form>
</main>