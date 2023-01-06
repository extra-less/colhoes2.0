<?php
$server = "localhost";
$username = "ember";
$password = "ember@1337";
$db_name = "ember";
$con = mysqli_connect($server,$username,$password,$db_name);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>