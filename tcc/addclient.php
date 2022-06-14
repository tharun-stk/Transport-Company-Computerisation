<?php
session_start();
$sname =$snumber=$scity=$scom=$rname =$rnumber=$rcity=$rcom=$deal=" ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $deal=$_POST['deal'];
    $sname = $_POST['sname'];
    $snumber= $_POST['sphone'];
    $scity= ($_POST['scity']);
    $scom=$_POST['scom'];
    $rname = $_POST['rname'];
    $rnumber= $_POST['rphone'];
    $rcity= ($_POST['rcity']);
    $rcom=$_POST['rcom'];
    $conn = mysqli_connect("localhost","dinesh","dinessh@123", "tcc");

    if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $ql = "select * from sender where deal_no = $deal ";
    $re = mysqli_query($conn, $ql);
    

if ( mysqli_num_rows($re) > 0 )
{
    echo "<script>alert('dealer no already exists');</script>";
}
else{
    $mysql="insert into sender(sender_name,phone_number,address,company_name,deal_no) values('$sname', $snumber, '$scity','$scom',$deal)";
        $value=mysqli_query($conn,$mysql);
    $sql="insert into reciever(reciever_name,phone_number,address,company_name,deal_no) values('$rname', $rnumber, '$rcity','$rcom',$deal)";
        $result=mysqli_query($conn,$sql);
}

       
    
    
    if ($value === TRUE && $result === TRUE)
     {
        
        

            header('Location: emp_pa.php');
           
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
    <label for="deal"><b>DEALER NO</b></label>
    <input type="number" placeholder="Enter phone number" name="deal" required>
    <label for="sname"><b>SENDER NAME</b></label>
    <input type="text" placeholder="Enter the sender name" name="sname" required>

    <label for="sphone"><b>SENDER PHONE</b></label>
    <input type="number" placeholder="Enter phone number" name="sphone" required>
    

    <label for="scom"><b>SENDER COMPANY</b></label>
    <input type="text" placeholder="Enter sender company" name="scom" required>
        
    <label for="scity"><b>CITY</b></label>
    <input type="text" placeholder="Enter city" name="scity" required>
    <label for="rname"><b>RECIEVER NAME</b></label>
    <input type="text" placeholder="Enter your reciever name" name="rname" required>
    
    <label for="rphone"><b>RECIEVER PHONE</b></label>
    <input type="number" placeholder="Enter phone number" name="rphone" required>
    <label for="rcom"><b>RECIEVER COMPANY</b></label>
    <input type="text" placeholder="Enter reciever company" name="rcom" required>
        
    <label for="rcity"><b>CITY</b></label>
    <input type="text" placeholder="Enter city" name="rcity" required>

    <button type="submit" name="summit">ADD</button>
  </div>

 
</form>
<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html>
