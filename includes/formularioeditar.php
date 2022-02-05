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
			<input type="file" class="form-control" name="imagem">
		</div>

		<div class="form-group">
			<label>Título</label>
			<input type="text" class="form-control" name="titulo" value="<?= $noticia->titulo;?>">
		</div>

		<div class="form-group">
			<label>Descrição</label>
			<textarea class="form-control" name="descricao" rows="5"><?= $noticia->descricao;?></textarea>
		</div>

		<div class="form-group">
			<label>Status</label>
			<div>
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="ativo" value="s" checked> Ativo
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="inativo" value="n" <?= $noticia->ativo == 'n' ? 'checked' : ''?>> Inativo
					</label>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
	</form>
</main>