<?php
require_once('../models/core.model.php');

// Define as variáveis de conexão.
$USERNAME = "root";
$PASSWORD = "123456";
$DBNAME = "picapp";
$HOST = "localhost";

// Cria objeto appCore
$core = new appCore($USERNAME, $PASSWORD, $DBNAME, $HOST);

// Conecta ao banco
if ($core) 
{
	// Variável global para conexão
	$conn = $core->getConn();
}
else
{
	echo "Erro ao conectar";
}

?>