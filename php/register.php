<?php
  session_start();
  if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpw = $_POST['confirmpw'];
    if(!empty($username) && !empty($password) && $password == $confirmpw) {
      $myfile = fopen('users/users.json', 'r') or die('Error loading database');
      $rawJSON = fread($myfile, filesize('./users/users.json'));
      $json = json_decode($rawJSON, true);
      foreach ($json["users"] as $key => $value) {
        if($key == $username) {
          echo '<script>document.getElementById("usernameInUse").style.display = "block";</script>';
          exit("");
        }
      }
      $newJSON = substr($rawJSON, 0, -2);
      $newJSON =  $newJSON . ',"' . $username . '":"' . md5($password) . '"}}';
      fclose($myfile);
      $myfile = fopen('users/users.json', 'w') or die('Error loading database');
      file_put_contents("users/users.json", "");
      fwrite($myfile, $newJSON);
      fclose($myfile);
      $fname = "users/" . $username;
      mkdir($fname);
      echo '<script>document.getElementById("registerSuccess").style.display = "block";</script>';
    } else {
      if(empty($username)) {
        echo '<script>document.getElementById("usernameNull").style.display = "block";</script>';
      }
      if(empty($password)) {
        echo '<script>document.getElementById("passwordNull").style.display = "block";</script>';
      }
      if($password != $confirmpw) {
        echo '<script>document.getElementById("passwordMatchError").style.display = "block";</script>';
      }
    }
  }
?>
