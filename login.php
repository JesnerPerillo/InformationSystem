<?php
  require 'conf.php';
  if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: index.php");
      }else{
        echo "<script> alert('Wrong Password!');</script>";
      }
    }else{
      echo "<script> alert('User Not Registered!');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>LogIn</title>
</head>
<body>
  <form action="" method="POST" autocomplete="off">
  <div class="header">
    <p>LOGIN</p>
  </div>
    <label>Username or Email</label><br>
    <input type="text" name="usernameemail" id="usernameemail" required><br><br>
    <label>Password</label><br>
    <input type="password" name="password" id="password" required><br><br>
    <div class="but">
      <button type="submit" name="submit" class="log">LogIn</button><br>
    </div>
    <div class="but2">
    <button class="reg"><a href="register.php">Registration</a></button>
    </div>
  </form>
</body>
</html>