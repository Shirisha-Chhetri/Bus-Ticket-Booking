<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>
    <h3 class=" bus mt-3">Available Buses</h3>
    <div class="container-fluid">
    <div class="row">

    <?php 
      session_start();
    	$conn = new mysqli("localhost","root","","test");
    	$sql = "SELECT * FROM Bus ";
    	$result= $conn->query($sql);
    	 
      if($result->num_rows>0){ 
      while($row=$result->fetch_assoc()){     	
    ?>
      <div class="col-md-4 mt-4">
      <div class="card">
        <h4 class="bus mt-2"><?php echo $row['Name'];?></h4>
        <div class="card-body">
          <p>Total_seats: <?php echo $row['Total-seats'];?></p>
          <p>Price per seat: <?php echo $row['Price'];?></p>
          <a href="http://localhost/Bus-Ticket-Booking/book.php?bus=<?php echo $row['id']; ?>" class="btn btn-primary">Book Now</a>
        </div>
       </div>
    </div>
    <?php 
        }
      }
    ?>
        
  </div>
</div>
    
</body>
</html>