<?php
  require 'conf.php';
  if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
  }else{
    header("Location: login.php");
  }
?>
<?php
  include "connect.php";
  $facultyQuery = "SELECT * FROM faculties";
  $roomQuery = "SELECT * FROM rooms";
  
  $facultyResult = $conn->query($facultyQuery);
  $roomResult = $conn->query($roomQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="faculty.css">
  <title>Project</title>
</head>
<body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="images/admin.svg" alt="admin logo">
        </div>
        <span class="logo_name"><?php echo $row["username"];?></span>
      </div>
      <div class="menu-items">
        <ul class="nav-links">
          <li><a href="index.php">
            <i class="uil uil-estate"></i>
            <span class="link-name">Dashboard</span>
          </a></li>
          <li><a href="Account.php">
            <i class="uil uil-user"></i>
            <span class="link-name">Account</span>
          </a></li>
          <li class="colored"><a href="">
            <i class="uil uil-users-alt"></i>
            <span id="coloredd" class="link-name">Faculties</span>
          </a></li>
          <li><a href="task.php">
            <i class="uil uil-clipboard-notes"></i>
            <span class="link-name">Tasks</span>
          </a></li>
          <li><a href="report.php">
            <i class="uil uil-chart-bar"></i>
            <span class="link-name">Reports</span>
          </a></li>
          <li><a href="database.php">
          <i class="uil uil-database"></i>
            <span class="link-name">Database</span>
          </a></li>
        </ul>

        <ul class="logout">
          <li><a href="logout.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Log out</span>
          </a></li>
          <li class="mode"><a href="">
            <i class="uil uil-moon"></i>
            <span class="link-name">Dark Mode</span>
          </a>
            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
        </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
        <div class="dash-menu">
          <i class="uil uil-sitemap"></i>
          <p>FACULTIES</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

      <div class="container">
        <img src="images/partner.svg" alt="Partner">
      </div>
      
    <div class="container-1">
      <section class="add-sched">
        <div>
          <h2>Add Schedule</h2>
          <form id="scheduleForm" action="process_schedule.php" method="POST">
          Faculty:
          <select name="faculty_id" id="faculty_id" required>
            <option>Faculty 1</option>
            <option>Faculty 2</option>
            <option>Faculty 3</option>
            <option>Faculty 4</option>
            <option>Faculty 5</option>
            <option>Faculty 6</option>
            <option>Faculty 7</option>
            <option>Faculty 8</option>
            <option>Faculty 9</option>
            <option>Faculty 10</option>
          </select><br>
          Room:
          <select name="room_id" id="room_id" required>
            <option>Room 1</option>
            <option>Room 2</option>
            <option>Room 3</option>
            <option>Room 4</option>
            <option>Room 5</option>
            <option>Room 6</option>
            <option>Room 7</option>
            <option>Room 8</option>
            <option>Room 9</option>
            <option>Room 10</option>
          </select><br>
            Date: <input type="date" name="date" id="date" required><br>
            Start Time: <input type="time" name="start_time" id="start_time" required><br>
            End Time: <input type="time" name="end_time" id="end_time" required><br>
            <input type="submit" value="Add Schedule">
            </form>
            <div id="result"></div>
          </div>
      </section>
    </div>

    <?php
      include "connect.php";
      $scheduleResult = $conn->query("SELECT * FROM schedules");
      $schedules = $scheduleResult->fetch_all(MYSQLI_ASSOC);

      $conn->close();
    ?>

    <div class="container-3">
      <section class="schedule-table">
        <h2>SCHEDULES</h2>
        <table>
          <thead>
            <tr>
                <th>Faculty</th>
                <th>Room</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($schedules as $schedule): ?>
              <tr>
                <td>Faculty <?php echo $schedule['faculty_id']; ?></td>
                <td>Room <?php echo $schedule['room_id']; ?></td>
                <td><?php echo $schedule['schedule_date']; ?></td>
                <td><?php echo $schedule['start_time']; ?></td>
                <td><?php echo $schedule['end_time']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </div>

  <script src="dropdown.js"></script>
  <script src="dark-mode.js"></script>
</body>
</html>