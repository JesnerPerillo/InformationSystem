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
  <link rel="stylesheet" href="report.css">
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
          <li><a href="task.php">
            <i class="uil uil-clipboard-notes"></i>
            <span class="link-name">Tasks</span>
          </a></li>
          <li class="colored"><a href="">
            <i class="uil uil-chart-bar"></i>
            <span id="coloredd" class="link-name">Reports</span>
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
        <i class="uil uil-chart-line"></i>
          <p>REPORTS</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

    <section class="img-div">
      <img src="images/report.svg" alt="Report">
    </section>

    <section class="report-div">
      <h2>ADD REPORT</h2>
      <form action="add_report.php" method="POST" autocomplete="off">
          <label>Date: </label><br>
          <input type="date" name="Date" required><br>
          <label>Department: </label><br>
          <input type="text" name="Department" required placeholder="ex. COS"><br>
          <label>Name: </label><br><input type="text" name="Name" required><br>
          <label>Status: </label><br><input type="text" name="Status" required placeholder="ex. Done, Pending"><br>
          <label>Evaluation: </label><br><input type="text" name="Evaluation" required placeholder="ex. Very Good-Very Bad"><br>
          <input type="submit" value="Add Report" class="btnt">
      </form>
    </section>

    <section class="tb">
      <div class="list-records">
        <p>List of Records | </p> 
        <a href="generatepdf.php"><button> Convert to PDF </button></a>
      </div>
      <table width="100%">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Date</th>
              <th scope="col">Department</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Evaluation</th>
              <th scope="col">Options</th>
            </tr>
          </thead>
            <tbody>
              <?php
                include 'connect.php';
                $servername = "localhost";
                $username = "root";
                $password = "";
                $name = "Project";
                $conn = mysqli_connect($servername, $username, $password, $name);
                if (!$conn) {
                  die ("Connection Failure");
                }
                $sql = "SELECT * FROM report";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($result)){
                  $id = $row['id'];
                  $Date = $row['Date'];
                  $Department = $row['Department'];
                  $Name = $row['Name'];
                  $Status = $row['Status'];
                  $Evaluation = $row['Evaluation'];
                  echo "<tr>
                  <td scope='row'>$id</td>
                  <td>$Date</td>
                  <td>$Department</td>
                  <td>$Name</td>
                  <td>$Status</td>
                  <td>$Evaluation</td>
                  <td>
                      <button style='background-color:#3A4D; border:none; padding:5px; border-radius:5px'>
                          <a style='text-decoration:none; color:white'?id=$id' onclick='openEditForm()'\">Edit</a>
                      </button>
                      <button style='background-color:#D21312; border:none; padding:5px; border-radius:5px'>
                          <a style='text-decoration:none; color:white' href='delete_report.php?id=$id' onclick=\"return confirm('Are you sure?')\">Delete</a>
                      </button>
                  </td>
              </tr>";
                }
              ?>
            </tbody>
        </table>
      </section>

      <section class="edit-sec">
        <div id="editFormContainer" class="edit-form-container">
          <form id="editForm" class="edit-form" action="update_report.php" method="POST" autocomplete="off">
          <label>ID: </label><br>
            <input type="text" name="id" required><br>
          <label>Date: </label><br>
          <input type="date" name="Date" required><br>
          <label>Department: </label><br>
          <input type="text" name="Department" required placeholder="ex. COS"><br>
          <label>Name: </label><br><input type="text" name="Name" required><br>
          <label>Status: </label><br><input type="text" name="Status" required placeholder="ex. Done, Pending"><br>
          <label>Evaluation: </label><br><input type="text" name="Evaluation" required placeholder="ex. Very Good-Very Bad"><br>
          <button type="submit">Update</button>
          <button class="btn2" type="button" onclick="closeEditForm()">Cancel</button>
        </form>
        </div>
      </section>

        <script>
          function openEditForm() {
            var editFormContainer = document.getElementById("editFormContainer");
            editFormContainer.style.display = "block";
            setTimeout(function () {
                editFormContainer.style.opacity = "1";
            }, 10);
          }

          function closeEditForm() {
            var editFormContainer = document.getElementById("editFormContainer");
            editFormContainer.style.opacity = "0";
            setTimeout(function () {
                editFormContainer.style.display = "none";
            }, 300);
          }
        </script>

      
      <script src="dark-mode.js"></script>
</body>
</html>