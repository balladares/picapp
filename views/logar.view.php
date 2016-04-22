<?php
require_once('../models/exceptions.model.php');
require_once('../models/core.model.php');
require_once('../models/users.model.php');
require_once('../views/conecta.view.php');
session_start();

// Cria variaveis vindas do form
$username = $_POST['username'];
$passwd = $_POST['password'];

// Cria objeto
$appUser = new appUsers();

// Autentica o usuario vindo do formulario
if($auth = $appUser->userAuth($username, $passwd, $conn))
{
	// Cria variáveis de sessão
	$_SESSION["id"] = $appUser->getId();
	$_SESSION["username"] = $appUser->getUserName();
	$_SESSION["firstName"] = $appUser->getFirstName();
	$_SESSION["lastName"] = $appUser->getLastName();
	$_SESSION["passwd"] = $appUser->getPasswd();
	$_SESSION["email"] = $appUser->getEmail();
	$_SESSION["formated_name"] = "{$appUser->getFirstName()} {$appUser->getLastName()}";

	// Exibe retorno
	echo "<p>Logando...</p><script>location.href='index.php';</script>";
}
else
{
	echo "<p>Dados incorretos :(</p>";
}


?>