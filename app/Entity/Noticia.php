<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Noticia{

	//Identificador da notícia
	public $id;
	//Imagem da notícia
	public $imagem;
	//Título da notícia
	public $titulo;
	//Descrição da notícia
	public $descricao;
	//Status da notícia
	public $ativo;
	//Data da notícia
	public $data;

	//Função para cadastrar a notícia
	public function cadastrar(){

		//Definindo a data
		$this->data = date('Y-m-d H:i:s');

		//Inserir a noticia no banco
		$database = new DataBase('noticias');
		$this->id = $database->insert([
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'ativo' => $this->ativo,
			'data' => $this->data,
		]);

		//Return sucesso
		return true;
	}

	//Método que retorna as notícias do banco
	public static function getNoticias($where = null, $order = null, $limit = null){
		return (new DataBase('noticias'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	//Método que retorna notícia com o id
	public static function getNoticia($id){
		return (new DataBase('noticias'))->select('id = '.$id)->fetchObject(self::class);
	}

	//Método de atualização de dados da notícia
	public function atualizar(){
		return (new DataBase('noticias'))->update('id = '.$this->id,[
			'titulo' => $this->titulo,
			'descricao' => $this->descricao,
			'ativo' => $this->ativo,
			'data' => $this->data,
		]);
	}

	//Método de exclusão de notícia
	public function excluir(){
		return (new DataBase('noticias'))->delete('id = '.$this->id);
	}
}


 ?>