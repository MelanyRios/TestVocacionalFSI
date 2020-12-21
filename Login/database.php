<?php  
	$server ='localhost';
	$username= 'root';
	$password = 'password';
	$database ='base1';
	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username,$password);
	}  catch(PODException $e){
		die('Conexión Fallida: '.$e->getMessage());
	}

?>