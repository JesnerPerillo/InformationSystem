<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }
}
header("Location: task.php");
exit();
