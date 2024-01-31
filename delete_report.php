<?php
include "connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM report WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Report deleted successfully";
        header("Location:report.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No ID provided for deletion.";
}

$conn->close();
?>
