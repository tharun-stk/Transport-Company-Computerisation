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
<form name = "myForm" method = "POST" action="emp_pa.php">
<div class="container">


<?php
session_start();
$a=$_SESSION["id"]; 
$p="";

$b=$_SESSION["pvolm"];
$c=$_SESSION["pvalm"];
$d=$_SESSION["pnam"];
$e=$_SESSION["deal"];
$conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "tcc");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql="select volume_filled from truck_details where truck_id=$a";
$value=mysqli_query($conn,$sql);
$no=mysqli_fetch_assoc($value);
$alt="select volume_filled from alt_truck_details where truck_id=$a";
$alts=mysqli_query($conn,$alt);
$altsno=mysqli_fetch_assoc($alts);


 
    
    if($no['volume_filled']+$b <501)
    {
      
        $t=$no['volume_filled']+$b;
        

        $sql="update truck_details set volume_filled=$t where truck_id=$a";
        $value=mysqli_query($conn,$sql);
        $ql="select remaining_volume from truck_details where truck_id=$a";
        $result=mysqli_query($conn,$ql);
        $vol=mysqli_fetch_assoc($result);
        if ($vol['remaining_volume'] >= 0){ 
            $rem= $vol['remaining_volume']-$b;
        $mysql="update truck_details set remaining_volume=$rem where truck_id=$a";
        $done=mysqli_query($conn,$mysql);
        }
        $p=1;
        


    }
    else if($altsno['volume_filled']+$b <501)
    {
      
        $t=$altsno['volume_filled']+$b;
        

        $sql="update alt_truck_details set volume_filled=$t where truck_id=$a";
        $value=mysqli_query($conn,$sql);
        $ql="select remaining_volume from alt_truck_details where truck_id=$a";
        $result=mysqli_query($conn,$ql);
        $vol=mysqli_fetch_assoc($result);
        if ($vol['remaining_volume'] >= 0){ 
           $rem= $vol['remaining_volume']-$b;
        $mysql="update alt_truck_details set remaining_volume=$rem where truck_id=$a";
        $done=mysqli_query($conn,$mysql);
        }
        $p=0;
       



    }
    else {
        echo "<script>alert('sorry truck not available');</script>";
        
    }
    if ($done== TRUE){
    $order_ran=rand();
    $send="select * from sender where deal_no=$e";
    $sender=mysqli_query($conn,$send);
    $rec="select * from reciever where deal_no=$e";
    $reciever=mysqli_query($conn,$rec);
    $truck="select * from truck_details where truck_id=$a";
    $trucksql=mysqli_query($conn,$truck);
    $alttruck="select * from alt_truck_details where truck_id=$a";
    $alttrucksql=mysqli_query($conn,$alttruck);
    $amount=25*$b;
    $psql="insert into price(order_id,deal_no,volume,amount_per,amount) values($order_ran,$e,$b,'25',$amount) ";
    $valp=mysqli_query($conn,$psql);
    $price_val="select * from price where order_id=$order_ran";
    $price_mysql=mysqli_query($conn,$price_val);
    if ($sender->num_rows > 0) {
        echo "<table id = 'table1'><tr><th>SENDER NAME</th><th>COMPANY NAME</th><th>ADDRESS</th><th>PHONE NUMBER</th></tr>";
        // output data of each row
        while($r = $sender->fetch_assoc()) {
          echo "<tr><td>".$r["sender_name"]."</td><td>".$r["company_name"]." </td><td>".$r["address"]." </td><td>".$r["phone_number"]." </td></tr>";
        }
    
    if ($reciever->num_rows > 0) {
        echo "<table id = 'table1'><tr><th>RECIEVER NAME</th><th>COMPANY NAME</th><th>ADDRESS</th><th>PHONE NUMBER</th></tr>";
        // output data of each row
        while($s= $reciever->fetch_assoc()) {
          echo "<tr><td>".$s["reciever_name"]."</td><td>".$s["company_name"]." </td><td>".$s["address"]." </td><td>".$s["phone_number"]." </td></tr>";
        }
        if ($p==1)
        {
        if ($trucksql->num_rows > 0) {
            echo "<table id = 'table1'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th></tr>";
            // output data of each row
            while($truc= $trucksql->fetch_assoc()) {
              echo "<tr><td>".$truc["truck_id"]."</td><td>".$truc["destination"]." </td><td>".$truc["truck_driver"]." </td></tr>";
            }
        }}
            else 
            {
                if ($alttrucksql->num_rows > 0) {
                    echo "<table id = 'table1'><tr><th>TRUCK ID</th><th>TRUCK DESTINATION</th><th>DRIVER NAME</th></tr>";
                    // output data of each row
                    while($truc= $alttrucksql->fetch_assoc()) {
                      echo "<tr><td>".$truc["truck_id"]."</td><td>".$truc["destination"]." </td><td>".$truc["truck_driver"]." </td></tr>";
                    }

            }}}
            if ($price_mysql->num_rows > 0) {
                echo "<table id = 'table1'><tr><th>ORDER NO</th><th>DEALER NO</th><th>VOLUME</th><th>AMOUNT PER CUBIC METRES</th><th>AMOUNT </th></tr>";
                // output data of each row
                while($prow= $price_mysql->fetch_assoc()) {
                    echo "<tr><td>".$prow["order_id"]."</td><td>".$prow["deal_no"]."</td><td>".$prow["volume"]." </td><td>".$prow["amount_per"]." </td><td>".$prow["amount"]." </td></tr>";
                }
    
        
        echo "</table>";
    }
}}




?>
<button type="submit">DONE</button>
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>
</body>
</html>