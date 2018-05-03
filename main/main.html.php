<html lang="en">
	<head>
		<title>PiGit | Control Panel</title>

		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		<!-- <link rel="stylesheet" href="css/linenum/default.css"> -->
		<link rel="stylesheet" href="../css/linenum/docco.css">
		<!-- <link rel="stylesheet" href="css/linenum/mono-blue.css"> -->

		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/linenum.css">

		<script src="../js/highlight.pack.js"></script>
	  <script>
	    hljs.tabReplace = '    ';
	    hljs.initHighlightingOnLoad();
	  </script>

	</head>

  <body>

		<div class="w3-row">

			<div class="blue-btn w3-container tall w3-quarter">
				<h1>PiGit</h1>
				<?php
					session_start();
					if(isset($_GET['showf'])) {
						include("listFiles.php");
					} else {
						include("listRepos.php");
					}
				?>
			</div>

			<div class="w3-container w3-threequarter">
				<div class="w3-container">
					<?php
						if(!isset($_GET['showf'])) {
							include("listFiles.php");
						}
					?>
				</div>

				<div class="w3-container">
					<?php include("showFile.php"); ?>
				</div>
  		</div>

		</div>
  </body>
	<?php include("authorize.php"); ?>
</html>
