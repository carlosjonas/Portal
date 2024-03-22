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
            $usuario->atualizar();

            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['rg'] = $_POST['rg'];
            $_SESSION['cpf'] = $_POST['cpf'];

            $link = (isset($tipo) && $tipo !='l' ? 'usuarios.php' : 'home.php');
            
            header("location: $link?status=success");
            exit;

        }catch(Exception $e){
            header('location: home.php?status=error&tipo=erroEditarUsuario');
            exit;
        }
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioUsuarios.php';
    include __DIR__.'/includes/footer.php';

?>