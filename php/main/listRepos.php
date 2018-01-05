<?php
  echo '
    <h4>
      <a class="repo">Repositories</a> |
      <a class="repo" href="new.html.php">New</a>
    </h4>
  ';
  $location = "users/" . $_SESSION['username'] . "/";
  $repos = scandir($location);
  echo '<link rel="stylesheet" href="css/style.css">';
  echo '<ul>';
  for($i = 2; $i < sizeof($repos); $i++) {
    echo '
    <li>
      <span class="glyphicon glyphicon-folder-open"></span>&nbsp;
      <a class="repo" href="main.html.php?clicked=1&selectedRepo=' . $repos[$i] . '">' . $repos[$i] . '</a>
    </li>
    ';
  }
  echo '</ul>';
?>
