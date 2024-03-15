    
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
        </div>
    </div>