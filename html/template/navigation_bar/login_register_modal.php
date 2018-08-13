<html>
	<head>
		<link rel="stylesheet" href="../../css/modal.css">
	</head>
	<body>
  	<div id="form-modal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h3>Log In or Sign Up</h3>
  				</div>
  				<div class="modal-body">
  					<ul class="nav nav-tabs">
  						<li class="active"><a data-toggle="tab" href="#login-content">Login</a></li>
  						<li><a data-toggle="tab" href="#register-content">Registration</a></li>
  					</ul>  	
  					<div class="tab-content">
  						<div id="login-content" class="tab-pane active in">
  							<form id="login-form" class="form-group" method="post" action="../database/login.php">
  								<br>
  								<label for="username">Username</label>
  								<br>
  								<input id="username" type="text" class="form-control" placeholder="Username" name="username" required></input>
  								<br>
  								<label for="password">Password</label>
  								<br>
  								<input id="password" type="text" class="form-control" placeholder="Password" name="password" required></input>
  								<br>
  								<input id="login_button" type="submit" class="btn btn-default"></input>
  							</form>
  						</div>
  						<div id="register-content" class="tab-pane fade">
  							<form id="registration-form" class="form-group" method="post" action="../database/register.php">
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
  								<label for="phone">Phone Number</label>
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
  								<input id="password" type="text" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="password" name="password" required></input>
  								<br>
  								<label for="retype_password">Re-type Password</label>  								
  								<input id="retype_password" type="text" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="re-type password" name="re-type_password" required></input>
  								<br> 								
  								<input id="register_button" type="submit" class="btn btn-default"></input>
  							</form>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>	
	</body>
</html>