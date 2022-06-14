<?php
session_start();
$r=$_SESSION["number"];
$name =$number_e=$password=$secret_key=" ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['uname'];
    $number_e= $_POST['phone'];
    $password = ($_POST['psw']);
    $secret_key=$_POST['secret'];
    $conn = mysqli_connect("localhost","dinesh","dinessh@123", "tcc");

    if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
    }
    $mysql = "select manager_id from manager where phone_no= '$r'";
    $a=mysqli_query($conn,$mysql);
    $b=mysqli_fetch_assoc($a);
    $c=$b['manager_id'];
    
    $sql = "select * from employee where phone_no = '$number_e'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count > 0) {
        echo "<script>alert('Number Already Exists');</script>";
        
    } else {
        
        $mysql="insert into employee(emplyoee_name,phone_no,paasword,secret_key,manager_id) values('$name', $number_e, '$password','$secret_key',$c)";
        $value=mysqli_query($conn,$mysql);
       
    }
    
    if ($value === TRUE )
     {
         echo "<script>alert('account created');</script>";
        

            header('Location: a.php');
           
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
  <div class="container">
    <label for="uname"><b>employee name</b></label>
    <input type="text" placeholder="Enter your name" name="uname" required>

    <label for="phone"><b>employee number</b></label>
    <input type="number" placeholder="Enter phone number" name="phone" required>
    

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <label for="secret"><b>Secretkey</b></label>
    <input type="text" placeholder="Enter your pets name" name="secret" required>
    <button type="submit" name="summit">ADD</button>
    
  </div>

 
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html>
