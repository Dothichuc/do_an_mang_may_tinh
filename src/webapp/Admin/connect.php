<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webdienthoai";
//doi port thi them $port =" port";

// Create connection
$conn = mysqli_connect($servername, $username,$password,$database );

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

