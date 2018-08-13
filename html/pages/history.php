<?php
 session_start();
 if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }
 include '../database/connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);
 $username = $_SESSION['username'];
 $table = array();
 $num_results;
 
 $sql = "SELECT r.resource_id, r.title, t.resource_type, h.loan_date, h.return_date ".
			"FROM resource r ".
			"INNER JOIN history h ".
			"ON r.resource_id = h.resource_id ".
			"INNER JOIN resource_type t ".
			"ON r.resource_id = t.resource_id ".
			"WHERE h.username = '$username'";

 $result = $connection->query($sql);
 $num_results = $result->num_rows;
	
 if ($num_results > 0){
	while($row = $result->fetch_assoc()){
		$table[] = $row;
	}
 } 
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
              		<li><a href="status.php">Status</a></li>
  	          		<li><a href="help.php">Help / FAQ</a></li>
                </div> 
             </div>
           </div>
         <div class="col-sm-10">
            <h2>History</h2><br>
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Title</th>
		        <th>Date Loaned</th>
                        <th>Date Returned</th>
                     <tr>
                  </thead>
                  <tbody>
                    <?php
                      for($i=0;$i<$num_results;$i++){
	                 $row_id = $i+1;
	                 echo '<tr id='.$row_id.'>';
                         $link = 'resource.php?i='.$table[$i]['resource_id'].'&m='.$table[$i]['resource_type'];
	                 echo '<td><a class="link_resources" href="'.$link.'">'. $table[$i]['title']. '</a></td>';
	                 echo '<td>'. $table[$i]['loan_date']. '</td>';
                         echo '<td>'. $table[$i]['return_date']. '</td>';
	                 echo '</tr>';
                     }
                   ?>             
                  </tbody>
               </table>
            </div>
         </div>
     </div>
  </div>
</body>
</html>
