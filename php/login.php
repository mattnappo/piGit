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
        $pwHash = md5($password);
        if($username == $key && $pwHash == $value) {
          $_SESSION["username"] = $username;
          $_SESSION["password"] = $pwHash;
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
