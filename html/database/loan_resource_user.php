<?php
session_start();
include 'connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);

if ($connection->connect_error){
 die($connection->connect_error);
}

$username = test_input('username',$connection);
$resource_type = test_input('resource_type',$connection);
$identifier = test_input('identifier',$connection);

$resource_id = getResourceId($identifier,$connection);
$subject_id = getSubjectId($resource_id,$connection);
$loan_date = date("Y-m-d");
$due_date = new DateTime($loan_date);

date_add($due_date, date_interval_create_from_date_string('14 days'));

addResourceToUserLoans($connection,$username,$resource_id,$loan_date,$due_date);
updateResourceAvailability($resource_id,$connection);
updateSubjectStat($connection,$subject_id);

function get_post($connection,$var){
  $_POST[$var] = trim($_POST[$var]);
  $_POST[$var] = stripslashes($_POST[$var]);
  $_POST[$var] = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}

function getResourceId($identifier,$connection){
	$sql = "SELECT resource_id FROM '$resource_type' WHERE '$resource_type'='$identifier'";
	$result = $connection->query($sql);
	$id;
	
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id = $row['resource_id'];
		}
	}
	return $id;
}

//add resource to user current loans
function addResourceToUserLoans($connection,$username,$resource_id,$loan_date,$due_date){
	$sql = "INSERT INTO resource_loaned(username,resource_id,loan_date,due_date)".
		" VALUES ('$username','$resource_id','$loan_date','$due_date')";
	$result = $connection->query($sql);
	
	if ($result === TRUE){
		echo "New record created";
	}
}

//update resource availability
function updateResourceAvailability($id,$connection){
	$sql = "UPDATE resource_status SET status='unavailable' WHERE resource_id='$id'";
	$result = $connection->query($sql);
	if ($result === TRUE){
		echo "Successful resource update";
	}
}

//get the subject of resource loaned
function getSubjectId($resource_id,$connection,){
$subject_id = 0;
$sql = "SELECT subject_id FROM resource_subject WHERE resource_id = '$resource_id'";
$result = $connection->query($sql);
   if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
         $subject_id = $row['subject_id'];
      }
   }
  return $subject_id;
}

//update subject loan statistic
function updateSubjectStat($connection,$id){
  $sql = "UPDATE subject_stats SET num_borrowed += 1 WHERE subject_id = '$id'";
  $result = $connection->query($sql);
  
  if ($result === TRUE){
     echo "Successful stat update";
  }
}
$connection->close();
?>