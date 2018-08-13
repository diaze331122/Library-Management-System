<?php
 session_start();
 include 'connect_database.php';

 $first_name = test_input($_POST["first_name"]);
 $last_name = test_input($_POST["last_name"]);
 $type = test_input($_POST["type"]);
 $street = test_input($_POST["street"]);
 $city = test_input($_POST["city"]);
 $province = test_input($_POST["province"]);
 $postal = test_input($_POST["postal"]);
 $phone= test_input($_POST["phone"]);
 $email = test_input($_POST["email"]);
 $username = test_input($_POST["username"]);
 $password = test_input($_POST["password"]);
 $retype_password = test_input($_POST["re-type_password"]);

 $connection = new mysqli($servername,$database_username,$database_password,$database);

 if ($connection->connect_error){
    die($connection->connect_error);
 }

//check if username and password exixsts in database
 if (checkIfUsernameExists($connection,$username) || checkIfPasswordExists($connection,$password)){
   exit("Username or password already in use");
 }
 
 if ($password != $retype_password){
   exit("Password and retype password must match");
 }
 //hash and salt password
 $password = hash('ripemd128','#Y6^g4'.$password.'**59jZM%');
 $sql = get_query($first_name,$last_name,$type,$street,$city,$province,$postal,$phone,$email,$username,$password);
 
 if ($connection->query($sql) === TRUE){
   $_SESSION["username"] = $username;
   $_SESSION["login"] = "Ok";
   header('Location:../pages/account_details.php');
 }

 $connection->close();

function checkIfUsernameExists($connection,$username){
 $sql = "SELECT username FROM login WHERE username='$username'";
 $result = $connection->query($sql);
 
 if ($result->num_rows > 0){
   return true;
 }
 return false;
}

function checkIfPasswordExists($connection,$password){
 $sql = "SELECT password FROM login WHERE password='$password'";
 $result = $connection->query($sql);
 
 if ($result->num_rows > 0){
   return true;
 }
 return false;
}

function get_query($first_name,$last_name,$type,$street,$city,$province,$postal,$phone,$email,$username,$password){
$sql = "START TRANSACTION;".
       "INSERT INTO register_user(first_name,last_name,type) VALUES ('$first_name','$last_name','$type');".
       "INSERT INTO register_user(phone) VALUES ('$phone');".
       "INSERT INTO register_user(username,password) VALUES ('$username','$password');".
       "INSERT INTO register_user(email) VALUES ('$email');".
       "INSERT INTO register_user(street, city, province, postal_code) VALUES ('$street','$city','$province','$postal_code');".
       "COMMIT";
 return $sql;
}

function test_input($var){
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $connection->real_escape_string($var);
}
?>