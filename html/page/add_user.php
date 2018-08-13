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
				<div class="add_user">
					<h2>Add User</h2>
					<form class="form-group" method="post" action="../database/register.php">
  						<div class="form-group">
  								<br>
  								<label for="first_name">First Name</label>
  								<input id="first_name" type="text" class="form-control" placeholder="first name" name="first_name" required></input>
  								<br>
  								<label for="last_name">Last Name</label>
  								<input id="last_name" type="text" class="form-control" placeholder="last name" name="last_name" required></input>
  								<br>
                                <label>Select type of user</label>
                                <br>      
                                <label class="radio-inline"><input type="radio" name="type" value="instructor">instructor</label>
                                <label class="radio-inline"><input type="radio" name="type" value="student">student</label>
  								<br><br>
  								<label for="email">Email</label>
  								<input id="email" type="email" class="form-control" placeholder="email" name="email" required></input>
  								<br>  								
  								<label for="phone">Phone Number xxx-xxx-xxxx</label>
  								<input id="phone" type="tel" class="form-control" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="phone number" name="phone" required></input>
  								<br>
  								<label for="street">Street Number and Name</label>
  								<input id="street" type="text" class="form-control" placeholder="street" name="street" required></input>
  								<br>
  								<label for="city">City</label>
  								<input id="city" type="text" class="form-control" placeholder="city" name="city" required></input>
  							  	<br>
  								<label for="province">Province</label>
  								<input id="province" type="text" class="form-control" placeholder="province" name="province" required></input>
  								<br>
  								<label for="postal">Postal Code</label>
  								<input id="postal" type="text" class="form-control" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" placeholder="postal code" name="postal" required></input>
  								<br>  								
  								<label for="username">Username</label>
  								<input id="username" type="text" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="username" name="username" required></input>
  								<br>
  								<label for="password">Password</label>
  								<input id="password" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="password" name="password" required></input>
  								<br>
  								<label for="retype_password">Re-type Password</label>  								
  								<input id="retype_password" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="re-type password" name="re-type_password" required></input>
  								<br> 								
  								<input id="register_button" type="submit" class="btn btn-default"></input>
  						</div>
  					</form>
				</div>				
			</div>
		</div>
	</div>
</body>
</html>