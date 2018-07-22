<?php
  $servername="localhost";
  $database_username="diaze_user";
  $database_password="3kU85JkqT85S21";
  $database="diaze_library";

  $connection = new mysqli($servername,$database_username,$database_password,$database);
	
  if ($connection->connect_error){
      die("Connection failed: " . mysqli_connect_error());
  }
  $connection->close();
?>
