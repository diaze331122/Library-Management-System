<?php
session_start();
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);
if ($connection->connect_error){
	die($connection->connect_error);
}

$username = test_input('username',$connection);
$payment = test_input('payment',$connection);

$sql = "UPDATE fees SET fees_owed = fees_owed - '$payment' WHERE username='$username'";
$result = $connection->query($sql);

if ($result === TRUE){
	$sql = "SELECT fees_owed FROM fees WHERE username='$username'";
	$result = $connection->query($sql);
	$current_balance = 0;
	
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$current_balance = $row['fees_owed'];
		}
	}
	echo '<label id="payment_reponse">'."Transaction Successful. Current balance: ".$current_balance.'</label>';
}else{
	echo '<label id="payment_reponse">'."Transaction unsuccessful".'</label>';
}

function test_input($var,$connection){
  $var = trim($_POST[$var]);
  $var = stripslashes($_POST[$var]);
  $var = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}
$connection->close();
?>