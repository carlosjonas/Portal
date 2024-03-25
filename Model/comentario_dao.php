<?php

    date_default_timezone_set('America/Fortaleza');

    require '../vendor/autoload.php';

    use \App\Entity\Comentario;

    class DaoComentario{
        
        //Função que retorna os comentários
        public function getComentario($id){
            
            //Só escolhe os comentários em que os usuários estão no sistema
            $query = "  SELECT C.*, U.nome, U.imagem FROM comentarios AS C
                        INNER JOIN usuarios AS U ON U.id = C.idUsuario
                        WHERE idNoticia = ".$id."
                        ORDER BY C.data DESC";
            //Pegando os comentários
            $comentarios = Comentario::getComentarios(null,null,null,$query);
            $resposta = array();

            foreach ($comentarios as $key => $value) {
                $obj[$key] = $value;
                $resposta += $obj;
            }
            $json = json_encode($resposta);
            echo $json;
        }

        //Função que cadastra o comentário do usuário
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

        //Função que altera o comentário do usuário
        public function deletarComentario($id){
            $comentarios = Comentario::getComentario($id);
            if(!$comentarios instanceof Comentario){
                header('location: index.php?status=error');
                exit;
            }
            
            $comentarios->excluir($id);
            
            $resposta = 'true'; 
            echo $resposta;
        }
    }
?>