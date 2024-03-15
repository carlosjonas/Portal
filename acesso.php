<?php

require __DIR__.'../vendor/autoload.php';

session_start();

use \App\Entity\Usuario;
if(isset($_POST["email"])){
    $usuario = Usuario::getUsuario($_POST["email"]);
    
    if(password_verify($_POST['senha'],$usuario->senha)){
        $_SESSION['id'] = $usuario->id;
        /*$_SESSION['nome'] = $usuario->nome;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['foto'] = $usuario->imagem;
        $_SESSION['rg'] = $usuario->rg;
        $_SESSION['cpf'] = $usuario->cpf;
        $_SESSION['senha'] = $usuario->senha;
        $_SESSION['tipo'] = $usuario->tipo;*/
        header('location: home.php');
    }else{
        header('location: index.php?status=error');
    }
}

?>