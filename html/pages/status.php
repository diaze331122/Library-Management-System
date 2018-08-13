<?php
 session_start();
 if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }
 include '../database/connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);
 $username = $_SESSION["username"];
 $status = '';
 $balance = 0;
 
 $sql = "SELECT due_date FROM resources_loaned WHERE username='$username'";
 $result = $connection->query($sql);
 
 if ($result->num_rows > 0){
 	while($row = $result->fetch_assoc()){
 	 	$due = date($row['due_date']);
 	 	$current = date('Y-m-d');
 		$difference = $due->diff($current);
 		$days = $difference->days;
 		if ($days > 0){
 			$balance += ($days * 0.02); //Rate is set as 2 cents per day
 		}
 	}
 }
 
 if ($balance > 0){
 	$sql = "SELECT username, fees_owed FROM fees WHERE username='$username'";
 	$result = $connection->query($sql);
 	$num_rows = $result->num_rows;
 	
 	if ($num_rows > 0){
 		$sql = "UPDATE fees SET fees_owed='$balance' WHERE username='$username'";
 		runQuery($connection,$sql);
 	}else{
 		$sql = "INSERT INTO fees(username,fees_owed) VALUES('$username','$balance')";
 		runQuery($connection,$sql);
 	}
 }
 //If account balance exceeds $10, set user status to inactive
 if ($balance >= 10){
 	$sql = "SELECT user_id FROM login WHERE username='$username'";
 	$user_id = '';
 	$result = $connection->query($sql);
 	if ($result->num_rows > 0){
 		while($row = $result->fetch_assoc()){
			 $user_id = $row['user_id'];
		}
	}	
	$sql = "UPDATE users SET status='inactive' WHERE user_id='$user_id'";
	runQuery($connection,$sql);
	$status = 'inactive';
 }else{
 	$status = 'active';
 }
 
 //Update account fees
 function runQuery($connection,$sql){
 	if ($connection->query($sql) === true){
 		echo "Balance successfully updated";
 	}else{
 		echo "Error: " . $sql . "<br>" . $connection->error;
 	}
 }
?>
<!DOCTYPE html>
<html>
<body>
  <?php include '../template/template.php';?>
  <div class="container">
  	<div class="row">
  		<div class="col-sm-2">
              <div id="account_nav">
                <div class="account_side_menu">
  	          		<li><a href="account_details.php">Account Details</a></li>
  	          		<li><a href="history.php">History</a></li>
  	          		<li><a href="materials_on_loan.php">Materials On Loan</a></li>
              		<li><a href="bookmark.php">Bookmarks</a></li>
              		<li><a href="status.php">Status</a></li>
  	          		<li><a href="help.php">Help / FAQ</a></li>
                </div> 
             </div>  		
  		</div>
  		<div class="col-sm-10">
  			<h2>Account Status</h2><br>
  			<h4>Current Status</h4>
  			<p>Your current status:<?php echo $status;?></p>
  			<h4>Fees</h4>
  			<p>Fees owed: $<?php echo $balance;?></p>
  		</div>
  	</div>
  </div>
</body>
</html>
