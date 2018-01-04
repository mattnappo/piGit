<?php
  session_start();
  if(!$_SESSION["authorized"]) {
    header("location: login.html.php");
  }
?>
