<?php

    date_default_timezone_set('America/Fortaleza');

    require '../vendor/autoload.php';

    use \App\Entity\Noticia;

    class DaoNoticia{
        
        //Função que retorna os comentários
        public function getNoticias($pagina,$qtd_reg_pagina){

            $inicio = ($pagina * $qtd_reg_pagina) - $qtd_reg_pagina;

            $query = "SELECT * FROM noticias ORDER BY data DESC LIMIT $inicio, $qtd_reg_pagina";
            //Pegando os comentários
            $noticias = Noticia::getNoticias(null,null,null,$query);
            $resposta = array();

            foreach ($noticias as $key => $value) {
                $obj[$key] = $value;
            }
            $resposta['json'] = $obj;
		
            $sql_pg = "SELECT COUNT(id) AS num_result FROM noticias";
            $paginas = Noticia::getNoticias(null,null,null,$sql_pg);

            //Quantidade de páginas
            $quantidade_pg = ceil($paginas[0]->num_result / $qtd_reg_pagina);
            
            //Limitar os links antes e depois
            $max_links = 2;
            
            if($paginas[0]->num_result > 10){
                //Adicionando as tags de links da paginação
                $resposta_pg['pagina']  = "		<nav aria-label='Page navigation example'> ";
                $resposta_pg['pagina'] .= "		  <ul class='pagination justify-content-end'> ";
                $resposta_pg['pagina'] .= "			<li class='page-item". ($pagina == 1 ? ' disabled' : ''). "'><a class='page-link' href='#' onclick='getNoticias(1,$qtd_reg_pagina)'>Primeira</a></li>";
                //Adicionando 2 páginas antes	
                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >=1){
                        $resposta_pg['pagina'] .= "	<li class='page-item'><a class='page-link' href='#' onclick='getNoticias($pag_ant,$qtd_reg_pagina)'>$pag_ant</a></li> ";
                    }
                }
                $resposta_pg['pagina'] .= "			<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li> ";
                //Adicionando 2 páginas depois
                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                        $resposta_pg['pagina'] .= "	<li class='page-item'><a class='page-link' href='#' onclick='getNoticias($pag_dep,$qtd_reg_pagina)'>$pag_dep</a></li> ";
                    }
                }
                $resposta_pg['pagina'] .= "			<li class='page-item ". ($pagina == $quantidade_pg ? ' disabled' : ''). "'><a class='page-link' href='#' onclick='getNoticias($quantidade_pg,$qtd_reg_pagina)'>Última</a></li>";
                $resposta_pg['pagina'] .= "		  </ul> ";
                $resposta_pg['pagina'] .= "		</nav> ";
                $resposta['paginacao'] = $resposta_pg['pagina'];
            }else {
                $resposta['paginacao'] = "";
            }
            echo json_encode($resposta);

        }

        //Função que deleta o usuário
        public function deletarNoticia($id){
            $noticia = Noticia::getNoticia($id);
            //print_r($noticia);
            if(!$noticia instanceof Noticia){
                header('location: index.php?status=error');
                exit;
            }
            
            $noticia->excluir($id);
            
            $resposta = 'true'; 
            echo $resposta;
        }

    }

    
?>