<html lang="en">
	<head>
		<link rel="icon" type="image/ico" href="">
		<link rel="stylesheet" type="text/css" href="css/w3.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<title>Register</title>
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	</head>

	<body>
		<div class="w3-bar w3-red w3-padding">
			<a href="login.php" class="w3-bar-item w3-button w3-hover-white">Login</a>
		  	<a href="register.php" class="w3-bar-item w3-button w3-hover-white">Register</a>
		</div>

		<div id="match" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
		    	<span onclick="document.getElementById('match').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      		<p>Error: Passwords must match.</p>
		    	</div>
		  	</div>
		</div>
		<div id="emptyuser" class="w3-modal">
			<div class="w3-modal-content">1
				<div class="w3-container">
		    	<span onclick="document.getElementById('emptyuser').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      		<p>Error: Username field required.</p>
		    	</div>
		  	</div>
		</div>
		<div id="emptyuser" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
		    	<span onclick="document.getElementById('emptypass').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      		<p>Error: Password field required.</p>
		    	</div>
		  	</div>
		</div>
		<div id="success" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
		    	<span onclick="document.getElementById('success').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		      		<p>Success! Account registered.</p>
		    	</div>
		  	</div>
		</div>

		<div class="w3-row w3-padding-large">
			<form class="w3-container w3-third" method="post" action="register.php">
				<h1 class="w3-center">Register</h1>
				<label>Username</label>
				<input class="w3-input w3-hover-border-red" name="name" type="text">
				<label>Password</label>
				<input class="w3-input w3-hover-border-red" name="password1" type="password">
				<label>Confirm Password</label>
				<input class="w3-input w3-hover-border-red" name="password2" type="password">
				<button class="w3-button w3-margin-top w3-red w3-right" name="register" onclick="document.getElementById('success').style.display='block'">Login</button>
			</form>
		</div>
	</body>
</html>
<?php
	//server stuff
	$servername = "localhost";
	$serverUser = "root";
	$dbName = "access";
	$serverPass = "";
	//form stuff
	$username = "";
	$password1 = "";
	$password2 = "";
	$secPass = "";
	
	if(isset($_POST['register'])) {
		$username = $_POST['name'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		if(empty($username)) {
			echo '<script>document.getElementById("emptyuser").style.display="block";</script>';
		}
		elseif(empty($password1)) {
			echo '<script>document.getElementById("emptyuser").style.display="block";</script>';
		}
		elseif(empty($password2)) {
			echo '<script>document.getElementById("emptyuser").style.display="block";</script>';
		}
		elseif($password1 != $password2) {
			echo '<script>document.getElementById("match").style.display="block";</script>';
		} else {
			$secPass = md5($password1);
			$conn = new mysqli($servername, $serverUser, $serverPass, $dbName);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO users (username, password) VALUES ('$username', '$secPass');";
			if ($conn->query($sql) === TRUE) {
			    echo '<script>document.getElementById("success").style.display="block";</script>';
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$username = "";
			$password1 = "";
			$password2 = "";
			$secPass = "";
			$conn->close();
		}
	}
?>