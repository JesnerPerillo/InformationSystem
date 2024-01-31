<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['password'])) {
    $id = $_POST['user_id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE id = $id AND password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows === 1) {
        $sql = "DELETE FROM users WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User deleted successfully'); window.location.href = 'database.php';</script>";
        exit();
        } else {
        echo "Error deleting user: " . $conn->error;
        }
    } else {
         echo "<script>alert('Incorrect ID or password. Deletion failed.'); window.location.href = 'database.php';</script>";
    }
}
$conn->close();
?>
