//Função que mostra o modal com um aviso para clicar ou só mostrar mensagem 
function mostrarModalAviso(texto,desaparecer,funcao,id){
    modal = document.getElementById("my-modal")
    modal.style.display = 'block';
    document.getElementById("paragrafoAviso").innerHTML= texto

    if(desaparecer == true){
        btnAviso = document.getElementById("btnSalvarAviso")
        btnAviso.style.display="none"
        setTimeout(() => {
            modal.style.display = 'none';
        }, 3000);
    }else{
        btnAviso = document.getElementById("btnSalvarAviso")
        btnAviso.style.display="block"
        btnAviso.setAttribute("onclick", funcao+"("+id+")");

    }
}
//função que faz o modal fechar ao clicar no btn-close
function fechaModal(){
    modal = document.getElementById("my-modal")
    modal.style.display = 'none';
}

//Função que pega uma mensagem no url e exibe no modal
function getMessages(url){
    let params = new URLSearchParams(window.location.search);
    let status = params.get('status');
    if(status){

        let mensagem =  decodeURI(params.get('msg'))
        
        const urlObj = new URL(url);
        // Removendo os parâmetros de pesquisa da URL
        urlObj.search = '';
        // Atualizando a URL atual no histórico do navegador
        window.history.replaceState({}, '', urlObj.toString());

        mostrarModalAviso(mensagem,true);
    }

}
