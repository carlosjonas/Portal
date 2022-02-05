<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Noticia;

/*/Validação do id
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
	header('location: index.php?status=error');
	exit;
}*/

$noticia = Noticia::getNoticia($_GET['id']);
echo "<pre>"; print_r($noticia); echo "</pre>"; exit;

// Validação de campos do formulário 
if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])) {

	$noticia = new Noticia;
	$noticia->titulo = $_POST['titulo'];
	$noticia->descricao = $_POST['descricao'];
	$noticia->ativo = $_POST['ativo'];
	$noticia->cadastrar();

	header('location: index.php?status=success');
	exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

?>