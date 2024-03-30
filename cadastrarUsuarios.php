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

        $query = "SELECT rg FROM usuarios WHERE rg = '$usuario->rg'";
        $pessoa = $usuario->getUsuarios(null,null,null,$query);
        if($pessoa[0]->rg != ""){
            $msg = "Um usuário com este RG já foi cadastrado!";
            header('location: cadastrarUsuarios.php?status=error&msg='.urlencode($msg));
            exit;
        }

        $query = "SELECT cpf FROM usuarios WHERE cpf = '$usuario->cpf'";
        $pessoa = $usuario->getUsuarios(null,null,null,$query);
        if($pessoa[0]->cpf != ""){
            $msg = "Um usuário com este CPF já foi cadastrado!";
            header('location: cadastrarUsuarios.php?status=error&msg='.urlencode($msg));
            exit;
        }

        $query = "SELECT email FROM usuarios WHERE email = '$usuario->email'";
        $pessoa = $usuario->getUsuarios(null,null,null,$query);
        if($pessoa[0]->email != ""){
            $msg = "Um usuário com este email já foi cadastrado!";
            header('location: cadastrarUsuarios.php?status=error&msg='.urlencode($msg));
            exit;
        }
        
        $usuario->cadastrar();
        $msg = "Usuário cadastrado com sucesso!";
        header('location: login.php?status=success&msg='.urlencode($msg));
        exit;

    }catch(Exception $e){
        header('location: cadastrarUsuarios.php?status=error');
        exit;
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioUsuarios.php';
include __DIR__.'/includes/footer.php';

?>