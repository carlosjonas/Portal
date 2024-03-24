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
    </main>
    <!-- Scripts -->
    <script src="assets/script/scriptlistaDeUsuarios.js"></script>
    <script>
        idUsuario = <?= $_SESSION['id'];?>;
        
         window.onload = function () {
            getUsuarios();
        }
    </script>