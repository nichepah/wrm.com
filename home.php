<!DOCTYPE html>
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
    .row.content {height: 1000px}
    
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
  <div class="row content">
 
    <div class="col-sm-3 sidenav"> 
     <h4>WRM Coil Dashboard</h4>
      <ul class="nav nav-pills nav-stacked">
      
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="allocate_coils_to_a_rack.php">Allocate Coils To a Rack</a></li>
        <li><a href="dispatch_coils.php">Dispatch Coils</a></li>
        
        <li><a href="view_rack_status_as_on_a_timestamp.php">View Rack Status as on A Timestamp</a></li>
        <li><a href="view_coils_dispatched_over_a_period.php">View Coils Dispatched Over A Period</a></li>
        <li><a href="view_coils_rolled_over_a_period.php">View Coils Rolled Over a Period</a></li>
        <li><a href="view_heats_rolled_over_a_period.php">View Heats Rolled Over a Period</a></li>

        <li><a href="view_coil_id_details.php">View Coil ID Details</a></li>

        <li><a href="delete_a_coil.php">Delete A Coil</a></li>



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
      <h4><small>A Joint Project of BSP & RDCIS</small></h4>
      <hr>
      <h2>A Minimalist Inventory Management System for Coils</h2>
      <div class="container-fluid">
        <p>
          Each coil enters the system with following details.
            <ul>
              <li>Heat</li>
              <li>Grade</li>
              <li>Dia</li>
              <li>Strand</li>
              <li>Sequence</li>
              <li>Timestamp of Label Print</li>
              <li>Coil ID, which is unique for a coil</li>
            </ul>
        <p>
          These inputs are now manually entered through an interface, and subsequently printed on a Zebra ZD230 Label Printer as QR. The labels are roughly 50 x 60 mm in size and are self-adhesive. We use thermal transfer technology for printing QR, as it is more resilient to environment.
        <p>
          Labels are printed in batches. Each batch retains a Heat number. Within the batch, each strand identifies each coil with a unique sequence number. So, given unique heat, with strand and sequence number, we can uniquely identify a coil. However, within the computer program, we have a provision to uniquely identify each coil with another ID.
        <p>
          Once labels are printed and attached to coils, next operation is to allot them to racks. This is done through <a href="./allocate_coils_to_a_rack.php"> Allocate Coils To a Rack </a>. As you know, we have 24 racks: 3-21+{M1, M2, M3, M4, M5}. Allocation of coils to racks is considered as a batch process. So typical allocation command is 'Allocate 'n' coils from 'h1' heat of dimention 'm.x' dia to 'r1' rack. So, we have to specify
          <ul>
            <li>Heat</li>
            <li>Strand</li>
            <li>From sequence</li>
            <li>To sequence</li>
            <li>Rack Number</li>
          </ul>
        <p> 
          Each coil has an internal id. However, allocation of coils is done based on heat, grade, strand or dia. This has been chosen in line with QR Label printing.
        <p>
          All events are timestamped including label printing and coil dispatching. Rack allocation as of today (16 Sept 2021) is not timestamped. However, the idea is to capture all events timestamped so that we remain future-proofed.
        <p>
        <h3>Todo</h3>
        <ul>
         <li> In the home page, we will have some interesting displays of production data. </li>
         <li> Dispatch operation may be restricted with login id and password.</li>
         <li> More info on the operations will be added in to this page</li>
       </ul>


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
    
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>There is a little bit of SAIL in everybody's life
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

