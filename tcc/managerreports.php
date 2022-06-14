<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/scrollreveal@4"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif}

form {border:5px solid #f1f1f1;width:40%;margin:auto;background-color:blue}
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
  margin-left:0%;
  text-align:center;
  padding:10%;
  margin-top:5%;
  margin-bottom:5%;
}
tr:nth-child(even){background-color: #f2f2f2}

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
   
    <label for="order"><b>ORDER NUMBER</b></label>
    <input type="number" placeholder="ENTER ORDER NUMBER" name="order" required>
    <button type="submit" name="summit">ENTER</button>
    </div>
    
</form>
    
    
    
<form  name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "dinesh", "dinessh@123", "tcc");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
      $order=$_POST['order'];
      $sql="select * from price where order_id=$order";
      $value=mysqli_query($conn,$sql);
      $b=mysqli_fetch_assoc($value);
      $c=$b['deal_no'];
      
      $or="select * from sender where deal_no=$c";
      $orval=mysqli_query($conn,$or);
      $rec="select * from reciever where deal_no=$c";
      $recval=mysqli_query($conn,$rec);
      $price="select * from price where order_id=$order";
      $priceval=mysqli_query($conn,$price);
      $product="select * from product where deal_no=$c";
      $productval=mysqli_query($conn,$product);

if ($orval->num_rows > 0) {
      echo "<table id = 'details'><tr><th>SENDER NAME</th><th>COMPANY NAME </th><th>ADDRESS</th><th>PHONE  NUMBER</th></tr>";
      // output data of each row
      while($row = $orval->fetch_assoc()) {
        echo "<tr><td>".$row["sender_name"]."</td><td>".$row["company_name"]." </td><td>".$row["address"]."</td><td>".$row["phone_number"]."</td></tr>";
      }
      echo "</table>";
    }
  
  if ($recval->num_rows > 0) {
    echo "<table id = 'details'><tr><th>RECIEVER NAME</th><th>COMPANY NAME </th><th>ADDRESS</th><th>PHONE  NUMBER</th></tr>";
    // output data of each row
    while($row = $recval->fetch_assoc()) {
      echo "<tr><td>".$row["reciever_name"]."</td><td>".$row["company_name"]." </td><td>".$row["address"]."</td><td>".$row["phone_number"]."</td></tr>";
    }
    echo "</table>";
  }

if ($priceval->num_rows > 0) {
    echo "<table id = 'details'><tr><th>ORDER ID</th><th>VOLUME</th><th>AMOUNT</th></tr>";
    // output data of each row
    while($row = $priceval->fetch_assoc()) {
      echo "<tr><td>".$row["order_id"]."</td><td>".$row["volume"]." </td><td>".$row["amount"]."</td></tr>";
    }
    echo "</table>";
  }
if ($productval->num_rows > 0) {
    echo "<table id = 'details'><tr><th>PRODUCT NAME</th><th>VALUE </th></tr>";
    // output data of each row
    while($row = $productval->fetch_assoc()) {
      echo "<tr><td>".$row["product_name"]."</td><td>".$row["product_value"]." </td></tr>";
    }
    echo "</table>";
  }
}
  ?>
  <button type="submit"><a href="a.php">BACK</a></button>
  </form>


 
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html>
