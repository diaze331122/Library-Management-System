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
				<div class="delete_user">
					<h2>Delete User Account</h2>
						<form class="form-group" id="delete_user_form" action="delete_user_account.php">
  							<div class="form-group">
  								<br>
  								<label for="username">Enter Username</label>
  								<input type="text" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="username" name="username" required></input>
  								<input type="submit"></input>
  							</div>
  						</form>					
				</div>				
			</div>
		</div>
	</div>
</body>
</html>