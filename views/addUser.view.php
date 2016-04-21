<?php
require_once('../models/exceptions.model.php');
require_once('../models/core.model.php');
require_once('../models/users.model.php');

require_once('../views/conecta.view.php');

$user = new appUsers();

$username = $_POST['username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$passwd = $_POST['password'];
$oauth = $_POST['oauth'];

if($user->addUser($username, $firstName, $lastName, $email, $passwd, $oauth, $conn)){
	echo "Usuário cadastrado";
}else{
	echo "Erro ao cadastrar";
}

?>