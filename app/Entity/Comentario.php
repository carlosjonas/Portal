<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Comentario{

	//Identificador do comentário
	public $id;
	//Texto do comentário
	public $comentario;
	//Id da notícia atrelada ao comentário
	public $idNoticia;
	//Id do usuário atrelada ao comentário
	public $idUsuario;
	//Id do comentário atrelada a resposta do comentário
	public $idComentario;
	//Data do comentário
	public $data;

	//Função para cadastrar o comentário
	public function cadastrar(){

		//Definindo a data
		$this->data = date('Y-m-d H:i:s');

		//Inserir a noticia no banco
		$database = new DataBase('comentarios');
		$this->id = $database->insert([
			'comentario' => $this->comentario,
			'idNoticia' => $this->idNoticia,
			'idUsuario' => $this->idUsuario,
			'idComentario' => $this->idComentario,
			'data' => $this->data,
		]);

		//Return sucesso
		return true;
	}

	//Método que retorna as notícias do banco
	public static function getComentarios($where = null, $order = null, $limit = null,$query = null){
		return (new DataBase('comentarios'))->select($where,$order,$limit,$query)->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	//Método que retorna notícia com o id
	public static function getNoticia($id){
		return (new DataBase('comentarios'))->select('id = '.$id)->fetchObject(self::class);
	}

	//Método de atualização de dados da notícia
	public function atualizar(){
		return (new DataBase('comentarios'))->update('id = '.$this->id,[
			'imagem' => $this->imagem,
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'ativo' => $this->ativo,
			'data' => $this->data,
		]);
	}

	//Método de exclusão de notícia
	public function excluir(){
		return (new DataBase('comentarios'))->delete('id = '.$this->id);
	}
}


 ?>