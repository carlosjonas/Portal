<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Notícia');

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
if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])) {

	$noticia->titulo = $_POST['titulo'];
	$noticia->descricao = $_POST['descricao'];
	$noticia->ativo = $_POST['ativo'];
	$noticia->atualizar();

	header('location: index.php?status=success');
	exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioeditar.php';
include __DIR__.'/includes/footer.php';

?>