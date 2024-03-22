<main>
	
	<section>
		<a href="index.php" class="btn corSite text-light mt-3"><i class="bi bi-arrow-left"></i></a>
	
		<h2 class="mt-3"><?=TITLE;?></h2>

		<div class="card">
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label>Imagem da notícia</label>
						<input type="file" class="form-control" id="imagem" name="imagem" value="<?= $noticia->imagem;?>" required>
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
							<div class="form-check">
							<input class="form-check-input" type="radio" name="ativo" id="ativo" value="s" checked>
							<label class="form-check-label" for="ativo">
								Ativo
							</label>
							</div>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="ativo" id="inativo" value="n" <?= $noticia->ativo == 'n' ? 'checked' : ''?>>
							<label class="form-check-label" for="ativo">
								Inativo
							</label>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn corSite mt-3">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>