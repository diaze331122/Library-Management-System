<?php
//Does not allow access unless user logged in is an admin
session_start();
if ($_SESSION["user_type"] != 'admin'){
	header('Location:home.php');
}
include '../database/connect_database.php';
$connection = new mysqli($servername,$database_username,$database_password,$database);
$sql = "SELECT browser, num_users FROM browsers";
$result = $connection->query($sql);  
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['browser','users'],
			<?php
				if ($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "['".$row['browser']."', ".$row['num_users']."],";
					}
				}
			?>
		]);

			var options = { title: 'User Browser'}; 
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		}
	</script>
</head>
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
				<div class="website_statistics">
					<h2>Website Statistics</h2>
					<div id="piechart" style="width: 400px; height: 400px;"></div>
				</div>
			</div>
		</div>
	</div>

</body>
<?php
$connection->close();
?>
</html>
