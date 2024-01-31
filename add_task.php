<?php
session_start();
if (isset($_POST['task'])) {
    $task = $_POST['task'];
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }
    $_SESSION['tasks'][] = $task;
}
header("Location: task.php");
exit();
