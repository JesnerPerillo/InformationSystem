<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new mysqli($servername, 
              $username, $password);

  if ($conn->connect_error) {
    die ("Connection Failure: "
    . $conn->connect_error);
  }

  $sql = "CREATE DATABASE project";
  if ($conn->query($sql) == TRUE) {
    echo "Database wiht name project";
  }else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
?>