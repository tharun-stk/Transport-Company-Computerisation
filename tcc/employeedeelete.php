<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST" )
 {
     if (!empty($_POST['phone']))
     {
    // Create connection
      $id  = $_POST['phone'];
      $conn = new mysqli("localhost", "dinesh", "dinessh@123", "tcc");
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
      $sql = "select * from employee where phone_no='$id'";
      $value = $conn->query($sql);
    }
    else if (isset($_POST['delete'])) {
        $id = $_POST['delete'];

        $conn = new mysqli("localhost", "dinesh", "dinessh@123", "tcc");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
  
        $sql = "delete from employee where employee_id='$id'";
        $result = $conn->query($sql);
        if ($result)
           echo "<script>alert('account deleted');</script>";
           header('Location:a.php');
    }
    else {
        echo "<script>alert('Enter the Valid id');</script>";
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
   
    <label for="phone"><b>PHONE NUMBER</b></label>
    <input type="number" placeholder="ENTER PHONE NUMBER" name="phone" value=<?php if(isset($_POST['phone'])) ?>required>
    <button type="submit" name="summit">ENTER</button>
    </div>
    
</form>
    
    
    
<form  name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if ($value->num_rows > 0) {
      echo "<table id = 'details'><tr><th>EMPLOYEE NAME</th><th>PHONE NUMBER</th><th>EMPLOYEE ID</th><th>REMOVE</th></tr>";
      // output data of each row
      while($row = $value->fetch_assoc()) {
        echo "<tr><td>".$row["emplyoee_name"]."</td><td>".$row["phone_no"]." </td><td>".$row["employee_id"]."</td><td><input type = 'submit' name = 'delete' value = ".$row["employee_id"]."></td></tr>";
      }
      echo "</table>";
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
