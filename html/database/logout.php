<?php
 session_start();
 include 'connect_database.php';

 $connection = new mysqli($servername,$database_username,$database_password,$database);

 if ($connection->connect_error){
  die($connection->connect_error);
 }
 $time = $_SESSION["login_time"]->diff(new DateTime(date('y-m-d h:m:s')));
 $hours = $time->h;
 
 if ($hours >= 24){
 	$hours = 24;
 }
 
 $sql = "UPDATE time_stat SET num_users = num_users+1 WHERE hours = '$hours'";
 $result = $connection->query($sql);
 	if ($result === TRUE){
		echo "successfully execute database query";
	}else{
		echo "error updating database";	
	}
 session_destroy();
 header("Location:../pages/home.php");
?>