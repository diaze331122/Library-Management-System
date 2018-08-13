<?php
session_start();
include 'connect_database.php';

$connection = new mysqli($servername,$database_username,$database_password,$database);

if ($connection->connect_error){
 die($connection->connect_error);
}
$username=test_input($_POST["username"],$connection);
$password=test_input($_POST["password"],$connection);

$login_query = "SELECT user_id, username, password FROM login WHERE username='$username' and password='$password'";
$query_result = $connection->query($login_query);

if ($query_result->num_rows == 1){
 $_SESSION["username"] = $username;
 $_SESSION["login"] = "Ok";
 $id;
 $type;
 logBrowser($connection);
 while($row = $query_result->fetch_assoc()){
    $id = $row['user_id'];
 }
 $sql = "SELECT type FROM users WHERE user_id='$id'";
 $result = $connection->query($sql);

 while($row = $result->fetch_assoc()){
    $type = $row['type'];
 }
 $_SESSION["user_type"] = $type;
 
 if ($type == 'admin'){
    header('Location:../pages/dashboard.php');
 }else{
    header('Location:../pages/account_details.php');
 }
}else{
 header('Location:../pages/home.php');
}

//log browser info to database. Used for statistical purposes
function logBrowser($connection){
	$browser_name = '';

	if (strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){
		$browser_name = 'Safari';
	}
	else if (strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
		$browser_name = 'Chrome';
	}
	else if (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')){
		$browser_name = 'MSIE';
	}
	else if (strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
		$browser_name = 'Opera';
	}
	else if (strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){
		$browser_name = 'Firefox';
	}
	else if (strpos($_SERVER['HTTP_USER_AGENT'],'UC')){
		$browser_name = 'UC';
	}else{}
		
	//If browser is successfully detected (although accuracy is not guaranteed)
	if ($browser_name != ''){
		$sql = "UPDATE browsers SET num_users = num_users + 1 WHERE browser = '$browser_name'";
		$result = $connection->query($sql);
		if ($result === TRUE){
			echo "successfully execute database query";
		}else{
			echo "error updating database";	
		}
	}	
}
function test_input($var,$connection){
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $connection->real_escape_string($var);
}
$connection->close();
?>