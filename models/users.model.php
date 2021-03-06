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

 	function passwdCrypt($passwd)
 	{
 		$passwd = md5($passwd);
 		return $passwd;
 	}

 	// Cadastra usuário no banco
 	function addUser($username, $firstName, $lastName, $email, $passwd, $oauth, $conn)
 	{	
 		try{
 			// Criptografa senha para md5
 			$passwd = $this->passwdCrypt($passwd);
 			// Cria sql
	 		$sql = "INSERT INTO app_conta
	 		(conta_firstname, conta_lastname, conta_username, conta_email, conta_password, conta_oauth) 
	 		VALUES ('$firstName', '$lastName', '$username',  '$email', '$passwd', '$oauth');";

	 		// Insere no banco 
	 		if($this->inputSql($sql,$conn))
	 		{	
	 			return true;
	 		}
 		}
 		catch(PicAppError $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
 			
 	}

 	// Autentica usuario
 	function userAuth($username, $passwd, $conn)
 	{
		try{
			// Criptografa senha para md5
 			$passwd = $this->passwdCrypt($passwd);

			// Cria Sql
			$sql = 'SELECT COUNT(*) FROM app_conta WHERE conta_username = ' . $conn->quote($username) .' AND conta_password =' .$conn->quote($passwd);

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
		try
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
		catch(PicAppError $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
	}

	// Desloga usuário, quebra sessao
	function userLogout()
	{
		try
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
		catch(PicAppError $e)
 		{
 			echo 'ERROR: ' . $e->getMessage();
 		}
	}


 }
?>