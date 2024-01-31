<?php
  require 'conf.php';
  if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      echo "<script> alert('Username or Email Has Already Taken!');</script>";
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO users VALUES('', '$username', '$email', '$password')";
        mysqli_query($conn,$query);
        echo "<script> alert('Registration Successful!');</script>";
      }
      else{
        echo "<script> alert('Password Does Not Match!');</script>";
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="register.css">
  <title>Registration</title>
</head>
<body>
  <form action="" method="POST" autocomplete="off">
    <div class="header">
      <p>REGISTER</p>
    </div>
      <label>Username</label>
      <input type="text" name="username" id="username" required><br><br>
      <label>Email</label>
      <input type="text" name="email" id="email" required><br><br>
      <label>Password</label>
      <input type="password" name="password" id="password" required><br><br>
      <label>Confirm Password</label>
      <input type="password" name="confirmpassword" id="confirmpassword" required><br><br>
      <div class="but">
        <button type="submit" name="submit" class="reg">Register</button><br>
      </div>
      <div class="but2">
      <button class="log"><a href="login.php">LogIn</a></button></a>
      </div>
  </form>
  
  <
 </body>
</html>