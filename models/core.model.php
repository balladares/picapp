<?php
 /**
 * PicApp 2016
 * Core Class
 * Funções báscias para serem chamadas sempre que preciso na aplicação
 * Gabriel Balladares
 */
 class appCore			
 {
 	// Instancia variáveis de conexão
 	public $userDb;
 	public $passwdDb;
 	public $nameDb;
 	public $hostDb;
 	private $conn;

 	// Metódo construtor
 	function __construct($userDb, $passwdDb, $nameDb, $hostDb)
 	{
 		$this->userDb = $userDb;
 		$this->passwdDb = $passwdDb;
 		$this->nameDb = $nameDb;
 		$this->hostDb = $hostDb;

 		$this->connect();
 	}

 	// Retorna objeto de conexão PDO
 	function getConn()
 	{
 		return $this->conn;
 	}

 	// Metódo de conexão ao banco
 	private function connect()
 	{
 		try
 		{
 			// Abre conexão PDO
 			$conn = new PDO("mysql:host={$this->hostDb};dbname={$this->nameDb}", $this->userDb, $this->passwdDb);
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    		// Seta conexão
    		$this->conn = $conn;

    		// Se conectou retorna TRUE
    		return true;
 		}
 		catch(PDOexception $e) 
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
 	}

 	// Método para requisições SQL sem retorno
 	function inputSql($sql, $conn)
 	{
 		try
 		{
 			// Executa sql
 			$data = $conn->exec($sql);

 			// Se sim retorna true
	 		if ($data) 
	 		{
	 			return true;
	 		}
	 		else
	 		{
	 			return false;
	 		}
 		}
 		catch(PDOexception $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
 	}

 	// Método para contagem de linhas de uma tabela
 	function countSql($sql, $conn)
 	{
 		try
 		{	
 			// Executa sql
 		 	$data = $conn->query($sql);
 		 	// Pega total retornado
  			$Qntd = $data->fetchColumn();

  			return $Qntd;
 		}
 		catch(PDOexception $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
 	}

 	// Método para requisições SQL com retorno
 	function outputSql($sql, $conn)
 	{
 		try
 		{
 			// Executa sql
 			$selectData = $conn->query($sql);
 			// Cria array com o retorno do banco
			$row = $selectData->fetch(PDO::FETCH_ASSOC);
			
			return $row;
 		}
 		catch(PDOexception $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
 	}


 }
?>