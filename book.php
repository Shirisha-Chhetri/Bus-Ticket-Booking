<link rel="stylesheet" type="text/css" href="style.css">

<?php
$busid = $_GET['bus'];

session_start();
$_SESSION['busid'] = $busid;
$conn = new mysqli("localhost","root","","test");
	$query = "SELECT * FROM Bus WHERE id=$busid";
	$result = $conn->query($query);
          
    $row=$result->fetch_assoc();
    $val= $row['Total-seats'];

	if(isset($_POST['submit'])){
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['des']  = $_POST['destination'];
    $_SESSION['date']  = $_POST['date'];

    $seats = $_POST['seat'];
   	$_SESSION['num'] = count($seats) ;
    
   	$chk="";  
	foreach($seats as $chk1)  
	   {  
	      $chk .= $chk1.",";  
	      
	   }  
    $_SESSION['seat']= $chk;

    $price = $row['Price'] * count($seats) ;
    $_SESSION['p'] = $price;

    header("location:pay.php");
  }         
?> 

<fieldset>
	<legend>Bus Ticket Booking</legend>
	<form method="POST" autocomplete="off">

	<div class="autocomplete input">
	Source City: <input type="text" name="source" placeholder="Enter location"  id="myInput" required>
	</div>
	<div class="autocomplete input">
	Destination City: <input type="text" name="destination" placeholder="Enter source location" id="myInput1" required>
	</div>
	<div class="input">
	Departure Date: <input type="date" name="date" required>
	</div>
	<div class="input">
		
	Number of seats:<br>
	<div class="row">
	<div class="column">
	<?php 
	for($i=1; $i<=$val/2; $i++){?>	
	<input type="checkbox" name="seat[]" value="<?php echo "A".$i;?>"><?php echo "A". $i."<br>";}?>
	</div>

	<div class="column">
	<?php
	for($i=1; $i<=$val/2; $i++){?>	
	<input type="checkbox" name="seat[]" value="<?php echo "B".$i;?>"><?php echo "B". $i."<br>";}?>
	</div>
	</div>
	</div><br>
	<input type="submit" value="Book" name="submit" class="button">
	</form>
</fieldset>

<script type="text/javascript" src="place.js"></script>