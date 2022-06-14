


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/scrollreveal@4"></script>
</head>
<style>
form {border: 3px solid #f1f1f1;width:50%;margin:auto;background-color:blue}
table {
            border-collapse: collapse;
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            margin-top: 5%;
            text-align:center;
        }
  
        th,
        td {
            border: 1px solid black;
        
        }
  
        table#table1 {
            table-layout: auto;
            width: 400px;
        }
  
        /* Equal width table cell */
        table#table2 {
            table-layout: fixed;
            width: 200px;
        }
        input[type=number], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: green;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
  
</style>
<body style="background-color:grey">
<form name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
<div class="container">


<?php
session_start();

$conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "tcc");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql="select * from truck_details ";
$value=mysqli_query($conn,$sql);
$alt="select * from alt_truck_details ";
$alts=mysqli_query($conn,$alt);

    
if ($value->num_rows > 0) {
    echo "<table id = 'details'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th><th>VOLUME FILLED</th><th>VOLUME REMAINING</th><th>CHOOSE</th></tr>";
    // output data of each row
    while($row = $value->fetch_assoc()) {
      echo "<tr><td>".$row["truck_id"]."</td><td>".$row["destination"]." </td><td>".$row["truck_driver"]." </td><td>".$row["volume_filled"]." </td><td>".$row["remaining_volume"]." </td><td><input type='submit' name='sumit'  value=".$row["truck_id"]."></td></tr>";
    }
    if ($alts->num_rows > 0) {
      echo "<table id = 'details'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th><th>VOLUME FILLED</th><th>VOLUME REMAINING</th><th>CHOOSE</th></tr>";
      // output data of each row
      while($ro= $alts->fetch_assoc()) {
        echo "<tr><td>".$ro["truck_id"]."</td><td>".$ro["destination"]." </td><td>".$ro["truck_driver"]." </td><td>".$ro["volume_filled"]." </td><td>".$ro["remaining_volume"]." </td><td><input type='submit' name='subit'  value=".$ro["truck_id"]."></td></tr>";
      }


    echo "</table>";

    

    
  }
}    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['sumit'])) {
    $id = $_POST['sumit'];
    
$sql=" update truck_details set volume_filled=0, remaining_volume=500 where truck_id=$id";
$value=mysqli_query($conn,$sql);
if ($value === TRUE)
{
    echo "<script>alert('UPDATED');</script>";
    header('Location: truck_orders.php');
}}
if (isset($_POST['subit'])) {
    $id = $_POST['subit'];
$sql=" update alt_truck_details set volume_filled=0, remaining_volume=500 where truck_id=$id";
$value=mysqli_query($conn,$sql);
if ($value === TRUE)
{
    echo "<script>alert('UPDATED');</script>";
    header('Location: truck_orders.php');
}}}
   
?>
<button type="submit"><a href="emp_pa.php">BACK</a></button>
 
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>
</body>
</html>