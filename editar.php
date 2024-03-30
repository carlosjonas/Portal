<?php

	require __DIR__.'/vendor/autoload.php';

	define('TITLE','Editar Notícia');

	use \App\Entity\Noticia;

	//Consulta a notícia
	$noticia = Noticia::getNoticia($_GET['id']);

	//Validar a notícia
	if(!$noticia instanceof Noticia){
		header('location: index.php?status=error');
		exit;
	}

	// Validação de campos do formulário 
	if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])) {

		$dir = "image/";
		$file = $_FILES['imagem'];
		$destino = "$dir".$file['name'];
		move_uploaded_file($file['tmp_name'],$destino);

		$noticia->imagem = $destino;
		$noticia->titulo = $_POST['titulo'];
		$noticia->descricao = $_POST['descricao'];
		$noticia->ativo = $_POST['ativo'];
		$noticia->atualizar();
		
		$msg = "Notícia editada com sucesso!";
		header('location: home.php?status=success&acao=refresh&msg='.urlencode($msg));
		exit;

	}

	include __DIR__.'/includes/header.php';
	include __DIR__.'/includes/formulario.php';
	include __DIR__.'/includes/footer.php';

?>