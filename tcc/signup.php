<?php
session_start();
$name =$number= $city=$password=$secret_key=" ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['uname'];
    $number= $_POST['phone'];
    $city = $_POST['city'];
    $password = ($_POST['psw']);
    $secret_key=$_POST['secret'];
    $conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "tcc");

    if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from manager where phone_no = '$number'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Number Already Exists');</script>";
    } else {
        $sql = "insert into manager(manager_name,phone_no,password,city,secret_key) values('$name', $number, '$password', '$city','$secret_key')";
        $value=mysqli_query($conn, $sql);
    }
    
    if ($value === TRUE)
     {
            header('Location: acc.html');
            $_SESSION['number'] = $phone;
     }
    
          mysqli_close($conn);
}
?>
  


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/scrollreveal@4"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;width:30%;margin:auto;background-color:blue}

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
<body style ="background-color:grey">
<form name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
<div class="imgcontainer">
    <img src="s.png" alt="Avatar" class="avatar">
  </div>

<form name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <div class="container">
    <label for="uname"><b>Manager name</b></label>
    <input type="text" placeholder="Enter your name" name="uname" required>

    <label for="phone"><b>Phone number</b></label>
    <input type="number" placeholder="Enter phone number" name="phone" required>
    <label for="city"><b>City</b></label>
    <input type="text" placeholder="Enter your city" name="city" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <label for="secret"><b>Secretkey</b></label>
    <input type="text" placeholder="Enter your pets name" name="secret" required>
    <button type="submit" name="summit">signup</button>
    
  </div>

 
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html>
