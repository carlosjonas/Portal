<?php 

namespace App\Entity;

use \App\Db\Database;

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
		$database = new DataBase('portal');
		echo "<pre>"; print_r($database); echo "</pre>"; exit;

		//Colocar o id da noticia na instância

		//Return sucesso
	}
}


 ?>