<?php
require_once 'converter.php';

class Database_connection
{
	function connect()
	{
		$env = new DotEnv(__DIR__."/../.env");
 		$env->load();
		$connect = new PDO( "mysql:host=".getenv('DATABASE_HOST')."; dbname=".getenv('DATABASE_NAME')."", getenv('DATABASE_USER'),getenv('DATABASE_PASSWORD'));
		return $connect;
	}
}


?>