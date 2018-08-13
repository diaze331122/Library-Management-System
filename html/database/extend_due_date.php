<?php
 session_start();
 include 'connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);
 $username = $_SESSION['username'];
 $resource_id = test_input($_REQUEST["i"],$connection);
 $type = $_SESSION['user_type'];
 
 if ($type == 'student'){
   extendLoan(2,$connection,$username,$resource_id);
 }
 if ($type == 'instructor'){
   extendLoan(4,$connection,$username,$resource_id);
 }

//extend loan for resource by 2 weeks (14 days)
function extendLoan($max_loans,$connection,$username,$resource_id){  
	if ($times_renewed >= $max_loans){
		echo "Cannot extend loan further. Please return loan item to library by the due date";
	}else{
        $due_date;
	    $sql = "SELECT due_date FROM resources_loaned WHERE username='$username' AND resource_id='$resource_id'";
        $result = $connection->query($sql);               
        if ($result->num_rows == 1){
			while($row = $result->fetch_assoc()){
			   $due_date = $row['due_date'];
			}
            $new_due_date = date_add($due_date,date_interval_create_from_date_string("14 days"));
	        $sql = "UPDATE resources_loaned".
			  " SET times_renewed=times_renewed+1, due_date='$new_due_date'".
			  " WHERE username = '$username' AND resource_id='$resource_id'";
		    $connection->query($sql);
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