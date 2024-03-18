    
    <section class="mt-3">
		<a href="home.php">
			<button class="btn corSite text-light"><i class="bi bi-arrow-left"></i></button>
		</a>
	</section>
    
    <div class="card mt-5 p-4">
        <div class="card-body">
            <div class="row"><h2><?=$noticia->titulo?></h2></div>

            <div class="row mt-3"><h5><?=$noticia->descricao?></h5></div>

            <div class="row mt-3"><h6><small class="text-muted p-0">Notícia publicada dia <?= date('d/m/Y à\s H:i:s',strtotime($noticia->data)) ;?></small></h6></div>


            <h6 class="mt-5">Comentários:</h6>
            <form method="POST" action="processaComentario.php">
                <textarea name="comentario" id="comentario" class="form-control inputComentario" minlength="5" rows="3" required></textarea>
                <input type="hidden" name="idNoticia" value="<?=$noticia->id?>">
                <input type="hidden" name="idUsuario" value="<?=$id?>">
                <button type="submit" class="btn corSite text-light mt-3">Comentar</button>
            </form>


            <hr class="mt-3" />

            <ul class="list-group ">

            <?php 
				foreach ($comentarios as $comentario):
			?>	
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div>
                        <img class="imagemComentario" src="<?=$comentario->imagem?>">
                    </div>
                    <div class="ms-2 me-auto col">
                        <div class="divComentario">
                            <div class="fw-bold"><h4><?=$comentario->nome?></h4></div>
                            <?=$comentario->comentario?>
                            <div>
                                <label for="resposta<?=$comentario->id?>"><h6>Resposta:</h6></label>
                                <textarea class="form-control inputComentario" id="resposta<?=$comentario->id?>" name="resposta<?=$comentario->id?>" rows="2"></textarea>
                            </div>
                        </div>
                       
                    </div>
                    <div>
                        <span class="badge corSite rounded-pill"><?= date('d/m/Y',strtotime($comentario->data)) ;?></span>
                        <?php if($comentario->idUsuario == $id){ ?>
                            <div class="mt-2">
                                <a class="btn corSite" href="#" title="Editar" role="button"><i class="bi bi-pencil"></i></a>
                                <a class="btn corSite" href="#" title="Excluir" role="button"><i class="bi bi-trash"></i></a>
                            </div>

                        <?php } ?>
                    </div>
                </li>
                
            <?php 
				endforeach
			?>
            </ul>
        </div>
    </div>