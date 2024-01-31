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
  <link rel="stylesheet" href="Account.css">
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
          <li class="colored"><a href="">
            <i class="uil uil-user"></i>
            <span id="coloredd"  class="link-name">Account</span>
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
          <i class="uil uil-user-check"></i>
          <p>ACCOUNT</p>
        </div>
        <div class="prof">
          <img src="images/admin.svg" alt="Admin">
        </div>
    </section>

    <section class="bodyy">
      <div class="upper">
        <img src="images/acc.svg" alt="Account">
        <div class="upper-text">
          <p>Customize Your Account!</p><br>
          <p>You are now <?php echo $row["username"];?>!</p>
        </div>
      </div>
      <table>
          <tr>
            <th>id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Options</th>
          </tr>
          <tr>
            <td><p><?php echo $row["id"];?></p></td>
            <td><p><?php echo $row["username"];?></p></td>
            <td><p><?php echo $row["email"];?></p></td>
            <td><p><?php echo password_hash($row["password"], PASSWORD_DEFAULT);?></p></td>
            <td>
            <button style="background-color:#3A4D; border:none; padding:5px; border-radius:5px">
            <a style="text-decoration:none; color:white;" href="javascript:void(0);" onclick="openEditForm()">Edit</a>
            </button>
            <button style='background-color:#D21312; border:none; padding:5px; margin-left:5px; border-radius:5px'>
            <a style='text-decoration:none; color:white;' href='javascript:void(0);' onclick='openDeleteForm()'>Delete</a>
            </button>
            </td>
          </tr>
        </table>
        <div class="color">
        </div>
        <div class="cus">
            <img src="images/cus.svg" alt="Customize">
          </div>
    </section>
    
    <section class="edit-sec">
      <div id="editFormContainer" class="edit-form-container">
        <form id="editForm" class="edit-form" action="edit_acc.php" method="POST" autocomplete="off">
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

    <div id="deleteFormContainer">
      <form method="POST" action="delete_acc.php" autocomplete="off">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Delete User</button>
        <button type="button" onclick="closeDeleteForm()">Close</button>
      </form>
    </div>

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