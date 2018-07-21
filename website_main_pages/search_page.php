<?php
session_start();
include '../database/connect_database.php';
$media = '';
$subject = '';
$author = '';
$search = '';
$table = array();

$connection = new mysqli($servername,$database_username,$database_password,$database);

if (isset($_POST['search']) && (!empty($_POST['search']))){
   $search = get_post($connection,"search");
}
if (isset($_POST['media']) && (!empty($_POST['media']))){
   $media = get_post($connection,"media");
}
if (isset($_POST['subject']) && (!empty($_POST['subject']))){
   $subject = get_post($connection,"subject");
}
if (isset($_POST['author']) && (!empty($_POST['author']))){
   $author = get_post($connection,"author");
}
$sql = getSqlString($media,$subject,$author);
$result = $connection->query($sql);
$num_results = $result->num_rows;

if ($num_results > 0){
 while($row = $result->fetch_assoc()){
     $table[] = $row;
 }
}

function get_post($connection,$var){
  $_POST[$var] = trim($_POST[$var]);
  $_POST[$var] = stripslashes($_POST[$var]);
  $_POST[$var] = htmlspecialchars($_POST[$var]);
  return $connection->real_escape_string($_POST[$var]);
}

function getSqlString($media,$subject,$author){
   $select_command = "SELECT id, title, GROUP_CONCAT(DISTINCT author SEPARATOR ', ') AS author , " . 
        "GROUP_CONCAT(DISTINCT subject SEPARATOR ', ') AS subject, publish_date, media ";
   $from_command = "FROM search_resources ";
   $where_command = "WHERE title LIKE '%$search%' ";
   $group_command = "GROUP BY id ";
   
   if ($media != ''){
      $where_command .= "AND media='$media' ";
   }
   if ($subject != ''){
      $where_command .= "AND subject='$subject' ";
   }
   if ($author != ''){
      $where_command .= "AND author='$author' ";
   }
   $sql = $select_command . $from_command . $where_command . $group_command;
   return $sql;
}
$connection->close();
?>
<html>
	<head>
           <link rel="stylesheet" href="../../css/search_page.css">
	</head>
	<body>
		<?php include '../template/template.php';?>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="menu-header">
						<h4>Refine By</h4>
					</div>
				</div>
				<div class="sort-bar">
					<div class="col-sm-8">
						<p>Number of search results found: <?php echo $num_results;?></p>
					</div>		
              <?php                                  
				echo '<div class="col-sm-2">
				<div class="form-group">
					<label for="sort_list">Sort By:</label>
					<select class="form-control" id="sort_list">
						<option>Date-newest</option>
            <option>Date-oldest</option>
						<option>Title[A-Z]</option>
            <option>Title[Z-A]</option>
					</select>
				</div>
				</div>';
				?>				
				</div>
			</div>
	<?php
	if ($num_results > 0){
		echo '<div class="row">
		<div class="col-sm-2">
			<span class="text-left">
				<div class="form-group">
          <form action="search_page.php" method="post">
				  <label for="resource_type">Resource Type</label>
					<select id="resource_type" class="form-control" name="media" onchange="this.form.submit()"> 
              <option selected disabled hidden><--choose resource--></option>
              <option id="refine_book" value="book">Book</option>                                         
              <option id="refine_audio_book" value="audio book">Audio Book</option>
              <option id="refine_article" value="article">Article</option>
          </select>
          </form>
				  <br>
				</div>	
				<div class="form-group">
               <form action="search_page.php" method="post">
                       <label for="subject">Subject</label>
                       <select id="subject" class="form-control" name="subject" onchange="this.form.submit()">
                       <option selected disabled hidden><--choose subject--></option>
                       </select>
			          </form>
				</div><br>					
				<div class="form-group">
				  <form action="search_page.php" method="post">
               <label for=author">Author</label>                        
               <select id="author" class="form-control" name="author" onchange="this.form.submit()">
               <option selected disabled hidden><--choose author--></option>
               </select>
         </form>	
				</div><br>

				<div class="year_range">
					<label for="min_year" font-size="12px">From :</label>
                                        <br>
					<input size="4" maxlength="4" type="text" class="year_range" id="min_year" placeholder="year"></input>
                                        <br>
					<label for="max_year">To :</label>
                                        <br>
					<input size="4" maxlength="4" type="text" class="year_range" id="max_year" placeholder="year"></input>
				</div><br>										
			</span>
		</div>		
		<div class="col-sm-8">
			<div class="search_results">
				<div class="table-responsive">
					      <table id="table" class="table">
						<thead>
							<tr>
							   <th>Title</th>
						     <th>Author</th>
                 <th>Subject</th>
							   <th>Date Released</th>
							</tr>
						</thead>
						<tbody>';
						 for($i=0;$i<$num_results;$i++){
               $row_id = $i+1;
						   echo '<tr id='.$row_id.'>';
                     $link = 'resource.php?i='.$table[$i]['id'].'&m='.$table[$i]['media'];
						         echo '<td><a class="link_resources" href="'.$link.'">'. $table[$i]['title']. '</a></td>';
						         echo '<td>'. $table[$i]['author']. '</td>';
                     echo '<td>'. $table[$i]['subject']. '</td>';
						         echo '<td>'. $table[$i]['publish_date']. '</td>';
						   echo '</tr>';
						 }
						echo '</tbody>
					     </table>
            </form>
				</div>
			</div>
		</div>		
		<div class="col-sm-2">
			<div class="links">
				<h4>Need Help?</h4>
				<h5><a href="faq.php">FAQ</a></h5>
				<h5><a href="contact.php">Contact</a></h5>
			</div>
		</div>
		</div>';}
	?>
		</div>
    <script src="../../js/set_dropdown_lists.js"></script>
    <script src="../../js/sort.js"></script>
	</body>
</html>
