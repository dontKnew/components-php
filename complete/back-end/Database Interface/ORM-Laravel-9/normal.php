
<?php
$servername = "119.18.54.45";
$username = "apnamgzf_sajid";
$password = "EY6%gbEY5s3N";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
