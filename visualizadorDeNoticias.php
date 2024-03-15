<?php

	require __DIR__.'/vendor/autoload.php';

	define('TITLE','Editar Notícia');

	use \App\Entity\Noticia;

	//Consulta a notícia
	$noticia = Noticia::getNoticia($_GET['id']);

	//Validar a notícia
	if(!$noticia instanceof Noticia){
		header('location: home.php?status=error');
		exit;
	}

	include __DIR__.'/includes/header.php';
	include __DIR__.'/includes/noticia.php';
	include __DIR__.'/includes/footer.php';

?>