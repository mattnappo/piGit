<?php
  //<a class="repo" href="new.html.php">New</a>
  $clickScript = "document.getElementById('newRepo').style.display = 'block'";

  $dir = "";
  $repos = array();

  if(isset($_SESSION['loc']) && $_SESSION['loc'] == "new") {
    echo '
      <h4>
        <a class="repo" href="../main/">Repositories</a> |
        <a class="repo" href="new/">New Repo</a>
      </h4>
      ';
      $dir = '../main/users/' . $_SESSION["username"] . '/';
      $repos = scandir($dir);
      $_SESSION["loc"] = "notnew";
  } else {
    echo '
      <h4>
        <span class="reponoHover">Repositories</span> |
        <a class="repo" href="../new/">New Repo</a>
      </h4>
      ';
      $dir = 'users/' . $_SESSION["username"] . '/';
      $repos = scandir($dir);
  }

  echo '<link rel="stylesheet" href="../css/style.css">';
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
