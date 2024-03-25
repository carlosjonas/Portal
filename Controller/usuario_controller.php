<?php

    $action = $_REQUEST["action"];
    include_once('../Model/usuario_dao.php');
    $dao = new DaoUsuario();

    switch ($action) {

        case "getUsuarios":
            $dao->getUsuarios($_REQUEST['pagina'],$_REQUEST['qtd']);
        break;
        
        case "deletarUsuario":
            $dao->deletarUsuario($_REQUEST['id']);
        break;
        /*case "cadastrarComentario":
            $dao->cadastrarComentario($_REQUEST['idUsuario'],$_REQUEST['comentario'],$_REQUEST['idNoticia']);
        break;

        case "editarComentario":
            $dao->editarComentario($_REQUEST['id'],$_REQUEST['comentario']);
        break;

        */
    }
?>