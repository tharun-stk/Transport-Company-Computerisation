<?php 
$username = "dinesh"; 
$password = "dinessh@123"; 
$database = "tcc"; 
$mysqli = new mysqli("localhost", "dinesh","dinessh@123" ,"tcc"); 
$query = "SELECT * FROM employee";


echo '
<table border="1" cellspacing="2" cellpadding="2" > 
      <tr> 
          <td> <font face="Arial">EMPLOYEE ID</font> </td> 
          <td> <font face="Arial">EMPLOYEE NAME</font> </td> 
          <td> <font face="Arial">PHONE NO</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["employee_id"];
        $field2name = $row["emplyoee_name"];
        $field3name = $row["phone_no"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/scrollreveal@4"></script>
<style>
table {
  width:50%;
  margin-left:30%;
  height:10%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 8px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;width:30%;margin:auto}

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
<body>
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
    <input type="text" placeholder="Enter a key to remember" name="secret" required>
    <button type="submit" name="summit">signup</button>
    
  </div>

 
</form>

<script>

ScrollReveal().reveal('.container', { duration: 2000 });
ScrollReveal().reveal('.button', { interval: 200 });
    </script>


</body>
</html