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

	//Método que retorna os comentários do banco
	public static function getComentarios($where = null, $order = null, $limit = null,$query = null){
		return (new DataBase('comentarios'))->select($where,$order,$limit,$query)->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	//Método que retorna comentário com o id
	public static function getComentario($id){
		return (new DataBase('comentarios'))->select('id = '.$id)->fetchObject(self::class);
	}

	//Método de atualização de dados da comentário
	public function atualizar($id,$comentario){
		return (new DataBase('comentarios'))->update('id = '.$id,[
			'comentario' => $comentario
		]);
	}

	//Método de exclusão de comentário
	public function excluir($id){
		return (new DataBase('comentarios'))->delete('id = '.$id);
	}
}


 ?>