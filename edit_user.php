<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["password"];

    $check_password_sql = "SELECT password FROM users WHERE id=$id";
    $result = $conn->query($check_password_sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row["password"];

    if ($current_password === $stored_password) {
    $update_sql = "UPDATE users SET username='$username', email='$email', password='$new_password' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "<script>alert('User information updated successfully'); window.location.href = 'database.php';</script>";
    } else {
        echo "<script>alert('User with ID $id not found. Update failed.'); window.location.href = 'database.php';</script>";
    }
    } else {
        echo "<script>alert('Error updating user information: " . $conn->error . "'); window.location.href = 'database.php';</script>";
    }
    } else {
        echo "<script>alert('Current password is incorrect. Update failed.'); window.location.href = 'database.php';</script>";
    }
    } else {
        echo "<script>alert('User not found. Update failed.'); window.location.href = 'database.php';</script>";
    }
}
$conn->close();
?>
