<?php

$servername="localhost";
$username="root";
$password="";
$dbname="cmpsc116_CRUDDB";

//create connection
$conn = mysqli_connect($severname, $username, $password, $dbname);

//check connection
if(!$conn){
	die("Connection failed: ",mysqli_connect_error());
}

	echo "Connected successfully";
?>