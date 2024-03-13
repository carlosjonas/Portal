<?php

require __DIR__.'../vendor/autoload.php';

use \App\Entity\Usuario;
if(isset($_POST["email"])){
    $usuario = Usuario::getUsuario($_POST["email"]);
    
    if(password_verify($_POST['senha'],$usuario->senha)){
        $_SESSION['idUsuario'] = $usuario->id;
        $_SESSION['nomeUsuario'] = $usuario->nome;
        $_SESSION['emailUsuario'] = $usuario->email;
        $_SESSION['fotoUsuario'] = $usuario->foto;
        $_SESSION['senhaUsuario'] = $usuario->senha;
        header('location: home.php');
    }else{
        header('location: index.php?status=error');
    }
}

?>