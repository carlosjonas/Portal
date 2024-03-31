<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Recuperar Senha');

use \App\Entity\Usuario;
$usuario = new Usuario();

// Validação de campos do formulário 
if (isset($_POST['email'])) {

	$msg = "Email para recuperação de senha enviado!";
	header('location: index.php?status=success&msg='.urlencode($msg));
	exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioRecuperarSenha.php';
include __DIR__.'/includes/footer.php';

?>