<?php
 session_start();
 /*if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }*/
 include '../database/connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);

 $connection->close(); 
?>
<!DOCTYPE html>
<html>
<head>
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
            <h2>Materials On Loan</h2><br>
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Title</th>
		        <th>Author</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Time Remaining</th>
                        <th>Renew Time</th>
                     <tr>
                  </thead>
                  <tbody>
                   <tr>

                   </tr>
                  </tbody>
               </table>
            </div>
         </div>
     </div>
  </div>
</body>
</html>
