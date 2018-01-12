<?php
  if(isset($_POST['createNewRepo'])) {
    $newRepoName = $_POST['newRepoName'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    echo $newRepoName . " $ " . $description;
    if(!empty($newRepoName) && !empty($password)) {
      if($_SESSION['password'] == $password) {
        /* if repo name not in use  {

        } else {
        echo '<script>document.getElementById("newRepoNameNull").style.display = "block";</script>';
      }*/

      } else {
        echo '<script>document.getElementById("passwordError").style.display = "block";</script>';
      }
    } else {
      if(empty($newRepoName)) {
        echo '<script>document.getElementById("newRepoNameNull").style.display = "block";</script>';
      }
      if(empty($password)) {
        echo '<script>document.getElementById("passwordNull").style.display = "block";</script>';
      }
    }
  }
?>
