<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db 	= "Twitter";

$connection = new mysqli ($host, $user, $pass, $db);

if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}

?>
