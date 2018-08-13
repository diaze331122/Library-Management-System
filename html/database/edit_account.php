<?php
session_start();
/*User account updates are done using this file */
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);
if ($connection->connect_error){ die($connection->connect_error);}

$new_firstname = test_post($edit_fn,$connection);
$new_lastname = test_post($edit_ln,$connection);
$new_username = test_post($edit_un,$connection);
$new_password = test_post($edit_pwd,$connection);
$new_email = test_post($edit_email,$connection);
$new_phone = test_post($edit_phone,$connection);
$new_city = test_post($edit_city,$connection);
$new_province = test_post($edit_province,$connection);
$new_street = test_post($edit_street,$connection);
$new_postal = test_post($edit_postal,$connection);

$usr_id;

$id_sql = "SELECT user_id FROM login WHERE username='".$_SESSION['username']."'";
$result = $connection->query($id_sql);

if ($result->num_rows == 1){
    while($row = $result->fetch_assoc()){
       $usr_id = $row["user_id"];
   }
}else{
   header('Location:../pages/account_details.php');
}

if ($new_firstname != ''){
 $sql = "UPDATE users SET first_name = '$new_firstname' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection); 
}
if ($new_lastname != ''){
 $sql = "UPDATE users SET last_name = '$new_lastname' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}
if ($new_username != ''){
 $old_username = $_SESSION['username'];
 $sql = "START TRANSACTION;".
 		"UPDATE login SET username = '$new_username' WHERE username = '$old_username';".
 		"UPDATE bookmark SET username = '$new_username' WHERE username = '$old_username';".
 		"UPDATE current_loans SET username = '$new_username' WHERE username = '$old_username';".
 		"UPDATE fees SET username = '$new_username' WHERE username = '$old_username';".
		"UPDATE history SET username = '$new_username' WHERE username = '$old_username';".
 		"UPDATE resources_loaned SET username = '$new_username' WHERE username = '$old_username';".
 		"COMMIT";
 executeSQL($sql,$connection);
 $_SESSION["username"] = $new_username;
}
if ($new_password != ''){
 $sql = "UPDATE login SET password = '$new_password' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_email != ''){
 $sql = "UPDATE email SET email = '$new_email' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_phone != ''){
 $sql = "UPDATE phone SET phone = '$new_phone' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_city != ''){
 $sql = "UPDATE address SET city = '$new_city' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_province != ''){
 $sql = "UPDATE address SET province = '$new_province' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_street != ''){
 $sql = "UPDATE address SET street = '$new_street' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

if ($new_postal != ''){
 $sql = "UPDATE address SET postal_code = '$new_postal' WHERE user_id = '$usr_id'";
 executeSQL($sql,$connection);
}

$connection->close();
header('Location:../pages/account_details.php');

function executeSQL($sql,$connection){
  if ($connection->query($sql) === TRUE) {
    echo "table updated successfully";
  }else {
   echo "Error updating record: " . $connection->error;
  }
}

function test_post($var,$connection){
  $_POST[$var] = trim($_POST[$var]);
  $_POST[$var] = stripslashes($_POST[$var]);
  $_POST[$var] = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}

?>