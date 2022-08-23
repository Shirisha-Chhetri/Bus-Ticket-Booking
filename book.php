<link rel="stylesheet" type="text/css" href="style.css">

<?php
$busid = $_GET['bus'];

session_start();
$_SESSION['busid'] = $busid;

	if(isset($_POST['submit'])){
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['des']  = $_POST['destination'];
    $_SESSION['date']  = $_POST['date'];
    $_SESSION['seat']  = $_POST['seat'];
    
	$conn = new mysqli("localhost","root","","test");
	$query = "SELECT * FROM Bus WHERE id=$busid";
	$result = $conn->query($query);
          
    $row=$result->fetch_assoc();
    $price = $row['Price'] * $_SESSION['seat'] ;
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
	Number of seats:
	<select name="seat">
		<option value="-1">Choose number of seats</option>
		<option value="1"> 1</option>
		<option value="2"> 2</option>
		<option value="3"> 3</option>
		<option value="4"> 4</option>
		<option value="5"> 5</option>
		<option value="6"> 6</option>
		<option value="7"> 7</option>
		<option value="8"> 8</option>
	</select>
	</div><br>
	<input type="submit" value="Book" name="submit" class="button"><br>
	</form>
</fieldset>

<script type="text/javascript" src="place.js"></script>