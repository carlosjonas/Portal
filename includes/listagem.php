	<main>
		<section class="mt-3">
			<?php if(isset($tipo) && $tipo != "l"){ ?>
				<a href="cadastrar.php" class="btn corSite text-light" title="Nova Notícia"><i class="bi bi-plus-lg"></i></a>
			<?php } ?>
		</section>

		<section>
			<div class="row justify-content-evenly" id="areaNoticias"></div>
			<div id="paginacao" class="mt-3">
		</section>

		<!-- Scripts -->
		<script>

			let pagina = 1;
			let qtd_reg_pagina = 10;
			let tipo = '<?=$_SESSION['tipo'];?>';
			window.onload = function () {
				
				localStorage.setItem("pagina", pagina);
				localStorage.setItem("qtd_reg_pagina", qtd_reg_pagina);
				getNoticias(pagina,qtd_reg_pagina);
			}
        
        
		</script>
		<script src="assets/script/scriptindex.js"></script>

	</main>