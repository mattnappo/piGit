<?php
  if(!isset($_SESSION["username"])) {
    echo "<script>alert('unauthorized access');</script>";
    header("location: login/");
  }
?>
