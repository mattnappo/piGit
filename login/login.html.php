<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="../js/login.js"></script>

		<title>PiGit | Login</title>
	</head>

	<body>
		<div id="loginError" class="w3-modal">
		  <div class="w3-modal-content">
		    <div class="w3-container">
		      <span onclick="document.getElementById('loginError').style.display='none'"
		      class="w3-button w3-display-topright">&times;</span>
		      <p>Your username or password is incorrect.</p>
		    </div>
		  </div>
		</div>
		<div class="w3-container small center-div">
			<form method="post" action="login.html.php">
				<h1 class="blue">PiGit</h1>

				<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="username" name="username" placeholder="Username" type="text">
				<span class="red w3-margin-bottom hide" id="usernameNull">&nbsp;* Required field</span>

				<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="password" name="password" placeholder="Password" type="password">
				<span class="red w3-margin-bottom hide" id="passwordNull">&nbsp;* Required field</span>

				<button class="w3-button w3-round-large blue-btn padded" type="submit" name="login">Login</button>
				<p>
					Need an account? <a href="../register/">Register Here</a>.
				</p>
		</div>
	</body>
	<?php include('login.php'); ?>
</html>
