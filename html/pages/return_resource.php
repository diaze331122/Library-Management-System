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
					<h2>Return Resource</h2>
						<form class="form-group" id="return_resource" action="return_resource.php">
  							<div class="form-group">
  								<br>
                                <label>Select type of identifier</label>
                                <br>      
                                <label class="radio-inline"><input type="radio" name="resource_type" value="isbn">ISBN</label>
                                <label class="radio-inline"><input type="radio" name="resource_type" value="issn">ISSN</label>
  								<br><br>
  								Enter Identifier:<br>  								
  								<input id="identifier" type="text" class="form-control" placeholder="isbn or issn" name="identifier" required></input>
  								<br>
  								<input type="submit"></input>
  							</div>
  						</form>					
				</div>				
			</div>
		</div>
	</div>
</body>
</html>
