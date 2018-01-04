<?php
  $rawJSON = '{"users":{"one":"hash","two":"hash"}}';
  $json = json_decode($rawJSON, true);
  //echo "<br>" . $json["users"]["two"];

  foreach ($json["users"] as $key => $value) {
    echo $key. "<br>";
    //echo $value["name"] . ", " . $value["gender"] . "<br>";
  }
?>
