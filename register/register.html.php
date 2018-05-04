<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="../css/style.css">

		<title>PiGit | Register</title>
	</head>

	<body>
		<div id="registerSuccess" class="w3-modal">
		  <div class="w3-modal-content">
		    <div class="w3-container">
	      	<span name="close" onclick="document.getElementById('registerSuccess').style.display = 'none'"
					class="w3-button w3-display-topright">&times;</span>
		      <p>Account successfully created.</p>
		    </div>
		  </div>
		</div>
		<div id="usernameTaken" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
					<span name="close" onclick="document.getElementById('usernameTaken').style.display = 'none'"
					class="w3-button w3-display-topright">&times;</span>
					<p>That username is already taken.</p>
				</div>
			</div>
		</div>


		<div class="w3-container small center-div">
      <form method="post" action="register.html.php">
  			<h1 class="blue">PiGit</h1>

  			<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="username" name="username" placeholder="Username" type="text">

  			<span class="red w3-margin-bottom hide" id="usernameNull">&nbsp;* Required field</span>
  			<span class="red w3-margin-bottom hide" id="usernameInUse">&nbsp;* That username is already in use</span>

  			<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="password" name="password" placeholder="Password" type="password">

  			<span class="red w3-margin-bottom hide" id="passwordNull">&nbsp;* Required field</span>
  			<span class="red w3-margin-bottom hide" id="passwordMatchError">&nbsp;* Passwords do not match</span>

  			<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="confirmpw" name="confirmpw" placeholder="Confirm Password" type="password">
  			<button class="w3-button w3-round-large blue-btn padded" type="submit" name="register">Register</button>
  		</form>
			<p>
				Have an account? <a href="../login/">Login Here</a>.
			</p>
		</div>
		<script>
		</script>
	</body>
  <?php include('register.php'); ?>
</html>
