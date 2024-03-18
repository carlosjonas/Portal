<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Comentario; 
    $comentario = new Comentario();

    if(isset($_POST['comentario'])){
		//Inserção de campos
		$comentario->comentario = $_POST['comentario'];
		$comentario->idNoticia = $_POST['idNoticia'];
		$comentario->idUsuario = $_POST['idUsuario'];
		$comentario->idComentario = null;
		if(isset($_POST['idComentario'])){
			$comentario->idComentario = $_POST['idComentario'];
		}
		$comentario->cadastrar();

        header('location: visualizadorDeNoticias.php?id='.$comentario->idNoticia.'&status=success');
	    exit;
	}

?>