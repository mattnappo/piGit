<?php
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
