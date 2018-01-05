<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="main.js"></script>

		<title>PiGit | Control Panel</title>
	</head>

  <body>
		<div class="w3-row">

			<div class="blue-btn w3-container w3-quarter">
				<h1>PiGit</h1>
				<h4>Repositories</h4>
				<ul>
					<?php include("main/listRepos.php"); ?>
				</ul>
			</div>

			<div class="w3-container w3-threequarter">
				<ul>
					<?php include("main/listFiles.php"); ?>
				</h1>
  		</div>

		</div>
  </body>
	<?php include("main/authorize.php"); ?>
</html>
