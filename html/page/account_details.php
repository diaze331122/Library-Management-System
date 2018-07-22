<?php
 session_start();
 if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Account Details</title>
</head>
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
  	          <li><a href="help.php">Help / FAQ</a></li>
                </div> 
             </div>
           </div>
           <div class="col-sm-10">
  	      <div class="account_details_container">
  		<h2>Account Details</h2>
  		<h3>Security Access</h3>
  		<ul>
  			<li>Email <a id="edit_email" href="#edit-sform">&nbsp;[edit]</a></li>
  			<li>Username <a id="edit_username" href="#edit-sform">&nbsp;[edit]</a></li>
  			<li>Password <a id="edit_password" href="#edit-sform">&nbsp;[edit]</a></li>
  		</ul>
                <form id="edit_email_form" style="display: none" method="post" action="../database/edit_account.php">
                  Email: <input id="edit_email" type="email" class="form-control" placeholder="type new email" name="edit_email"></input><br>
                         <input type="submit" value="submit"></input>
                </form>

                <form id="edit_login_form" style="display: none" method="post" action="../database/edit_account.php">
                  Username: <input id="edit_username" type="text" class="form-control" placeholder="type new username" name="edit_un"></input><br>
                  Password: <input id="edit_password" type="text" class="form-control" placeholder="type new password" name="edit_pwd"></input><br>
                            <input type="submit" value="submit"></input> 
                </form>               
  		<hr>
  		<h3>Personal Information</h3>
  		<ul>
  		  	<li>First Name <a id="edit_fn" href="#edit-pform">&nbsp;[edit]</a></li>
  		  	<li>Last Name <a id="edit_ln" href="#edit-pform">&nbsp;[edit]</a></li>
  		  	<li>Address <a id="edit_address" href="#edit-pform">&nbsp;[edit]</a></li>
  		  	<li>Phone # <a id="edit_phone" href="#edit-pform">&nbsp;[edit]</a></li>
  		</ul>
	        <form id="edit_name_form" style="display: none" method="post" action="../database/edit_account.php">
	           First name: <input id="edit_firstname" type="name" class="form-control" placeholder="type new first name..." name="edit_fn"></input><br>
                   Last name: <input id="edit_lastname" type="name" class="form-control" placeholder="type new last name..." name="edit_ln"></input><br>
                   <input type="submit" value="submit"></input>
	        </form>

	        <form id="edit_address_form" style="display: none" method="post" action="../database/edit_account.php">
	           Street: <input id="edit_street" type="name" class="form-control" placeholder="type new street number and name..." name="edit_street"></input>
                   City: <input id="edit_city type="name" class="form-control" placeholder="type new city" name="edit_city"></input>
                   Province: <input id="edit_province" type="name" class="form-control" placeholder="type new province" name="edit_province"></input>
                   Postal Code: <input id="edit_postal" type="text" class="form-control" placeholder="type new postal code" name="edit_postal"></input>
                   <input type="submit" value="submit"></input>
	        </form>
	        <form id="edit_phone_form" style="display: none" method="post" action="../database/edit_account.php">
	           Phone: <input id="edit_phone type="text" class="form-control" placeholder="type new phone number..." name="edit_phone"></input><br>
                   <input type="submit" value="submit"></input>
	        </form>
          </div>
  	</div>
     </div>
  <script src="../../js/account_details.js"></script>
  </body>
<html>
