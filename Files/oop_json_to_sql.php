<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO people(name)
VALUES (?)";

$filename = 'example.json';
$json = file_get_contents($filename);
$data = json_decode($josndata);
$singledata = $data->people->name;

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>