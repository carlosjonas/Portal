<?php 

namespace App\Db;

use \PDO;
use \PDOException;

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

	//Método que executa query no banco
	public function execute($query,$params = []){
		try{
			$statement = $this->connection->prepare($query);
			$statement->execute($params);
			return $statement;
		}catch(PDOException $e){
			die('ERROR: '.$e->getMessage());
		}
	}

	//Método que insere dados
	public function insert($values){
		//Dados da query
		$fields = array_keys($values);
		$binds = array_pad([],count($fields),'?');
		//Monta a query
		$query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

		//Executa o insert
		$this->execute($query,array_values($values));

		//Retorna o id inserido
		return $this->connection->lastInsertId();
	}

	//Método que faz consulta no banco
	public function select($where = null, $order = null, $limit = null){
		//Dados da query
		$where = strlen($where) ? ' WHERE '.$where : '';
		$order = strlen($order) ? ' ORDER BY '.$order : '';
		$limit = strlen($limit) ? ' LIMIT '.$limit : '';

		//Monta a query
		$query = 'SELECT * FROM '.$this->table.''.$where.''.$order.''.$limit;

		//Executa
		return $this->execute($query);
	}

	// Método que atualiza os dados no banco
	public function update($where,$values){
		//Dados da query
		$fields = array_keys($values);

		//Monta a query
		$query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

		//Executa a query
		$this->execute($query,array_values($values));

		//Retorno
		return true;
	}

	//Método que deleta os dados do banco
	public function delete($where){

		//Monta a query
		$query = 'DELETE FROM '.$this->table.' WHERE '.$where;

		//Executa a query
		$this->execute($query);

		//Retorno
		return true;
	}


}


 ?>