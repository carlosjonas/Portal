<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Lista de Usuários');

use \App\Entity\Usuario;

$usuario = Usuario::getUsuarios();
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listaDeUsuarios.php';
include __DIR__.'/includes/footer.php';

?>