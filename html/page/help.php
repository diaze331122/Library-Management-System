<?php
 session_start();
 if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }
?>
<html>
  <head>
  <title>FAQ</title>
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
              		<li><a href="status.php">Status</a></li>                	
  	            	<li><a href="help.php">Help / FAQ</a></li>
                 </div>
              </div>
           </div>
           <div class="col-sm-6">
  		<h2>Help / FAQ </h2><br>
  		<form action="../database/send_email" method="post">
  			<div class="form-group">
  				<label for="title">Title</label>
  				<input id="text" type="text" class="form-control" name="title"></input><br>
  				<label for="email">Email</label>
  				<input id="email" type="email" class="form-control" name="email"></input><br>
  				<label for="description">Problem Description</label>
  				<textarea id="description" class="form-control input-lg" name="description"></textarea><br>
  				<button type="submit" class="btn btn-default">submit</button>
  			</div>
  		</form>
           </div>
  	   <div class="col-sm-4">
  		<br><br><h3>FAQ</h3><hr>
                <ul>
                   <li><a href="faq.php">Loan Extension</a></li>
                   <li><a href="faq.php">Username or password change</a></li>
                   <li><a href="faq.php">How to pay fees</a></li>
                   <li><a href="faq.php">Where to return</a></li>
                </ul>			
  	  </div>
       </div>
     </div>
  </body>
<html>