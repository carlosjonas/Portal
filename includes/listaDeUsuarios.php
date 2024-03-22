    <main>
        
        <section>
            <a href="index.php" class="btn corSite text-light mt-3"><i class="bi bi-arrow-left"></i></a>
        
            <h2 class="mt-3 text-light text-center"><?=TITLE;?></h2>

            <div class="card">
                <div class="card-body">
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col">Cadastro</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-usuarios">
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>[
    
    <script>
         window.onload = function () {
            getUsuarios();
        }

        //Função que faz uma requisição para pegar os comentários
        function getUsuarios(){
            url = "./Controller/usuario_controller.php?action=getUsuarios";
		    const xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    // Atribuindo a response text a json para ficar mais semantico
                    let json = JSON.parse(this.responseText);

                    //Inicializando o txt para receber a estrutura de card
                    let txt = '';
                    
                    let lista = document.getElementById("tbody-usuarios")

                    if (json == '' ) {
                        txt += '<h4 class="text-center">Nenhum comentário para essa notícia</h4>'
                    }else if(json != '' ){
                        console.log(json)
                        json.forEach(function(usuario){
                            spliter = usuario.data.split(" ")
                            data = spliter[0]
                            datasplit = data.split("-");
                            dia = datasplit[2] + "-" + datasplit[1] + "-" + datasplit[0]
                            txt += '<tr>'
                            txt += '    <th> <img class="imgListaUsuarios" src="' + usuario.imagem + '"></th>'
                            txt += '    <th>' + usuario.id + '</th>'
                            txt += '    <th>' + usuario.nome + '</th>'
                            txt += '    <th>' + usuario.email + '</th>'
                            txt += '    <th>' + usuario.cpf + '</th>'
                            txt += '    <th>' + usuario.rg + '</th>'
                            txt += '    <th>' + dia + " às " + spliter[1] + '</th>'
                            txt += '    <th>'
                            txt += '        <a class="btn corSite" href="editarUsuario.php?id=' + usuario.id + '"><i class="bi bi-pencil"></i></a>'
                            txt += '        <a class="btn corSite" href="excluirUsuarios.php?id=' + usuario.id + '"><i class="bi bi-trash"></i></a>'
                            txt += '    </th>'
                            txt += '</tr>'
                        });

                    }
                    lista.innerHTML = txt;
                }
		    }
		    xhttp.open("GET", url);
		    xhttp.send();

        }
    </script>