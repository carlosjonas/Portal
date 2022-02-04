<?php 

namespace App\Db;

use \PDO;

class Database{

	//Definindo as constantes de host,nome,usuário e senha do banco de dados
	const HOST = 'localhost';

	const NAME = 'portal';

	const USER = 'root';

	const PASSWORD = '';

	//Nome da tabela a ser manipulada
	private $table;

	//Instância de conexão com o banco de dados
	private $connection;

	//Define a conexão,tabela e instância
	public function __construct($table = null){
		$this->table = $table;
		$this->setConnection();
	}

	//Método que cria a conexão com o banco
	private function setConnection(){
		try{
			$this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASSWORD);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die('ERROR: '.$e->getMessage());
		}
	}
}


 ?>