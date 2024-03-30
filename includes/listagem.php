	<main>
		<section class="mt-3">
			<?php if(isset($tipo) && $tipo != "l"){ ?>
				<a href="cadastrar.php" class="btn corSite text-light" title="Nova Notícia"><i class="bi bi-plus-lg"></i></a>
			<?php } ?>
		</section>

		<section>
			<div class="row justify-content-evenly">
				<?php 
					$resultados = '';
					$resultados = strlen($resultados) ? $resultados : '<p>Nenhuma Nótícia publicada!</p>';
					foreach($noticia as $noticias){
						
						if($noticias->ativo != "n"){
							
				?>	
				
							<div class ="col-5 mb-3">
								<div class="card" style="max-width: 540px;">
									<div class="card-body p-1">
										<div class="container">
											<div class="row">
												<div class="col-4 p-0">
													<a class="linkCardNoticia" href="visualizadorDeNoticias.php?id=<?= $noticias->id ?>">
														<img src="<?= $noticias->imagem ?>" id="imagem" class="img-fluid rounded-start imgNoticia" alt="imagem da notícia">
													</a>
												</div>
												<div class="col-8 text-dark" id="info_noticia">
													<a class="linkCardNoticia" href="visualizadorDeNoticias.php?id=<?= $noticias->id ?>">
														<h5 class="card-title" style="min-height:80px"><?= $noticias->titulo ?></h5>
														
														<p class="card-text">
															<small class="text-muted "> <?= date('d/m/Y',strtotime($noticias->data)) ?> </small>
														</p>
														<?php if(isset($tipo) && $tipo != "l"){ ?>
															<div class="mt-3">
																<a href="editar.php?id=<?= $noticias->id ?>" title="Editar" class="btn corSite"><i class="bi bi-pencil"></i></a>
																<a href="excluir.php?id=<?= $noticias->id ?>" title="Excluir" class="btn corSite"><i class="bi bi-trash"></i></a>
															</div>
														<?php }	?>
														
													</a>
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
				
				<?php 
						}
					}
					
				?>	
			</div>
		</section>

	</main>