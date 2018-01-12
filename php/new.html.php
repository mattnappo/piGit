<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="new.js"></script>

		<title>PiGit | New</title>
	</head>

	<body>

		<div class="form">
			<form method="post" action="new.html.php">
				<div class="w3-container medium">
	  			<?php
	    			session_start();
	    			echo '
	      		<label class="blue h1">' . $_SESSION["username"] . '/</label>
						';
					?>
          <input class="blue borderlessInput h1 w3-margin-bottom" type="text" name="newRepoName">
					<span class="red w3-margin-bottom hide" id="newRepoNameInUse">&nbsp;* That repository name is already in use.</span>
					<span class="red w3-margin-bottom hide" id="repoNameNull">&nbsp;* Required field.</span>

					<input class="w3-input w3-border w3-round-large w3-margin-bottom" placeholder="Password" name="password" type="password">
					<span class="red w3-margin-bottom hide" id="passwordNull">&nbsp;* Required field.</span>
					<span class="red w3-margin-bottom hide" id="passwordError">&nbsp;* Incorrect password.</span>

					<div class="right">
						<label for="addReadme">
							<input class="w3-check w3-margin-bottom" type="checkbox" id="addReadme" onclick="showHideDesc(this)" />
							Initialize with a README
						</label>

						<div id="descriptionDiv" style="display: none">
							<input class="w3-input w3-border w3-round-large w3-margin-bottom" placeholder="Description" name="description">
						</div>
					</div>

					<div class="right">
						<button class="w3-button w3-round-large blue-btn padded" type="submit" name="createNewRepo">Create</button>
						<a class="w3-margin-left cancel" href="main.html.php">Cancel</a>
					</div>
				</form>
			</div>
			<?php include('new.php'); ?>
		</body>
  <?php include('main/authorize.php'); ?>

</html>
