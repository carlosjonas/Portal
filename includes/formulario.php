<main>
	
	<section>
		<a href="index.php">
			<button class="btn btn-success">Voltar</button>
		</a>
	</section>

	<h2 class="mt-3"><?=TITLE;?></h2>

	<form method="POST" enctype="multipart/form-data">
		
		<div class="form-group">
			<label>Imagem da notícia</label>
			<input type="file" class="form-control" id="imagem" name="imagem" required>
		</div>

		<div class="form-group">
			<label>Título</label>
			<input type="text" class="form-control" name="titulo" required>
		</div>

		<div class="form-group">
			<label>Descrição</label>
			<textarea class="form-control" name="descricao" rows="5" required></textarea>
		</div>

		<div class="form-group">
			<label>Status</label>
			<div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="ativo" id="ativo" value="s">
				  <label class="form-check-label" for="ativo">
				    Ativo
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="inativo" id="inativo" value="n">
				  <label class="form-check-label" for="inativo">
				    Inativo
				  </label>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
	</form>
</main>