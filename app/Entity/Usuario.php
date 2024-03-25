<?php 
	namespace App\Entity;

	use \App\Db\Database;
	use \PDO;

	date_default_timezone_set('America/Fortaleza');

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
				'senha' => password_hash($this->senha,PASSWORD_DEFAULT),
				'imagem' => $this->imagem,
				'tipo' => $this->tipo,
				'data' => $this->data,
			]);

			//Return sucesso
			return true;
		}

		//Método que retorna as notícias do banco
		public static function getUsuarios($where = null, $order = null, $limit = null,$query = null){
			return (new DataBase('usuarios'))->select($where,$order,$limit,$query)->fetchAll(PDO::FETCH_CLASS, self::class);
		}

		//Método que retorna usuário com o email
		public static function getUsuario($email){
			return (new DataBase('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
		}

		//Método que retorna notícia com o id
		public static function getUsuarioById($id){
			return (new DataBase('usuarios'))->select('id = '.$id)->fetchObject(self::class);
		}

		//Método de atualização de dados da notícia
		public function atualizar(){
			$respostaDados = (new DataBase('usuarios'))->update('id = '.$this->id,[
				'imagem' => $this->imagem,
				'nome' => $this->nome,
				'rg' => $this->rg,
				'cpf' => $this->cpf,
				'email' => $this->email,
			]);

			$repostaSenha = true;
			//Se tiver senha por parte do coordenador, atualiza ela depois
			//mudança para evitar um if na chave do update de cima que gera erro
			if(isset($this->senha)){
				$repostaSenha = (new DataBase('usuarios'))->update('id = '.$this->id,[
					'senha' => $this->senha,
				]);
			}

			if($repostaSenha == true && $respostaDados == true){
				return true;
			}
		}

		//Método de exclusão de notícia
		public function excluir(){
			return (new DataBase('usuarios'))->delete('id = '.$this->id);
		}
	}


 ?>