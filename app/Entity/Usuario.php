<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

	//Identificador da notícia
	public $id;
	//Nome do usuário
	public $nome;
    //Email do usuário
	public $email;
    //Rg do usuário
	public $rg;
    //Cpf do usuário
	public $cpf;
    //Senha do usuário
	public $senha;
    //Imagem do usuário
	public $imagem;
	//Tipo de usuário
	public $tipo;
	//Data de cadastro do usuário
	public $data;

	//Função para cadastrar o usuário
	public function cadastrar(){

		//Definindo a data
		$this->data = date('Y-m-d H:i:s');

		//Inserir o usuário no banco
		$database = new DataBase('usuarios');
		$this->id = $database->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
			'imagem' => $this->imagem,
			'tipo' => $this->tipo,
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
			'imagem' => $this->imagem,
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