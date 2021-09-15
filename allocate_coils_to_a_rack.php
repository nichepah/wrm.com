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
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row-content">
  
    <div class="col-sm-3 sidenav">
      <h4>WRM Coil Dashboard</h4>
      <ul class="nav nav-pills nav-stacked">
        
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="allocate_coils_to_a_rack.php">Allocate Coils To a Rack</a></li>
        <li><a href="dispatch_coils.php">Dispatch Coils</a></li>
        
        <li><a href="view_rack_status_as_on_a_timestamp.php">View Rack Status as on A Timestamp</a></li>
        <li><a href="view_coils_dispatched_over_a_period.php">View Coils Dispatched Over A Period</a></li>
        <li><a href="view_coils_rolled_over_a_period.php">View Coils Rolled Over a Period</a></li>
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
      <h2>Allocate Selected Coils to A Rack</h2>
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
		<form action="allocate_coils_to_a_rack.php" method="POST" target="_self">
		
		<div class="form-group">
		<label for="heat"> Heat: </label>
		<input type="text" class="form-control" id="heat" placeholder= "Enter heat number of the coils to be allocated to the rack" name="heat"  >
		</div>

		<div class="form-group">
		    <label for="strand">Strand: </label>
		    <select class="custom-select" id="strand" name="strand">
		    	<option selected>Choose Strand...</option>
		    	<option value="A">A</option>
		    	<option value="B">B</option>
		    	<option value="C">C</option>
		    	<option value="D">D</option>		    	
		    </select>
		</div>

		
		<div class="form-group">
		<label for="from_sequence"> From Sequence: </label>
		<input type="text" id="from_sequence" class="form-control" placeholder= "from sequence number" name="from_sequence"> 
		</div>
	
		<div class="form-group">
		<label for="to_sequence"> To Sequence: </label>
		<input type="text" id="to_sequence" class="form-control" placeholder= "to sequence number" name="to_sequence"> 
		</div>	
	
	<!--
		<div class="form-group">
		<label for="rack"> Rack Number: </label>
		<input type="text" id="rack" class="form-control" placeholder= "Enter the rack number to which coils are to be allocated" name="rack"> 
		</div>
	-->
	
		<div class="form-group">
		  <label for="rack">Rack Number: </label>
		    <select class="custom-select" id="rack" name="rack">
		    	<option selected>Choose a rRack number for the Coils...</option>
		    	<option value="3">3</option>
		    	<option value="4">4</option>
		    	<option value="5">5</option>
		    	<option value="6">6</option>
		    	<option value="7">7</option>
		    	<option value="8">8</option>
		    	<option value="9">9</option>
		    	<option value="10">10</option>
		    	<option value="11">11</option>
		    	<option value="12">12</option>
		    	<option value="13">13</option>
		    	<option value="14">14</option>
		    	<option value="15">15</option>
		    	<option value="16">16</option>
		    	<option value="17">17</option>
		    	<option value="18">18</option>
		    	<option value="19">19</option>
		    	<option value="20">20</option>
		    	<option value="21">21</option>
		    	<option value="M1">M1</option>
		    	<option value="M2">M2</option>
		    	<option value="M3">M3</option>
		    	<option value="M4">M4</option>
		    	<option value="M5">M5</option>
		  </select>
		</div>

	
		<input type="submit" value="submit" class="btn btn-primary">
		</form> 
	</div class="container">
<p>

<div class="container">	
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

$rack = $conn->real_escape_string($_POST['rack']);
$heat = $conn->real_escape_string($_POST['heat']); 
$strand = $conn->real_escape_string($_POST['strand']);
$from_sequence = $conn->real_escape_string($_POST['from_sequence']); 
$to_sequence = $conn->real_escape_string($_POST['to_sequence']);
 
//create a query
$stmt1 = $conn->prepare("UPDATE coil SET rack=? WHERE heat=? and strand=? and sequence>=? and sequence<=?");
$stmt1->bind_param("sssii", $rack, $heat, $strand, $from_sequence, $to_sequence);

 
if($stmt1->execute()){
$response['message'] = 'OK';
} else { 
$response['message'] = 'N_OK';
}

$stmt2 = $conn->prepare("SELECT id, heat, grade, strand, sequence, dia, date_rolled, shift_rolled, timestamp_label_print, rack, customer, date_dispatch, destination, mode_of_dispatch, shift_dispatch, wagon_veh_no 
FROM coil
WHERE heat=? and strand=? and sequence>=? and sequence<=? order by id DESC limit 1000");
$stmt2->bind_param("ssii", $heat, $strand, $from_sequence, $to_sequence);

$stmt2->execute();

$result2 = $stmt2->get_result(); // get the mysqli result

echo "<h4> Rows Affected: " . $result2->num_rows . "</h4>";
echo "<h4> For Heat: " . $heat . ", Strand: ". $strand . " From Seq: " . $from_sequence .
		 ", To Seq: " . $to_sequence .
		 ", SETS Rack : " . $rack .
		 ";</h4>";


if ($result2->num_rows > 0) {
 echo 
  "
  <table>
	<tr>
	<th>ID</th>
	<th>Heat</th>
	<th>Grade</th>
	<th>Strand</th>
	<th>Seq</th>
	<th>Dia</th>
	<th>Date_Rolled</th>
	<th>Shift_R</th>
	<th>TS_label_print</th>
	<th>Rack</th>
	<th>Customer</th>
	<th>Date_dispatch</th>
	<th>Destination</th>
	<th>Mode_D</th>
	<th>Shift_D</th>
	<th>Wagon_Veh_No</th>
	</tr>";
    // output data of each row : timestamp_label_print, rack, customer, rack 
    while($row = $result2->fetch_assoc()) {
        echo "<tr>
	<td>" . $row["id"]. "</td>
	<td>" . $row["heat"]. "</td>
	<td>" . $row["grade"]. "</td>
	<td>" . $row["strand"]. "</td>
	<td>" . $row["sequence"]. "</td>
	<td>" . $row["dia"]. "</td>
	<td>" . $row["date_rolled"]. "</td>
	<td>" . $row["shift_rolled"]. "</td>
	<td>" . $row["timestamp_label_print"]. "</td>
	<td>" . $row["rack"]. "</td>
	<td>" . $row["customer"]. "</td>
	<td>" . $row["date_dispatch"]. "</td>
	<td>" . $row["destination"]. "</td>
	<td>" . $row["mode_of_dispatch"]. "</td>
	<td>" . $row["shift_dispatch"]. "</td>
	<td>" . $row["wagon_veh_no"]. "</td>
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

echo json_encode($response);
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

