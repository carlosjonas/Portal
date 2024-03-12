<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<main>
	
	<section>
		<a href="index.php">
			<button class="btn btn-success">Voltar</button>
		</a>
	</section>

	<h2 class="mt-3 text-center"><?=TITLE;?></h2>

    <h6>Os campos com * são obrigatórios</h6>

	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="nome">Nome *</label>
			<input type="text" class="form-control" name="nome" required>
		</div>

		<div class="form-group">
			<label for="email">Email *</label>
			<input type="email" class="form-control" name="email" required>
		</div>

        <div class="form-group">
			<label for="rg">Rg</label>
			<input type="text" class="form-control" name="rg">
		</div>

        <div class="form-group">
			<label for="cpf">Cpf *</label>
			<input type="text" class="form-control" name="cpf" required>
		</div>

        <div class="form-group">
			<label for="senha">Senha *</label>
			<input type="text" class="form-control" name="senha" required>
		</div>

        <div class="form-group">
			<label for="imagem">Imagem do Usuário</label>
			<input type="file" class="form-control" id="imagem" name="imagem">
		</div>

		<div class="form-group mt-3">
			<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
	</form>
</main>

<script>
    $(document).ready(function(){
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.rg').mask('0000000000-0', {reverse: true});
    });
</script>