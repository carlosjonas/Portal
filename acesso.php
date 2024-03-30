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
        $msg = "Erro ao logar, verifique seu email ou senha!";
        header('location: index.php?status=error&msg='.urlencode($msg));
    }
}

?>