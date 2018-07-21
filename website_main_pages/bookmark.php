<?php
 session_start();
 if (!isset($_SESSION['username'])){
    header("Location:home.php");
 }
 include '../database/connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);

 if (isset($_POST['delete']) && isset($_POST['id'])){
    for ($i=0;$i<count($_POST['id']);$i++){
       $id = get_post($connection,$_POST['id'][$i]);
       $delete_query = "DELETE FROM bookmark WHERE resource_id = '$id' AND username ='".$_SESSION['username']."' ".;
       $result = $connection->query($delete_query);
       if (!$result) echo "DELETE failed: $query<br>" .
          $connection->error . "<br><br>";
    }
 }

 $table = array();
 $sql = "SELECT s.id, s.title, GROUP_CONCAT(DISTINCT s.author SEPARATOR ', ')". 
        "as author, GROUP_CONCAT(DISTINCT s.subject SEPARATOR ', ') as subject, s.publish_date, s.media ".
        "FROM search_resources as s INNER JOIN bookmark as b ".
        "ON b.resource_id = s.id ".
        "WHERE b.username = '".$_SESSION['username']."' ".
        "GROUP BY id";

 $result = $connection->query($sql);
 $num_results = $result->num_rows;

 if ($num_results > 0){
    while($row = $result->fetch_assoc()){ 
       $table[] = $row;
    }
 }    
 $connection->close(); 
?>
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
            <h2>Bookmarks</h2><br>
            <form action="bookmark.php" method="post">
            <input type="hidden" name="delete" value="yes">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Title</th>
		        <th>Author</th>
                        <th>Subject</th>
			<th>Date Released</th>
                        <th>Remove<input type="checkbox" id="check_all_header"></th>
                     <tr>
                  </thead>
                  <tbody>
                     <?php
                         for($i=0;$i<$num_results;$i++){
                            $row_id = $i+1;
	                    echo '<tr id='.$row_id.'>';
                            $link = 'resource.php?i='.$table[$i]['id'].'&m='.$table[$i]['media'];
                            echo '<td><a class="link_resources" href="'.$link.'">'. $table[$i]['title']. '</a></td>';
			    echo '<td>'. $table[$i]['author']. '</td>';
                            echo '<td>'. $table[$i]['subject']. '</td>';
			    echo '<td>'. $table[$i]['publish_date']. '</td>';
                            echo '<td><input type="checkbox" name="id[]" value="'.$table[$i]['id'].'"></td>';
			    echo '</tr>';
                         }
                    ?>
                  </tbody>
               </table>
               <input type="submit" value="Delete"></input>
            </form>
            </div>
         </div>
     </div>
  </div>
  <script src="../../js/checkboxes.js"></script>
</body>
</html>
