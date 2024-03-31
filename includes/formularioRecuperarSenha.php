<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<main>
	
	<section class="mt-3">
		<a title="Voltar" <?php if(isset($tipo) && $tipo !='l'){ echo 'href="usuarios.php"'; }else if(isset($tipo) && $tipo =='l'){ echo 'href="index.php"';}else{echo 'href="login.php"';} ?> class="btn corSite text-light"><i class="bi bi-arrow-left"></i></a>
	</section>

	<div class="card mt-3">
		<div class="card-body">
			<h2 class="mt-3 text-center"><?=TITLE;?></h2>

			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label for="email">Email *</label>
					<input type="email" class="form-control" name="email" value="<?= $usuario->email;?>" required>
				</div>

				<div class="form-group mt-3">
					<div class="form-group">
						<button type="submit" title="Enviar" class="btn corSite"><i class="bi bi-envelope"></i></button>
					</div>
				</div>
			</form>
				
		</div>
	</div>

</main>
