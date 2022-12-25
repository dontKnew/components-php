<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chines_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	var_dump($row);
  }
} else {
  echo "0 results";
}
$conn->close();
?>