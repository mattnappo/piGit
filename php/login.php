<?php
  session_start();
  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)) {
      $myfile = fopen('users/users.json', 'r') or die('Error loading database');
      $rawJSON = fread($myfile, filesize('./users/users.json'));
      $json = json_decode($rawJSON, true);
      foreach ($json["users"] as $key => $value) {
        if($username == $key && md5($password) == $value) {
          $_SESSION["username"] = $username;
          header("location: main.html.php");
          exit("");
        }
      }
      echo '<script>document.getElementById("loginError").style.display = "block";</script>';
      fclose($myfile);
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
