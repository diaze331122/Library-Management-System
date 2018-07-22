<?php
session_start();
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);
if ($connection->connect_error) die($connection->connect_error);

$username=test_input($_POST["username"],$connection);
$password=test_input($_POST["password"],$connection);

$login_query = "SELECT username, password FROM login WHERE username='$username' and password='$password'";

$query_result = $connection->query($login_query);

if ($query_result->num_rows == 1){
 $_SESSION["username"] = $username;
 $_SESSION["login"] = "Ok";
 header('Location:../website_main_pages/account_details.php');
}else{
 header('Location:../website_main_pages/home.php');
}

function test_input($var,$connection){
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $connection->real_escape_string($var);
}

$connection->close();
?>
