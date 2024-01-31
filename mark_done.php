<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    if (isset($_SESSION['tasks'][$index]) && strpos($_SESSION['tasks'][$index], "✅") === false) {
        $_SESSION['tasks'][$index] = "✅ " . $_SESSION['tasks'][$index];
    }
}

header("Location: task.php");
exit();
?>

