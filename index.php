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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="index.css">
  <title>Project</title>
</head>
<body class="light">
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="images/admin.svg" alt="admin logo">
        </div>

        <span class="logo_name"><?php echo $row["username"];?></span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li class="colored"><a href="">
            <i class="uil uil-estate"></i>
            <span id="coloredd" class="link-name">Dashboard</span>
          </a></li>
          <li><a href="Account.php">
            <i class="uil uil-user"></i>
            <span class="link-name">Account</span>
          </a></li>
          <li><a href="faculty.php">
            <i class="uil uil-users-alt"></i>
            <span class="link-name">Faculties</span>
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
          <i class="uil uil-list-ul"></i>
          <p>DASHBOARD</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

    <section class="mainn">
      <div class="welcome">
        <img src="images/wc.svg" alt="Welcome">
        <p>Welcome,<br> <?php echo $row["username"];?>!</p>
      </div>
      <div class="calendar">
        <h1>December</h1>
        <table>
          <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>1</th>
            <th>2</th>
          </tr>
          <tr>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th class="date">8</th>
            <th>9</th>
          </tr>
          <tr>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
          </tr>
          <tr>
            <th>17</th>
            <th>18</th>
            <th>19</th>
            <th>20</th>
            <th>21</th>
            <th>22</th>
            <th>23</th>
          </tr>
          <tr>
            <th>24</th>
            <th>25</th>
            <th>26</th>
            <th>27</th>
            <th>28</th>
            <th>29</th>
            <th>30</th>
          </tr>
          <tr>
            <th>31</th>
          </tr>
        </table>
      </div>

        <?php
        $totalTasks = isset($_SESSION['tasks']) ? count($_SESSION['tasks']) : 0;
        ?>
        <?php
          include "connect.php";

          // Assuming you have a sessions table
          $scheduleCountQuery = $conn->query("SELECT COUNT(*) as count FROM schedules");
          $scheduleCount = $scheduleCountQuery->fetch_assoc()['count'];

          $conn->close();
        ?>
        <?php
          include "connect.php";

          // Assuming you have a reports table
          $reportCountQuery = $conn->query("SELECT COUNT(*) as count FROM report");
          $reportCount = $reportCountQuery->fetch_assoc()['count'];

          $conn->close();
        ?>
        <?php
          include "connect.php";

          // Assuming you have a users table
          $userCountQuery = $conn->query("SELECT COUNT(*) as count FROM users");
          $userCount = $userCountQuery->fetch_assoc()['count'];

          $conn->close();
        ?>
        
      <div class="task">
        <img src="images/task.svg" alt="Task">
        <div class="task-text">
          <p>Total Tasks:<br> <?php echo $totalTasks; ?></p>
        </div>
      </div>

      <div class="sched">
        <img src="images/sched.svg" alt="sched">
        <div class="sched-text">
          <p>Total Schedules:<br> <?php echo $scheduleCount; ?></p>
        </div>
      </div>

      <div class="report">
        <img src="images/report1.svg" alt="report">
        <div class="report-text">
          <p>Total Reports:<br> <?php echo $reportCount; ?></p>
        </div>
      </div>
      <div class="userss">
        <img src="images/userss.svg" alt="users">
        <div class="users-text">
          <p>Total Users:<br><?php echo $userCount; ?></p>
        </div>
      </div>
    </section>

    <script src="dark-mode.js"></script>
</body>
</html>