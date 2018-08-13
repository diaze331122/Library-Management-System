<?php
session_start();
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);
if ($connection->connect_error){
	die($connection->connect_error);
}

$username = test_input('username',$connection);
$sql = "SELECT fees_owed FROM fees where username='$username'";
$result = $connection->query($sql);
$balance = 0;

if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$balance = $row['fees_owed'];
	}
}
echo $balance;

function test_input($var,$connection){
  $var = trim($_POST[$var]);
  $var = stripslashes($_POST[$var]);
  $var = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}
$connection->close();
?>