<?php
	if(!function_exists("registerAcc")) {
		function registerAcc() {

		}
	}
	//server stuff
	$servername = "localhost";
	$serverUser = "root";
	$dbName = "main_db";
	$serverPass = "";

	if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpw = $_POST['confirmpw'];
    if(!empty($username) && !empty($password) && $password == $confirmpw) {
      $hashed_password = md5($password);
      $connection = new mysqli($servername, $serverUser, $serverPass, $dbName);
      if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
			$usernameExists = false;
			$dir = "../main/users/" . $username . "/";
			$sql = "SELECT id, username FROM git";
			$result = $connection->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['username'] == $username || file_exists($dir) == true) {
						$usernameExists = true;
						break;
					}
				}
				if($usernameExists == true) {
					echo '<script>document.getElementById("usernameTaken").style.display = "block";</script>';
				} else {
					$sql = "INSERT INTO git (username, password) VALUES ('$username', '$hashed_password');";
					if ($connection->query($sql) === TRUE) {
						mkdir($dir);
						echo '<script>document.getElementById("registerSuccess").style.display = "block";</script>';
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
			}
      $connection->close();
    } else {
      if(empty($username)) {
        echo '<script>document.getElementById("usernameNull").style.display = "block";</script>';
      }
      if(empty($password)) {
        echo '<script>document.getElementById("passwordNull").style.display = "block";</script>';
      }
      if($password != $confirmpw) {
        echo '<script>document.getElementById("passwordMatchError").style.display = "block";</script>';
      }
    }
  }
?>
