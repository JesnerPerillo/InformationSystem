<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Date = $_POST["Date"];
    $Department = $_POST["Department"];
    $Name = $_POST["Name"];
    $Status = $_POST["Status"];
    $Evaluation = $_POST["Evaluation"];

    $sql = "INSERT INTO report (Date, Department, Name, Status, Evaluation)
            VALUES ('$Date', '$Department', '$Name', '$Status', '$Evaluation')";

    if ($conn->query($sql) === TRUE) {
        echo "Report added successfully";
        header("Location: report.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
