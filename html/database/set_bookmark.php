<?php
session_start();
include 'connect_database.php';

$connection = new mysqli($servername,$database_username,$database_password,$database);

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = test_input($_SESSION['username'],$connection);
$resource_id = test_input(intval($_GET['i']),$connection);

$sql = "INSERT INTO bookmark(username, resource_id) VALUES ('$username','$resource_id')";

if ($connection->query($sql) === true){
 echo "Bookmark added";
}else{
 echo "Could not add bookmark";
}

$connection->close();

function test_input($var,$connection){
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $connection->real_escape_string($var);
}

?>
