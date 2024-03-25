    
    <section class="mt-3">
		<a href="index.php">
			<button class="btn corSite text-light"><i class="bi bi-arrow-left"></i></button>
		</a>
	</section>
    
    <div class="card mt-5 p-4">
        <div class="card-body">
            <div class="row"><h2><?=$noticia->titulo?></h2></div>

            <div class="row mt-3"><h5><?=$noticia->descricao?></h5></div>

            <div class="row mt-3"><h6><small class="text-muted p-0">Notícia publicada dia <?= date('d/m/Y à\s H:i:s',strtotime($noticia->data)) ;?></small></h6></div>


            <?php if(isset($_SESSION['id'])){?>
            <form method="POST" class="mt-5">
                <textarea name="comentario" id="comentario" class="form-control inputComentario" minlength="5" rows="3" required></textarea>
                <input type="hidden" name="idNoticia" value="<?=$noticia->id?>">
                <input type="hidden" name="idUsuario" value="<?=$id?>">
                <a onclick="cadastrarComentario(<?=$id?>,<?=$noticia->id?>)"  class="btn corSite mt-3">Comentar</a>
            </form>
            <?php }else{?>
                <h5 class="mt-5">Logue para comentar nesta notícia !</h5>
            <?php }?>
            <hr class="mt-3" />
            <h4 class="mt-3">Comentários:</h4>
            <ul id="list-Group" class="list-group"></ul>
        </div>
    </div>
    
    <!-- Scripts -->
    
    <script>
        let sessionId = '<?php 
                                if(isset($_SESSION['id'])){
                                    echo $_SESSION['id'];
                                }; 
                            ?>';
        let idNoticia = <?=$_GET['id']?>;

        sessionStorage.setItem("sessionId", sessionId);
        sessionStorage.setItem("idNoticia", idNoticia);
        window.onload = function () {
            
            getComentarios(idNoticia,sessionId);
        }
        
        
    </script>
    <script src="assets/script/scriptnoticia.js"></script>