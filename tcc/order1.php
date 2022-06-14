<?php
session_start();
$pname=$pvol=$pval=$id=$de="";


if ($_SERVER["REQUEST_METHOD"] == "POST" )
 {
    $pname = $_POST['pname'];
    $pvol= $_POST['pvol'];
    $pval = ($_POST['pval']);
    $de=$_POST['deal'];
    $conn = mysqli_connect("localhost","dinesh","dinessh@123", "tcc");

    if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['deal']))
    {
    $sql="select * from sender where deal_no=$de";
    $r=mysqli_query($conn, $sql);
    if (mysqli_num_rows($r) > 0) 
    {
    $sql="insert into product values('$pname','$pvol','$pval',$de)";
    $result= mysqli_query($conn, $sql);
    $mysql="select * from truck_details";
    $value= mysqli_query($conn, $mysql);
    $ql="select * from alt_truck_details";
    $val= mysqli_query($conn, $ql);
    $_SESSION['pvolm'] = $pvol;
      $_SESSION['pvalm'] = $pval;
      $_SESSION['pnam'] = $pname;
      $_SESSION['deal'] = $de;
    }
    else 
    {
      echo "<script>alert('dealer not available');</script>";
    }
  }
    
    
  }
?>
  


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/scrollreveal@4"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif}

form {border:5px solid #f1f1f1;width:60%;margin:auto;background-color:blue}
input[type=number], input[type=password] ,input[type=text]{
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
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 8px 0 12px 0;
}

table{
  
  text-align:center;
  padding:10%;
  margin-top:5%;
  margin-bottom:5%;
}


th {
  background-color: #4CAF50;
  color: white;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  margin:24px 0 12px 0;

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
</head>
<body  style ="background-color:grey">
<form name = "myForm" method = "POST"  action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
<div class="imgcontainer">
    <img src="s.png" alt="Avatar" class="avatar">
  </div>


  <div class="container">
  <label for="deal"><b>DEAL NO</b></label>
    <input type="number" placeholder="ENTER NUMBER" name="deal" required>
   
    <label for="pname"><b>PRODUCT NAME</b></label>
    <input type="text" placeholder="ENTER NAME" name="pname" required>
    <label for="pvol"><b>PRODUCT VOLUME</b></label>
    <input type="number" placeholder="ENTER VOLUME" name="pvol" required>
    <label for="pval"><b>PRODUCT VALUE</b></label>
    <input type="number" placeholder="ENTER VALUE" name="pval" required>
    <button type="submit" name="summit">ENTER</button>
    </div>
    
</form>
    
    
    
<form  name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <?php
  $a=$_SESSION['pvolm'] ;
  $b=$_SESSION['pvalm'] ;
  $c=$_SESSION['pnam']; 
  $d=$_SESSION['deal'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if ($value->num_rows > 0) {
      echo "<table id = 'details'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th><th>VOLUME FILLED</th><th>VOLUME REMAINING</th><th>CHOOSE</th></tr>";
      // output data of each row
      while($row = $value->fetch_assoc()) {
        echo "<tr><td>".$row["truck_id"]."</td><td>".$row["destination"]." </td><td>".$row["truck_driver"]." </td><td>".$row["volume_filled"]." </td><td>".$row["remaining_volume"]." </td><td><input type='submit' name='sumit'  value=".$row["truck_id"]."></td></tr>";
      }
      if ($val->num_rows > 0) {
        echo "<table id = 'details'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th><th>VOLUME FILLED</th><th>VOLUME REMAINING</th></tr>";
        // output data of each row
        while($ro= $val->fetch_assoc()) {
          echo "<tr><td>".$ro["truck_id"]."</td><td>".$ro["destination"]." </td><td>".$ro["truck_driver"]." </td><td>".$ro["volume_filled"]." </td><td>".$ro["remaining_volume"]." </td></tr>";
        }


      echo "</table>";

      

      
    }
  }
    if (isset($_POST['sumit'])) {
      $id = $_POST['sumit'];

      $_SESSION['id'] = $id;
       
      

     header('Location: truckallot.php');
     
    }
    
    
    
  }
  
  ?>
  
  </form>


 
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html>