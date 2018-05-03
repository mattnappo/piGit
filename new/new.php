<?php
  if(isset($_POST['createNewRepo'])) {
    $newRepoName = $_POST['newRepoName'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    // echo $newRepoName . " $ " . $description . " $ password: " . $password . ". $ session password: " . $_SESSION['password'];
    if(!empty($newRepoName) && !empty($password)) {
      if($_SESSION['password'] == md5($password)) {
        $dir = '../main/users/' . $_SESSION["username"] . '/' . $newRepoName;
        if (!file_exists($dir)) {
            mkdir($dir);
        } else {
          echo '<script>document.getElementById("newRepoNameInUse").style.display = "block";</script>';
        }
      } else {
        echo '<script>document.getElementById("passwordError").style.display = "block";</script>';
      }
    } else {
      if(empty($newRepoName)) {
        echo '<script>document.getElementById("repoNameNull").style.display = "block";</script>';
      }
      if(empty($password)) {
        echo '<script>document.getElementById("passwordNull").style.display = "block";</script>';
      }
    }
  }
?>
