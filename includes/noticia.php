    
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
                <a onclick="cadastrarComentario()"  class="btn corSite mt-3">Comentar</a>
            </form>
            <?php }else{?>
                <h5 class="mt-5">Logue para comentar nesta notícia !</h5>
            <?php }?>
            <hr class="mt-3" />
            <h4 class="mt-3">Comentários:</h4>
            <ul id="list-Group" class="list-group"></ul>
        </div>
    </div>

    <script>
        window.onload = function () {
            getComentarios();
        }

        idNoticia = "<?=$_GET['id']?>";

        //Função que muda o comentário para textarea
        function mudarParaTextarea(id){

            //Mudando texto para textarea
            inputTexto = document.getElementById("comentario"+id);
            paragrafo = document.getElementById("paragrafo"+id);
            html = "<textarea id='textarea"+id+"' class='form-control me-2' rows='3'>"+paragrafo.innerHTML+"</textarea>"
            inputTexto.innerHTML = html;
            
            //Foco
            textarea = document.getElementById("textarea"+id);
            textarea.focus()
            
            //Mudando botão
            trocarBotãoEditar(id)
        }

        function trocarBotãoEditar(id){
            btnEditar = document.getElementById("btnEditar"+id);
            btnEditar.innerHTML = '<i class="bi bi-floppy"></i>';
            btnEditar.setAttribute("onclick", "editarComentario("+id+")");
        }

        function cadastrarComentario(){
             <?php if(isset($_SESSION['id'])){ ?>
                let idUsuario ="<?=$_SESSION['id']?>"
             <?php } ?>
            let idNoticia = <?=$_GET['id']?>;
            console.log(idUsuario,idNoticia)
            textarea = document.getElementById("comentario");
            comentario = textarea.value
            
            if(comentario !=""){
                url = "./Controller/comentario_controller.php?action=cadastrarComentario&idUsuario="+idUsuario+"&comentario="+comentario+"&idNoticia="+idNoticia;
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);

                        // Atribuindo a response text a json para ficar mais semantico
                        try{
                            let json = JSON.parse(this.responseText);
                            if (json == true ) {
                                btn = document.getElementById("btnCloseModal")
                                btn.click();
                                getComentarios();
                                textarea.value = "";
                            }
                        }catch(error){
                            mostrarModalAviso('Erro ao cadastrar o comentário!',true)
                            
                        }
                    }
                }
                xhttp.open("GET", url);
                xhttp.send();
            }
        }

        //Função que faz uma requisição para pegar os comentários
        function getComentarios(){
            url = "./Controller/comentario_controller.php?action=getComentario&id="+idNoticia;
		    const xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    // Atribuindo a response text a json para ficar mais semantico
                    let json = JSON.parse(this.responseText);

                    //Inicializando o txt para receber a estrutura de card
                    let txt = '';
                    
                    let lista = document.getElementById("list-Group")

                    if (json == '' ) {
                        txt += '<h4 class="text-center">Nenhum comentário para essa notícia</h4>'
                    }else if(json != '' ){
                        console.log(json)
                        json.forEach(function(comentario){
                            spliter = comentario.data.split(" ")
                            data = spliter[0]
                            datasplit = data.split("-");
                            data = datasplit[2]+"-"+datasplit[1]+"-"+datasplit[0];
                            txt +='<li class="list-group-item d-flex justify-content-between align-items-start">'
                            txt +='    <div>'
                            txt +='        <img class="imagemComentario" src="'+comentario.imagem+'">'
                            txt +='    </div>'
                            txt +='    <div class="ms-2 me-auto col">'
                            txt +='        <div class="divComentario">'
                            txt +='            <div class="fw-bold"><h4>'+comentario.nome+'</h4></div>'
                            txt +='            <div id="comentario'+comentario.id+'">'
                            txt +='               <p id="paragrafo'+comentario.id+'">'+comentario.comentario+'</p>'
                            txt +='            </div>'
                            txt +='        </div>'
                            txt +='   </div>'
                            txt +='     <div class="ms-2">'
                            txt +='        <span class="badge corSite text-dark rounded-pill">'+data+'</span>'
                            <?php if(isset($_SESSION['id'])){?>
                                idUsuario = "<?= $_SESSION['id']; ?>";
                                if(idUsuario == comentario.idUsuario){
                                    txt +='<div class="mt-2">'
                                    txt +=' <a class="btn corSite" title="Editar" id="btnEditar'+comentario.id+'" onclick="mudarParaTextarea('+comentario.id+')"><i class="bi bi-pencil"></i></a>'
                                    txt +=' <a class="btn corSite" title="Excluir" onclick="mostrarModalAviso(\'Tem certeza que deseja excluir esse comentário ?\',false,'+comentario.id+')"><i class="bi bi-trash"></i></a>'
                                    txt +='</div>'
                                }
                            <?php } ?>
                            txt +='     </div>'
                            txt +='</li>'
                        });

                    }
                    lista.innerHTML = txt;
                }
		    }
		    xhttp.open("GET", url);
		    xhttp.send();

        }

        //Função que faz uma requisição para pegar os comentários
        function editarComentario(id){
            comentario = document.getElementById("textarea"+id).value
            url = "./Controller/comentario_controller.php?action=editarComentario&id="+id+"&comentario="+comentario;
		    const xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    // Atribuindo a response text a json para ficar mais semantico
                    try{
                        let json = JSON.parse(this.responseText);
                        if (json == true ) {
                            mudarParaParagrafo(id);
                        }
                    }catch(error){
                        mostrarModalAviso('Erro ao editar o comentário!',true)
                        
                    }
                }
		    }
		    xhttp.open("GET", url);
		    xhttp.send();

        }

        //Função que faz uma requisição para pegar os comentários
        function deletarComentario(id){
            
            url = "./Controller/comentario_controller.php?action=deletarComentario&id="+id;
		    const xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    // Atribuindo a response text a json para ficar mais semantico
                    try{
                        let json = JSON.parse(this.responseText);
                        if (json == true ) {
                            btn = document.getElementById("btnCloseModal")
                            btn.click();
                            getComentarios();

                        }
                    }catch(error){
                        mostrarModalAviso('Erro ao deletar o comentário!',true)
                        
                    }
                }
		    }
		    xhttp.open("GET", url);
		    xhttp.send();

        }

        //Função que mostra o modal com um aviso
        function mostrarModalAviso(texto,desaparecer,id){
            modal = document.getElementById("my-modal")
            modal.style.display = 'block';
            document.getElementById("paragrafoAviso").innerHTML= texto

            if(desaparecer == true){
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 3000);
            }else{
                btnAviso = document.getElementById("btnSalvarAviso")
                btnAviso.style.display="block"
                btnAviso.setAttribute("onclick", "deletarComentario("+id+")");

            }
        }



        //Função que muda o comentário para textarea
        function mudarParaParagrafo(id){

            //Mudando texto para textarea
            inputTexto = document.getElementById("comentario"+id);
            textarea = document.getElementById("textarea"+id);
            html = '<p id="paragrafo'+id+'">'+textarea.value+'</p>'
            inputTexto.innerHTML = html;

            //Mudando botão
            trocarBotãoSalvar(id)
        }

        function trocarBotãoSalvar(id){
            btnEditar = document.getElementById("btnEditar"+id);
            btnEditar.innerHTML = '<i class="bi bi-pencil"></i>';
            btnEditar.setAttribute("onclick", "mudarParaTextarea("+id+")");
        }

        //função que faz o modal fechar ao clicar no btn-close
        function fechaModal(){
            modal = document.getElementById("my-modal")
            modal.style.display = 'none';
        }
    </script>