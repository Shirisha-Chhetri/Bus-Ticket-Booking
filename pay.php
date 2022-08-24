<link rel="stylesheet" type="text/css" href="style.css">
<?php    
session_start();
$p =  $_SESSION['p'];
  $conn = new mysqli("localhost","root","","test");
  if(isset($_POST['book'])){
    $fn = $_POST['fullname'];
    $ad = $_POST['address'];
    $co = $_POST['contact'];
    $em= $_POST['email'];
  
    
    $sql1 ="INSERT INTO book(bus_id,user_name,address,contact,email,source,destination,date,seat_number,no_of_seat,amount)
            VALUES('".$_SESSION['busid']."','$fn','$ad','$co','$em','".$_SESSION['source']."','".$_SESSION['des']."','".$_SESSION['date']."','".$_SESSION['seat']."','".$_SESSION['num']."','$p')";

    if($conn->query($sql1)==TRUE){
    echo "<script>alert('Ticket is booked successfully');
     window.location='bus.php';</script>";
      }
    else{
        "Error".$sql."<br>".$conn->error;
        }
      }
?>

<fieldset>
<form method="POST">
  FullName: <input type="text" name="fullname" required><br><br>
  Address: <input type="text" name="address" required><br><br>
  Contact: <input type="number" name="contact" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  <input type="submit" value="Pay" name="book" class="button">
</form>
  <h4>Total Amount: Rs.<?php echo $p ?></h4><br>
</fieldset>