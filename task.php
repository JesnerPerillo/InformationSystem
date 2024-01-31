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
  <link rel="stylesheet" href="task.css">
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
          <li><a href="faculty.php">
            <i class="uil uil-users-alt"></i>
            <span class="link-name">Faculties</span>
          </a></li>
          <li class="colored"><a href="">
            <i class="uil uil-clipboard-notes"></i>
            <span id="coloredd" class="link-name">Tasks</span>
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
        <i class="uil uil-clipboard"></i>
          <p>TASKS</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

    <section class="taskk">
      <h1>Hello <?php echo $row["username"];?>!, This is Your To-Do List!</h1>
      <form action="add_task.php" method="post" autocomplete="off">
          <label for="task">Add Task:</label>
          <input type="text" id="task" name="task" required>
          <button type="submit">Add</button>
      </form>
      <h2>Tasks:</h2>
      <ul>
        <?php
        if (isset($_SESSION['tasks'])) {
          foreach ($_SESSION['tasks'] as $index => $task) {
            echo "<li>";
            echo "<div class='task-text'>$task</div>";
            echo "<button class='mark-done' onclick='markDone($index)'>Mark as Done</button>";
            echo "<button class='delete-task' onclick='deleteTask($index)'>Delete</button>";
            echo "</li>";
          }
        }
        ?>
      </ul>
    </section>

    <script>
        function markDone(index) {
        window.location.href = "mark_done.php?index=" + index;
        }
        function deleteTask(index) {
          if (confirm("Are you sure you want to delete this task?")) {
          window.location.href = "delete_task.php?index=" + index;
            }
        }
    </script>

    <script>
        function markDone(index) {
            window.location.href = "mark_done.php?index=" + index;
        }
    </script>
    
  <script src="dark-mode.js"></script>
</body>
</html>