
<?php
session_start();


$agentPhone = $_SESSION['number'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Create connection
  if (!empty($_POST['Pin']) && strlen((string)$_POST['Pin']) == 9) {
    $phone = $_POST['Pin'];
    $conn = new mysqli("localhost", "root", "", "mitra");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from offers";
    $value = $conn->query($sql);
  } else {
      echo "<script>alert('Enter the Valid Number');</script>";
  }

  }

  if (isset($_POST['recharge'])) {
      $amount = $_POST['recharge'];
      $transactionId = rand();
      $conn = new mysqli("localhost", "root", "", "mitra");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "insert into customer values ('$amount', '$transactionId', '$phone', '$agentPhone')";
      $result = $conn->query($sql);
      if ($result)
         echo "<div> Transaction Successfull <br> Transaction ID : $transactionId <br> Amount : $amount <br> Status: success</div>";
  }

?>

<html>
<head>
<title>RECHARGE</title>

<style media="screen">
    body {
padding: 25px;
background: url(mi.jpg);
background-repeat: no-repeat;
background-size: 100% ;
}

#offers {
   background-color: white;
   margin-left: 40%;
}

div {
  margin: auto;
  background-color: floralwhite;
  width: 20%;
}
   </style>
   </head>
   <body>
     <button><a href = "admin.php">BACK</a></button>
   <form name = "myForm" method = "POST" onsubmit="validate()" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" /><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
   <table cellspacing = "2" cellpadding = "2" border = "4" table bgcolor="#ffffff" table align="center" height="100" width="500"  >
   <tr>
   <td align = "center">Phone number</td>
   <td><input type = "text" name = "Pin" value = <?php if(isset($_POST['Pin'])) {echo $_POST['Pin'];} ?>></td>
   </tr>
   <tr>
   <td align = "right"></td>
   <td><input type = "submit" value = "Submit"  height="2000" /></td>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if ($value->num_rows > 0) {
      echo "<table id = 'offers'><tr><th>AMOUNT</th><th>VOUCHER NAME</th><th>BENEFITS</th><th>RCHARGE</th></tr>";
      // output data of each row
      while($row = $value->fetch_assoc()) {
        echo "<tr><td>".$row["amount"]."</td><td>".$row["vocher_name"]." </td><td>".$row["benfits"]."</td><td><input type = 'submit' name = 'recharge' value = ".$row["amount"]."></td></tr>";
      }
      echo "</table>";
    }
  }
    ?>
   </head>
   </html>
   <script type = "text/javascript">
        function validate() {

           if( document.myForm.Pin.value == "" || isNaN( document.myForm.Pin.value ) ||document.myForm.Pin.value.length == 10 ) {

              alert( "Please provide a(9) zip in the format #########." );
              document.myForm.Pin.focus() ;
              return false;
           }
         }
           </script>
