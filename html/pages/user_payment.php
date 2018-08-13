<?php
session_start();
if ($_SESSION["user_type"] != 'admin'){
	header('Location:home.php');
}
?>
<!DOCTYPE html>
<html>
<body>
<?php include '../template/template.php';?>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
           		<div class="admin-nav">
           			<div class="admin_side_menu">           		
           			<li><a href="dashboard.php">Dashboard</a></li>
  	          		<li><a href="add_user.php">Add New User</a></li>
  	          		<li><a href="delete_user.php">Delete User Account</a></li>
                  	<li><a href="user_payment.php">User Payment</a></li>
  	          		<li><a href="reset_user_status.php">Reset User Status</a></li>
  	          		<li><a href="loan_resource.php">Loan Resource</a></li>
  	          		<li><a href="return_resource.php">Return Resource</a></li> 
  	          		</div>           			
           		</div>
			</div>
			<div class="col-sm-10">
				<div class="user_payment">
					<h2>User Payment</h2>
						<form class="form-group" id="username_form">
  							<div class="form-group">
  								<br>
  								<label for="username">Enter Username</label>
  								<br>
  								<input type="text" class="form-control" placeholder="username" name="username" required></input>
  								<br>
  								<input type="submit"></input>
  							</div>
  						</form>
  						<div class="balance">
  							Current balance:<br>
  							<label id="current_balance"></label>
  							<form class="form-group" id="payment_form" action="payment.php">
  								<div class="form-group">
  									<br>
  									Username:<input type="text" class="form-control" placeholder="username" name="username" required></input>
  									<br>
  									<label for="payment_input">Enter payment</label>
  									<br>
  									<input id="payment_input" type="number" class="form-control" placeholder="payment" name="payment" required></input>
  									<br>
  									<input type="submit"></input>
  								</div>
  							</form>
  						</div>
  						<label id="payment_response"></label>					
				</div>				
			</div>
		</div>
	</div>
	<script src="../js/user_payment.js"></script>
</body>
</html>
