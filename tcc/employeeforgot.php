<?php
session_start();
$phone_no = $password =$secret_key= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $phone_no = $_POST["phone"];
  $secret_key =$_POST["key"];
  $password = $_POST["psw"];

  $conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "tcc");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from employee where phone_no = $phone_no and   secret_key = '$secret_key'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql="update employee set paasword='$password' where phone_no=$phone_no";
    $value=mysqli_query($conn, $sql);
     $_SESSION['number'] = $phone_no;
} 
else {
     echo "<script>alert('Check Username and Password');</script>";
}
if ($value === TRUE)
     {
            header('Location: employee.php');
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
form {border: 3px solid #f1f1f1;width:40%;height:60%;margin:auto;margin-top:10%;background-color:blue}


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
  margin-top:10%;
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
  

  <div class="container">
    <label for="phone"><b>Phone number</b></label>
    <input type="number" placeholder="Phone number" name="phone" required>

    <label for="key"><b>Secret key</b></label>
    <input type="text" placeholder="Enter secret key" name="key" required>
    <label for="psw"><b>Enter new password</b></label>
    <input type="password" placeholder="Enter new password" name="psw" required>
    <button type="submit">Change</button>
    

  </div>

 
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>
</body>
</html>
