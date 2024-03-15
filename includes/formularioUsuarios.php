<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<main>
	
	<section class="mt-3">
		<a title="voltar" href="home.php">
			<button class="btn btn-success"><i class="bi bi-arrow-left"></i></button>
		</a>
	</section>

	<h2 class="mt-3 text-center"><?=TITLE;?></h2>

    <h6>Os campos com * são obrigatórios</h6>

	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="nome">Nome *</label>
			<input type="text" class="form-control" name="nome" value="<?= $usuario->nome;?>" required>
		</div>

		<div class="form-group">
			<label for="email">Email *</label>
			<input type="email" class="form-control" name="email" value="<?= $usuario->email;?>" required>
		</div>

        <div class="form-group">
			<label for="rg">Rg</label>
			<input type="text" class="form-control" name="rg" value="<?= $usuario->rg;?>" id="rg">
		</div>

        <div class="form-group">
			<label for="cpf">Cpf *</label>
			<input type="text" class="form-control" name="cpf" id="cpf" value="<?= $usuario->cpf;?>" required>
		</div>

		<?php if(!isset($usuario->senha)){ ?>
			<div class="form-group">
				<label for="senha">Senha *</label>
				<input type="text" class="form-control" name="senha" value="<?= $usuario->senha;?>" required>
			</div>
		<?php } ?>

        <div class="form-group">
			<label for="imagem">Imagem do Usuário</label>
			<input type="file" class="form-control" id="imagem" value="<?= $usuario->imagem;?>" name="imagem">
		</div>

		<div class="form-group mt-3">
			<div class="form-group">
				<button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i></button>
			</div>
		</div>
	</form>
</main>

<script>
	$(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#rg').mask('0000000000-0');
    });
</script>