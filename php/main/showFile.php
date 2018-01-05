<?php
	if(isset($_GET['showf'])) {
		echo "<h1 class='blue'>" . $_SESSION['username'] . "/" . $_GET['selectedRepo'] . "/" . $_GET['showf'] . "</h1>";
		$location = $location = "users/" . $_SESSION['username'] . "/" . $_GET['selectedRepo'] . "/" . $_GET['showf'];
		$myfile = fopen($location, 'r') or die('Error loading database');
		$fileContents = fread($myfile, filesize($location));
		echo $fileContents;
	}
?>
