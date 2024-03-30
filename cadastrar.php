<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Notícia');

use \App\Entity\Noticia;
$noticia = new Noticia();

// Validação de campos do formulário 
if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])) {


	//Definindo a imagem da notícia
	$dir = "image/";
	$file = $_FILES['imagem'];
	$destino = "$dir".$file['name'];
	move_uploaded_file($file['tmp_name'],$destino);
	
	//Inserção de campos
	$noticia->imagem = $destino;
	$noticia->titulo = $_POST['titulo'];
	$noticia->descricao = $_POST['descricao'];
	$noticia->ativo = $_POST['ativo'];
	$noticia->cadastrar();

	$msg = "Notícia cadastrada com sucesso!";
	header('location: index.php?status=success&msg='.urlencode($msg));
	exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

?>