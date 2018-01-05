<?php
	if(isset($_GET['showf'])) {
		$location = $location = "users/" . $_SESSION['username'] . "/" . $_GET['name'] . "/" . $_GET['showf'];
		$myfile = fopen($location, 'r') or die('Error loading database');
		$fileContents = fread($myfile, filesize($location));
		echo $fileContents;
	} else {
		if(isset($_GET['name'])) {
			echo '<h1 class="blue">' . $_SESSION["username"] . '/' . $_GET['name'] . '</h1>';
			$location = "users/" . $_SESSION['username'] . "/" . $_GET['name'];
			$files = scandir($location);
			for($i = 2; $i < sizeof($files); $i++) {
				echo '
				<li>
					<span class="glyphicon glyphicon-file"></span>&nbsp;
					<a class="repo" href="main.html.php?name=' . $_GET['name'] . '&showf=' . $files[$i] . '">' . $files[$i] . '</a>
				</li>
				';
			}
		} else {
			echo '<h1 class="blue">' . $_SESSION["username"] . '/</h1>';
		}
	}

?>
