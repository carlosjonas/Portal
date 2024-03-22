<?php

require __DIR__.'../vendor/autoload.php';

session_start();

use \App\Entity\Usuario;
if(isset($_POST["email"])){
    $usuario = Usuario::getUsuario($_POST["email"]);
    
    if(password_verify($_POST['senha'],$usuario->senha)){
        $_SESSION['id'] = $usuario->id;

        header('Refresh: 0; url=index.php');
    }else{
        header('location: index.php?status=error');
    }
}

?>