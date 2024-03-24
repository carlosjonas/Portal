<?php

    date_default_timezone_set('America/Fortaleza');

    require '../vendor/autoload.php';

    use \App\Entity\Usuario;

    class DaoUsuario{
        
        //Função que retorna os comentários
        public function getUsuarios(){

            $query = "SELECT id,nome,email,rg,cpf,imagem,data FROM usuarios";
            //Pegando os comentários
            $usuarios = Usuario::getUsuarios(null,null,null,$query);
            $resposta = array();

            foreach ($usuarios as $key => $value) {
                $obj[$key] = $value;
                $resposta += $obj;
            }
            $json = json_encode($resposta);
            echo $json;
        }

        //Função que deleta o usuário
        public function deletarUsuario($id){
            $usuario = Usuario::getUsuarioById($id);
            if(!$usuario instanceof Usuario){
                header('location: index.php?status=error');
                exit;
            }
            
            $usuario->excluir($id);
            
            $resposta = 'true'; 
            echo $resposta;
        }

        /*/Função que cadastra o comentário do usuário
        public function cadastrarComentario($idUsuario,$comentarioUsuario,$idNoticia){
            $comentario = new Comentario();
            
            //Inserção de campos
            $comentario->comentario     = $comentarioUsuario;
            $comentario->idNoticia      = $idNoticia;
            $comentario->idUsuario      = $idUsuario;
            $comentario->idComentario   = null;
            if(isset($idComentario)){
                $comentario->idComentario = $idComentario;
            }
            $comentario->cadastrar();

            $resposta = 'true'; 
            echo $resposta;
        }
    
        //Função que altera o comentário do usuário
        public function editarComentario($id,$comentario){

            $comentarios = Comentario::getComentario($id);
            if(!$comentarios instanceof Comentario){
                header('location: index.php?status=error');
                exit;
            }
            
            $comentarios->atualizar($id,$comentario);
            
            $resposta = 'true'; 
            echo $resposta;
        }

        
        */
    }

    
?>