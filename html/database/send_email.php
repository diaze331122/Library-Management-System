<?php
session_start();
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);

if ($connection->connect_error){
	die($connection->connect_error);
}

if (isset($_POST['email']) && isset($_POST['title']) && isset($_POST['description'])){
	$title = test_input('title',$connection);
	$email = test_input('email',$connection);
	$description = test_input('description',$connection);	
	
$headers = 'From: '.$email.'\r\n';
$to = '';
mail($to,$title,$description,$headers);
}

$connection->close();

function test_input($var,$connection){
  $var = trim($_POST[$var]);
  $var = stripslashes($_POST[$var]);
  $var = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}
?>