<?php
session_start();
$phone = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $phone = $_POST["phone"];
  $password = ($_POST["psw"]);

  $conn = mysqli_connect("localhost", "dinesh", "dinessh@123", "tcc");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from manager where phone_no = $phone and   password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  if(!empty($_POST["remember"])) {
    setcookie ("phone",$_POST["phone"],time()+ 3600);
    setcookie ("password",$_POST["psw"],time()+ 3600);
    echo "Cookies Set Successfuly";
  } else {
    setcookie("phone","");
    setcookie("password","");
    echo "Cookies Not Set";
  }
  
     $_SESSION['number'] = $phone;
     header('Location: a.php');
     

} else {
     echo "<script>alert('Check Username and Password');</script>";
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
</head>
<body style ="background-color:grey"> 



<form name = "myForm" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <div class="imgcontainer">
    <img src="s.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="phone"><b>Phone number</b></label>
    <input type="number" placeholder="Phone number" name="phone" value="<?php if(isset($_COOKIE["phone"])) { echo $_COOKIE["phone"]; } ?>"required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="signup.php"><button type="button" class="cancelbtn">Signup</button></a>
    <span class="psw">Forgot <a href="managerforgot.php">password?</a></span>
  </div>
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>

</body>
</html>
