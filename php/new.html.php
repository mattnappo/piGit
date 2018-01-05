<html lang="en">
	<head>
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="login.js"></script>

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
    
      <?php
        session_start();
        echo '
        <div class="form">
          <form method="post" action="new.html.php">
            <div class="w3-container">
              <div>
                <label class="blue h1">' . $_SESSION["username"] . '</label>
                <input class="blue borderlessInput h1" type="text"></input>
              </div>
        ';
      ?>
          		<input class="w3-input w3-border w3-round-large w3-margin-bottom" id="username" name="username" type="text">
          		<span class="red w3-margin-bottom hide" id="usernameNull">&nbsp;* Required field</span>

              <div class="right">
                <button class="w3-button w3-round-large blue-btn padded" type="submit" name="login" onclick="login()">Login</button>
                <a class="w3-margin-left cancel" href="main.html.php">Cancel</a>
              </div>
            </div>
          </form>
        </div>

	</body>
  <?php
    include('main/authorize.php');
  ?>
</html>
