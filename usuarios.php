<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Lista de Usuários');

//Colocando o include acima para não gerar erro ao definir session_start() novamente
include __DIR__.'/includes/header.php';

if($_SESSION['tipo'] == "l"){
    $msg = "Você não tem permissão para acessar essa página!";
    header('location: index.php?status=error&msg='.urlencode($msg));
    exit;
}
use \App\Entity\Usuario;

$usuario = Usuario::getUsuarios();

include __DIR__.'/includes/listaDeUsuarios.php';
include __DIR__.'/includes/footer.php';

?>