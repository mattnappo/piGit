<?php
// make a description box
// Make folders work and make the side panel list the files in that folder when a file in the subfolder is selected. recursion?
// When the folder is selected, make it list the files inside
// when the file is selected, turn the side panel into a folder list-view
	if(!function_exists('showFiles')) {
		function showFiles($class) {
			$location = "users/" . $_SESSION['username'] . "/" . $_GET['selectedRepo'];
			$files = scandir($location);
			echo '<ul>';
			for($i = 2; $i < sizeof($files); $i++) {
				echo '
				<li>
					<span class="glyphicon glyphicon-file"></span>&nbsp;
					<a class="' . $class . '" href="main.html.php?selectedRepo=' . $_GET['selectedRepo'] . '&showf=' . $files[$i] . '">' . $files[$i] . '</a>
				</li>
				';
			}
			echo '</ul>';
		}
	}
	if(isset($_GET['selectedRepo'])) {
		if(isset($_GET['showf'])) {
			echo '
			<h4>
				<a class="repo">Files</a> |
				<a class="repo" href="main.html.php?selectedRepo=' . $_GET["selectedRepo"] . '">Repositories</a>
			</h4>
			';
			showFiles('repo');
		} else {
			echo "<h1 class='blue'>" . $_SESSION['username'] . "/" . $_GET['selectedRepo'] . "</h1>";
			showFiles('file');
		}
	} else {
		echo '<h1 class="blue">' . $_SESSION["username"] . '/</h1>';
	}
	//$location = 'main.html.php?selectedRepo=' . $_GET["selectedRepo"] . '&showf=' . $_GET['showf'];
	//header('location: ' . $location);
?>
