
//Função que faz uma requisição para pegar os comentários
function getUsuarios(){
    url = "./Controller/usuario_controller.php?action=getUsuarios";
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
    let json = JSON.parse(resposta);

    //Inicializando o txt para receber a estrutura de tabela
    let txt = '';

    let lista = document.getElementById("tbody-usuarios")

    if (json == '' ) {
        txt += '<h4 class="text-center">Nenhum comentário para essa notícia</h4>'
    }else if(json != '' ){
        json.forEach(function(usuario){
            spliter = usuario.data.split(" ")
            data = spliter[0]
            datasplit = data.split("-");
            dia = datasplit[2] + "/" + datasplit[1] + "/" + datasplit[0]
            txt += '<tr>'
            txt += '    <th><img class="imgListaUsuarios" src="' + usuario.imagem + '" onerror="this.src='+ "\'image/usuarioDefault.png\'"+ '"></th>'
            txt += '    <th>' + usuario.id + '</th>'
            txt += '    <th>' + usuario.nome + '</th>'
            txt += '    <th>' + usuario.email + '</th>'
            txt += '    <th>' + usuario.cpf + '</th>'
            txt += '    <th>' + usuario.rg + '</th>'
            txt += '    <th>' + dia + " às " + spliter[1] + '</th>'
            txt += '    <th>'
            txt += '        <a class="btn corSite" href="editarUsuario.php?id=' + usuario.id + '"><i class="bi bi-pencil"></i></a>'
            if(idUsuario != usuario.id){
                txt += '    <a class="btn corSite" onclick="mostrarModalAviso(\'Tem certeza que deseja deletar este Usuário?\',false,\'deletarUsuario\',' + usuario.id + ')"><i class="bi bi-trash"></i></a>'
            }
            txt += '    </th>'
            txt += '</tr>'
        });

    }
    lista.innerHTML = txt;
}

function deletarUsuario(id){
    url = "./Controller/usuario_controller.php?action=deletarUsuario&id="+id;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            // Atribuindo a response text a json para ficar mais semantico
            try{
                let json = JSON.parse(this.responseText);
                if (json == true ) {
                    mostrarModalAviso('Usuário deletado!',true);
                    getUsuarios();

                }
            }catch(error){
                mostrarModalAviso('Erro ao deletar o usuário!',true);
                
            }
        }
    }
    xhttp.open("GET", url);
    xhttp.send();

}