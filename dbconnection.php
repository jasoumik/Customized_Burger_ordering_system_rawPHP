<?php
	
	require("config.php");

	// Create connection
	$sqlconnection = new mysqli($servername, $username, $password,$dbname);
	$connect = new PDO("mysql:host=localhost;dbname=food_order","root","");
	// Check connection
	if ($sqlconnection->connect_error) {
    	die("Connection failed: " . $sqlconnection->connect_error);
	}
	
?>