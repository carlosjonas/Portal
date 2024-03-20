<?php

    $action = $_REQUEST["action"];
    include_once('../Model/comentario_dao.php');
    $dao = new DaoComentario();

    switch ($action) {

        case "getComentario":
            $dao->getComentario($_REQUEST['id']);
        break;

        case "cadastrarComentario":
            $dao->cadastrarComentario($_REQUEST['idUsuario'],$_REQUEST['comentario'],$_REQUEST['idNoticia']);
        break;

        case "editarComentario":
            $dao->editarComentario($_REQUEST['id'],$_REQUEST['comentario']);
        break;

        case "deletarComentario":
            $dao->deletarComentario($_REQUEST['id']);
        break;
    }
?>