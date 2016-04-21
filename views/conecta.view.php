<?php
require_once('../models/core.model.php');

// Define as variáveis de conexão.
$USERNAME = "leafsbys_root";
$PASSWORD = "picapp2016";
$DBNAME = "leafsbys_picapp";
$HOST = "localhost:3306";

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