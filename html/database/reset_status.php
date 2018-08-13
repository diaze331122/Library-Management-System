<?php
session_start();
include 'connect_database.php';

$connection = new mysqli($servername,$database_username,$database_password,$database);
if ($connection->connect_error){
 die($connection->connect_error);
}

$username = $_POST['username'];
$sql = "UPDATE users as u ".
	   "INNER JOIN login as l ".
	   "ON u.user_id = l.user_id ".
	   "SET u.status = 'active' ".
	   "WHERE l.username = '$username'";

$result = $connection->query($sql);

if ($result === TRUE){
	echo "Update successful";
}else{
	echo "Update unsuccessful";
}
$connection->close();
?>