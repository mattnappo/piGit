<?php
  session_start();
  $location = "users/" . $_SESSION['username'] . "/";
  $repos = scandir($location);
  echo '<link rel="stylesheet" href="css/style.css">';
  for($i = 2; $i < sizeof($repos); $i++) {
    echo '
    <li>
      <span class="glyphicon glyphicon-folder-open"></span>&nbsp;
      <a class="repo" href="main.html.php?clicked=1&name=' . $repos[$i] . '">' . $repos[$i] . '</a>
    </li>
    ';
  }
?>
