<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $faculty_name = $_POST["faculty_id"];
    $room_name = $_POST["room_id"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $facultyCheckQuery = $conn->prepare("SELECT * FROM faculties WHERE name = ?");
    $facultyCheckQuery->bind_param("s", $faculty_name);
    $facultyCheckQuery->execute();
    $facultyCheckResult = $facultyCheckQuery->get_result();
    if ($facultyCheckResult->num_rows === 0) {
        $insertFacultyQuery = $conn->prepare("INSERT INTO faculties (name) VALUES (?)");
        $insertFacultyQuery->bind_param("s", $faculty_name);
        $insertFacultyQuery->execute();
        $insertFacultyQuery->close(); 
    }
    $roomCheckQuery = $conn->prepare("SELECT * FROM rooms WHERE name = ?");
    $roomCheckQuery->bind_param("s", $room_name);
    $roomCheckQuery->execute();
    $roomCheckResult = $roomCheckQuery->get_result();
    if ($roomCheckResult->num_rows === 0) {
        $insertRoomQuery = $conn->prepare("INSERT INTO rooms (name) VALUES (?)");
        $insertRoomQuery->bind_param("s", $room_name);
        $insertRoomQuery->execute();
        $insertRoomQuery->close(); 
    }
    $facultyId = $conn->query("SELECT id FROM faculties WHERE name = '$faculty_name'")->fetch_assoc()['id'];
    $roomId = $conn->query("SELECT id FROM rooms WHERE name = '$room_name'")->fetch_assoc()['id'];
    $insertQuery = $conn->prepare("INSERT INTO schedules (faculty_id, room_id, schedule_date, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
    $insertQuery->bind_param("sssss", $facultyId, $roomId, $date, $start_time, $end_time);
    if ($insertQuery->execute()) {
        echo "Schedule added successfully";
        header("Location: faculty.php");
    } else {
        echo "Error: " . $insertQuery->error;
    }
    $facultyCheckQuery->close();
    $roomCheckQuery->close();
    $insertQuery->close();
}
$conn->close();
?>
