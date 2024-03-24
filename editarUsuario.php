<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Editar Usuário');

    use \App\Entity\Usuario;

    //Consulta o usuário
    $usuario = Usuario::getUsuarioById($_GET['id']);

    //Validar o usuário
    if(!$usuario instanceof Usuario){
        header('location: index.php?status=instance');
        exit;
    }

    // Validação de campos do usuário
    if (isset($_POST['nome'],$_POST['email'],$_POST['cpf'])) {

        try{
            //Definindo a imagem do usuário
            $dir = "image/";
            if(isset($_FILES['imagem'])){

                $file = $_FILES['imagem'];
                $destino = "$dir".$file['name'];
                move_uploaded_file($file['tmp_name'],$destino);    
                $usuario->imagem = $destino;
                $_SESSION['imagem'] = $destino;
            }

            //Inserção de campos
            $usuario->nome = $_POST['nome'];
            $usuario->email = $_POST['email'];
            $usuario->rg = $_POST['rg'];
            $usuario->cpf = $_POST['cpf'];
            if(isset($_POST['senha'])){
                $usuario->senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
            }
            $usuario->atualizar();

            session_start();
            $link = (isset($_SESSION['tipo']) && $_SESSION['tipo'] !='l' ? 'usuarios.php' : 'index.php');
            
            header("location: $link?status=success");
            exit;

        }catch(Exception $e){
            header("location: $link?status=error&tipo=erroEditarUsuario");
            exit;
        }
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioUsuarios.php';
    include __DIR__.'/includes/footer.php';

?>