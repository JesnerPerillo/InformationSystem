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
  <link rel="stylesheet" href="database.css">
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
          <li><a href="report.php">
            <i class="uil uil-chart-bar"></i>
            <span class="link-name">Reports</span>
          </a></li>
          <li class="colored"><a href="database.php">
          <i class="uil uil-database"></i>
            <span id="coloredd" class="link-name">Database</span>
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
        <i class="uil uil-database-alt"></i>
          <p>DATABASE</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

    <section>
      <div class="userrs">
        <p>Faculties who have an access</p>
      </div>
      <div class="photo">
        <img src="images/access.svg" alt="Access">
      </div>
      <table>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $name = "Project";
              $conn = mysqli_connect($servername, $username, $password, $name);
              if (!$conn) {
                die ("Connection Failure");
              }
              $sql = "SELECT * FROM users";
              $result = mysqli_query($conn, $sql);
              while($row=mysqli_fetch_array($result)){
                $id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $password = password_hash($row['password'], PASSWORD_DEFAULT);
              echo "<tr>
              <td scope='row'>$id</td>
              <td>$username</td>
              <td>$email</td>
              <td>$password</td>
              <td>
              <button style='background-color:#3A4D; border:none; padding:5px; border-radius:5px'>
              <a style='text-decoration:none; color:white;' href='javascript:void(0);' onclick='openEditForm()'>Edit</a>
              <button style='background-color:#D21312; border:none; padding:5px; margin-left:5px; border-radius:5px'>
              <a style='text-decoration:none; color:white' href='javascript:void(0);' onclick='openDeleteForm()''>Delete</a>
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
        <form id="editForm" class="edit-form" action="edit_user.php" method="POST" autocomplete="off">
          <label>ID: </label><br>
          <input type="text" name="id" required><br>
          <label>Username: </label><br>
          <input type="text" name="username" required><br>
          <label>Email: </label><br>
          <input type="text" name="email" required><br>
          <label>Current Password: </label><br>
          <input type="password" name="current_password" required><br>
          <label>New Password: </label><br>
          <input type="password" name="password" required><br>
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

    <div id="deleteFormContainer">
      <form method="POST" action="delete_user.php" autocomplete="off">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Delete User</button>
        <button type="button" onclick="closeDeleteForm()">Close</button>
      </form>
    </div>

    <script>
      function openDeleteForm() {
        var deleteFormContainer = document.getElementById("deleteFormContainer");
        deleteFormContainer.style.display = "block";
      }
      function closeDeleteForm() {
        var deleteFormContainer = document.getElementById("deleteFormContainer");
        deleteFormContainer.style.display = "none";
      }
    </script>

      <script src="dark-mode.js"></script>
</body>
</html>