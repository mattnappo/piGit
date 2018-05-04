<html lang="en">
	<head>
		<title>PiGit | New Repo</title>

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
		<script type="text/javascript" src="../js/new.js"></script>
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
					$_SESSION["loc"] = "new";
					include("../main/listRepos.php");
				?>
			</div>

			<div class="w3-container w3-threequarter">
				<div class="w3-container">
					<div class="form">
						<form method="post" action="new.html.php">
							<div class="w3-container medium">
								<?php
									echo '
									<label class="blue h1 left">' . $_SESSION["username"] . '/</label>
									';
								?>
								<input class="blue borderlessInput h1 w3-margin-bottom" type="text" name="newRepoName">
								<input class="w3-input w3-border w3-round-large w3-margin-bottom" placeholder="Password" name="password" type="password">

								<span class="red w3-margin-bottom" id="repoNameNull" style="display: none">&nbsp;* Repository name required.</span>
								<span class="red w3-margin-bottom" id="passwordNull" style="display: none">&nbsp;* Password required.</span>

								<span class="red w3-margin-bottom" id="newRepoNameInUse" style="display: none">&nbsp;* That repository already exists.</span>
								<span class="red w3-margin-bottom" id="passwordError" style="display: none">&nbsp;* Incorrect password.</span>

								<div class="right">
									<label for="addReadme">
										<input class="w3-check w3-margin-bottom" type="checkbox" id="addReadme" onclick="showHideDesc(this)" />
										<span class="reponoHover">Initialize with a README</span>
									</label>

									<div id="descriptionDiv" style="display: none">
										<input class="w3-input w3-border w3-round-large w3-margin-bottom" placeholder="Description" name="description">
									</div>
								</div>

								<div class="right">
									<button class="w3-button w3-round-large blue-btn padded" type="submit" name="createNewRepo">Create</button>
									<a class="w3-margin-left cancel" href="../main/">Cancel</a>
								</div>
							</form>
						</div>
						<?php include('new.php'); ?>
				</div>
  		</div>

		</div>
		<script>
			// document.getElementById("repoNameNull").style.display = "none";
			// document.getElementById("passwordNull").style.display = "none";
		</script>
  </body>
	<?php include("../main/authorize.php"); ?>
</html>
