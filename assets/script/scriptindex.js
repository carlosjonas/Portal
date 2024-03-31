
//Função que faz uma requisição para pegar os comentários
function getNoticias(pagina, qtd_reg_pagina){
    url = "./Controller/noticia_controller.php?action=getNoticias&pagina="+pagina+"&qtd="+qtd_reg_pagina;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            montarLista(this.responseText)
        }
    }
    xhttp.open("GET", url);
    xhttp.send();

}

//Função que monta a lista de Usuários
function montarLista(resposta){
    // Atribuindo a response text a json para ficar mais semantico
    console.log(resposta);
    let registros = JSON.parse(resposta);
    console.log(registros)
    //Inicializando o txt para receber a estrutura de tabela
    let txt = '';

    let area = document.getElementById("areaNoticias")

    if (registros == '' ) {
        txt += '<h4 class="text-center">Nenhum comentário para essa notícia</h4>'
    }else if(registros != '' ){
        registros.json.forEach(function(noticia){
            separador = noticia.data.split(" ")
            dias = separador[0].split("-")
            data = dias[2] + "/" + dias[1] + "/" + dias[0]
            txt +='<div class ="col-5 mb-3">'
            txt +='    <div class="card" style="max-width: 540px;">'
            txt +='        <div class="card-body p-1">'
            txt +='            <div class="container">'
            txt +='                <div class="row">'
            txt +='                    <div class="col-4 p-0">'
            txt +='                       <a class="linkCardNoticia" href="visualizadorDeNoticias.php?id='+noticia.id +'">'
            txt +='                            <img src="'+noticia.imagem +'" id="imagem" class="img-fluid rounded-start imgNoticia" alt="imagem da notícia">'
            txt +='                        </a>'
            txt +='                    </div>'
            txt +='                    <div class="col-8 text-dark" id="info_noticia">'
            txt +='                       <a class="linkCardNoticia" href="visualizadorDeNoticias.php?id='+noticia.id +'">'
            txt +='                            <h5 class="card-title" style="min-height:80px">'+noticia.titulo +'</h5>'
            txt +='                            <p class="card-text">'
            txt +='                                <small class="text-muted ">Publicado dia '+ data +' </small>'
            txt +='                            </p>'
                                                if(tipo != "l"){ +''
            txt +='                                <div class="mt-3">'
            txt +='                                   <a href="editar.php?id='+noticia.id +'" title="Editar" class="btn corSite"><i class="bi bi-pencil"></i></a>'
            txt +='                                   <a onclick="mostrarModalAviso(\'Você deseja excluir essa notícia?\',false,\'deletarNoticia\','+noticia.id +')" title="Excluir" class="btn corSite"><i class="bi bi-trash"></i></a>'
            txt +='                                </div>'
                                                }
            txt +='                        </a>'
            txt +='                    </div>'
            txt +='                </div>'
            txt +='            </div>'
            txt +='        </div>'
            txt +='    </div>'
            txt +='</div>'
        });

        if (registros.paginacao){
            paginacao = registros.paginacao
            document.getElementById("paginacao").innerHTML = paginacao;
        }
    }
    area.innerHTML = txt;
}

function deletarNoticia(id){
    url = "./Controller/noticia_controller.php?action=deletarNoticia&id="+id;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            // Atribuindo a response text a json para ficar mais semantico
            try{
                console.log(this.responseText)
                let json = JSON.parse(this.responseText);
                if (json == true ) {
                    mostrarModalAviso('Notícia deletada!',true);

                    pagina          = localStorage.getItem("pagina");
                    qtd_reg_pagina  = localStorage.getItem("qtd_reg_pagina");
                    getNoticias(pagina,qtd_reg_pagina);

                }
            }catch(error){
                mostrarModalAviso('Erro ao deletar a notícia!',true);
                
            }
        }
    }
    xhttp.open("GET", url);
    xhttp.send();

}