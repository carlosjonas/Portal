<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Usuário');

use \App\Entity\Usuario;
$usuario = new Usuario();

// Validação de campos do formulário 
if (isset($_POST['nome'],$_POST['email'],$_POST['cpf'],$_POST['senha'])) {

    try{
        //Definindo a imagem da notícia
        $dir = "image/";
        if(isset($_FILES['imagem'])){

            $file = $_FILES['imagem'];
            $destino = "$dir".$file['name'];
            move_uploaded_file($file['tmp_name'],$destino);    
            $usuario->imagem = $destino;
        }

        //Inserção de campos
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->rg = $_POST['rg'];
        $usuario->cpf = $_POST['cpf'];
        $usuario->senha = $_POST['senha'];
        $usuario->tipo = 'l';
        $usuario->cadastrar();

        header('location: index.php?status=success');

    }catch(Exception $e){
        header('location: index.php?status=error');
    }
}

include __DIR__.'/includes/headerConvidado.php';
include __DIR__.'/includes/formularioUsuarios.php';
include __DIR__.'/includes/footer.php';

?>