<?php

    date_default_timezone_set('America/Fortaleza');

    require '../vendor/autoload.php';

    use \App\Entity\Comentario;

    class DaoComentario{
        
        //Função que retorna os comentários
        public function getComentario($id,$sessionId,$pagina,$qtd_reg_pagina){

            $inicio = ($pagina * $qtd_reg_pagina) - $qtd_reg_pagina;
            
            //Só escolhe os comentários em que os usuários estão no sistema
            $query = "  SELECT C.*, U.nome, U.imagem FROM comentarios AS C
                        INNER JOIN usuarios AS U ON U.id = C.idUsuario
                        WHERE idNoticia = ".$id."
                        ORDER BY C.data DESC
                        LIMIT $inicio, $qtd_reg_pagina";

            //Pegando os comentários
            $comentarios = Comentario::getComentarios(null,null,null,$query);
            $resposta = array();

            foreach ($comentarios as $key => $value) {
                $obj[$key] = $value;
            }
            $resposta['json'] = $obj;

            $sql_pg = "SELECT COUNT(id) AS num_result FROM comentarios";
            $paginas = Comentario::getComentarios(null,null,null,$sql_pg);

            //Quantidade de páginas
            $quantidade_pg = ceil($paginas[0]->num_result / $qtd_reg_pagina);
            
            //Limitar os links antes e depois
            $max_links = 2;
            
            if($paginas[0]->num_result > 10){
                //Adicionando as tags de links da paginação
                $resposta_pg['pagina']  = "		<nav aria-label='Page navigation example'> ";
                $resposta_pg['pagina'] .= "		  <ul class='pagination justify-content-end'> ";
                $resposta_pg['pagina'] .= "			<li class='page-item". ($pagina == 1 ? ' disabled' : ''). "'><a class='page-link' href='#' onclick='getComentarios($id,$sessionId,1,$qtd_reg_pagina)'>Primeira</a></li>";
                //Adicionando 2 páginas antes	
                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >=1){
                        $resposta_pg['pagina'] .= "	<li class='page-item'><a class='page-link' href='#' onclick='getComentarios($id,$sessionId,$pag_ant,$qtd_reg_pagina)'>$pag_ant</a></li> ";
                    }
                }
                $resposta_pg['pagina'] .= "			<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li> ";
                //Adicionando 2 páginas depois
                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                        $resposta_pg['pagina'] .= "	<li class='page-item'><a class='page-link' href='#' onclick='getComentarios($id,$sessionId,$pag_dep,$qtd_reg_pagina)'>$pag_dep</a></li> ";
                    }
                }
                $resposta_pg['pagina'] .= "			<li class='page-item ". ($pagina == $quantidade_pg ? ' disabled' : ''). "'><a class='page-link' href='#' onclick='getComentarios($id,$sessionId,$quantidade_pg,$qtd_reg_pagina)'>Última</a></li>";
                $resposta_pg['pagina'] .= "		  </ul> ";
                $resposta_pg['pagina'] .= "		</nav> ";
                $resposta['paginacao'] = $resposta_pg['pagina'];
            }else {
                $resposta['paginacao'] = "";
            }

            echo json_encode($resposta);
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