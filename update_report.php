<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $Date = $_POST["Date"];
    $Department = $_POST["Department"];
    $Name = $_POST["Name"];
    $Status = $_POST["Status"];
    $Evaluation = $_POST["Evaluation"];

    $sql = "UPDATE report SET Date='$Date', Department='$Department', Name='$Name', Status='$Status', Evaluation='$Evaluation' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:report.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
