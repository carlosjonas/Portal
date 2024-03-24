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
