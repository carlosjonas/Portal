<?php

	require __DIR__.'/vendor/autoload.php';

	define('TITLE','Editar Notícia');

	use \App\Entity\Noticia;
	use \App\Entity\Comentario;

	//Consulta a notícia
	$noticia = Noticia::getNoticia($_GET['id']);

	$query = "	SELECT C.*, U.nome, U.imagem FROM comentarios AS C
				INNER JOIN usuarios AS U ON U.id = C.idUsuario
				WHERE idNoticia = ".$_GET['id'];
	//Pegando os comentários
	$comentarios = Comentario::getComentarios(null,null,null,$query);

	//Validar a notícia
	if(!$noticia instanceof Noticia){
		$msg = "Notícia não existe!";
		header('location: index.php?status=error&msg='.urlencode($msg));
		exit;
	}

	include __DIR__.'/includes/header.php';
	include __DIR__.'/includes/noticia.php';
	include __DIR__.'/includes/footer.php';

?>