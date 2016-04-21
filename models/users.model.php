<?php
 /**
 * PicApp 2016
 * Users class
 * Funções para manipulação dos usuários
 * Gabriel Balladares
 */
 class appUsers extends appCore		
 {
 	// Instancia variáveis de conexão
 	protected $id;
 	protected $username;
 	protected $firstName;
 	protected $lastName;
 	protected $email;
 	protected $passwd;

 	// Gets
	function getId()
	{
		return $this->id;
	}

	function getUserName()
	{
		return $this->username;
	}

	function getFirstName()
	{
		return $this->firstName;
	}

	function getLastName()
	{
		return $this->lastName;
	}

	function getPasswd()
	{
		return $this->passwd;
	}

	function getEmail()
	{
		return $this->email;
	}


 	// Metódo construtor
 	function __construct()
 	{
 		
 	}

 	// Cadastra usuário no banco
 	function addUser($username, $firstName, $lastName, $email, $passwd, $oauth, $conn)
 	{	
 		// Cria sql
 		$sql = "INSERT INTO app_users
 		(username, firstName, lastName, email, password, oauth) 
 		VALUES ('$username', '$firstName', '$lastName', '$email', '$passwd', '$oauth');";

 		// Insere no banco 
 		if($this->inputSql($sql,$conn))
 		{	
 			return true;
 		}
 	}

 	// Autentica usuario
 	function userAuth($username, $passwd, $conn)
 	{
		try{
			// Cria Sql
			$sql = 'SELECT COUNT(*) FROM swe_users WHERE username = ' . $conn->quote($username) .' AND password =' .$conn->quote($passwd);

			// Verifica quantidade de dados achados no banco
  			$userQntd = $this->countSql($sql,$conn);

  			// Verifica se encontrou
  			if ($userQntd >= 1) 
  			{
  				// Seleciona usuario encontrado
  				$selectData = $this->outputSql($sql, $conn);

		    		while ($selectData) 
		    		{
			    		$this->id = $selectData['id'];
			    		$this->username = $selectData['username'];
			    		$this->firstName = $selectData['firstName'];
			    		$this->lastName = $selectData['lastName'];
			    		$this->passwd = $selectData['password'];
			    		$this->email = $selectData['email'];
					}

				// Retorna true se usuario foi autenticado	
  				return true;
  			}
  			else
  			{	
  				// Retorna false se não autenticado
  				return false;
  			}		
		}
		catch(PDOException $e)
		{
    			echo 'ERROR: ' . $e->getMessage();
		}
	}

	// Verifica se usuario esta logado
	function userVerify()
	{
		// Verifica se sessao está aberta 
		if (isset($_SESSION["id"]))
		{
			// True se usuario ta logado
			return true;
		}
		else
		{
			// False usuario deslogado
			return false;
		}
	}

	// Desloga usuário, quebra sessao
	function userLogout()
	{
		if($this->userVerify())
		{
			// Destrói sessão
			session_destroy();

			// Retorna true se deslogado
			return true;
		}
		else
		{
			// Retorna false se nao deslogou
			return false;
		}
	}


 }
?>