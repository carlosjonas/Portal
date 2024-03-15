<main>
	
	<section class="mt-3">
		<a href="home.php">
			<button class="btn corSite text-light"><i class="bi bi-arrow-left"></i></button>
		</a>
	</section>

	<h2 class="mt-3"><?=TITLE;?></h2>

	<form method="POST" enctype="multipart/form-data">
		
		<div class="form-group">
			<label>Imagem da notícia</label>
			<input type="file" class="form-control" name="imagem" value="<?= $noticia->imagem;?>" required>
		</div>

		<div class="form-group">
			<label>Título</label>
			<input type="text" class="form-control" name="titulo" value="<?= $noticia->titulo;?>" required>
		</div>

		<div class="form-group">
			<label>Descrição</label>
			<textarea class="form-control" name="descricao" rows="5" required><?= $noticia->descricao;?></textarea>
		</div>

		<div class="form-group">
			<label>Status</label>
			<div>
				<div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="ativo" id="ativo" value="s" checked>
					  <label class="form-check-label" for="ativo">
					    Ativo
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="ativo" id="inativo" value="n" <?= $noticia->ativo == 'n' ? 'checked' : ''?>>
					  <label class="form-check-label" for="inativo">
					    Inativo
					  </label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
	</form>
</main>