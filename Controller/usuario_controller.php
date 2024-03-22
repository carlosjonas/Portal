<?php

    $action = $_REQUEST["action"];
    include_once('../Model/usuario_dao.php');
    $dao = new DaoUsuario();

    switch ($action) {

        case "getUsuarios":
            $dao->getUsuarios();
        break;

        /*case "cadastrarComentario":
            $dao->cadastrarComentario($_REQUEST['idUsuario'],$_REQUEST['comentario'],$_REQUEST['idNoticia']);
        break;

        case "editarComentario":
            $dao->editarComentario($_REQUEST['id'],$_REQUEST['comentario']);
        break;

        case "deletarComentario":
            $dao->deletarComentario($_REQUEST['id']);
        break;*/
    }
?>