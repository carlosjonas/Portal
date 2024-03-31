<?php

    $action = $_REQUEST["action"];
    include_once('../Model/noticia_dao.php');
    $dao = new DaoNoticia();

    switch ($action) {

        case "getNoticias":
            $dao->getNoticias($_REQUEST['pagina'],$_REQUEST['qtd']);
        break;
        
        case "deletarNoticia":
            $dao->deletarNoticia($_REQUEST['id']);
        break;
    }
?>