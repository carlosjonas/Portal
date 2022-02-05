<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Noticia;

/*/Validação do id
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
	header('location: index.php?status=error');
	exit;
}*/

//Consulta a notícia
$noticia = Noticia::getNoticia($_GET['id']);

//Validar a notícia
if(!$noticia instanceof Noticia){
	header('location: index.php?status=error');
	exit;
}

// Validação de campos do formulário 
if (isset($_POST['excluir'])) {

	$noticia->excluir();

	header('location: index.php?status=success');
	exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';

?>