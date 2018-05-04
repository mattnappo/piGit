<?php
  $servername = "localhost";
  $serverUser = "root";
  $dbName = "main";
  $serverPass = "";
  session_start();
  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)) {
      $hashed_password = md5($password);
      $connection = new mysqli($servername, $serverUser, $serverPass, $dbName);
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      $auth = false;
      $sql = "SELECT id, username, password FROM git";
      $result = $connection->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row['username'] == $username && $row['password'] == $hashed_password) {
            $auth = true;
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $hashed_password;
            header("location: ../main/");
          }
        }
        if($auth == false) {
          echo '<script>document.getElementById("loginError").style.display = "block";</script>';
        }
      }
      $connection->close();
    } else {
      if(empty($username)) {
        echo '<script>document.getElementById("usernameNull").style.display = "block";</script>';
      }
      if(empty($password)) {
        echo '<script>document.getElementById("passwordNull").style.display = "block";</script>';
      }
    }
  }
?>
