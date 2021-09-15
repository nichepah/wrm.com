<!DOCTYPE html>
<!--Author: Aneesh PA; Date: 21 Aug 2021 -->
<html lang="en">
<head>
  <title>A Joint Project of WRM BSP & RDCIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
table, th, td {
    border: 1px solid black;
}

/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
.row.content {height: 1500px}

/* Set gray background color and 100% height */
.sidenav {
  background-color: #f1f1f1;
  height: 100%;
}
    
/* Set black background color, white text and some padding */
footer {
  background-color: #555;
  color: white;
  padding: 15px;
}
    
/* On small screens, set height to 'auto' for sidenav and grid */
@media screen and (max-width: 767px) {
  .sidenav {
  height: auto;
  padding: 15px;
  }
  .row.content {height: auto;} 
}

/* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>
</head>
<body>

<div class="container-fluid">
  <div class="row-content">
  
    <div class="col-sm-3 sidenav">
      <h4>WRM Coil Dashboard</h4>
      <ul class="nav nav-pills nav-stacked">
        
        <li><a href="home.php">Home</a></li>
        <li><a href="allocate_coils_to_a_rack.php">Allocate Coils To a Rack</a></li>
        <li><a href="dispatch_coils.php">Dispatch Coils</a></li>
        
        <li><a href="view_rack_status_as_on_a_timestamp.php">View Rack Status as on A Timestamp</a></li>
        <li><a href="view_coils_dispatched_over_a_period.php">View Coils Dispatched Over A Period</a></li>
        <li class="active"><a href="view_coils_rolled_over_a_period.php">View Coils Rolled Over a Period</a></li>
        <li><a href="view_heats_rolled_over_a_period.php">View Heats Rolled Over a Period</a></li>

<!-- <li><a href="#section3">Search</a></li> -->
      
      </ul><br>

<!--  <div class="input-group">
        <input type="text" class="form-control" placeholder="Search the Site">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div class="input-group">
-->

    </div class="col-sm-3 sidenav">

    <div class="col-sm-9">
      <h4><small>CYMS: A Joint Project of BSP & RDCIS</small></h4>
      <hr>
      <h2>View Coil Production Info based on Grade, Heat and Dia</h2>
      <h5>
      	<span class="glyphicon glyphicon-time"></span> 
      	<?php $date = date('m/d/Y h:i:s a', time()); echo $date ?> 
      </h5>
      <h5>
      	<span class="label label-danger">Coils</span> 
      	<span class="label label-primary">WRM</span>
      	<span class="label label-warning">BSP</span>
      	<span class="label label-success">RDCIS</span>
      	<span class="label label-info">SAIL</span>
      </h5>
      <br>
      <p></p>
      <br><br>
      
     
<div class="container">
  <form action="view_coils_rolled_over_a_period.php" method="POST" target="_self">

		<div class="form-group">
		<label for="ts_print_label_from"> Timestamp Print Label From: </label>
		<input type="datetime-local" id="ts_print_label_from" class="form-control" placeholder= "from timestamp of print label" name="ts_print_label_from"> 
		</div>

		<div class="form-group">
		<label for="ts_print_label_to"> Timestamp Print Label To: </label>
		<input type="datetime-local" id="ts_print_label_to" class="form-control" placeholder= "to timestamp of print label" name="ts_print_label_to"> 
		</div>

		<input type="submit" value="submit" class="btn btn-primary">
	</form> 
</div>

<div class="container">
<p>

<?php 
// Author: Aneesh PA
// Date: 31 Aug 2021
// To Do
// Hash values
// Non-root user 
// Merge with login

// response array
$response = array();


if($_SERVER['REQUEST_METHOD']=='POST') {
include 'databaseConf.php'; 

$conn = mysqli_connect(
	$db_host,
	$db_user,
	$db_password,
	$db_name);

if (mysqli_connect_errno()) {
echo "Failed to connect: " . mysqli_connect_error();
die();
}

$ts_print_label_to = $conn->real_escape_string($_POST['ts_print_label_to']);
$ts_print_label_from = $conn->real_escape_string($_POST['ts_print_label_from']);

$stmt2 = $conn->prepare("SELECT timestamp_label_print, grade, heat, dia, count(*) as total 
FROM wrm.coil
WHERE timestamp_label_print>=? and timestamp_label_print<=? 
group by timestamp_label_print, grade, heat, dia
order by total DESC");
$stmt2->bind_param("ss", $ts_print_label_from, $ts_print_label_to);

$stmt2->execute();

$result2 = $stmt2->get_result(); // get the mysqli result

echo "<h4> Report of Coils Rolled shown in : " . $result2->num_rows . " rows.</h4>";
echo "<h4> From Label Printed on " . $ts_print_label_from . " To " . $ts_print_label_to .".</h4>";

if ($result2->num_rows > 0) {
  echo "
  <table>
	<tr>
  <th>Timestamp_label_print</th>
	<th>Grade</th>
  <th>Heat</th>  
	<th>Dia</th>
	<th>Count</th>
	</tr>";
    // output data of each row : timestamp_label_print, rack, customer, date_dispatch 
    while($row = $result2->fetch_assoc()) {
	  echo "<tr>
    <td>" . $row["timestamp_label_print"]. "</td>
		<td>" . $row["grade"]. "</td>
    <td>" . $row["heat"]. "</td>
		<td>" . $row["dia"]. "</td>
		<td>" . $row["total"]. "</td>
		</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

if (!$conn -> commit()) {
  echo "Commit transaction failed";
  exit();
}

$conn -> close();

// echo json_encode($response);
}
?>
</div>
</div>
</div>
</div>

<footer class="container-fluid">
  <p>If you can not measure it, you can not improve it!
      	<span class="label label-danger">Coils</span> 
      	<span class="label label-primary">WRM</span>
      	<span class="label label-warning">BSP</span>
      	<span class="label label-success">RDCIS</span>
      	<span class="label label-info">SAIL</span>
				<span class="glyphicon glyphicon-time"></span> 
      	<?php $date = date('m/d/Y h:i:s a', time()); echo $date ?> 
   </p>   
</footer>

</body>
</html>
